<?php
/**
 * @package wordpress-gulp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="Entry-header">
    <?php the_title( sprintf( '<h1 class="Entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

    <?php if ( 'post' == get_post_type() ) : ?>
      <div class="Entry-meta u-hiddenVisually">
        <?php wpg_posted_on(); ?>
      </div>
    <?php endif; ?>
  </header>

  <div class="Entry-content">
    <?php
      /* translators: %s: Name of current post */
      the_content( sprintf(
        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>' ), array( 'span' => array( 'class' => array() ) ) ),
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
