var gulp =   require('gulp');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var paths =  require('../paths');

gulp.task('jshint', function () {
  return gulp.src(paths.scripts.jsSrc)
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(jshint.reporter('fail'));
});

gulp.task('compile', ['jshint'], function() {
  return gulp.src(paths.scripts.jsSrc)
    .pipe(concat('script.js'))
    .pipe(gulp.dest(paths.scripts.dest));
});

gulp.task('scripts', ['jshint', 'compile']);
