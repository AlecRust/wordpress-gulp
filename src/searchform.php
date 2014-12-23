<?php
/**
 * Template for displaying search form.
 *
 * @package wordpress-gulp
 */
?>

<form method="get" action="<?php echo home_url( '/' ); ?>" role="search">
  <label>
    <span class="u-hiddenVisually">Search for:</span>
    <input class="InputText InputText--sm" type="search" placeholder="Search…" value="" name="s">
  </label>
  <button class="Button Button--sm Button--default" type="submit">Search</button>
</form>
