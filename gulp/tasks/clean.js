var gulp =  require('gulp');
var del =   require('del');
var paths = require('../paths');

gulp.task('clean', function () {
  del([paths.styles.tmpDir, paths.distDir]).then(function () {
      console.log('Deleted the .css-compiled and /dist directory');
  });
});
