'use strict';

var gulp = require('gulp');
var $ = require('gulp-load-plugins')();

gulp.task('styles', function () {
  return gulp.src(['src/assets/styles/style.styl', 'src/assets/styles/editor-style.styl'])
    .pipe($.stylus())
    .pipe($.autoprefixer('last 1 version'))
    .pipe(gulp.dest('src'))
    .pipe($.minifyCss({ keepSpecialComments: 1 }))
    .pipe(gulp.dest('dist'));
});

gulp.task('scripts', function () {
  return gulp.src('src/assets/scripts/**/*.js')
    .pipe($.jshint())
    .pipe($.jshint.reporter('jshint-stylish'))
    .pipe($.jshint.reporter('fail'))
    .pipe($.uglify())
    .pipe(gulp.dest('dist/assets/scripts'));
});

gulp.task('images', function () {
  return gulp.src('src/assets/images/**/*')
    .pipe($.cache($.imagemin({
      progressive: true,
      interlaced: true
    })))
    .pipe(gulp.dest('dist/assets/images'));
});

gulp.task('fonts', function () {
  var streamqueue = require('streamqueue');
  return streamqueue({ objectMode: true },
      gulp.src('src/assets/fonts/**/*')
    )
    .pipe($.filter('**/*.{eot,svg,ttf,woff}'))
    .pipe($.flatten())
    .pipe(gulp.dest('dist/assets/fonts'));
});

gulp.task('php', function () {
  return gulp.src('src/**/*.php')
    .pipe(gulp.dest('dist'));
});

gulp.task('extras', function () {
  return gulp.src(['src/*.*', '!src/*.php', '!src/*.css'], { dot: true })
    .pipe(gulp.dest('dist'));
});

gulp.task('suit-copy', ['suit-build'], function () {
  return gulp.src('node_modules/suitcss/build/build.css')
    .pipe($.rename('suit-css.styl'))
    .pipe(gulp.dest('src/assets/styles/vendor'));
});

gulp.task('suit-build', $.shell.task([
  'npm run build'
], { cwd: 'node_modules/suitcss' }));

gulp.task('clean', require('del').bind(null, 'dist'));

gulp.task('serve', ['styles'], function () {
  require('opn')('http://localhost:8888/wordpress-gulp/');
});

gulp.task('watch', function () {
  gulp.watch('src/assets/styles/**/*.styl', ['styles']);
  gulp.watch('src/assets/scripts/**/*.js', ['scripts']);
  gulp.watch('src/assets/images/**/*', ['images']);
  gulp.watch('src/**/*.php', ['php']);
});

gulp.task('build', ['styles', 'scripts', 'images', 'fonts', 'php', 'extras']);

gulp.task('default', ['clean'], function () {
  gulp.start('build');
});
