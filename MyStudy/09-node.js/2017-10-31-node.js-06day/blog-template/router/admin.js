// 后台主路由
let admin = require("express").Router();
let post = require("../models/posts");
// 处理文件
let multer = require("multer");
// 处理上传文件
let upload = multer({dest:"./uploads"});

// var storage = multer.diskStorage({
//   destination: function (req, file, cb) {
//     cb(null, './public/amdin/uploads/avatar')
//   },
//   filename: function (req, file, cb) {
//     console.log(file);
//     // let extname = file.originalname.slice(file.originalname.lastIndexOf('.'));
//     cb(null, file.fieldname + '-' + Date.now())
//   }
// })

// var upload = multer({ storage: storage })



admin.get("/",(req,res)=>{
  res.render("admin/index",{});
});
// 添加文章页
admin.get("/add",(req,res)=>{
  res.render("admin/manage",{action:"/admin/add"});
})
// 文章列表页
admin.get("/blog_list",(req,res)=>{
  post.getList((err,rows)=>{
    if(!err){
      res.render("admin/blog_list",{list:rows});
    }
  }); 
})
// 退出登录
admin.get("/loginout",(req,res)=>{
  req.session.loginfo = null;
  res.redirect("/login");
});
// 个人中心

admin.get("/settings",(req,res)=>{
  res.render("admin/settings",{info:req.session.loginfo});
})


// 处理文章编辑请求 
admin.get("/edit",(req,res)=>{
  post.findById(req.query,(err,row)=>{
    if(!err){
      res.render("admin/manage",{
        list:row[0],
        action:"/admin/modify"
      })
    }
  });
})

// 处理文章列表删除请求
admin.get("/del-post",(req,res)=>{
  post.del(req.query,(err)=>{
    if(!err){
      res.json({
        "code":10000,
        "msg":"添加文章成功"
      });
    }
  });
});

// 处理添加请求
admin.post("/add",(req,res)=>{
  req.body.uid = req.session.loginfo.id;  
  post.insert(req.body,(err)=>{
    if(!err){
      res.json({
        "code":10000,
        "msg":"添加文章成功"
      });
    }
  });
})

// 处理修改表单提交
admin.post("/modify",(req,res)=>{
  post.modify(req.body,(err)=>{
    if(!err){
      res.json({
        code:10000,
        msg:"修改成功"
      });
    }
  });
});

// 处理头像上传
// 使用中间件 upload.single()
admin.post("/updateinfo",upload.single("avatar"),(req,res)=>{
  // console.log(req.body);
  // console.log(req.file);
});
// 后台路由
module.exports = admin;