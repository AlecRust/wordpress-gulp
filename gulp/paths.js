var path = require('path');
var stylesDir = path.resolve('./src/assets/styles');
var scriptsDir = path.resolve('./src/assets/scripts');
var imagesDir = path.resolve('./src/assets/images');

var paths = {
  styles: {
    stylusSrc: path.join(stylesDir, '**/*.styl'),
    dest: path.resolve('./src'),
    tmpDir: path.resolve('./.css-compiled')
  },
  scripts: {
    jsSrc: path.join(scriptsDir, '**/*.js'),
    dest: scriptsDir
  },
  images: {
    imgSrc: path.join(imagesDir, '**/*'),
    dest: imagesDir
  }
};

module.exports = paths;
