<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://NA
 * @since      1.0.0
 *
 * @package    Custom_Welcome_Settings
 * @subpackage Custom_Welcome_Settings/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Custom_Welcome_Settings
 * @subpackage Custom_Welcome_Settings/includes
 * @author     Yogayata Verma <yogayatajugnu@gmail.com>
 */
class Custom_Welcome_Settings_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'custom-welcome-settings',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
