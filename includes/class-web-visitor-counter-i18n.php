<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://latitudeinnovation.com.my
 * @since      1.0.0
 *
 * @package    Web_Visitor_Counter
 * @subpackage Web_Visitor_Counter/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Web_Visitor_Counter
 * @subpackage Web_Visitor_Counter/includes
 * @author     Latitude Innovation <inquiry@latitudeinnovation.com.my>
 */
class Web_Visitor_Counter_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'web-visitor-counter',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
