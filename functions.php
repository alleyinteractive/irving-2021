<?php
/**
 * Irving Twenty Twenty-One functions and definitions.
 *
 * @package Irving_Twenty_Twenty_One
 */

// phpcs:disable WordPressVIPMinimum.Files.IncludingFile.IncludingFile, WordPressVIPMinimum.Files.IncludingFile.UsingCustomConstant

namespace Irving_Twenty_Twenty_One;

define( 'IRVING_TWENTY_TWENTY_ONE_PATH', dirname( __FILE__ ) );
define( 'IRVING_TWENTY_TWENTY_ONE_URL', get_template_directory_uri() );

// Admin customizations.
if ( is_admin() ) {
	require_once IRVING_TWENTY_TWENTY_ONE_PATH . '/inc/admin.php';
}

// Include classes used to integrate with external APIs.
require_once IRVING_TWENTY_TWENTY_ONE_PATH . '/inc/api.php';

// Manage static assets (js and css).
require_once IRVING_TWENTY_TWENTY_ONE_PATH . '/inc/assets.php';

// Customizer additions.
require_once IRVING_TWENTY_TWENTY_ONE_PATH . '/inc/customizer.php';

// Media includes.
require_once IRVING_TWENTY_TWENTY_ONE_PATH . '/inc/media.php';

// Navigation & Menus.
require_once IRVING_TWENTY_TWENTY_ONE_PATH . '/inc/nav.php';

// Search.
require_once IRVING_TWENTY_TWENTY_ONE_PATH . '/inc/search.php';

// Helpers.
require_once IRVING_TWENTY_TWENTY_ONE_PATH . '/inc/template-tags.php';

// Theme setup.
require_once IRVING_TWENTY_TWENTY_ONE_PATH . '/inc/theme.php';
