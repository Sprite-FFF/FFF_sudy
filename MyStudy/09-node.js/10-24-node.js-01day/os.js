
// 在node.js中对很多的功能进行了封装
// 在我们将这些封装好的东西叫做模块

// 很多模块随node.js的安装 就自动安装好了
// 被称为 系统模块 常见的系统模块 fs path http os..

// os模块封装了读取系统信息的功能 

// 要想使用模块 需要用require引入模块

// require 需要传入系统模块名称 可以得到返回值

let os = require('os');
console.log(os);

console.log(os.hostname()); //用户名
console.log(os.cpus()); // CPU信息
