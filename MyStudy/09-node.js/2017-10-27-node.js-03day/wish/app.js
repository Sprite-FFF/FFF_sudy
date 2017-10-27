const http = require("http");

const fs = require("fs");

const path = require("path");

const url = require("url");

const template = require("art-template");

// 配置模板引擎
template.defaults.root = "./";
template.defaults.extname = ".html";

let server = http.createServer();

server.listen("3000",(error)=>{
  console.log("server is already");
});

server.on("request",(req,res)=>{
  let {pathname} = url.parse(req.url);
  let realPath = path.join("./",pathname);

  res.rander = function (tpl,data){
    let html = template(tpl,data);
    res.write(html);
    res.end();
  }

  switch(pathname){
    case "/":
    let data = {
      title:'许愿墙',
      info:'寒塘渡鹤影 冷月葬花魂'
    }
    res.rander('index',data);
    break;
    default:
    fs.readFile(realPath,(error,data)=>{
      if(!error){
        res.write(data);
        res.end();
      }
    });
  }
});