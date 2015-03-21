<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package wordpress-gulp
 */

if ( ! function_exists( 'wpg_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function wpg_paging_nav() {
  // Don't print empty markup if there's only one page.
  if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
    return;
  }
  ?>
  <nav class="Pager" role="navigation" aria-labelledby="posts-nav-heading">
    <p id="posts-nav-heading" class="u-hiddenVisually">Posts navigation</p>
    <div class="nav-links">

      <?php if ( get_next_posts_link() ) : ?>
      <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts' ) ); ?></div>
      <?php endif; ?>

      <?php if ( get_previous_posts_link() ) : ?>
      <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>' ) ); ?></div>
      <?php endif; ?>

    </div>
  </nav>
  <?php
}
endif;

if ( ! function_exists( 'wpg_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function wpg_post_nav() {
  // Don't print empty markup if there's nowhere to navigate.
  $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
  $next     = get_adjacent_post( false, '', false );

  if ( ! $next && ! $previous ) {
    return;
  }
  ?>
  <nav class="Pager" role="navigation" aria-labelledby="posts-nav-heading">
    <p id="posts-nav-heading" class="u-hiddenVisually">Posts navigation</p>
    <ul class="Pager-list u-cf">
      <?php
        previous_post_link( '<li class="Pager-previous">%link</li>', _x( '%title', 'Previous post link' ) );
        next_post_link(     '<li class="Pager-next">%link</li>',     _x( '%title', 'Next post link' ) );
      ?>
    </ul>
  </nav>
  <?php
}
endif;

if ( ! function_exists( 'wpg_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function wpg_posted_on() {
  $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
  if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    $time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
  }

  $time_string = sprintf( $time_string,
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() ),
    esc_attr( get_the_modified_date( 'c' ) ),
    esc_html( get_the_modified_date() )
  );

  $posted_on = sprintf(
    _x( 'Posted on %s', 'post date' ),
    '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
  );

  $byline = sprintf(
    _x( 'by %s', 'post author' ),
    '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
  );

  echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function wpg_categorized_blog() {
  if ( false === ( $all_the_cool_cats = get_transient( 'wpg_categories' ) ) ) {
    // Create an array of all the categories that are attached to posts.
    $all_the_cool_cats = get_categories( array(
      'fields'     => 'ids',
      'hide_empty' => 1,

      // We only need to know if there is more than one category.
      'number'     => 2,
    ) );

    // Count the number of categories that are attached to the posts.
    $all_the_cool_cats = count( $all_the_cool_cats );

    set_transient( 'wpg_categories', $all_the_cool_cats );
  }

  if ( $all_the_cool_cats > 1 ) {
    // This blog has more than 1 category so wpg_categorized_blog should return true.
    return true;
  } else {
    // This blog has only 1 category so wpg_categorized_blog should return false.
    return false;
  }
}

/**
 * Flush out the transients used in wpg_categorized_blog.
 */
function wpg_category_transient_flusher() {
  // Like, beat it. Dig?
  delete_transient( 'wpg_categories' );
}
add_action( 'edit_category', 'wpg_category_transient_flusher' );
add_action( 'save_post',     'wpg_category_transient_flusher' );
