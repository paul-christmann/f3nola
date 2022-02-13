import { GracefulShutdownManager } from '@moebius/http-graceful-shutdown'
import Express from 'express'
import Promise from 'bluebird'
import { serializeError } from 'serialize-error'
import addRequestId from 'express-request-id'

import pino from 'pino'
import { logger } from './common/logger'
import * as Routes from './routes'
import * as AllRoutes from './allRoutes'
import * as Sql from './clients/sql'

const getTimeout = () => {
  return 30000 // default
}
const app = Express()
app.use(addRequestId({ headerName: 'x-rasa-session-id', attributeName: 'sessionId' }))
app.use(addRequestId({}))

Promise.config({ cancellation: true, longStackTraces: true })

const wrapHandler = (handler: Routes.Handler) => (
  req: Express.Request & { log: pino.Logger },
  res: Express.Response & { err: any },
  next: Express.NextFunction
) => {
  const handlerP = handler(req, res, next)
    .timeout(getTimeout())
    .then((body: {}) => {
      if (!res.headersSent) {
        res.json(body)
      }
    })
    .catch((e: Error) => {
      res.err = e
      res.status(500).send(serializeError(e))
    })
  req.connection.on('close', (...args) => handlerP.cancel())
}

const setupRoutes = () =>
  AllRoutes.routes.map(({ method, route, handler, roles }: any) => {
    app.options(route, (req, res, next) => {
      // TODO auth will go here
      res.send()
    })

    switch (method) {
      case 'get':
        app.get(route, wrapHandler(handler))
        break
      case 'post':
        app.post(route, wrapHandler(handler))
        break
      case 'put':
        app.put(route, wrapHandler(handler))
        break
      case 'delete':
        app.delete(route, wrapHandler(handler))
        break
      default:
        return
    }
  })

const setupClients = () => {
  Promise.all([
    Sql.createClient(process.env),
  ]).then(([sqlClient]) => {
    app.locals = {
      sqlClient,
    }
  })
}

const closeClientConnections = () => {
  Promise.all([
    Sql.closeClient(app.locals.sqlClient)
  ]).then(() => {
    logger.info('All connections gracefully closed. Terminating.')
    process.exit(0)
  })
}

Promise.resolve(true)
  .then(() => setupClients())
  .then(() =>  setupRoutes())
  .then(() => app.listen(process.env.PORT || 3001))
  .tap(() =>
    logger.info(`Starting application listening on ${process.env.PORT || 3001}`)
  )
  .then((server) => {
    const shutdownManager = new GracefulShutdownManager(server)
    process.on('SIGTERM', () => {
      shutdownManager.terminate(closeClientConnections)
    })
  })
  .catch((e: Error) => {
    logger.error('Error', e)
    process.exit(1)
  })

process.on('uncaughtException', pino.final(logger, (err, finalLogger) => {
  finalLogger.fatal({ err }, 'uncaughtException')
  process.exit(1)
}))

process.on('unhandledRejection', pino.final(logger, (err, finalLogger) => {
  finalLogger.error({ err }, 'unhandledRejection')
}))
