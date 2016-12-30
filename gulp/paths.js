var path =       require('path');
var srcDir =     path.resolve('./src');
var stylesDir =  path.join(srcDir, 'assets/styles');
var scriptsDir = path.join(srcDir, 'assets/scripts');
var imagesDir =  path.join(srcDir, 'assets/images');

var paths = {
  distDir: path.resolve('./dist'),
  styles: {
    cssSrc: path.join(stylesDir, '*.css'),
    dest: srcDir
  },
  scripts: {
    jsSrc: path.join(scriptsDir, '**/*.js'),
    dest: srcDir
  },
  images: {
    imgSrc: path.join(imagesDir, '**/*'),
    dest: imagesDir
  }
};

module.exports = paths;
