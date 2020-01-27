<?php

/**
 * ACF Local JSON location for a parent theme.
 */

add_filter( 'acf/settings/load_json', function ( $paths ) {
    $paths[] = get_template_directory().'/acf-json';
    return $paths;
});


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}