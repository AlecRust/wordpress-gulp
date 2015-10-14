<?php
/**
 * Template part for displaying results in search pages.
 *
 * @package wordpress-gulp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'Entry' ); ?>>
  <header class="Entry-header">
    <?php the_title( sprintf( '<h1 class="Entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

    <?php if ( 'post' === get_post_type() ) : ?>
      <div class="Entry-meta">
        <?php wpg_posted_on(); ?>
      </div>
    <?php endif; ?>
  </header>

  <div class="Entry-summary">
    <?php the_excerpt(); ?>
  </div>

  <footer class="Entry-footer">
    <?php wpg_entry_footer(); ?>
  </footer>
</article>
