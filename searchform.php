<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="sr-only" for="search_field">Search</label>
	<div>
		<input id="search_field" class="" name="search" type="text" placeholder="<?php esc_attr_e( 'Search &hellip;'); ?>" value="<?php the_search_query(); ?>">
		<button id="search_submit" class="" name="submit" type="submit">Search</button>
	</div>
</form>
