//REQUIRES
var gulp = require('gulp');
var jade = require('gulp-jade-php');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');

//VARS
var compress = false;

var path = {
	'jade': {
		'watch': ['../assets/jade/**/*.jade'],
		'in': ['../assets/jade/**/*.jade', '!../assets/jade/**/_*.jade'],
		'out': '../'
	}
}

//WATCH TASK
gulp.task('watch', function() {
	gulp.watch(path.jade.watch, ['jade']);
});

//JADE TASK
gulp.task('jade', function() {
	gulp.src(path.jade.in)
		.pipe(plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		}))
		.pipe(jade({
			'pretty': (!compress) ? true : false,
			'locals': {
				echo: function(str) {
					return "<?php echo " + str + " ?>"
				}
			}
		}))
		.pipe(gulp.dest(path.jade.out))
		.pipe(plumber.stop());
});

//DEFAULT TASK
gulp.task('default', ['jade', 'watch']);
