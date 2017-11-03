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

// 查询所有文章
module.exports.getList = function(callback){
  let sql = "select * from posts";
  db.query(sql,(err,rows)=>{
    if(err){
      return callback(err);
    }
    callback(null,rows);
  })
}

// 删除文章
module.exports.del = function(data,callback){
  let sql = "delete from posts where ? ";
  db.query(sql,data,(err)=>{
    if(err){
      return callback(err);
    }
    callback(null);
  });
}

// 通过id查找文章
module.exports.findById = function(data,callback){
  let sql = "select * from posts where ? ";
  db.query(sql,data,(err,row)=>{
    if(err){
      return callback(err);
    }
    callback(null,row);
  });
}

// 通过id联表查询文章
module.exports.findPost = function(id,callback){
  let sql = "select * from posts left join users on posts.uid = users.id where posts.id=?";
  db.query(sql,id,(err,row)=>{
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

// 联表分页查询文章
module.exports.queryPosts = function(page,pageSize,callback){
  let offset = (page - 1) * pageSize;
  let sql = "select posts.id,title,brief,time,name,avatar from posts left join users on posts.uid = users.id limit ?,?";
  db.query(sql,[offset,pageSize],(err,rows)=>{
    if(err){
      return callback(rows);
    }
    callback(null,rows);
  });

}

// 查询文章总记录条数

module.exports.count = function(callback){
  let sql = "select count(id) as count from posts";
  db.query(sql,(err,row)=>{
    if(err){
      return callback(err);
    }
    callback(null,row);
  });
}

