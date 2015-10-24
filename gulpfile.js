var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var compass = require('gulp-compass');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var gulpif = require('gulp-if');
var uglify = require('gulp-uglify');
var clean = require('gulp-clean');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var runSequence = require('run-sequence');


var compress = false;
var theme = "bones";
var url = "www/wp-content/themes/"

gulp.task('serve', ['compass', 'js','vendor-js'], function() {

    browserSync.init({
        open: true,
        proxy: false,
        reloadDelay: 200
    });
    gulp.watch(url + "/" + theme + "/library/scss/**/*.scss", ['compass']);
    gulp.watch(url + "/" + theme + "/library/js/**/*.js", ['js']);
    gulp.watch(["www/**/*.html", "www/**/*.php"]).on('change', browserSync.reload);
});

gulp.task('compass',['clean-css'], function() {
    gulp.src(url + "/" + theme + '/library/**/*.scss')
        .pipe(plumber({
            errorHandler: notify.onError("Error: <%= error.message %>")
        }))
        .pipe(compass({
            config_file: 'config.rb',
            css: url + '/' + theme + '/library/min/css',
            sass: url + '/' + theme + '/library/scss'
        }))
        .pipe(plumber.stop())
        .pipe(gulp.dest(url + '/' + theme + '/library/min/css'))
        .pipe(browserSync.stream());
});

gulp.task('js',function(){
    runSequence('clean-js','vendor-js','js-minify');
});
gulp.task('js-minify', function() {
    return gulp.src([url + "/" + theme + "/library/js/**/*.js","!"+url + "/" + theme + "/library/js/libs/**/*.min.js"])
        .pipe(plumber({
            errorHandler: notify.onError("Error: <%= error.message %>")
        }))
        .pipe(gulpif(compress, uglify()))
        .pipe(plumber.stop())
        .pipe(gulp.dest(url + "/" + theme + "/library/min/js"))
        .pipe(gulpif(compress, notify({
            message: "Finished JS Minification"
        })))
        .pipe(browserSync.stream());
});

gulp.task('clean-css', function() {
    return gulp.src(url + "/" + theme + "/library/min/css/", {
            read: false
        })
        .pipe(plumber({
            errorHandler: notify.onError("Error: <%= error.message %>")
        }))
        .pipe(clean())
        .pipe(plumber.stop());
});

gulp.task('clean-js', function(cb) {
    return gulp.src([url + "/" + theme + "/library/min/js/"], {
            read: false
        })
        .pipe(plumber({
            errorHandler: notify.onError("Error: <%= error.message %>")
        }))
        .pipe(clean())
        .pipe(plumber.stop());
});
gulp.task('vendor-js',function(){
    return gulp.src(url + "/" + theme + "/library/js/libs/*")
    .pipe(plumber({
            errorHandler: notify.onError("Error: <%= error.message %>")
        }))
    .pipe(concat('vendor.js'))
    .pipe(gulpif(compress,uglify()))
    .pipe(rename('vendor.min.js'))
    .pipe(gulp.dest(url + "/" + theme + "/library/min/js/libs/"))
    .pipe(gulp.dest(url + "/" + theme + "/library/min/js/libs/"))
    .pipe(plumber.stop())
    .pipe(browserSync.stream())
    .pipe(gulpif(compress,notify({message:"Vendor.js created!"})))
});



gulp.task('default', ['serve']);