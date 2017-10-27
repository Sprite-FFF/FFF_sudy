let http = require("http");
let fs = require('fs');
let url = require("url");

server = http.createServer(0);
server.listen("3000");
server.on("request",(req,res)=>{
  // 路由是地址与程序间的映射关系
  // 通过 req.url 可以获得地址 (不包含参数)

  // 路由是开发人员设计的
  console.log(url.parse(res.url,true));
  let {pathname} = url.parse(res.url);
  switch(pathname) {
    case '/':
    console.log(a);   
    break;
    case '/b':
    console.log(a/b);
    break;
    case '/c':
    console.log(a/b/c);
  }
  res.end();
});