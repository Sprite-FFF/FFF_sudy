// 后台主路由
let admin = require("express").Router();
let user = require("../models/users");
let post = require("../models/posts");
// 处理文件
let multer = require("multer");
// 处理上传文件
// 自定义文件保存路径和文件名
var storage = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, './public/admin/uploads/avatar');
  },
  filename: function (req, file, cb) {
    let extname = file.originalname.slice(file.originalname.lastIndexOf("."));
    cb(null, file.fieldname + '-' + Date.now()+extname);
  }
})

var upload = multer({ storage: storage })

// 后台首页
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

// 处理添加文章请求
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

// 处理修改文章表单提交
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
admin.post("/upload-hdpic",upload.single("avatar"),(req,res)=>{
  res.json({
    code:10000,
    msg:"头像上传成功",
    path:"/"+req.file.path
  });
});
// 处理用户修改个人信息
admin.post("/updateinfo",(req,res)=>{
  user.updateinfo(req.body,(err)=>{
    if(!err){
      console.log(req.session.loginfo);
      console.log(req.body);
      // 更新session信息
      for (var key in req.body) {
          req.session.loginfo[key] = req.body[key];
      }
      res.json({
        code:10000,
        msg:"个人资料修改成功"
      });
    }
  });
});
// 侧边栏头像处理
admin.get("/show",(req,res)=>{
  res.json({
    code:10000,
    msg:"获取成功",
    user:{
      pic:req.session.loginfo.avatar,
      name:req.session.loginfo.name
    }
  });
});
// 后台路由
module.exports = admin;