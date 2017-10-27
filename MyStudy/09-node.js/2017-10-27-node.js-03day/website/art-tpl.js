let http = require("http");
let fs = require('fs');
let url = require("url");
let template = require("art-template");
template.defaults.root = "./";
template.defaults.extname = ".html";
server = http.createServer(0);
server.listen("3000");
server.on("request",(req,res)=>{
  // 路由是地址与程序间的映射关系
  // 通过 req.url 可以获得地址 (不包含参数)

  // 路由是开发人员设计的
  console.log(url.parse(req.url,true));
  let {pathname} = url.parse(req.url);
  res.render = function(tpl,data){
    console.log(data);
    let html = template(tpl,data);
    this.write(html);
    this.end();
  }
  switch(pathname) {
    case '/':
    let list = {
      title:"冷月葬花魂"
    }
    console.log("a");
    res.render("index.html",list);
    break;
    case '/b':
    console.log("a/b");
    res.render("doc.html",list);
    break;
    case '/c':
    console.log("a/b/c");
    res.render("blog.html",list);
  }
  res.end();
});