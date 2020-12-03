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
			if ( is_singular() ) {
				$post_title = new Component(
					'irving/post-title',
					[
						'config' => [
							'class_name' => 'entry-title',
							'tag'        => 'h1',
						],
					]
				);
			} else {
				$post_title = new Component(
					'irving/fragment',
					[
						'config'   => [
							'class_name' => 'entry-title default-max-width',
							'tag'        => 'h2',
						],
						'children' => [
							[
								'irving/post-permalink',
								[
									'theme'    => 'default',
									'children' => [
										[
											'irving/post-title',
											[
												'config' => [
													'tag' => 'span',
												],
											],
										],
									],
								],
							],
						],
					]
				);
			}

			$children = [
				$post_title,
				new Component(
					'irving/post-featured-image',
					[
						'config' => [
							'class_name' => 'post-thumbnail',
						],
					]
				),
			];

			return $children;
		},
	]
);
