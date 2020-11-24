<?php
/**
 * Load custom components.
 *
 * @package WordPress
 * @subpackage Irving_Twenty_Twenty_One
 */

// Bail early if WP_Irving isn't loaded.
if ( ! defined( 'WP_IRVING_PATH' ) ) {
	return;
}

// Autoload all of the components.
foreach ( glob( __DIR__ . '/*', GLOB_ONLYDIR ) as $irving_twentytwentyone_component_dir ) {
	$irving_twentytwentyone_component = "${irving_twentytwentyone_component_dir}/component.php";

	if ( file_exists( $irving_twentytwentyone_component ) ) {
		require_once $irving_twentytwentyone_component;
	}
};
