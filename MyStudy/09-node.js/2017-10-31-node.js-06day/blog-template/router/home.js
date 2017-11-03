// 前台主路由
let home = require("express").Router();
let users = require("../models/users");
let post = require("../models/posts");

// 首页文章列表 分页查询
home.get("/", (req, res) => {
  post.count((err, row) => {
    if(err){
      return;
    }
    let total = row[0].count;
    let pageSize = 2;
    let page = req.query.page || 1;
    let pages = Math.ceil(total/pageSize);
    post.queryPosts(page, pageSize, (err, data) => {
      console.log(data);
      if(!err){
        res.render("./home/index",{
          post:data,
          pages:pages,
          page:page
        })
      }
    });
  });

  
  
});

// 详情文章
home.get("/article", (req, res) => {
  post.findPost(req.query.id,(err,row)=>{
    if(!err){
      res.render("./home/article", row[0]);
    }
  })
});

home.get("/center", (req, res) => {
  res.render("./home/center", {});
})

home.get("/about", (req, res) => {
  res.render("./home/about", {});
});

home.get("/join", (req, res) => {
  res.render("./home/join");
});

home.get("/login", (req, res) => {
  res.render("./home/login");
})

home.get("/register", (req, res) => {
  res.render("./home/register");
})

// 注册页面AJAX请求
home.post("/register", (req, res) => {
  users.insert(req.body, (err) => {
    if (!err) {
      return res.json({
        code: 777,
        msg: "注册成功"
      });
    }
  });
})

// 登陆页AJAX请求
home.post("/login", (req, res) => {
  users.auth(req.body, (err, row) => {
    if (err) {
      return res.send({
        error: err
      });
    }
    if (row.code) {
      return res.send(row);
    }

    // 设置session
    req.session.loginfo = row;
    res.json({
      code: 777,
      msg: "登陆成功"
    });
  });
});

module.exports = home;