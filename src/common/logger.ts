import pino from 'pino'

export const logger = pino({
  enabled: process.env.LOG_ENABLED !== 'false',
  level: 'debug',
  name: 'onboarding-api',
  prettyPrint: true,
} as pino.LoggerOptions)

