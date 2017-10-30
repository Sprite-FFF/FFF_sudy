let express = require("express");
let admin = require("./router/admin");
let home = require("./router/home");

let app = express();

app.listen(3000,(err)=>{
  console.log("server is running...");
})

// 设置模板引擎
app.set("views","./views");
app.set("view engine","xtpl")

// 处理静态资源
app.use(express.static("public"));

// console.log(admin);
// console.log(home);

// 主路由可以认为是一个中间件
// 在主路由下创建子路由
app.use("/",home);
app.use("/admin",admin);

