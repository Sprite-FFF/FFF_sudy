let http = require("http");
let fs = require("fs");
let server = http.createServer();
a.listen(3000);
app.on("request",(req,res)=>{
  
});

// 目录和路径 在某种特定的情况下一一对应 所以目录作为参考来确定路径是没有问题的
// 但是如果目录和路京和路径不是一一对应的 就不能再以目录来确定路径
// 这个时候应以路径本身来确定

// 例如a/b/c/index.html 当前为 a/b/c
// a/b 当前为 a/

// 由此就发现了一个规律所谓当前路径其实就是路径中往上倒一级