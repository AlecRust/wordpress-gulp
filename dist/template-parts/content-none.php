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

    <p><?php printf( wp_kses( __( 'Ready to publish the first post? <a href="%1$s">Get started here</a>.', 'wpg' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

  <?php elseif ( is_search() ) : ?>

    <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wpg' ); ?></p>
    <?php get_search_form(); ?>

  <?php else : ?>

    <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wpg' ); ?></p>
    <?php get_search_form(); ?>

  <?php endif; ?>
</div>
