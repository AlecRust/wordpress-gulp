<?php
/**
 * Template for displaying 404 pages.
 *
 * @package wordpress-gulp
 */

get_header(); ?>

  <main class="Container" role="main">

    <header class="Entry-header">
      <h1 class="Entry-title">
        <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wpg' ); ?>
      </h1>
    </header>

    <div class="Entry-content">
      <p>
        It looks like nothing was found at this location. Maybe searching will help? Alternatively
        go <a href="<?php echo esc_url( home_url( '/' ) ); ?>">back to the home page ></a>
      </p>
      <?php get_search_form(); ?>
    </div>

  </main>

<?php get_footer(); ?>
