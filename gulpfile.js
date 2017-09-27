var gulp 			= require('gulp');
var sass 			= require('gulp-sass');
var uglify 			= require('gulp-uglify');
var pump 			= require('pump');
var browserSync 	= require('browser-sync').create();



// Static Server + watching scss/html files
gulp.task('server', ['sass'], function() {

    browserSync.init({
        server: "./"
    });

    gulp.watch("assets/js/*.js", ['compress']);
	gulp.watch('scss/**/*.scss', ['sass']);
    gulp.watch("*.html").on('change', browserSync.reload);
});




gulp.task('compress', function (cb) {
	pump([
			gulp.src('assets/js/*.js'),
			uglify(),
			gulp.dest('assets/js/dist')
		],
		cb
	);
});


gulp.task('sass', function () {
	return gulp.src('scss/**/*.scss')
	  .pipe(sass())
	  .pipe(gulp.dest('assets/css'))
	  .pipe(browserSync.stream());
});
