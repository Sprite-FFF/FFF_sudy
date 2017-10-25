// 通过系统模块 path 可以用来获得路径相关信息
// 比如文件名 目录名 文件后缀等

let path = require("path");
let file = './test/test.md';
// 获取文件信息
// let info = path.parse(file);
// console.log(info);

// let {dir,name,ext} = path.parse(file);

// console.log(dir,name,ext);

// 通过path模块的dirname() 方法 可以直接获得目录名称
console.log(path.dirname(file));

// extname() 方法 可以直接获得文件后缀 
console.log(path.extname(file));

// 通过path模块提供的join方法 可以处理多个路径
// 将三个路径链接掉一起
console.log(path.join('./a','./b','./c'));
console.log(path.join('./a','./b','./c','../d'));