// 后台主路由
let admin = require("express").Router();


admin.get("/",(req,res)=>{
  res.render("admin/index",{});
});

admin.get("/blog_add",(req,res)=>{
  res.render("admin/blog_add",{});
})

// 处理post请求
admin.post("/add",(req,res)=>{
  res.send("ok");
})
// 后台路由
module.exports = admin;