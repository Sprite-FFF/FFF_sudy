const http = require("http");
const path = require("path");
const fs = require("fs");
const url = require("url");
const template = require("art-template");
// 配置模板引擎和根路径

template.defaults.root = "./";
template.defaults.extname = ".html";

let server = http.createServer();

server.listen("3000",(err)=>{
  if(!err){
    console.log("server is running");
  }
});

server.on("request",(req,res)=>{
  let {pathname} = url.parse(req.url);
  console.log(pathname);

  res.render = function(tpl,data){
    let html = template(tpl,data);
    res.end(html);
  }

  switch(pathname){
    case "/":
    case "/abc/ab":
    let list = {
      title:"花自飘零水自流"
    }
    res.render("index",list);
    break;

    default:
    let realPath = path.join("./",pathname);
    fs.readFile(realPath,(err,data)=>{
      if(!err){
        res.write(data);
        res.end();
      }
    });
  }
});