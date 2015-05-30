<?php
/**
 * Template for displaying search results pages.
 *
 * @package wordpress-gulp
 */

get_header(); ?>

  <main role="main">

  <?php if ( have_posts() ) : ?>

    <header class="PageHeader">
      <h1 class="PageHeader-title"><?php printf( esc_html__( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </header>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php
      /**
       * Run the loop for the search to output the results.
       * If you want to overload this in a child theme then include a file
       * called content-search.php and that will be used instead.
       */
      get_template_part( 'template-parts/content', 'search' );
      ?>

    <?php endwhile; ?>

    <?php wpg_posts_navigation(); ?>

  <?php else : ?>

    <?php get_template_part( 'template-parts/content', 'none' ); ?>

  <?php endif; ?>

  </main>

<?php get_footer(); ?>
