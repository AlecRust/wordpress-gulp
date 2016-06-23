<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package wordpress-gulp
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
  return;
}
?>

<div id="comments" class="Comments">

  <?php if ( have_comments() ) : ?>
    <h2 class="Comments-title">
      <?php
        printf(
          esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'wpg' ) ),
          number_format_i18n( get_comments_number() ),
          '<span>' . get_the_title() . '</span>'
        );
      ?>
    </h2>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav id="comment-nav-above" class="Pager" role="navigation" aria-labelledby="comment-nav-above-heading">
      <h2 id="comment-nav-above-heading" class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'wpg' ); ?></h2>
      <ul class="Pager-list u-cf">
        <li class="Pager-listItem Pager-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'wpg' ) ); ?></li>
        <li class="Pager-listItem Pager-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'wpg' ) ); ?></li>
      </ul>
    </nav>
    <?php endif; ?>

    <ol class="Comments-list">
      <?php
        wp_list_comments( array(
          'style'      => 'ol',
          'short_ping' => true,
        ) );
      ?>
    </ol>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav id="comment-nav-below" class="Pager" role="navigation" aria-labelledby="comment-nav-below-heading">
      <h2 id="comment-nav-below-heading" class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'wpg' ); ?></h2>
      <ul class="Pager-list u-cf">
        <li class="Pager-listItem Pager-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'wpg' ) ); ?></li>
        <li class="Pager-listItem Pager-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'wpg' ) ); ?></li>
      </ul>
    </nav>
    <?php
    endif;

  endif;


  // If comments are closed and there are comments, leave a note
  if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
    <p class="Comments-closed"><?php esc_html_e( 'Comments are closed.', 'wpg' ); ?></p>
  <?php
  endif;

  comment_form();
  ?>

</div>
