let express = require("express");

let app = express();

app.listen("3000",(err)=>{
  if(!err){
    console.log("the server is running...");
  }
});

app.set("views","./views");
app.set("view engine","xtpl");

app.use(express.static("public"));

app.get("/",(req,res)=>{
  res.render("index",{});
});