<?php
/**
 * Custom template for the "Contact" page.
 *
 * @package wordpress-gulp
 */

get_header(); ?>

  <div class="Container u-cf">

    <main class="Container-mainColumn" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'page' ); ?>

      <?php endwhile; ?>

    </main>

    <aside class="Sidebar" role="complementary">
      <?php if ( is_active_sidebar( 'contact-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'contact-sidebar' ); ?>
      <?php else : ?>
        <h2 class="Sidebar-title u-textCenter">Social Links</h2>
        <?php wp_nav_menu( array(
          'theme_location' => 'contact_sidebar',
          'menu' => 'Contact Page Sidebar',
          'container' => '',
          'menu_class' => 'SocialIcons-list',
          'items_wrap' => '<ul class="%2$s">%3$s</ul>'
        ) ); ?>
      <?php endif; ?>
    </aside>

  </div>

<?php get_footer(); ?>
