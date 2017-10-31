// 前台主路由
let home = require("express").Router();
let users = require("../models/users")

home.get("/",(req,res)=>{
  res.render("./home/index",{});
});

home.get("/article",(req,res)=>{
  res.render("./home/article",{});
});

home.get("/center",(req,res)=>{
  res.render("./home/center",{});
})

home.get("/about",(req,res)=>{
  res.render("./home/about",{});
});

home.get("/join",(req,res)=>{
  res.render("./home/join");
});

home.get("/login",(req,res)=>{
  res.render("./home/login");
})

home.get("/register",(req,res)=>{
  res.render("./home/register");
})

// 注册页面AJAX请求
home.post("/register",(req,res)=>{
  users.insert(req.body,(err)=>{
    if(!err){
        return res.json({
        code:777,
        msg:"注册成功"
      });
    }
    console.log(err);
  });
})

// 登陆页AJAX请求

home.post("/login",(req,res)=>{
  users.auth(req.body,(err,row)=>{
    if(err){
      return res.send({error:err});
    }
    if(row.code){
      return res.send(row);
    }

    // 设置session
    req.session.loginfo = row;
    res.json({
      code:777,
      msg:"登陆成功"
    });
  });
});

module.exports = home;