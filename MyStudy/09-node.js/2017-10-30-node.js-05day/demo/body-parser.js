const queryString = require("querystring");

module.exports.urlencoded = function(){
  return function (req,res,next){
    let txt = "";
    // 接收post数据
    req.on("data",(chunk)=>{
      txt+=chunk;
    });

    req.on("end",()=>{
      // 解析post数据
      req.body = queryString.parse(txt);
      next();
    });
  }
}