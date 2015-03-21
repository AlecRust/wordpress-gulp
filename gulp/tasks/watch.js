var gulp  = require('gulp');
var paths = require('../paths');

gulp.task('watch', function() {
  gulp.watch(paths.styles.stylusSrc, ['styles']);
  gulp.watch(paths.scripts.jsSrc, ['jshint']);
  gulp.watch(paths.images.imgSrc, ['images']);
  gulp.watch('src/**/*.php', ['copy']);
});
