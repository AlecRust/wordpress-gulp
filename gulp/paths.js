var path =       require('path');
var srcDir =     path.resolve('./src');
var stylesDir =  path.join(srcDir, 'assets/styles');
var scriptsDir = path.join(srcDir, 'assets/scripts');
var imagesDir = path.join(srcDir, 'assets/images');
var bowerSrc =   path.resolve('./bower_components');

var paths = {
  distDir: path.resolve('./dist'),
  styles: {
    stylusSrc: path.join(stylesDir, '**/*.styl'),
    dest: srcDir,
    tmpDir: path.resolve('./.css-compiled')
  },
  scripts: {
    jqueryPath: path.join(bowerSrc, 'jquery/dist/jquery.js'),
    jsSrc: path.join(scriptsDir, '**/*.js'),
    dest: srcDir
  },
  images: {
    imgSrc: path.join(imagesDir, '**/*'),
    dest: imagesDir
  }
};

module.exports = paths;
