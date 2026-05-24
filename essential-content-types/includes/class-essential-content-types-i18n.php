<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://catchplugins.com
 * @since      1.0.0
 *
 * @package    Essential_Content_Types
 * @subpackage Essential_Content_Types/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Essential_Content_Types
 * @subpackage Essential_Content_Types/includes
 * @author     Catch Plugins <info@catchplugins.com>
 */
class Essential_Content_Types_i18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * Since WordPress 4.6, translations are loaded automatically for plugins
	 * hosted on WordPress.org. This method is kept for backward compatibility
	 * but no longer calls load_plugin_textdomain().
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		// Intentionally empty. Since WordPress 4.6, translations for plugins
		// hosted on WordPress.org are loaded automatically.
	}

}
