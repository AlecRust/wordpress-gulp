<?php
/**
 * Sidebar containing the "Blog Sidebar" widget area.
 *
 * @package wordpress-gulp
 */

if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
  return;
}
?>

<aside class="Sidebar" role="complementary">
  <?php dynamic_sidebar( 'blog-sidebar' ); ?>
</aside>
