<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package wordpress-gulp
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wpg_body_classes( $classes ) {
  global $post;

  // Adds page slug to body_class output
  if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }

  // Adds a class of hfeed to non-singular pages
  if ( ! is_singular() ) {
    $classes[] = 'hfeed';
  }

  return $classes;
}
add_filter( 'body_class', 'wpg_body_classes' );

/**
 * Adds Google Analytics tracking snippet to footer
 */
function wpg_google_analytics() { ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-XXXXXXX-XX', 'auto');
    ga('send', 'pageview');
  </script>
<?php }
add_action( 'wp_footer', 'wpg_google_analytics' );

/**
 * Loads main stylesheet containing override styles for login page
 */
function wpg_login_styles() {
  wp_enqueue_style( 'wpg-style', get_stylesheet_uri() );
}
add_action( 'login_enqueue_scripts', 'wpg_login_styles' );

/**
 * Overrides WordPress login page logo link URL
 */
function wpg_login_logo_url() {
  return home_url();
}
add_filter( 'login_headerurl', 'wpg_login_logo_url' );

/**
 * Overrides WordPress login page logo link title
 */
function wpg_login_logo_url_title() {
  $site_title = get_bloginfo( 'title' );
  return 'Back to ' . $site_title;
}
add_filter( 'login_headertitle', 'wpg_login_logo_url_title' );

/**
 * Custom Admin footer text
 */
function wpg_admin_footer() {
  $new_issue_url = 'https://github.com/AlecRust/wordpress-gulp/issues/new';
  echo 'Need support? Open a <a href="' . $new_issue_url . '" target="_blank">new GitHub Issue</a>';
}
add_filter( 'admin_footer_text', 'wpg_admin_footer' );

/**
 * Adds support for editor stylesheet
 */
function wpg_add_editor_styles() {
  add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'wpg_add_editor_styles' );
