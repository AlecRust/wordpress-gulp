<?php
/**
 * Template used for displaying page content in page.php
 *
 * @package wordpress-gulp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'Entry' ); ?>>
  <header class="Entry-header">
    <?php the_title( '<h1 class="Entry-title entry-title">', '</h1>' ); ?>

    <div class="Entry-meta u-hiddenVisually">
      <?php wpg_posted_on(); ?>
    </div>
  </header>

  <div class="Entry-content entry-content">
    <?php the_content(); ?>
    <?php
      wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpg' ),
        'after'  => '</div>',
      ) );
    ?>
  </div>
</article>
