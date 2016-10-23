var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var jade = require('gulp-jade-php');
var compass = require('compass');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var gulpif = require('gulp-if');
var coffee = require('gulp-coffee');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var runSequence = require('run-sequence');
var order = require("gulp-order");
var args = require('yargs').argv;
var imagemin = require('gulp-imagemin');
var clean = require('gulp-clean');

var isRelease = args.release || false;

var path = {
	'jade': {
		'watch': "../assets/jade/**/*.jade",
		'in': ["../assets/jade/**/*.jade", "!../assets/jade/**/_*.jade"],
		'out':"../",
		'php':"../**/*.php"
	},
	'compass': {
		'watch': "../assets/scss/**/*.scss",
		'scss': "../assets/scss/",
		'css': "../library/css/**/*.css",
		'img': "../library/images/**/*.{gif,jpeg,svg,png}"
	},
	'coffee': {
		'watch': ["../assets/coffee/**/*.coffee"],
		'blocks': "../assets/coffee/blocks/",
		'includes': "../assets/coffee/includes/",
		'in': ["../assets/coffee/**/*.coffee", "!../assets/coffee/blocks/**/*", "!../assets/coffee/includes/**/*"],
		'out': "../library/js/"
	},
	'js': {
		'watch': ["../assets/js/**/*.js", "!../assets/js/libs/**/*"],
		'in': "../assets/js/",
		'out': "../library/js/",
		'libs': "../assets/js/libs/",
		'tmp': "../library/tmp/js/"
	},
	'fonts': {
		'in': "../assets/fonts/**/*.{eot,svg,woff,woff2,ttf}",
		'out': "../library/fonts/"
	},
	'images': {
		'watch': "../assets/images/**/*.{jpg,png,gif,svg}",
		'in': "../assets/images/",
		'out': "../library/images/"
	}
};

//JADE TASK
gulp.task('jade', function() {
	gulp.src(path.jade.in)
		.pipe(plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		}))
		.pipe(jade({
			'pretty': (!isRelease) ? true : false,
			'locals': {
				'echo': function(str) {
					return "<?php echo " + str + " ?>"
				},
				'image': function(src) {
					return ("<?php echo get_template_directory_uri() ?>/library/images/" + src);
				},
				'background': function(src, fromWP) {
					var url = "/library/images/";
					url += src;
					if (fromWP) {
						return ("background-image:url('<?php echo " + src + "?>')");
					} else {
						return ("background-image:url('<?php echo get_template_directory_uri() . \"" + url + "\" ?>')");
					}
				},
				'css': function(value) {
					return ("<?php echo get_template_directory_uri() ?>/library/css/" + value);
				},
				'js': function(value) {
					return ("<?php echo get_template_directory_uri() ?>/library/js/" + value);
				},
				'library': function(src) {
					return ("<?php echo get_template_directory_uri() ?>/library/" + src);
				}
			}
		}))
		.pipe(plumber.stop())
		.pipe(gulp.dest(path.jade.out))
});

// COMPASS
gulp.task('compass', function(cb) {
	compass.compile(cb)
});

// JS
gulp.task('js', function() {
	if(isRelease) {
  		runSequence('concat-js','clean-js');
	} else {
  		runSequence('concat-js');
	}
});

gulp.task('concat-js', ['compile-js'], function() {
	if (!isRelease) {
		console.log("WARNING: running without --release, skipping js minification");
	}
	return gulp.src(path.js.tmp + "**/*.js")
	.pipe(plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		}))
	.pipe(order([
		"html5.min.js",
		"blocks.min.js",
		"includes.min.js",
		"utils.js",
		"scripts.js",
		"*.js"
	]))
	.pipe(concat('scripts.js'))
	.pipe(gulpif(isRelease, uglify({
			'mangle': false,
			'compress': isRelease
		})))
	.pipe(rename('scripts.min.js'))
	.pipe(plumber.stop())
	.pipe(gulp.dest(path.js.out));
});


gulp.task('compile-js', ['vendor-js', 'coffee', 'blocks-js', 'includes-js'], function() {
	return gulp.src(path.js.watch)
		.pipe(plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		}))
		.pipe(gulpif(isRelease, uglify({
			'mangle': false,
			'compress': isRelease
		})))
		.pipe(plumber.stop())
		.pipe(gulp.dest(path.js.tmp));
});

gulp.task('coffee',[], function() {
	return gulp.src(path.coffee.in)
	.pipe(plumber({
		errorHandler: notify.onError("Error: <%= error.message %>")
	}))
	.pipe(coffee({
		bare:true
	}))
	.pipe(plumber.stop())
	.pipe(gulp.dest(path.js.tmp));
});

gulp.task('vendor-js', function() {
	return gulp.src(path.js.libs + "*")
		.pipe(plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		}))
		.pipe(order([
			"modernizr.custom.min.js",
			"material.js",
			"jQuery.*.js",
			"*.js"
		]))
		.pipe(concat('vendor.js'))
		.pipe(gulpif(isRelease, uglify({
			'mangle': false,
			'compress': isRelease
		})))
		.pipe(rename('vendor.min.js'))
		.pipe(gulp.dest(path.js.out + "libs/"))
		.pipe(plumber.stop())
		.pipe(browserSync.stream())
});

gulp.task('blocks-js', function(){
	return gulp.src(path.coffee.blocks + "*")
	.pipe(plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		}))
	.pipe(coffee({
		bare:true
	}))
	.pipe(concat('bocks.js'))
	.pipe(gulpif(isRelease, uglify({
			'mangle': false,
			'compress': isRelease
		})))
	.pipe(rename('blocks.min.js'))
	.pipe(gulp.dest(path.js.tmp))
	.pipe(plumber.stop())
	.pipe(browserSync.stream())
});

gulp.task('includes-js', function(){
	return gulp.src(path.coffee.includes + "*")
	.pipe(plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		}))
	.pipe(coffee({
		bare:true
	}))
	.pipe(concat('includes.js'))
	.pipe(gulpif(isRelease, uglify({
			'mangle': false,
			'compress': isRelease
		})))
	.pipe(rename('includes.min.js'))
	.pipe(gulp.dest(path.js.tmp))
	.pipe(plumber.stop())
	.pipe(browserSync.stream())
});

gulp.task('clean-js', function () {
    return gulp.src(path.js.tmp, {read: false})
        .pipe(clean({force:true}));
});

// FONTS
gulp.task('fonts', function() {
	return gulp.src(path.fonts.in)
	.pipe(gulp.dest(path.fonts.out))
} );

// IMAGES
gulp.task('img',['clean-img'], function() {
	if (!isRelease) {
		console.log("WARNING: running whitout --release, skipping image minification");
	}
	return gulp.src(path.images.watch)
		.pipe((plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		})))
		.pipe(gulpif(isRelease, imagemin([imagemin.gifsicle({
			'optimizationLevel': 3
		}), imagemin.jpegtran({
			// 'progressive': true,
			// 'arithmetic': true
		}), imagemin.optipng({
			'optimizationLevel': 3
		}), imagemin.svgo({
			'removeViewBox': false
		})])))
		.pipe(gulp.dest(path.images.out))
		.pipe(plumber.stop());
});

gulp.task('clean-img', function () {
    return gulp.src(path.images.out, {read: false})
        .pipe(clean({force:true}));
});

// build
gulp.task('build', function() {
	runSequence('jade', ['fonts','img'], ['compass', 'js']);
});

gulp.task('watch', ['build'], function() {
	browserSync.init({
		open: true,
		proxy: false,
		reloadDelay: 200
	});
	gulp.watch(path.jade.watch, ['jade']);
	gulp.watch(path.compass.watch, ['compass']);
	gulp.watch(path.coffee.watch, ['js']);
	gulp.watch(path.js.watch, ['js']);
	gulp.watch(path.images.watch, ['img']).on(['change'], browserSync.reload);
});

gulp.task('default', ['build']);
