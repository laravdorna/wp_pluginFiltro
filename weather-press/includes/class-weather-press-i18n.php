<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.weather-press.com
 * @since      2.4
 *
 * @package    Weather_Press
 * @subpackage Weather_Press/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      2.4
 * @package    Weather_Press
 * @subpackage Weather_Press/includes
 * @author     Zied Bouzidi <geagoir@gmail.com>
 */
class Weather_Press_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    2.4
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'weather-press',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}