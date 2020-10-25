<?php


use vlTailwind\AutoLoader;
use vlTailwind\View;


/*
 * Set up our auto loading class and mapping our namespace to the app directory.
 *
 * The autoloader follows PSR4 autoloading standards so, provided StudlyCaps are used for class, file, and directory
 * names, any class placed within the app directory will be autoloaded.
 *
 * i.e; If a class named SomeClass is stored in app/SomeDir/SomeClass.php, there is no need to include/require that file
 * as the autoloader will handle that for you.
 */
require get_stylesheet_directory() . '/app/AutoLoader.php';
$loader = new AutoLoader();
$loader->register();
$loader->addNamespace( 'vlTailwind', get_stylesheet_directory() . '/app' );

View::$view_dir = get_stylesheet_directory() . '/templates/views';


$vlTailwind_includes = array(
	'/setup.php',					// Some theme setup functions
	'/template-tags.php',			// Custom template tags
	'/pagination.php',				// Pagination 
	'/sidebars.php',				// Sidebars 
	'/scripts-and-styles.php',		// enqueue scripts and styles
	'/page-titles.php', 			// page title function
	'/breadcrumbs.php', 			// breadcrumbs trail function
	'/acf.php', 					// ACF settings
	'/menus.php' 					// MENU inits
);

foreach ( $vlTailwind_includes as $file ) {
	$filepath = locate_template( 'includes' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
