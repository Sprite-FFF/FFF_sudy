let http = require("http");
let fs = require("fs");
let path = require("path");
let mime = require("mime");

let server = http.createServer();
server.listen("3000",(error)=>{
  if(!error){
    console.log("server is already...=￣ω￣=");
  };
});

server.on("request",(request,response)=>{
  if(request.url == '/'){
    response.writeHeader(200,{
      "content-type":"text/html charset=utf-8"
    });
    fs.readFile("./index.html","utf-8",(error,data)=>{
      if(!error){
        response.write(data);
        response.end();
      }
    });
  }else {
    let realPath = path.join("./",request.url);
    fs.readFile(realPath,(error,data)=>{
      if(!error){
        response.writeHeader(200,{
          "content-type":mime.getType(realPath)
        });
        response.write(data);
        response.end();
      }
    });
  }
});