let http = require("http");
let url = require("url");
let queryString = require("querystring")

let server = http.createServer();
// 开启监听3000端口
server.listen(3000);

server.on("request", (req, res) => {
  // console.log(req.method);
  // console.log(req.url);
  // console.log(req.headers);

  // console.log(url.parse(req.url,true));

  // 当请求数据为post时 才会有请求主体
  // 当数据以post方式上传时 会触发一个事件 data
  var formData = "";
  req.on("data",(chunk)=>{
    formData += chunk;
    // console.log(chunk);
    // console.log(formData);
  })

  req.on("end",()=>{  
    // 得到的数据使用不方便 可以使用系统模块 querystring来解析
    let parmas = queryString.parse(formData);
    console.log(parmas);
  });
  
  res.write("success");
  res.end();
});