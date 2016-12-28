var gulp =   require('gulp');
var eslint = require('gulp-eslint');
var concat = require('gulp-concat');
var paths =  require('../paths');

gulp.task('lint', function () {
  return gulp.src([paths.scripts.jsSrc, '!node_modules/**'])
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError());
});

gulp.task('compile', ['lint'], function() {
  return gulp.src(paths.scripts.jsSrc)
    .pipe(concat('script.js'))
    .pipe(gulp.dest(paths.scripts.dest));
});

gulp.task('scripts', ['lint', 'compile']);
