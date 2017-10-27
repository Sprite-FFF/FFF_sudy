const http = require("http");

const fs = require("fs");

const path = require("path");

let server = http.createServer();

server.listen("3000",(error)=>{
  if(!error) {
    console.log("server is already...");
  }
});

server.on("request",(req,res)=>{
  let realPath = req.url == "/"?"slide.html":path.join("./",req.url);
  console.log(realPath);
  fs.readFile(realPath,(error,data)=>{
    if(!error){
      res.write(data);
      res.end();
    }
    if(error){
      res.writeHeader("404");
      res.write("Not Found");
      res.end();
    }
  });

});

