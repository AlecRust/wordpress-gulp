<?php
/**
 * Header for the theme.
 *
 * Displays all of the <head> section and everything up till <div class="u-cf">
 *
 * @package wordpress-gulp
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-config" content="<?php echo get_template_directory_uri() . '/browserconfig.xml'; ?>">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/favicon.ico'; ?>">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() . '/apple-touch-icon.png'; ?>">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!--[if lt IE 9]>
    <p class="BrowserBar">
      You are using an <strong>outdated</strong> browser. Please
      <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
    </p>
  <![endif]-->

  <div class="Container">

    <header class="SiteHeader" role="banner">
      <div class="SiteHeader-wrapBranding u-cf">
        <a class="SiteHeader-logo u-textHide" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <?php bloginfo( 'name' ); ?>
        </a>
        <p class="SiteHeader-tagline">
          <?php bloginfo( 'description' ); ?>
        </p>
        <div class="SiteHeader-search">
          <?php get_search_form(); ?>
        </div>
      </div>

      <nav class="SiteNav" role="navigation" aria-labelledby="site-nav-heading">
        <p id="site-nav-heading" class="u-hiddenVisually">Site navigation</p>
        <?php wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu' => 'Primary Menu',
            'container' => '',
            'menu_class' => 'SiteNav-list',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'walker' => new wpg_walker_nav_menu
        ) ); ?>
      </nav>
    </header>

    <div class="u-cf">
