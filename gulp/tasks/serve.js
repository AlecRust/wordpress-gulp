var gulp = require('gulp');
var opn =  require('opn');

gulp.task('serve', function () {
  opn('http://local.dev:8888/wordpress-gulp/');
});
