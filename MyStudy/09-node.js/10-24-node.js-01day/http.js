// http 是一个系统模块 通过http模块 可以创建一个http服务器
// 通过一系列方法来创建


let http = require("http");

//  
let url = require("url");

// 通过createServer 得到一个服务器实例  
let server = http.createServer();

// 通过服务器实例来 请求处理请求和响应 

// 通过服务器实例的 listen方法 来实现端口的监听

server.listen(3000);

// 通过服务器实例的 request 事件来处理客户端的请求
// 并根据情况作出响应 
// 通过on 方法实现事件监听 


// 每当修改了服务器js代码 需要重新执行一次
server.on('request', (req, res) => {
  console.log("有人来了\\(≧▽≦)/~啦啦啦");
  // 回调函数中可以设置两个参数 分别对应请求和响应 
  // 第一个表示请求相关 req
  // 第二个表示响应相关 res
  // 设置状态行和响应头

  console.log(url.parse(req.url, true));
  res.writeHead('200', {
    'Content-Type': 'text/html;charset=UTF-8'
  })
  // 响应主体
  res.write("江畔何年初见月 江月何年初照人");
  res.end();
});