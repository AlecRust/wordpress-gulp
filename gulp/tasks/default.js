var gulp =  require('gulp');
var path =  require('path');
var del =   require('del');
var size =  require('gulp-size');
var paths = require('../paths');

gulp.task('clean', del.bind(null, [paths.styles.tmpDir, paths.distDir]));

gulp.task('build', ['scripts', 'images', 'copy'], function () {
  return gulp.src(path.join(paths.distDir, '**/*')).pipe(size({ title: 'build', gzip: true }));
});

gulp.task('default', ['clean'], function () {
  gulp.start('build');
});
