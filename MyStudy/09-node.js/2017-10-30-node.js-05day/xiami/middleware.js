let express = require("express");

let server = express();

server.listen("3000");

server.use(express.static("public"));
// 在express中 设计了中间件的概念 
// 所谓中间件就是指在请求或者响应的中间阶段
// 对请求和响应做出处理一系列逻辑

// 通过use方法来实现这一概念
// use方法可以支持两个参数

server.use((req,res,next)=>{
  // next()将请求和响应传递给下一中间件 
  // 如果不调用next那么下一个中间件会阻塞执行
  console.log(next);
  next();
});

server.use((req,res,next)=>{
  next()
});
// 中间件支持路由
server.use("/add",(req,res,next)=>{
  req.demo = "中间件路由";
  console.log(req.demo);
  next();
});
server.get("/",(req,res)=>{
  res.send("东风不与周郎便 铜雀春深锁二乔");
});