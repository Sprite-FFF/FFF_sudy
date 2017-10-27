const http = require("http");

const fs = require("fs");

const url = require("url");

const path = require("path");

const template = require("art-template");

// 配置模板引擎根路径为当前
template.defaults.root = "./";
// 配置模板后缀名为.html (默认为.art)
template.defaults.extname = ".html";
// 引入存储数据的json文件
let db = require("./database/students.json");

let server = http.createServer();
server.listen("3000",(err)=>{
  if(!err){
    console.log("this server is running...(*^__^*)");
  }
});

server.on("request",(request,response)=>{
  // 对象解构赋值 
  let {pathname,query} = url.parse(request.url,true);
  console.log(pathname);
  // 路由
  switch (pathname) {
    // 访问主页
    case "/":
    case "/add":
      fs.readFile("./views/add.html",(error,data)=>{
        if(!error){
          response.write(data);
          response.end();
        }
      })
      break;
      // 添加操作
    case "/create":
      db.push(query);
      // 写入文件
      fs.writeFile("./database/students.json",JSON.stringify(db));
      // 跳转
      response.writeHeader(302,{
        "Location":"/list"
      });
      response.end();
    break;
    // 删除操作
    // 问题:设置响应头这里却不能跳转
    case "/delete":
      db.splice(query.index,1);
      fs.writeFile("./database/students.json",JSON.stringify(db));
      response.writeHeader(302,{
        "Location":"/list"
      });
      response.end();
    break;
    // 访问list页面
    case "/list":
    // 使用模板引擎
    let html = template("./views/list.html",{list:db});
    response.write(html);
    response.end();    
    break;
    default:
      // 读取文件响应
      fs.readFile(path.join("./public",pathname),(error,data)=>{
        if(!error){
          response.write(data);
          response.end();
        }
      });
      break;
  }

});