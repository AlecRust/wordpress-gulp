<?php
/**
 * Template for displaying 404 pages.
 *
 * @package wordpress-gulp
 */

get_header(); ?>

  <main class="Container-mainColumn" role="main">

    <header class="Entry-header">
      <h1 class="Entry-title">Oops! That page can&rsquo;t be found.</h1>
    </header>

    <div class="Entry-content">
      <p>It looks like nothing was found at this location. Maybe searching will help?</p>
      <?php get_search_form(); ?>
    </div>

  </main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
