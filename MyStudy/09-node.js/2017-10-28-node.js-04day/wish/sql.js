var http = require("http");

var mysql = require("mysql");


let server = http.createServer();

// 链接数据库
let connection = mysql.createConnection({
  host:"localhost",
  user:"root",
  password:"wait991016",
  database:"wish"
});

server.listen("3000",(err)=>{
  if(!err){
    console.log("server is running");
  }
});

// 执行sql语句 query()方法
// let result = connection.query("select * from wishList",(err,data)=>{
//   if(!err){
//     console.log(data);
//   }
// });
// 通过query方法的返回值 可以获得query执行的SQL语句
// console.log(result.sql);

// 这里的?可以充当一个占位符  表示这里将会替换一个变量
// let user = "晴雯";
//  let s = connection.query("select * from wishList where user=?",user,(err,data)=>{
//   if(!err){
//     console.log(data);
//   }
//   console.log(err);
// });
// console.log(s.sql);

let user = "白居易";
let no = 1418;

// 多个where子句 第二个参数使用数组传递
// let s = connection.query("select * from wishList where no=? and user=?",[no,user],(err,data)=>{
//   if(!err){
//     console.log(data);
//   }
// });
// console.log(s.sql);

// 如果参数是对象 将会被转成  key = val , key = val 格式
let s = connection.query("select * from wishList where ?",{user:user,no:no},(err,data)=>{
  if(!err){
    console.log(data);
  }
});

console.log(s.sql);








server.on("request",(req,res)=>{
  
  res.write("success");
  res.end();
});