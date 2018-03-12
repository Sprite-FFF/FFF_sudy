const gulp = require ('gulp')
const babel = require ('gulp-babel')
const rename = require ('gulp-rename')

gulp.task('babel',function () {  
  return gulp.src('./src/js/*.js')
             .pipe(babel())
             .pipe(rename('vender.js'))
             .pipe(gulp.dest('./dist'))
})