<?php

/**
 * ACF Local JSON location for a parent theme.
 */

add_filter( 'acf/settings/load_json', function ( $paths ) {
    $paths[] = get_template_directory().'/acf-json';
    return $paths;
});