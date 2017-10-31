const db = require("./db");
db.connect();

// 注册
module.exports.insert = function(data,callback){
  // 将密码使用md5加密
  data.pass = db.md5(data.pass);
  let sql = "insert into users set ?";
  db.query(sql,data,(err)=>{
    if(err){
      return callback(err);
    }
  });
  callback(null);
}

// 登陆 
module.exports.auth = function(data,callback){
  let sql = "select * from users where email=?";
  db.query(sql,data.email,(err,rows)=>{
    // 有错误处理错误
    if(err){
      return callback(err);
    }
    // 判断密码是否正确
    if(rows[0].pass == db.md5(data.pass)){
        return callback(null,rows[0]);
    }
    callback({
      code:778,
      msg:"邮箱或者密码错误"
    });
  });

}
module.exports;