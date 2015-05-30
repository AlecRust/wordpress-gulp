<?php
/**
 * @package wordpress-gulp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="Entry-header">
    <?php the_title( '<h1 class="Entry-title">', '</h1>' ); ?>

    <div class="Entry-meta u-hiddenVisually">
      <?php wpg_posted_on(); ?>
    </div>
  </header>

  <div class="Entry-content">
    <?php the_content(); ?>
    <?php
      wp_link_pages( array(
        'before' => '<div class="page-links">' . __( 'Pages:' ),
        'after'  => '</div>',
      ) );
    ?>
  </div>

  <footer class="Entry-footer">
    <?php
      /* translators: used between list items, there is a space after the comma */
      $category_list = get_the_category_list( __( ', ' ) );

      /* translators: used between list items, there is a space after the comma */
      $tag_list = get_the_tag_list( '', __( ', ' ) );

      if ( ! wpg_categorized_blog() ) {
        // This blog only has 1 category so we just need to worry about tags in the meta text
        if ( '' != $tag_list ) {
          $meta_text = __( 'This entry was tagged %2$s. <span class="u-hiddenVisually">Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.</span>' );
        } else {
          $meta_text = __( '<span class="u-hiddenVisually">Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.</span>' );
        }

      } else {
        // But this blog has loads of categories so we should probably display them here
        if ( '' != $tag_list ) {
          $meta_text = __( 'This entry was posted in %1$s and tagged %2$s.<span class="u-hiddenVisually"> Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.</span>' );
        } else {
          $meta_text = __( 'This entry was posted in %1$s.<span class="u-hiddenVisually"> Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.</span>' );
        }

      } // end check for categories on this blog

      printf(
        $meta_text,
        $category_list,
        $tag_list,
        get_permalink()
      );
    ?>
  </footer>
</article>
