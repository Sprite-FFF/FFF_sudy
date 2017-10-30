// 引入express框架
const express = require("express");
// 引入body-parser
const bodyParser = require("body-parser");

const app = express();
// 开启监听
app.listen("3000");
// 设置模板引擎
app.set("views","./views");
app.set("view engine","xtpl");

// 中间件处理静态资源
app.use(express.static("public"));
// 加载处理post请求的中间件
// 之后req会有一个body属性 req.body就可以获取post参数
app.use(bodyParser.urlencoded());

// 设置路由
app.get("/",(req,res)=>{
  res.render("index",{});
});

app.get("/blog",(req,res)=>{
  res.render("blog",{});
})

app.get("/doc",(req,res)=>{
  res.render("doc",{});
})

app.get("/test",(req,res)=>{
  res.render("test",{});
});

// 处理post请求
app.post("/",(req,res)=>{
  console.log(req.body);
  res.send(req.body);
})