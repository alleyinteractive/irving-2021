<?php
/**
 * Entry Footer.
 *
 * Output markup for an entry footer.
 *
 * @package WP_Irving
 */

use WP_Irving\Components;

/**
 * Register the component and callback.
 */
/**
 * Register the component.
 */
Components\register_component_from_config(
	__DIR__ . '/component',
	[
		'config_callback' => function( $config ) {
			global $authordata;

			ob_start();
			twenty_twenty_one_entry_meta_footer();
			// Set up content from the theme.
			$config['content'] = ob_get_clean();

			return $config;
		},
	]
);
