<?php
/**
 * Plugin Name:       The Events Calendar Extension: User Timezone
 * Plugin URI:        https://theeventscalendar.com/extensions/---the-extension-article-url---/
 * GitHub Plugin URI: https://github.com/mt-support/tribe-ext-user-timezone
 * Description:       Allows users to see event times in their own timezone.
 * Version:           0.1
 * Author:            Modern Tribe, Inc.
 * Author URI:        http://m.tri.be/1971
 * License:           GPL version 3 or any later version
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       user-timezone
 *
 *     This plugin is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     any later version.
 *
 *     This plugin is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *     GNU General Public License for more details.
 */

/**
 * Define the base file that loaded the plugin for determining plugin path and other variables.
 *
 * @since 0.1
 *
 * @var string Base file that loaded the plugin.
 */
define( 'TRIBE_EXTENSION_USER_TIMEZONE_FILE', __FILE__ );

/**
 * Register and load the service provider for loading the extension.
 *
 * @since 0.1
 */
function tribe_extension_user_timezone() {
	// When we don't have autoloader from common we bail.
	if  ( ! class_exists( 'Tribe__Autoloader' ) ) {
		return;
	}

	// Register the namespace so we can the plugin on the service provider registration.
	Tribe__Autoloader::instance()->register_prefix(
		'\\Tribe\\Extensions\\User_Timezone\\',
		__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Tribe',
		'user_timezone'
	);

	tribe_register_provider( '\Tribe\Extensions\User_Timezone\Plugin' );
}

// Loads after common is already properly loaded.
add_action( 'tribe_common_loaded', 'tribe_extension_user_timezone' );
