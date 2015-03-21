var gulp = require('gulp');
var size = require('gulp-size');

gulp.task('build', ['jshint', 'styles', 'images', 'copy'], function () {
  return gulp.src('dist/**/*').pipe(size({ title: 'build', gzip: true }));
});

gulp.task('default', ['clean'], function () {
  gulp.start('build');
});
