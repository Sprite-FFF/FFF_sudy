const http = require("http");
const fs = require ("fs");
const url = require("url");
const path = require("path");
const template = require("art-template");
// 引入格式化事件模块
const moment = require("moment");
const mime = require("mime");
// 引入操作数据库模块
const db = require("./database/db");

template.defaults.root = "./";
template.defaults.extname = ".html"
// 这里解决前后端模板冲突问题
// 修改模板的界定符
template.defaults.rules[1].test = /##([@#]?)[ \t]*(\/?)([\w\W]*?)[ \t]*##/;

let server = http.createServer();
server.listen("3000");

server.on("request",(req,res)=>{
  res.render = function(tpl,data){
    let html = template(tpl,data);
    res.end(html);
  }
  // 设计路由
  let {pathname,query} = url.parse(req.url,true);
  // console.log(req.body);
  switch (pathname) {
    case "/":
    case "/index":

    db.query("select * from wishList",(err,data)=>{
      if(!err){
        data.forEach((item)=>{
          item.class = "a" + Math.ceil(Math.random()*5);
          // 将时间转化为相对时间  汉化
          item.date = moment(item.date).local("zh-cn").fromNow();
        });
        res.render("index",{list:data}); 
      }
    });
     
     break;
    case"/create":
    query.no = parseInt(Math.random()*2000);
    query.date = new Date();
    console.log(query);
    let s = db.query("insert into wishList set ?",query,(err,info)=>{
      if(!err){
         res.writeHeader("200",{
           "Content-Type":"application/json"
         });

         res.write(JSON.stringify({
           code:1000,
           msg:"add success",
           // 将新添加的数据返回到前台页面  
           result:query
         }));
         res.end();
      }
    });
    console.log(s.sql);
    break;
    default:
      let realPath = path.join("./",pathname);
      fs.readFile(realPath,(err,data)=>{
        if(!err){
          res.writeHeader(200,{
            "Content-type":mime.getType(realPath)
          });
          res.write(data);
          res.end();
        }
      });
      break;
  }
});