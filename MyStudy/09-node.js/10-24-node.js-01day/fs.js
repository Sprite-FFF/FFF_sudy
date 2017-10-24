// 通过系统模块 fs 可以实现目录及文件的操作

let file = require("fs");

// mkdir()方法 可以支持两个参数 1 目录名称 2 回调函数
file.mkdir("./test",(err)=>{
  // 如果有错误 err是一个对象 描述了错误的原因
  // 如果没有错误 为null
  console.log(err);
});

// 创建文件  接收三个参数 1 路径 2 写入内容 3 回调函数
file.writeFile('./test/test.md','最是一年春好处 绝胜烟柳满皇都',(err)=>{
  if(!err){
    console.log('创建文件成功');
  }
});

