<?php
/**
 * Template for displaying search results pages.
 *
 * @package wordpress-gulp
 */

get_header(); ?>

  <main class="Container" role="main">

  <?php if ( have_posts() ) : ?>

    <header class="PageHeader">
      <h1 class="PageHeader-title"><?php printf( esc_html__( 'Search Results for: %s', 'wpg' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </header>

    <?php while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/content', 'search' );

    endwhile;

    the_posts_navigation();

  else :

    get_template_part( 'template-parts/content', 'none' );

  endif; ?>

  </main>

<?php get_footer(); ?>
