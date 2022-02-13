import Promise from 'bluebird'

export const test = (req, res) => Promise.resolve({
  message: "Hello World",
})
