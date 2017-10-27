let gulp = require("gulp");
let less = require("gulp-less");
let concat = require("gulp-concat");

// 可以将压缩css作为一个任务
// 也可以将less 转成 css当做一个任务
// 也可以将js进行合并当成一个任务

// gulp.task('default',function(){
//   // 将你的默认的任务代码放在这里
// });

// 比如将less转成css
gulp.task("lesstocss",function(){
  // 将less转换为css
  // gulp.src()指定需要将哪些资源进行转换 (路径)
  // gulp.dest()指定转换后的文件放在哪个地方
  gulp.src("./less/*.less").pipe(less()).pipe(gulp.dest("./css"));
  console.log("change success");  
});

gulp.task("combine",function(){
  gulp.src("./libs/*.js").pipe(concat("abc.js")).pipe(gulp.dest("./js"));
  console.log("combine success");  
});

// 通过全局安装的gulp来执行任务