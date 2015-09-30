=== WordPress Gulp ===

Contributors: Alec Rust
Tags: responsive, mobile-first

Requires at least: 4.3
Tested up to: 4.3.1
Stable tag: 1.6.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WordPress starter theme called WordPress Gulp, powered by gulp.

== Description ==

A simple WordPress starter theme powered by gulp for task running, using Stylus as CSS preprocessor and SUIT CSS for UI components. Base WordPress theme files are from Underscores and Jetpack support is baked in.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

WordPress Gulp includes support for Jetpack.

== Changelog ==

= 1.6.0 - Sep 30 2015 =
This release offers many improvements and moves to a more "WordPress core" approach to comply with the theme directory requirements and simplify the codebase.

* Removed Bower support - jQuery now loaded by WordPress core
* Added BrowserSync support to "gulp serve"
* Replaced cssnext with custom PostCSS plugins
* Added stylint in to build pipeline
* Added styling for iframe embeds, <hr>s
* Added WordPress core required styles for theme compliance
* Removed px-to-rem support, switched back to plain px
* Switched support from Jetpack Contact Form to Contact Form 7
* Added support for theme translation
* Improve widget configurations
* Remove many old shims and unnecessary code
* Increase size of theme thumbnail
* Many bug fixes and other improvements
* Replaced .Pager component with core .nav-links
* Added .Alert component
* Added support for flexbox-powered sticky footer
* Add custom template for "Contact" page

= 1.5.0 - May 30 2015 =
* Move content templates in to /template-tags
* Merge latest refactors and improvements from Underscores
* Add back to home page link to 404 page
* Improve .Pager markup and styling
* Use full PHP syntax for WordPress Theme compliance
* Disable support for Post Formats by default
* Add support for theme content_width
* Add Jetpack compatibility file
* Remove support for .Edit-link
* Add theme readme.txt for WordPress Theme compliance
* Adjust styles src files to adhere to new postcss-bem-linter 0.3.0
* Remove support for .Jumbotron

= 1.4.0 - May 12 2015 =
* Bake in jQuery support with Bower
* Switch social icons from hardcoded list to WP Menu
* Move WP Login page styles in to main stylesheet
* Add support for centre alignment and <ol> in posts
* Match media query breakpoints with WP Admin Bar
* Add support for coloured WP Admin Bar
* Add post date and author metadata to pages
* Simplify base theme styles
* Add postcss-at2x plugin
* Improve gulp tasks
* Add basic print styles
* Bump normalize.css 3.0.2 -> 3.0.3
* Other misc bug fixes and improvements

= 1.3.0 - Mar 21 2015 =
Based on Yeoman gulp-webapp generator and @simonsmith's suitcss-with-stylus.

Slightly different approach from before, rather than assets like CSS compiling straight to the /dist folder they're compiled to the /src folder where appropriate. All copying to the /dist directory is handled by the "copy" task, which triggers things like minification before building up the /dist folder contents.

Replaces the previous extremely hacky integration of SUIT CSS with proper inclusion from the npm package in the build pipeline.

* Fix URL in README link
* Update .jshintrc file from gulp-webapp generator
* Bump package.json deps
* Add triggering of "watch" to "serve" task

= 1.2.0 - Mar 15 2015 =
* Rename .SiteNav to .SiteMenu
* Add support for WordPress 4.1 title tags
* Improve custom login page logo

= 1.1.0 - Feb 3 2015 =
* Add gulp-rework and rework-plugin-at2x in to build
* Use px() function for .Button padding
* Fix special comments being stripped from CSS output

= 1.0.0 - Jan 18 2015 =
Initial stable release.

== Credits ==

* WordPress Gulp https://github.com/AlecRust/wordpress-gulp, (C) 2014-2015 Alec Rust
* Based on Underscores http://underscores.me/, (C) 2012-2015 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2015 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
