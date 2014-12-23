<?php
/**
 * Template for displaying the footer.
 *
 * Contains the closing of the main container div and all content after
 *
 * @package wordpress-gulp
 */
?>

    </div>

    <footer class="SiteFooter u-cf" role="contentinfo">

      <p class="SiteFooter-copyright">
        Copyright <time datetime="<?= date( 'Y' ); ?>"><?= date( 'Y' ); ?></time> -
        <a class="u-linkClean" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> |
        <a class="u-linkClean" href="<?php echo get_permalink(get_page_by_path( 'terms' )); ?>">Terms</a>
      </p>

      <ul class="SocialIcons-list">
        <li class="SocialIcons-listItem">
          <a href="https://www.facebook.com/wordpress-gulp" class="SocialIcons-iconFacebook u-textHide" title="Facebook">Facebook</a>
        </li>
        <li class="SocialIcons-listItem">
          <a href="https://twitter.com/wordpress-gulp" class="SocialIcons-iconTwitter u-textHide" title="Twitter">Twitter</a>
        </li>
        <li class="SocialIcons-listItem">
          <a href="https://www.linkedin.com/in/wordpress-gulp" class="SocialIcons-iconLinkedin u-textHide" title="LinkedIn">LinkedIn</a>
        </li>
      </ul>

    </footer>

  </div>

  <script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/main.js"></script>

  <?php wp_footer(); ?>

</body>
</html>
