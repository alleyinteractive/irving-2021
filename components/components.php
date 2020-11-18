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

$irving_twentytwentyone_components = [
	'site-header',
];

foreach ( $irving_twentytwentyone_components as $irving_twentytwentyone_component ) {
	$irving_twentytwentyone_path = __DIR__ . "/$irving_twentytwentyone_component/component.php";
	require_once $irving_twentytwentyone_path;
};
