<?php
/**
 * Template for displaying all single posts.
 *
 * @package wordpress-gulp
 */

get_header(); ?>

  <div class="Container u-cf">

    <main class="Container-mainColumn" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'single' ); ?>

        <?php the_post_navigation(); ?>

        <?php
          // If comments are open or we have at least one comment, load up the comment template
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;
        ?>

      <?php endwhile; ?>

    </main>

    <?php get_sidebar(); ?>

  </div>

<?php get_footer(); ?>
