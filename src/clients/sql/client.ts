import mysql from 'promise-mysql'

export type Client = mysql.Pool

export const createClient = (env: NodeJS.ProcessEnv) =>
  mysql
    .createPool({
      connectionLimit: 10,
      database: env.DB_NAME,
      host: env.DB_HOST,
      password: env.DB_PASSWORD,
      timezone: 'utc',
      user: env.DB_USER,
    })

export const closeClient = (client: Client) => client.end()
