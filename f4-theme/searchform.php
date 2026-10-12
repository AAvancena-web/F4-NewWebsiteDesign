<?php
/**
 * Search form.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;
$f4_sid = 's-' . wp_unique_id();
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="<?php echo esc_attr( $f4_sid ); ?>">Search for</label>
	<input type="search" id="<?php echo esc_attr( $f4_sid ); ?>" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="Search the site">
	<button type="submit">Search</button>
</form>
