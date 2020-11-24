<?php
/**
 * Post Container.
 *
 * Base wrapper component for creating layouts.
 *
 * @package WP_Irving
 */

use WP_Irving\Components;
use WP_Irving\Components\Component;

/**
 * Register the component.
 */
Components\register_component_from_config(
	__DIR__ . '/component',
	[
		'config_callback' => function ( $config ) {
			// Setup postdata.
			if ( $config['wp_query']->have_posts() ) {
				$config['wp_query']->the_post();
			}

			// Set the ID based on the post ID.
			$config['id'] = 'post-' . $config['post_id'];

			// Get the post classes from WordPress.
			ob_start();
			post_class( $config['class_name'], $config['post_id'] );
			$config['class_name'] = ob_get_clean();

			return $config;
		}
	]
);
