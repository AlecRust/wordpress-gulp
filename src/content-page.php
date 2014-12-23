<?php
/**
 * Template used for displaying page content in page.php
 *
 * @package wordpress-gulp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="Entry-header">
    <?php the_title( '<h1 class="Entry-title">', '</h1>' ); ?>
  </header>

  <div class="Entry-content u-cf">
    <?php the_content(); ?>
    <?php
      wp_link_pages( array(
        'before' => '<div class="page-links">' . __( 'Pages:' ),
        'after'  => '</div>',
      ) );
    ?>
  </div>

  <footer class="Entry-footer">
    <?php edit_post_link( __( 'Edit' ), '<aside class="EditLink">', '</aside>' ); ?>
  </footer>
</article>
