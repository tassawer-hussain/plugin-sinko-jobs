<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://tassawer.com
 * @since      1.0.0
 *
 * @package    Sinko_Jobs
 * @subpackage Sinko_Jobs/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Sinko_Jobs
 * @subpackage Sinko_Jobs/includes
 * @author     Tassawer Hussain <support@tassawer.com>
 */
class Sinko_Jobs_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'sinko-jobs',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
