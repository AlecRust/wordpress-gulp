var gulp =             require('gulp');
var postcss =          require('gulp-postcss');
var atImport =         require('postcss-import');
var at2x =             require('postcss-at2x');
var customProperties = require('postcss-custom-properties');
var shortSize =        require('postcss-short-size');
var simpleVars =       require('postcss-simple-vars');
var nested =           require('postcss-nested');
var colorFunction =    require('postcss-color-function');
var calc =             require('postcss-calc');
var autoprefixer =     require('autoprefixer');
var notifyError =      require('../notifyError');
var paths =            require('../paths');

/**
 * Compile the main two CSS files to /src
 */
gulp.task('postcss', function () {
  return gulp.src(paths.styles.cssSrc)
    .pipe(postcss([
      atImport(),
      nested(),
      simpleVars(),
      at2x(),
      customProperties(),
      shortSize(),
      colorFunction(),
      calc(),
      autoprefixer()
    ]).on('error', notifyError))
    .pipe(gulp.dest(paths.styles.dest));
});

gulp.task('styles', ['postcss']);
