<?php
/**
 * Template for displaying comments.
 *
 * The area of the page that contains both current comments
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
        printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title' ),
          number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
      ?>
    </h2>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
    <nav id="comment-nav-above" class="Pager" role="navigation" aria-labelledby="comment-nav-above-heading">
      <p id="comment-nav-above-heading" class="u-hiddenVisually">Comment navigation</p>
      <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments' ) ); ?></div>
      <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;' ) ); ?></div>
    </nav>
    <?php endif; // check for comment navigation ?>

    <ol class="Comments-list">
      <?php
        wp_list_comments( array(
          'style'      => 'ol',
          'short_ping' => true,
        ) );
      ?>
    </ol>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
    <nav id="comment-nav-below" class="Pager" role="navigation" aria-labelledby="comment-nav-below-heading">
      <p id="comment-nav-below-heading" class="u-hiddenVisually">Comment navigation</p>
      <ul class="Pager-list u-cf">
        <li class="Pager-previous"><?php previous_comments_link( __( 'Older Comments' ) ); ?></li>
        <li class="Pager-next"><?php next_comments_link( __( 'Newer Comments' ) ); ?></li>
      </ul>
    </nav>
    <?php endif; // check for comment navigation ?>

  <?php endif; // have_comments() ?>

  <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
  ?>
    <p class="Comments-closed">Comments are closed.</p>
  <?php endif; ?>

  <?php comment_form(array( 'comment_notes_after' => '' )); ?>

</div>
