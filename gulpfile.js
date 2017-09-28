var gulp 			= require('gulp');
var sass 			= require('gulp-sass');
var uglify 			= require('gulp-uglify');
var pump 			= require('pump');
var cssnano 		= require('gulp-cssnano');
var browserSync 	= require('browser-sync').create();



// Static Server + watching scss/html files
gulp.task('server', ['sass'], function() {

    browserSync.init({
        server: "./"
    });

    gulp.watch("assets/js/*.js", ['compress','sass']);
	gulp.watch('scss/**/*.scss', ['sass']);
    gulp.watch("*.html").on('change', browserSync.reload);
});




gulp.task('compress', function (cb) {
	pump([
			gulp.src('assets/js/*.js')
			.pipe(uglify())
			.pipe(gulp.dest('assets/js/dist'))
			.pipe(browserSync.stream())
		],
		cb
	);
});


gulp.task('sass', function () {
	return gulp.src('scss/**/*.scss')
	  .pipe(sass())
	  .pipe(cssnano())
	  .pipe(gulp.dest('assets/css'))
	  .pipe(browserSync.stream());
});
