let mysql = require("mysql");

// 将mysql模块单独封装在一个模块
module.exports = mysql.createConnection({
  host:"localhost",
  user:"root",
  password:"wait991016",
  database:"wish"
});