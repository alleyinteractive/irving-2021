<?php
/**
 * Container.
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
		'config_callback' => function( array $config ): array {
			// Set classnames based on WP data.
			$wrapper_classes  = 'site-header';
			$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
			$wrapper_classes .= true === get_theme_mod( 'display_title_and_tagline', true ) ? ' has-title-and-tagline' : '';
			$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';

			// Set config values.
			$config['class_name'] = $wrapper_classes;
			$config['tag']        = 'header';

			return $config;
		},
		'children_callback' => function( array $children ) {
			// Handle site-branding parts.
			$site_name    = get_bloginfo( 'name' );
			$description  = get_bloginfo( 'description', 'display' );
			$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
			$header_class = $show_title ? 'site-title' : 'screen-reader-text';

			// If we're showing a logo and title, the logo is the first child.
			if ( has_custom_logo() && $show_title ) {
				$children[] = new Component( 'irving/site-logo' );
			}

			// Set up main site-branding component.
			$site_branding = new Component(
				'irving/container',
				[
					'config' => [
						'class_name' => 'site-branding'
					],
				]
			);

			// If we have a logo and no title, add the logo as a child of site-branding.
			if ( has_custom_logo() && ! $show_title ) {
				$site_branding->append_child( new Component( 'irving/site-logo' ) );
			}

			// Add site-name to the site-branding container.
			if ( $site_name ) {
				if ( is_front_page() && ! is_paged() ) {
					$site_name = new Component(
						'irving/text',
						[
							'config' => [
								'tag'        => 'h1',
								'class_name' => esc_attr( $header_class ),
								'content'    => esc_html( $site_name ),
							],
						]
					);
				} elseif ( is_front_page() || is_home() ) {
					$site_name = new Component(
						'irving/fragment',
						[
							'config' => [
								'tag'        => 'h1',
								'class_name' => esc_attr( $header_class ),
							],
							'children' => [
								[
									'name'     => 'irving/link',
									'config'   => [
										'href'    => esc_url( home_url( '/' ) ),
									],
									'children' => [
										[
											'name'    => 'irving/text',
											'config'  => [
												'content' => esc_html( $site_name ),
											]
										]
									]
								],
							],
						]
					);
				} else {
					$site_name = new Component(
						'irving/fragment',
						[
							'config' => [
								'tag'        => 'p',
								'class_name' => esc_attr( $header_class ),
							],
							'children' => [
								[
									'name' => 'irving/link',
									'config'   => [
										'href'    => esc_url( home_url( '/' ) ),
									],
									'children' => [
										[
											'name'    => 'irving/text',
											'config'  => [
												'content' => esc_html( $site_name ),
											]
										]
									]
								],
							],
						]
					);
				}

				$site_branding->append_child( $site_name );
			}

			// Display the tagline if set.
			if ( $description && get_theme_mod( 'display_title_and_tagline', true ) ) {
				$site_branding->append_child( new Component(
					'irving/text',
					[
						'config' => [
							'tag' => 'p',
							'class_name' => 'site-description',
							'content' => $description,
						],
					]
				) );
			}

			// Add the site-branding component as a child.
			$children[] = $site_branding;

			// Add nav menu if one is set.
			if ( has_nav_menu( 'primary' ) ) {
				$children[] = new Component(
					'irving/container',
					[
						'config'   => [
							'tag'        => 'nav',
							'id'         => 'site-navigation',
							'class_name' => 'primary-navigation',
							'role'       => 'navigation',
							'aria_label' => esc_attr__( 'Primary menu', 'twentytwentyone' ),
						],
						'children' => [
							[
								'name'     => 'irving/container',
								'config'   => [
									'class_name' => 'menu-button-container',
								],
								'children'        => [
									[
										'name'           => 'irvng/button',
										'config'         => [
											'id'            => 'primary-mobile-menu',
											'class_name'    => 'button',
											'aria_controls' => 'primary-menu-list',
											'aria_expanded' => 'false',
										],
										'children'       => [
											[
												'name'         => 'irving/text',
												'config'       => [
													'class_name'  => 'dropdown-icon open',
													'html'        => true,
													'content'     => esc_html__( 'Menu', 'twentytwentyone' ) . ' ' . twenty_twenty_one_get_icon_svg( 'ui', 'menu' ),
												],
											],
											[
												'name'         => 'irving/text',
												'config'       => [
													'class_name'  => 'dropdown-icon close',
													'html'        => true,
													'content'     => esc_html__( 'Close', 'twentytwentyone' ) . ' ' . twenty_twenty_one_get_icon_svg( 'ui', 'close' ),
												],
											],
										]
									]
								]
							],
							[
								'name'   => 'irving/menu',
								'config' => [
									'location'        => 'primary',
									'class_name'      => 'menu-wrapper',
									'container_class' => 'primary-menu-container',
									'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
									'fallback_cb'     => false,
								],
							],
						],
					]
				);
			}

			return $children;
		}
	]
);
