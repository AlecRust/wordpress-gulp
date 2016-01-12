<?php
/**
 * Template part for displaying results in search pages.
 *
 * @package wordpress-gulp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'Entry' ); ?>>
  <header class="Entry-header">
    <?php the_title( sprintf( '<h1 class="Entry-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

    <div class="Entry-meta u-hiddenVisually">
      <?php wpg_posted_on(); ?>
    </div>
  </header>

  <div class="Entry-summary entry-summary">
    <?php the_excerpt(); ?>
  </div>

  <footer class="Entry-footer">
    <?php wpg_entry_footer(); ?>
  </footer>
</article>
