var gulp =  require('gulp');
var path =  require('path');
var size =  require('gulp-size');
var paths = require('../paths');

gulp.task('build', ['scripts', 'styles', 'images', 'copy'], function () {
  return gulp.src(path.join(paths.distDir, '**/*')).pipe(size({ title: 'build', gzip: true }));
});

gulp.task('default', ['clean'], function () {
  gulp.start('build');
});
