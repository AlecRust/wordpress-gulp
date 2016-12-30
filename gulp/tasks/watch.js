var gulp  = require('gulp');
var paths = require('../paths');

gulp.task('watch', ['build'], function() {
  gulp.watch(paths.styles.cssSrc, ['styles']);
  gulp.watch(paths.scripts.jsSrc, ['scripts']);
  gulp.watch(paths.images.imgSrc, ['images']);
  gulp.watch('src/**/*.php', ['copy']);
});
