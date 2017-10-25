
//通过 系统模块创建http服务器
let http = require("http");
// 通过 createServer 可以创建一个服务器实例
let server = http.createServer();

// 通过listen监听一个端口
server.listen(3000);
// 通过事件监听请求和响应
// 通过on事件来监听
server.on("request",(req,res)=>{
  // 通过req来处理请求
  // 通过res来处理响应
  console.log("有人来啦♪(^∇^*)...");
  // 响应有状态行 响应头 响应主体
  // 通过writeHead() 来设置
  res.writeHead(200,{
    'Content-Type':'text/html;charset=UTF-8'
  });
  res.write("心比天高 命比纸薄");
  res.end();
});