const mysql = require("mysql");
const md5 = require("md5");

module.exports = mysql.createConnection({
  host:"127.0.0.1",
  user:"root",
  password:"wait991016",
  database:"blog"
});

module.exports.md5 = md5;