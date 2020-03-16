<?php
/**
---------------------------------------------------------------------------------------------------
                  THANK YOU FOR CHOOSING WEATHER PRESS

				       www.weather-press.com
---------------------------------------------------------------------------------------------------

    Please Note that Exceptions are thrown by  short name code  in order to handle translation

----------------------------------------------------------------------------------------------------
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.weather-press.com
 * @since      2.4
 *
 * @package    Weather_Press
 * @subpackage Weather_Press/public
 * @author     Zied Bouzidi <geagoir@gmail.com>
 */
class Weather_Press_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    2.4
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    2.4
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.4
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    2.4
	 */
	public function enqueue_styles() {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Weather_Press_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Weather_Press_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/weather-press-public-min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    2.4
	 */
	public function enqueue_scripts() {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Weather_Press_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Weather_Press_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
       
	    wp_enqueue_script( 'weather_press_Current_js', plugin_dir_url( __FILE__ ) . 'js/weather-press-public-min.js', array( 'jquery' ), $this->version, false );

        //Define javascript variables for the ajax calls
		$weather_press_js_vars = array(

            'weather_press_ajax_url'         => admin_url( 'admin-ajax.php' ),
			'weather_press_Plugin_Path'      => WEATHER_PRESS_PATH,		
            'weather_press_Current_Unit'     => get_option('weather_press_unit'),
            'weather_press_Current_Language' => get_option('weather_press_lang')
        );

	    wp_localize_script( 'weather_press_Current_js', 'weather_press_data_from_php', $weather_press_js_vars );

	}

	 /**
	 * Weather press front-end ajax calls
	 * Current weather conditions
	 * Hourly forecasts
	 * Daily forecasts
	 *
	 * @since    4.0 Rises
	 *
	 */		
	public function weather_press_public_ajaxCalls() {

        // Handle the ajax call to retrieve the current weather
        require_once ABSPATH . 'wp-content/plugins/weather-press/includes/class-weather-press-fetcher.php';

        // Translate the outputed errors messages
        require_once ABSPATH . 'wp-content/plugins/weather-press/includes/class-weather-press-translator.php';

		//the request target :: current weather, hourly forecast or daily forecast ?
		$find = isset($_REQUEST['find']) ? $_REQUEST['find'] : 'current';

		//check if the data should be cached via the wordpress transients
		//geolocation requests MUST NOT BE CACHED, as this will create too much transients entries in the database
		//Also refresh requests should not get a cached value
	    $cacheable = isset($_REQUEST['save']) ? $_REQUEST['save'] : 0;

		// Get the city name
		$city    = isset($_REQUEST['city']) ? $_REQUEST['city'] : 'tunis';
		$city_id = isset($_REQUEST['city_id']) ? $_REQUEST['city_id'] : 2464470;

        // Get the temperature unit
		$unit = isset($_REQUEST['unit']) ? $_REQUEST['unit'] : 'metric';

        // Get the forecast number of days
		$nbrDays = isset($_REQUEST['nbrDays']) ? $_REQUEST['nbrDays'] : 1;

        // Get the current language
		$language = isset($_REQUEST['language']) ? $_REQUEST['language'] : 'EN';

	    $weather_press_Translation_Object = new Weather_Press_Translator( $language );
	    $weather_press_Translation = $weather_press_Translation_Object->weather_press_returned_Translation;

	    try {

			$weather_press_Cache = 20;
			
			//we use encodeURIComponent(city) in the js file so:
            $weather_press_transient_name = preg_replace('/%u([0-9a-f]{3,4})/i','&#x\\1;',urldecode($city)); 
            $weather_press_transient_name = html_entity_decode($weather_press_transient_name,null , 'UTF-8');
			//replace white spaces with underscore :: needed in some cases
			$weather_press_transient_name = preg_replace('/[\s]+/', '_', $weather_press_transient_name);
				
			$weather_press_content_fetcher = new weather_Press_Fetcher();
			
			//current weather, hourly forecast or daily forecast ?
			switch( $find ) {
				
				case 'current' :

					if( $cacheable == 1 ) {
					
					    // If the transient does not exist, does not have a value, or has expired
						if( false === ( $weather_press_transient_response = get_transient( 'weather_press_'. $weather_press_transient_name .'_current_transient' ) ) ) {
						
						    $weather_press_weather_response = $weather_press_content_fetcher->getCurrentWeatherData( $city, $unit, $city_id );

						    set_transient( 'weather_press_'. $weather_press_transient_name .'_current_transient', $weather_press_weather_response, MINUTE_IN_SECONDS * $weather_press_Cache );
						
					    } else {
						
						    $weather_press_weather_response = maybe_unserialize( $weather_press_transient_response );
					    }

                    } else {
						
						$weather_press_weather_response = $weather_press_content_fetcher->getCurrentWeatherData( $city, $unit, $city_id );
					}					
					break;
					
				case 'hourly' :

				    if( $cacheable == 1 ) {
				
					    // If the transient does not exist, does not have a value, or has expired
						if( false === ( $weather_press_transient_response = get_transient( 'weather_press_'. $weather_press_transient_name .'_hourly_transient' ) ) ) {
						
						    $weather_press_weather_response = $weather_press_content_fetcher->getWeatherHourlyForecast( $city, $unit, $city_id );

						    set_transient( 'weather_press_'. $weather_press_transient_name .'_hourly_transient', $weather_press_weather_response, MINUTE_IN_SECONDS * $weather_press_Cache );
						
					    } else {
						
						    $weather_press_weather_response = maybe_unserialize( $weather_press_transient_response );
					    }

					} else {
						
						$weather_press_weather_response = $weather_press_content_fetcher->getWeatherHourlyForecast( $city, $unit, $city_id );
					}
                    break;

                case 'daily' :
				
					if( $cacheable == 1 ) {
					
					    // If the transient does not exist, does not have a value, or has expired
						if( false === ( $weather_press_transient_response = get_transient( 'weather_press_'. $weather_press_transient_name .'_daily_transient' ) ) ) {
						
						    $weather_press_weather_response = $weather_press_content_fetcher->getWeatherDailyForecast( $city, $unit, $nbrDays, $language, $city_id );

						    set_transient( 'weather_press_'. $weather_press_transient_name .'_daily_transient', $weather_press_weather_response, MINUTE_IN_SECONDS * $weather_press_Cache );
						
					    } else {
						
						    $weather_press_weather_response = maybe_unserialize( $weather_press_transient_response );
					    }
						
					} else {
						
						$weather_press_weather_response = $weather_press_content_fetcher->getWeatherDailyForecast( $city, $unit, $nbrDays, $language, $city_id );
					}
                    break;

                default :

                    $weather_press_weather_response = null;				
				    
			}

	        //send back the corresponding JSON Object
			wp_send_json( $weather_press_weather_response );
	        //If we don’t, admin-ajax.php will execute it’s own die(0) code, echoing an additional zero in our response.
			//But wp_send_json perform its own die() so we do not need that :p

        } catch ( Exception $e ) {
		
	        echo $weather_press_Translation[ $e->getMessage() ];
			die;
	
        }

	}

	/**
	 * Prepare varibales for public-facing view of the plugin and display it
	 *
	 * @since    2.4
	 */		
	public function weather_Press_Shortcode() {

		$weather_press_Current_Language = get_option('weather_press_lang');
		$weather_press_Current_Unit     = get_option('weather_press_unit');

		require_once ABSPATH . 'wp-content/plugins/weather-press/includes/class-weather-press-translator.php';
		$weather_press_Translation_Object = new Weather_Press_Translator( $weather_press_Current_Language );
	    $weather_press_Translation = $weather_press_Translation_Object->weather_press_returned_Translation;

		$weather_press_db_mainLocation = json_decode( get_option('weather_press_mainLocation') );
        $weather_press_db_secLocation  = json_decode( get_option('weather_press_secondary_location') );

	    $wpress_Main_Location_city_name    = $weather_press_db_mainLocation[0]->city_name;
	    $wpress_Main_Location_country_name = $weather_press_db_mainLocation[0]->country_name;
	    $wpress_Main_Location_id           = $weather_press_db_mainLocation[0]->location_id;

	    $wpress_Secondary_Location_Bottom_city_name    = $weather_press_db_secLocation[0]->city_name;
	    $wpress_Secondary_Location_Bottom_country_name = $weather_press_db_secLocation[0]->country_name;
	    $wpress_Secondary_Location_Bottom_id           = $weather_press_db_secLocation[0]->location_id;

	    include 'partials/weather-press-public-display.php';

	} // End of the weather_Press_Shortcode() function


} // End en the Class