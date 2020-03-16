<?php
/**
 * @link              https://www.weather-press.com
 * @since             2.4
 * @package           Weather_Press
 *
 * @wordpress-plugin
 * Plugin Name:       Weather Press
 * Plugin URI:        https://www.weather-press.com
 * Description:       You need an amazing wordpress weather plugin & widget ?? ...Weather Press offer you more !
 * Version:           4.7
 * Author:            Zied Bouzidi
 * Author URI:        https://www.weather-press.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       weather-press
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define the weather press root path
define( 'WEATHER_PRESS_PATH', plugins_url('', __FILE__ ) );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-weather-press-activator.php
 */
function activate_weather_press() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-weather-press-activator.php';
	Weather_Press_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-weather-press-deactivator.php
 */
function deactivate_weather_press() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-weather-press-deactivator.php';
	Weather_Press_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_weather_press' );
register_deactivation_hook( __FILE__, 'deactivate_weather_press' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-weather-press.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    2.4
 */

function run_weather_press() {

	$plugin = new Weather_Press();
	$plugin->run();

}
run_weather_press();