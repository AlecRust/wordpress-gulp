<?php
/**
 * wordpress-gulp functions and definitions
 *
 * @package wordpress-gulp
 */

if ( ! function_exists( 'wpg_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wpg_setup() {

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  //add_theme_support( 'post-thumbnails' );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary' => __( 'Primary Menu' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
  ) );

  /*
   * Enable support for Post Formats.
   * See http://codex.wordpress.org/Post_Formats
   */
  add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'quote', 'link'
  ) );
}
endif; // wpg_setup
add_action( 'after_setup_theme', 'wpg_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wpg_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Blog Sidebar' ),
    'id'            => 'sidebar-1',
    'description'   => '',
    'before_widget' => '<div class="Sidebar-widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="Sidebar-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'wpg_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wpg_scripts() {
  wp_enqueue_style( 'wpg-style', get_stylesheet_uri() );
  wp_enqueue_script( 'wpg-script', get_template_directory_uri() . '/script.js', array(), '1.3.0', true );
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'wpg_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
