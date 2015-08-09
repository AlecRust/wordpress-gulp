<?php
/**
 * Custom template for the "Contact" page.
 *
 * @package wordpress-gulp
 */

get_header(); ?>

  <div class="Container">

    <main class="Container-mainColumn" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'page' ); ?>

      <?php endwhile; ?>

    </main>

    <aside class="Sidebar" role="complementary">
      <?php dynamic_sidebar( 'contact-sidebar' ); ?>
    </aside>

  </div>

<?php get_footer(); ?>
