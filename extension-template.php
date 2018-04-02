<?php
/**
 * Plugin Name:       [Base Plugin Name] Extension: [Extension Name]
 * Plugin URI:        https://theeventscalendar.com/extensions/---the-extension-article-url---/
 * Description:       [Extension Description]
 * Version:           1.0.0
 * Extension Class:   Tribe__Extension__Example
 * GitHub Plugin URI: https://github.com/mt-support/extension-template
 * Author:            Modern Tribe, Inc.
 * Author URI:        http://m.tri.be/1971
 * License:           GPL version 3 or any later version
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       match-the-plugin-directory-name
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

// Do not load unless Tribe Common is fully loaded and our class does not yet exist.
if (
	class_exists( 'Tribe__Extension' )
	&& ! class_exists( 'Tribe__Extension__Example' )
) {
	/**
	 * Extension main class, class begins loading on init() function.
	 */
	class Tribe__Extension__Example extends Tribe__Extension {

		/**
		 * Setup the Extension's properties.
		 *
		 * This always executes even if the required plugins are not present.
		 */
		public function construct() {
			// Requirements and other properties such as the extension homepage can be defined here.
			// Examples:
			// $this->add_required_plugin( 'Tribe__Events__Main', '4.3' );
		}

		/**
		 * Extension initialization and hooks.
		 */
		public function init() {
			// Load plugin textdomain
			// Don't forget to generate the 'languages/match-the-plugin-directory-name.pot' file
			load_plugin_textdomain( 'match-the-plugin-directory-name', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
			
			// Insert custom code here
		}
		
	} // end class
} // end if class_exists check
