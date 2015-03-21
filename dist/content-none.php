<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @package wordpress-gulp
 */
?>

<header class="Entry-header">
  <h1 class="Entry-title">Nothing Found</h1>
</header>

<div class="Entry-content">
  <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

    <p><?php printf( __( 'Ready to publish the first post? <a href="%1$s">Get started here</a>.' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

  <?php elseif ( is_search() ) : ?>

    <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
    <?php get_search_form(); ?>

  <?php else : ?>

    <p>It seems what you&rsquo;re looking for can&rsquo;t be found. Perhaps searching can help.</p>
    <?php get_search_form(); ?>

  <?php endif; ?>
</div>
