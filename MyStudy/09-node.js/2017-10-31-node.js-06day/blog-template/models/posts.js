const db = require("./db");

// 处理添加文章
module.exports.insert = function(data,callback){
  let sql = "insert into posts set ?";
  db.query(sql,data,(err)=>{
    if(err){
     return callback(err);
    }
    callback();
  });
}

module.exports.getList = function(callback){
  let sql = "select * from posts";
  db.query(sql,(err,rows)=>{
    if(err){
      return callback(err);
    }
    callback(null,rows);
  })
}

module.exports.del = function(data,callback){
  let sql = "delete from posts where ? ";
  db.query(sql,data,(err)=>{
    if(err){
      return callback(err);
    }
    callback(null);
  });
}

module.exports.findById = function(data,callback){
  let sql = "select * from posts where ? ";
  db.query(sql,data,(err,row)=>{
    if(err){
      return callback(err);
    }
    callback(null,row);
  });
}

// 修改文章

module.exports.modify = function(data,callback){
  let sql = "update posts set ? where id = ?";
  db.query(sql,[data,data.id],(err)=>{
    if(err){
      return callback(err);
    }
    callback(null);
  });
}

