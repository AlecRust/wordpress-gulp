<?php
/**
 * Template for displaying archive pages.
 *
 * @package wordpress-gulp
 */

get_header(); ?>

  <div class="Container u-cf">

    <main class="Container-mainColumn" role="main">

      <?php if ( have_posts() ) : ?>

        <header class="PageHeader">
          <?php
            the_archive_title( '<h1 class="PageHeader-title">', '</h1>' );
            the_archive_description( '<div class="PageHeader-description taxonomy-description">', '</div>' );
          ?>
        </header>

        <?php while ( have_posts() ) : the_post(); ?>

          <?php
            /*
             * Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'template-parts/content', get_post_format() );
          ?>

        <?php endwhile; ?>

        <?php the_posts_navigation(); ?>

      <?php else : ?>

        <?php get_template_part( 'template-parts/content', 'none' ); ?>

      <?php endif; ?>

    </main>

    <?php get_sidebar(); ?>

  </div>

<?php get_footer(); ?>
