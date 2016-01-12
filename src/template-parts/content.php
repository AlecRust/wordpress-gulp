<?php
/**
 * @package wordpress-gulp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'Entry' ); ?>>
  <header class="Entry-header">
    <?php the_title( sprintf( '<h1 class="Entry-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

    <div class="Entry-meta<?php if ( 'post' != get_post_type() ) : ?> u-hiddenVisually<?php endif; ?>">
      <?php wpg_posted_on(); ?>
    </div>
  </header>

  <div class="Entry-content entry-content">
    <?php
      /* translators: %s: Name of current post */
      the_content( sprintf(
        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wpg' ), array( 'span' => array( 'class' => array() ) ) ),
        the_title( '<span class="screen-reader-text">"', '"</span>', false )
      ) );
    ?>

    <?php
      wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpg' ),
        'after'  => '</div>',
      ) );
    ?>
  </div>

  <footer class="Entry-footer">
    <?php wpg_entry_footer(); ?>
  </footer>
</article>
