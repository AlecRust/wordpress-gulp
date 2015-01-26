WordPress Gulp
==============

<a href="https://github.com/AlecRust/wordpress-gulp"><img src="http://i.imgur.com/By7zeRv.png" align="right" hspace="10" vspace="6"></a>

A simple WordPress starter theme powered by [gulp](http://gulpjs.com/) for task running, using [Stylus](http://learnboost.github.io/stylus//) as CSS preprocessor and [SUIT CSS](http://suitcss.github.io/) for UI components. Base WordPress theme files are from [Underscores](http://underscores.me/) and [Jetpack](http://jetpack.me/) support is baked in.

## Setup
1. Clone this repo to `/theme-name`
2. Find/replace `WordPress Gulp` with `Theme Name`, `wordpress-gulp` with `theme-name`, and `wpg` with `tn` (your theme's slug)
3. Customise further theme settings at `/src/assets/styles/style.styl`
4. Run `npm install` to fetch dependencies
5. Run `gulp` to compile theme to `/dist`

## Development
1. You'll want to see your theme changes locally as you develop within the `/src` directory. As an example using [MAMP](http://www.mamp.info/) you could symlink `/projects/theme-name/src` -> `/Applications/MAMP/htdocs/site-name/wp-content/themes/theme-name` to achieve this. When up and running, run `gulp watch` to start watching your files for changes.
2. Navigate to Appearance > Themes in the WordPress Admin Panel and activate your new theme
3. Navigate to Appearance > Menus in the WordPress Admin Panel and create a menu called "Primary Menu". This is referenced in your theme's `header.php` file

## Distribution
The distributable folder is compiled by gulp to `/dist`. This is excluded in `.gitignore` by default but you may want this versioned in your theme repo.

## Extras
- Add your Google Analytics ID to `extras.php`

### Also see
- https://github.com/zoerooney/Emi
- https://github.com/synapticism/wordpress-gulp-bower-sass
