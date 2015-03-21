var gulp = require('gulp');
var jshint = require('gulp-jshint');
var paths = require('../paths');

gulp.task('jshint', function () {
  return gulp.src(paths.scripts.jsSrc)
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(jshint.reporter('fail'));
});
