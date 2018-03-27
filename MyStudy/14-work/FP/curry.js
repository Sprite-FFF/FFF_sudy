let _ = require('ramda')

// curry 的概念很简单：只传递给函数一部分参数来调用它
// 让它返回一个函数去处理剩下的参数。
let add = function (x) {
  return function (y) {
    return x + y
  }
}

let re = add(1)(2)

console.log(re)

var match = _.curry(function (what, str) {
  return str.match(what)
})

var replace = _.curry(function (what, replacement, str) {
  return str.replace(what, replacement)
})

var test = _.curry(function (what, str) {
  return what.test(str)
})

var filter = _.curry(function (f, arr) {
  return arr.filter(f)
})

var map = _.curry(function (f, arr) {
  return arr.map(f)
})

let a = match(/\s+/g, 'hello world')
console.log(a)

let b = match(/\s+/g)('hello world')
console.log(a)

let getSpace = match(/\s+/g)

let hasSpace = test(/\s+/g)

console.log(filter(hasSpace, ['wuxin', 'yanglin', 'zeng xi', 'xixi']))

let findSpace = filter(hasSpace)

let r = findSpace(['wu xin','yang lin','xixi','zengxi'])

console.log(r)