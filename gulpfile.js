var gulp = require('gulp');
var gulpIf = require('gulp-if');
var uglify = require('gulp-uglify');
var minifyCss = require('gulp-cssnano');
var path = require('path');
var del = require('del');
var size = require('gulp-size');
var cache = require('gulp-cache');
var imagemin = require('gulp-imagemin');
var eslint = require('gulp-eslint');
var concat = require('gulp-concat');
var postcss = require('gulp-postcss');
var atImport = require('postcss-import');
var at2x = require('postcss-at2x');
var customProperties = require('postcss-custom-properties');
var customMedia = require('postcss-custom-media');
var shortSize = require('postcss-short-size');
var simpleVars = require('postcss-simple-vars');
var nested = require('postcss-nested');
var colorFunction = require('postcss-color-function');
var calc = require('postcss-calc');
var autoprefixer = require('autoprefixer');

var paths = {
  distDir: 'dist',
  styles: {
    src: 'src/assets/styles/*.css',
    dest: 'src'
  },
  scripts: {
    src: 'src/assets/scripts/**/*.js',
    dest: 'src'
  },
  images: {
    src: 'src/assets/images/**/*',
    dest: 'src/assets/images'
  }
};

gulp.task('clean', del.bind(null, [paths.distDir]));

/**
 * Styles
 */
gulp.task('postcss', function () {
  return gulp.src(paths.styles.src)
    .pipe(postcss([
      atImport(),
      nested(),
      simpleVars(),
      at2x(),
      customProperties(),
      customMedia(),
      shortSize(),
      colorFunction(),
      calc(),
      autoprefixer()
    ]))
    .pipe(gulp.dest(paths.styles.dest));
});

gulp.task('styles', ['postcss']);

/**
 * Scripts
 */
gulp.task('lint', function () {
  return gulp.src([paths.scripts.src, '!node_modules/**'])
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError());
});

gulp.task('compile', ['lint'], function() {
  return gulp.src(paths.scripts.src)
    .pipe(concat('script.js'))
    .pipe(gulp.dest(paths.scripts.dest));
});

gulp.task('scripts', ['lint', 'compile']);

/**
 * Images
 */
gulp.task('images', function () {
  return gulp.src(paths.images.src)
    .pipe(cache(imagemin({
      progressive: true,
      interlaced: true,
      // don't remove IDs from SVGs, they are often used
      // as hooks for embedding and styling
      svgoPlugins: [{ cleanupIDs: false }]
    })))
    .pipe(gulp.dest(paths.images.dest));
});

/**
 * Copy
 */
gulp.task('copy', ['styles'], function () {
  return gulp.src([
    'src/**/*',
    '!src/assets/scripts',
    '!src/assets/scripts/**',
    '!src/assets/styles',
    '!src/assets/styles/**'
  ], {
    dot: true
  })
  .pipe(gulpIf('*.js', uglify()))
  .pipe(gulpIf('*.css', minifyCss()))
  .pipe(gulp.dest(paths.distDir));
});

/**
 * Watch
 */
gulp.task('watch', ['build'], function() {
  gulp.watch('src/assets/styles/**/*.css', ['styles']);
  gulp.watch(paths.scripts.src, ['scripts']);
  gulp.watch(paths.images.src, ['images']);
  gulp.watch('src/**/*.php', ['copy']);
});

/**
 * Main tasks config
 */

gulp.task('build', ['scripts', 'images', 'copy'], function () {
  return gulp.src(path.join(paths.distDir, '**/*')).pipe(size({ title: 'build', gzip: true }));
});

gulp.task('default', ['clean'], function () {
  gulp.start('build');
});
