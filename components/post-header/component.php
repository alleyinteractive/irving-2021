<?php
/**
 * Entry Footer.
 *
 * Output markup for an entry footer.
 *
 * @package WP_Irving
 */

use WP_Irving\Components;
use WP_Irving\Components\Component;

/**
 * Register the component and callback.
 */
/**
 * Register the component.
 */
Components\register_component_from_config(
	__DIR__ . '/component',
	[
		'children_callback' => function( $children ) {

			$children = [
				new Component(
					'irving/post-title',
					[
						'config' => [
							'class_name' => 'entry-title',
							'tag'        => is_singular() ? 'h1' : 'h2',
						],
					]
				),
				new Component(
					'irving/post-featured-image'
				),
			];

			return $children;
		},
	]
);
