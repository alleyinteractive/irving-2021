<?php
/**
 * Post Container.
 *
 * Base wrapper component for creating layouts.
 *
 * @package WP_Irving
 */

use WP_Irving\Components;

/**
 * Register the component.
 */
Components\register_component_from_config(
	__DIR__ . '/component',
	[
		'config_callback' => function ( $config ) {
			$description = get_the_archive_description();

			if ( $description ) {
				$config['content'] = wp_kses_post( wpautop( $description ) );
			}

			return $config;
		},
	]
);
