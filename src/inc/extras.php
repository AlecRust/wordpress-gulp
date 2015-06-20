<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package wordpress-gulp
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function wpg_page_menu_args( $args ) {
  $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'wpg_page_menu_args' );

/**
 * Adds page slug to body_class output
 */
function wpg_slug_body_class( $classes ) {
  global $post;
  if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }
  return $classes;
}
add_filter( 'body_class', 'wpg_slug_body_class' );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function wpg_setup_author() {
  global $wp_query;

  if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
    $GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
  }
}
add_action( 'wp', 'wpg_setup_author' );

/**
 * Custom walker for Header Menu
 * TODO: Remove this
 */
class wpg_walker_nav_menu extends Walker_Nav_Menu {

  // add classes to ul sub-menus
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    // depth dependent classes
    $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent
    $display_depth = ($depth + 1); // because it counts the first submenu as 0
    $classes = array(
        'sub-menu',
        ($display_depth >= 2 ? 'sub-sub-menu' : ''),
        'menu-depth-' . $display_depth
    );
    $class_names = implode(' ', $classes);

    // build html
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
  }

  // add main/sub classes to li's and links
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    global $wp_query;
    $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent

    // depth dependent classes
    $depth_classes = array(
        ($depth == 0 ? 'SiteHeader-menuItem' : 'SiteHeader-menuSubItem'),
        ($depth >= 2 ? 'SiteHeader-menuSubSubItem' : ''),
        'SiteHeader-menuItem-depth-' . $depth
    );
    $depth_class_names = esc_attr(implode(' ', $depth_classes));

    // passed classes
    $classes = empty($item->classes) ? array() : (array)$item->classes;
    $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));

    // build html
    $output .= $indent . '<li class="' . $depth_class_names . ' ' . $class_names . ' SiteHeader-menuItem-' . $item->ID . '">';

    // link attributes
    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
    $attributes .= ' class="' . ($depth > 0 ? 'SiteHeader-menuSubItemLink' : 'SiteHeader-menuItemLink') . '"';

    $item_output = sprintf('<a%1$s>%2$s</a>',
        $attributes,
        apply_filters('the_title', $item->title, $item->ID)
    );

    // build html
    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

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
  $blog_title = get_bloginfo( 'title' );
  return 'Back to ' . $blog_title;
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
