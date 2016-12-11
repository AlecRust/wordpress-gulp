WordPress Gulp
==============

<a href="https://github.com/AlecRust/wordpress-gulp"><img src="http://i.imgur.com/By7zeRv.png" align="right" hspace="10" vspace="6"></a>

A simple WordPress starter theme powered by [gulp](http://gulpjs.com/) for task running, using [Stylus](http://learnboost.github.io/stylus/) as CSS preprocessor and [SUIT CSS](http://suitcss.github.io/) for UI components. Base WordPress theme files are from [Underscores](http://underscores.me/) and [Jetpack](http://jetpack.me/) support is baked in.

## Setup
1. Clone this repo to `/theme-name`
2. Find/replace `WordPress Gulp` with `Theme Name`, `wordpress-gulp` with `theme-name`, and `wpg` with `tn` (your theme's slug)
3. Find/replace the current WordPress Gulp version number with your starting version number, e.g. `0.1.0`
4. Customise further theme settings at `/src/assets/styles/style.styl`
5. Run `npm install` to fetch dependencies
6. Run `gulp` to compile theme to `/dist`

## Development

[Docker Compose](https://docs.docker.com/compose/) is used to spin up a dev environment (`npm start`) based on [Visible WordPress Starter](https://github.com/visiblevc/wordpress-starter). See the Compose file at [docker-compose.yml](docker-compose.yml). You can access [wp-cli](http://wp-cli.org/) by running `npm run wp ...` e.g.

    npm run wp plugin install <some-plugin>
    npm run wp db import /data/database.sql

### Menus
Navigate to Appearance > Menus in the WordPress Admin Panel and create a menu called "Main Menu" assigned to "Site Header" location and one called "Social Icons" assigned to "Site Footer - Right" location. These are referenced in your theme's `header.php` and `footer.php` files

## Distribution
The distributable folder is compiled by gulp to `/dist`.

## Extras
- Add your Google Analytics ID to `extras.php`

## Screenshot
![screenshot](https://i.imgur.com/i2FnyKo.png)
