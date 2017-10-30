const express = require("express");

// 引入自己封装的模块
const bodyParser = require("./body-parser");

let server = express();

server.set("views","./");
server.engine(".html",require("ejs").__express);
server.set("view engine",".html");

server.listen(3000,(err)=>{
  if(!err){
    console.log("server is running...");
  }
});

server.use(bodyParser.urlencoded());
server.post("/",(req,res)=>{
  console.log(req.body);
  res.send(req.body);
});

server.get("/",(req,res)=>{
  res.render("index",{});
});