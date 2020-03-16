<?php
/*
---------------------------------------------------------------------------------------------------
                  THANK YOU FOR CHOOSING WEATHER PRESS
				  
				       www.weather-press.com
---------------------------------------------------------------------------------------------------

        Note that Exceptions are thrown by  short name code  in order to handle translation

----------------------------------------------------------------------------------------------------
*/
/**
 * The file that fetch the weather data for us and handle all errors
 *
 * @link       https://www.weather-press.com
 * @since      2.4
 *
 * @package    Weather_Press
 * @subpackage Weather_Press/includes
 * @author     Zied Bouzidi <geagoir@gmail.com>
 */
class weather_Press_Fetcher {

	/**
	 * The string used to store the Key value for the weather requests.
	 *
	 * @since    2.4
	 * @access   private
	 * @var      string    $appid    The string used to store the Key value for the weather requests.
	 */
    private $appid;	

	/**
	 * The URL used to get the current weather data.
	 *
	 * @since    2.4
	 * @access   private
	 * @var      string    $weatherurl    The URL used to get the current weather data.
	 */	
    private $weatherurl;

	/**
	 * The URL used to get the daily forecast data.
	 *
	 * @since    4.5
	 * @access   private
	 * @var      string    $weather_press_dailyForecast_url    The URL used to get the daily forecast data.
	 */
    private $weather_press_dailyForecast_url;

	/**
	 * The URL used to get the forecast data.
	 *
	 * @since    2.4
	 * @access   private
	 * @var      string    $weatherforecastsurl    The URL used to get the forecast data.
	 */
    private $weatherforecastsurl;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.4
	 * @param      string    $appid.
	 * @param      string    $weatherurl.
	 * @param      string    $weather_press_dailyForecast_url.
	 * @param      string    $weatherforecastsurl.
	 */

	public function __construct() {

		$this->appid = '80c0790d1b594ea812167776d6215ecd';// since 4.0 rises
		
		$this->weatherurl = 'http://api.openweathermap.org/data/2.5/weather';

		$this->weather_press_dailyForecast_url = 'http://api.openweathermap.org/data/2.5/forecast/daily';

		$this->weatherforecastsurl = 'http://api.openweathermap.org/data/2.5/forecast';
	}

	/**
	 * Get the current weather data for a specific city.
	 *
	 * @since    2.4
	 * @param      string    $unit
	 * @param      string    $city    Get the current weather data for a specific city.
	 */	
	public function getCurrentWeatherData( $city, $unit = 'metric', $id ) {

		$weatherurl = $this->weatherurl;
		$city = urlencode($city);

        try 
          {
			//  isValidUrl() return the weather data that we need or  a custom error message
			$data = $this->isValidUrl( $weatherurl, $city, $unit, $nbrDays = 1, $id );
            $city=$data['name'];
            //current weather temperature and icon			   
            $temp = (int)$data['main']['temp'];
            $img_code = $data['weather'][0]['icon'];
			
			//low and high temperature
			@$temp_min = (int)$data['main']['temp_min'];
			@$temp_max = (int)$data['main']['temp_max'];
			
            $returned = array( 'city' => $city, 'temp' => $temp, 'icon' => $img_code, 'temp_min' => $temp_min, 'temp_max' => $temp_max );

            return $returned;
          } 
        catch (Exception $e) 
          {
            return $this->isValidUrl( $weatherurl, $city, $unit, $nbrDays = 1, $id );
          }		  		
	}

	/**
	 * Get the weather daily forecast data for a specific city and for a specific number of days : 1 <= $nbrDays <= 16.
	 *
	 * @since    4.5
	 * @param      int       $nbrDays
	 * @param      string    $unit
	 * @param      string    $city    Get the weather forecast data for a specific city and for a specific number of days : 1 <= $nbrDays <= 16.
	 */		
	public function getWeatherDailyForecast( $city, $unit='metric', $nbrDays = 1, $lang, $id ) {

		$weather_press_dailyForecast_url = $this->weather_press_dailyForecast_url;

		$city = urlencode($city);

		try  {

			$data = $this->isValidUrl( $weather_press_dailyForecast_url, $city, $unit, $nbrDays, $id );

			$forecasts = array();
            $z=0;

			$forecasts[$z]['city'] = $city;

            foreach ($data['list'] as $myday) {
				 
				if( $lang == 'EN' ) {
					
					$forecasts[$z]['date'] = date('D M d',$myday['dt']);
				
				} elseif( $lang == 'FR' ) {
					
                    setlocale (LC_TIME, 'fr_FR.utf8','fra');
                    $forecasts[$z]['date'] = strftime("%A %d %B", $myday['dt']);					
					
				} elseif( ( $lang == 'AR' ) || ( $lang == 'ES' ) ) {

					// w 	Numeric representation of the day of the week 	0 (for Sunday) through 6 (for Saturday)
					// n 	Numeric representation of a month, without leading zeros 	1 through 12     
					// d 	Day of the month, 2 digits with leading zeros 	01 to 31
					$forecasts[$z]['date'] = date('w-n-d',$myday['dt']);
				}
				
	            $forecasts[$z]['daytemp'] = round($myday['temp']['day']);
	            $forecasts[$z]['mintemp'] = round($myday['temp']['min']);
	            $forecasts[$z]['maxtemp'] = round($myday['temp']['max']);
	            $forecasts[$z]['icon']    = $myday['weather'][0]['icon'];
				
                $z++;
            }

            return $forecasts;

        } catch ( Exception $e ) {

            return $this->isValidUrl( $weather_press_dailyForecast_url, $city, $unit, $nbrDays, $id );
        }		  		
	}

	/**
	 * Get the weather forecast data for a specific city.
	 *
	 * @since    2.4
	 * @param      string    $unit
	 * @param      string    $city    Get the weather forecast data for a specific city.
	 */		
	public function getWeatherForecast( $city, $unit='metric' ) {
		
		$weatherforecastsurl = $this->weatherforecastsurl;
		
		$city = urlencode($city);
		
        try 
          {
			$data = $this->isValidUrl( $weatherforecastsurl, $city, $unit, $nbrDays = 0 );
			
            $city = $data['city']['name'];

			$toDay = date('Y-m-d H:i:s');
			
			$forecasts = array();
			
            $z = 0;

			$forecasts[$z]['city'] = $city;
			
            foreach ($data['list'] as $myday)
              {
 
				if( ( abs( $toDay - strtotime( $myday['dt_txt'] ) ) > 0 ) && ( $z < 4 ) ) {  
				  
	            $forecasts[$z]['date'] = $myday['dt_txt'];
	            $forecasts[$z]['icon'] = $myday['weather'][0]['icon'];
	            $forecasts[$z]['temp'] = $myday['main']['temp'];
				
                $z++;
				}
				
              }

            return $forecasts;
          } 
        catch (Exception $e) 
          {
            return $this->isValidUrl( $weatherforecastsurl, $city, $unit, $nbrDays = 0 );
          }		  		
	}
	
	/**
	 * Get the weather hourly forecast data for a specific city.
	 *
	 * @since    4.0 rises
	 * @param      string    $unit
	 * @param      string    $city    Get the weather hourly forecast data for a specific city.
	 */		
	public function getWeatherHourlyForecast( $city, $unit='metric', $id ) {
		
		$weatherforecastsurl = $this->weatherforecastsurl;
		
		$city = urlencode($city);
		
        try 
          {
			$data = $this->isValidUrl( $weatherforecastsurl, $city, $unit, $nbrDays = 4, $id );
			
            $city = $data['city']['name'];

			$toDay = date('Y-m-d H:i:s');
			
			$forecasts = array();
			
            $z = 0;

			$forecasts[$z]['city'] = $city;
			
            foreach ($data['list'] as $myday)
              {
 
				if( ( abs( $toDay - strtotime( $myday['dt_txt'] ) ) > 0 ) && ( $z <= 5 ) ) {  
				  
	                $forecasts[$z]['date'] = $myday['dt_txt'];
	                $forecasts[$z]['icon'] = $myday['weather'][0]['icon'];
	                $forecasts[$z]['temp'] = $myday['main']['temp'];
				
                    $z++;
				}
				
              }

            return $forecasts;
          } 
        catch (Exception $e) 
          {
            return $this->isValidUrl( $weatherforecastsurl, $city, $unit, $nbrDays = 4, $id );
          }		  		
	}	
	

	/**
	 * This function handle the OpenWeatherMap response provided by URL.
	 *
	 * @since    2.4
	 * @param      string    $url
	 * @param      int       $nbrDays
	 * @param      string    $unit
	 * @param      string    $city    This function handle the OpenWeatherMap response provided by URL.
	 */		
	public function isValidUrl( $url, $city, $unit = 'metric', $nbrDays, $id = null ) {
		
		if( empty( $city ) ) {

			//handle the empty input location error
			throw new Exception ( 'empty' );
		}	
			
        if ( !$sock = @fsockopen('www.google.com', 80, $num, $error, 5) ) {
			
			//handle the internet connection error
			throw new Exception ( 'connect' );
		}			

		if( $id !== null ){

			$url_extension = '?id=' . $id;

		} else {

			$url_extension = '?q=' . $city;
		}
		
		$result = $url . $url_extension . '&units=' . $unit . '&cnt=' . $nbrDays . '&APPID=' . $this->appid;
	    $remote_get = wp_remote_get( $result );
		
		if( is_wp_error($remote_get) ) {
			
			throw new Exception ( 'no_response' );//openweathermap does not respond
		}
		
		$data = json_decode( $remote_get['body'], true );
		$error_code = $data['cod'];	

		if( ( $error_code == 404 )||( is_null( $data ) ) ) {

            //handle invalid city name error		
		    throw new Exception( 'notvalid' );
		}	
			
		else
			return ( $data );			
			
	}

	
}// END of the weather_Press_Fetcher class ***  Omit closing PHP tag to avoid "Headers already sent" issues.