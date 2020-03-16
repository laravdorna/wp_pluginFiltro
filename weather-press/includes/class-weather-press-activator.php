<?php
/**
 * Fired during plugin activation
 *
 * @link       https://www.weather-press.com
 * @since      2.4
 *
 * @package    Weather_Press
 * @subpackage Weather_Press/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      2.4
 * @package    Weather_Press
 * @subpackage Weather_Press/includes
 * @author     Zied Bouzidi <geagoir@gmail.com>
 */
class Weather_Press_Activator {

	/**
	 *
	 * @since    4.7
	 */
	public static function activate() {

		if( !get_option('weather_press_lang') )  { update_option('weather_press_lang', 'EN'); }
		if( !get_option('weather_press_unit') )  { update_option('weather_press_unit', 'metric'); }
		if( !get_option('weather_press_where') ) { update_option('weather_press_unit', '0'); }

		if( !get_option('weather_press_mainLocation') ){

			$main_location_array [0]['country_name']  = 'none';
			$main_location_array [0]['city_name']     = 'none';
			$main_location_array [0]['location_id']   = '0';

			update_option('weather_press_mainLocation', json_encode( $main_location_array ));
		}

		if( !get_option('weather_press_secondary_location') ){

			$secondaries_locations_array [0]['country_name']  = 'none';
			$secondaries_locations_array [0]['city_name']     = 'none';
			$secondaries_locations_array [0]['location_id']   = '0';

			update_option('weather_press_secondary_location', json_encode( $secondaries_locations_array ));
		}
	}

}