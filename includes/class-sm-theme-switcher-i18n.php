<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.facebook.com/bryan3561
 * @since      1.0.0
 *
 * @package    Sm_Theme_Switcher
 * @subpackage Sm_Theme_Switcher/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Sm_Theme_Switcher
 * @subpackage Sm_Theme_Switcher/includes
 * @author     Bryan Contreras <bryan3561@gmail.com>
 */
class Sm_Theme_Switcher_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'sm-theme-switcher',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
