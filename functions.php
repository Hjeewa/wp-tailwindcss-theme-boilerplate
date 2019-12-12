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

);

foreach ( $vlTailwind_includes as $file ) {
	$filepath = locate_template( 'includes' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}


require get_stylesheet_directory() . '/includes/scripts-and-styles.php';