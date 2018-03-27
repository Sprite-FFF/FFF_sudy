const R = require('ramda')

// 组合
// 在 compose 的定义中，g 将先于 f 执行，
// 因此就创建了一个从右到左的数据流。这样做的可读性远远高于嵌套一大堆的函数调用
var compose = function (f, g) {
  return function (x) {
    return f(g(x))
  }
}

function toUpperCase(x) {
  return x.toUpperCase()
}

function exclaim(x) {
  return x + '!'
}

let short = compose(toUpperCase, exclaim)

let result = short('hello world')
console.log(result)

// 第二个示例代码 得到数组的最后一项
function head(x) {
  return x[0]
}

function reverse(arr) {
  return Array.prototype.reduce.call(arr,function (acc, x) {
    // console.log(acc)
    // console.log(x)
    return [x].concat(acc)
  },[])
}
// console.log(reverse(['a','b','c','d','e']))
// var last = compose(head, reverse)
// console.log(last([1, 2, 3, 4, 5, 6]))


// 结合律
let fn = compose(toUpperCase,compose(head,reverse))
let fn2 = compose(compose(toUpperCase,head),reverse)

console.log(fn(['wwuixn','zhangxin','zengxi','wumengyun']))
console.log(fn2(['wwuixn','zhangxin','zengxi','wumengyun']))
