var gulp = require('gulp');
var del = require('del');
var paths = require('../paths');

gulp.task('clean', del([paths.styles.tmpDir, 'dist']));
