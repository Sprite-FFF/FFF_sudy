// let express = require("express");

// let server  = express();

// server.set("views","./views");
// server.set("view engine","xtpl");
// // 监听端口
// server.listen(3000);

// // express.static 专门处理静态资源
// server.use(express.static("public"));

// server.get("/",(req,res)=>{
//   // res.send("无可奈何花落去 似曾相识燕归来");
//   res.render("add",{});
// });

// server.post();

let express = require("express");
let app = express();

app.listen(3000);

app.set("views","./views");
app.set("view engine","xtpl");

// 处理静态资源
app.use(express.static("public"));
// 设置路由
app.get("/",(req,res)=>{
  res.render("add",{});
});
app.get("/list",(req,res)=>{
  res.render("list",{});
});