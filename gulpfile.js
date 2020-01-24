
'use strict';
 
var gulp = require('gulp');

var sass = require('gulp-sass');
var concatCss = require('gulp-concat-css');
var minifyCSS = require('gulp-clean-css');



var size = require('gulp-size');
var csso = require('gulp-csso');

var browserSync = require('browser-sync').create();
var autoprefixer = require('gulp-autoprefixer');
 
sass.compiler = require('node-sass');

var concat = require('gulp-concat');
var minifyjs = require('gulp-js-minify');

 
gulp.task('sass', function () {
  return gulp.src('./assets/src/scss/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(concatCss("theme.min.css"))
    .pipe(minifyCSS())
    .pipe(gulp.dest('./assets/dist/css'))
    .pipe(size())
    .pipe(autoprefixer({ cascade: false }))
    .pipe(csso())
    .pipe(size())
    
    .pipe(browserSync.stream())
    ;
});

gulp.task('scripts', function() {
  return gulp.src('./assets/src/js/**/*.js')
    .pipe(concat('main.min.js'))
    .pipe(minifyjs())
    .pipe(gulp.dest('./assets/dist/js'))

    .pipe(browserSync.stream())
    ;
});

gulp.task('dev', function() {

  browserSync.init({
      proxy: "localhost:8888/patstewart/"
  });

  gulp.watch("./assets/src/scss/**/*.scss", gulp.series('sass'));
  gulp.watch("./assets/src/js/**/*.js", gulp.series('scripts'));
  gulp.watch("./**/*.php").on('change', browserSync.reload);
});

gulp.task("default", gulp.series('sass', 'scripts', 'dev'));
