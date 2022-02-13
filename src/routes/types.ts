import * as Express from 'express'

export type Method = 'get' | 'post' | 'put' | 'delete'
export type RouteString = string
export type Handler = Express.RequestHandler

export interface Route {
  method: Method
  route: RouteString
  handler: Handler
  roles?: []
}
