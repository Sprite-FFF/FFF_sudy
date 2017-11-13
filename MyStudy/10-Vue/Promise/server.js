const http = require("http");
const fs = require("fs");

var server = http.createServer();

server.listen("3000",function(err){
  if(!err){
    console.log("server is ready...");
  }
})

server.on("request",(req,res)=>{
  console.log("请求到了");
  res.writeHeader(200,{"Content-type":"text/html;charset=utf-8"});
  // res.write("侬今葬花人笑痴 他日葬侬知是谁");
  fs.readFile("./01-Promise.html",'utf8',(err,info)=>{
    if(!err){
      res.write(info);
      res.end();
    }
  });
  
})