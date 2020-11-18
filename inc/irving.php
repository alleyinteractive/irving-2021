<?php
/**
 * Irving functionality.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

use WP_Irving\Components\Component;

// Load Irving components.
require_once dirname( __DIR__ ) . '/components/components.php';

// Add the theme stylesheet to Irving.
add_filter( 'wp_irving_component_children', 'twentytwentyone_enqueue_theme_styles', 10, 3 );

/**
 * Enqueue theme styles into the <head> component.
 *
 * @param array  $children Children for this component.
 * @param array  $config   Config for this component.
 * @param string $name     Name of this component.
 * @return array
 */
function twentytwentyone_enqueue_theme_styles( array $children, array $config, string $name ): array {
	// Ony run this action on the `irving/head` in a `page` context.
	if (
		'irving/head' !== $name
		|| 'page' !== ( $config['context'] ?? 'page' )
	) {
		return $children;
	}

	$children[] = new Component(
		'link',
		[
			'config' => [
				'href'  => get_stylesheet_uri(),
				'id'    => 'twenty-twenty-one-style-css',
				'media' => 'all',
				'rel'   => 'stylesheet',
				'type'  => 'text/css',
			],
		]
	);

	return $children;
}
