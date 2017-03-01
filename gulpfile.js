var gulp = require('gulp'),
    sass = require('gulp-sass'),
    minify = require('gulp-minify');
    var sourcemaps = require('gulp-sourcemaps');
    const autoprefixer = require('gulp-autoprefixer');
    var rename = require('gulp-rename');
    var gulps = require("gulp-series");

    gulp.task('sass:watch', function () {
      gulp.watch('./sass/**/*.scss', ['sass']);
    });


  gulps.registerTasks({
    "js-min" : (function() {
      gulp.src('src/js/*.js')
        .pipe(minify({
          ext:{
            src:'-debug.js',
            min:'.min.js'
          },
          exclude: ['tasks'],
          ignoreFiles: ['.combo.js', '-min.js']
        }))
        .pipe(gulp.dest('app/assets/js'));
       console.log("js minification complete");
    }),
    "sass-compile" : (function () {
      return gulp.src('src/sass/includes.sass')
        .pipe(sass().on('error', sass.logError))
        // .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(rename('main.css'))
        .pipe(gulp.dest('app/assets/css'));
      console.log("sass compilation complete");
    }),
    "sass-compile-modules-index" : (function () {
      return gulp.src('src/sass/modules-index.sass')
        .pipe(sass().on('error', sass.logError))
        // .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('app/assets/css'));
      console.log("sass compilation complete");
    }),
    "autoprefixize" : (function () {
      gulp.src('app/assets/css/main.css')
        .pipe(autoprefixer({
          browsers: ['last 50 versions'],
          cascade: true
        }))
        .pipe(gulp.dest('app/assets/css/'))
    }),
    "sass-source-map" : (function () {
      gulp.src('src/sass/includes.sass')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(rename('main.css'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('app/assets/css/'));
    }),

  });

  gulp.task('watch', function() {
    gulp.watch('src/sass/*.sass', ['sass-compile', 'sass-compile-modules-index', 'autoprefixize', 'sass-source-map'])
  });

  gulps.registerSeries("default", ["js-min", "sass-compile", "sass-compile-modules-index", "autoprefixize", "sass-source-map"]);