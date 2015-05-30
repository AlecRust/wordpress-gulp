<?php
/**
 * Main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wordpress-gulp
 */

get_header(); ?>

  <main class="Container-mainColumn" role="main">

  <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php
        /*
         * Include the Post-Format-specific template for the content
         */
        get_template_part( 'template-parts/content', get_post_format() );
      ?>

    <?php endwhile; ?>

    <?php wpg_posts_navigation(); ?>

  <?php else : ?>

    <?php get_template_part( 'template-parts/content', 'none' ); ?>

  <?php endif; ?>

  </main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
