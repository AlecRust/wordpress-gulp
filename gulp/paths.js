var path =       require('path');
var srcDir =     path.resolve('./src');
var stylesDir =  path.join(srcDir, 'assets/styles');
var scriptsDir = path.join(srcDir, 'assets/scripts');
var imagesDir =  path.join(srcDir, 'assets/images');

var paths = {
  distDir: path.resolve('./dist'),
  styles: {
    stylusSrc: path.join(stylesDir, '**/*.styl'),
    dest: srcDir,
    tmpDir: path.resolve('./.temp')
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
