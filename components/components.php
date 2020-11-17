<?php
/**
 * Load custom components.
 */

// Bail early if WP_Irving isn't loaded.
if ( ! defined( 'WP_IRVING_PATH' ) ) {
	return;
}

$components = [
	'site-header',
];

foreach ( $components as $component ) {
	$path = __DIR__ . "/$component/component.php";
	require_once $path;
};
