let http = require("http");
let url = require("url");
let fs = require("fs");

let server = http.createServer();

server.listen("3000",(error)=>{
  if(!error){
    console.log("this server get already...");
  }
});

server.on("request",(req,res)=>{
  console.log(req.url);
  if(req.url == "/" || req.url == "/index.html"){
    // 设置响应头
    res.writeHeader(200,{
      "Content-Type":"text/html charset=UTF-8"
    });
    fs.readFile("./index.html","utf-8",(error,data)=>{
      // 将数据响应到服务端
      if(!error){
        res.write(data);
        res.end();
      }
    });
  }
});