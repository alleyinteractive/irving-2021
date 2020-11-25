<?php
/**
 * Irving functionality.
 *
 * @package WordPress
 * @subpackage Irving_Twenty_Twenty_One
 * @since 1.0.0
 */

use WP_Irving\Components\Component;

// Load Irving components.
require_once dirname( __DIR__ ) . '/components/components.php';

// Add the theme stylesheet to Irving.
add_filter( 'wp_irving_component_children', 'irving_twentytwentyone_enqueue_theme_styles', 10, 3 );

/**
 * Enqueue theme styles into the <head> component.
 *
 * @param array  $children Children for this component.
 * @param array  $config   Config for this component.
 * @param string $name     Name of this component.
 * @return array
 */
function irving_twentytwentyone_enqueue_theme_styles( array $children, array $config, string $name ): array {
	if ( 'irving/head' === $name ) {
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
	}

	return $children;
}
