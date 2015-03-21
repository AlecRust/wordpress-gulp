<?php
/**
 * Template part for displaying results in search pages.
 *
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

  <div class="Entry-summary">
    <?php the_excerpt(); ?>
  </div>

  <footer class="Entry-footer">
    <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
      <?php
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( __( ', ' ) );
        if ( $categories_list && wpg_categorized_blog() ) :
      ?>
      <span class="Category-links">
        <?php printf( __( 'Posted in %1$s' ), $categories_list ); ?> -
      </span>
      <?php endif; // End if categories ?>

      <?php
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', __( ', ' ) );
        if ( $tags_list ) :
      ?>
      <span class="Tags-links">
        <?php printf( __( 'Tagged %1$s' ), $tags_list ); ?> -
      </span>
      <?php endif; // End if $tags_list ?>
    <?php endif; // End if 'post' == get_post_type() ?>

    <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
    <span class="Comments-link"><?php comments_popup_link( __( 'Leave a comment' ), __( '1 Comment' ), __( '% Comments' ) ); ?></span>
    <?php endif; ?>

    <?php edit_post_link( __( 'Edit' ), '<aside class="EditLink">', '</aside>' ); ?>
  </footer>
</article>
