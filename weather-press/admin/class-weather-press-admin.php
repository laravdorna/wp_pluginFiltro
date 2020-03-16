<?php
/*
---------------------------------------------------------------------------------------------------
                  THANK YOU FOR CHOOSING WEATHER PRESS
				  
				       www.weather-press.com
---------------------------------------------------------------------------------------------------

    Please Note that Exceptions are thrown by  short name code  in order to handle translation

----------------------------------------------------------------------------------------------------
*/
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.weather-press.com
 * @since      2.4
 *
 * @package    Weather_Press
 * @subpackage Weather_Press/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Weather_Press
 * @subpackage Weather_Press/admin
 * @author     Zied Bouzidi <geagoir@gmail.com>
 */
class Weather_Press_Admin {

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
	 * the returned country name is a two letter code, so we need this table to provide the full country name.
	 *
	 * @since    8.1
	 * @access   private
	 * @var      string    $countryTab    the returned country name is a two letter code, so we need this table to provide the full country name.
	 */	
    private $countryTab;	
	
	/**
	 * The current language.
	 *
	 * @since    2.4
	 * @access   public
	 * @var      string    $weather_press_current_Language    The current language of this plugin.
	 */	
	public $weather_press_current_Language;

	/**
	 * The current temperature unit.
	 *
	 * @since    2.4
	 * @access   public
	 * @var      string    $weather_press_current_Unit    The current temperature unit of this plugin.
	 */	
	public $weather_press_current_Unit;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.4
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */	 
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

        $this->countryTab = array(

               'AF' => 'Afghanistan',
               'AX' => 'Åland Islands',
               'AL' => 'Albania',
               'DZ' => 'Algeria',
               'AS' => 'American Samoa',
               'AD' => 'Andorra',
               'AO' => 'Angola',
               'AI' => 'Anguilla',
               'AQ' => 'Antarctica',
               'AG' => 'Antigua and Barbuda',
               'AR' => 'Argentina',
               'AU' => 'Australia',
               'AT' => 'Austria',
               'AZ' => 'Azerbaijan',
               'BS' => 'Bahamas',
               'BH' => 'Bahrain',
               'BD' => 'Bangladesh',
               'BB' => 'Barbados',
               'BY' => 'Belarus',
               'BE' => 'Belgium',
               'BZ' => 'Belize',
               'BJ' => 'Benin',
               'BM' => 'Bermuda',
               'BT' => 'Bhutan',
               'BO' => 'Bolivia',
               'BA' => 'Bosnia and Herzegovina',
               'BW' => 'Botswana',
               'BV' => 'Bouvet Island',
               'BR' => 'Brazil',
               'IO' => 'British Indian Ocean Territory',
               'BN' => 'Brunei Darussalam',
               'BG' => 'Bulgaria',
               'BF' => 'Burkina Faso',
               'BI' => 'Burundi',
               'KH' => 'Cambodia',
               'CM' => 'Cameroon',
               'CA' => 'Canada',
               'CV' => 'Cape Verde',
               'KY' => 'Cayman Islands',
               'CF' => 'Central African Republic',
               'TD' => 'Chad',
               'CL' => 'Chile',
               'CN' => 'China',
               'CX' => 'Christmas Island',
               'CC' => 'Cocos (Keeling) Islands',
               'CO' => 'Colombia',
               'KM' => 'Comoros',
               'CG' => 'Congo',
               'CD' => 'Zaire',
               'CK' => 'Cook Islands',
               'CR' => 'Costa Rica',
               'CI' => 'Côte D\'Ivoire',
               'HR' => 'Croatia',
               'CU' => 'Cuba',
               'CY' => 'Cyprus',
               'CZ' => 'Czech Republic',
               'DK' => 'Denmark',
               'DJ' => 'Djibouti',
               'DM' => 'Dominica',
               'DO' => 'Dominican Republic',
               'EC' => 'Ecuador',
               'EG' => 'Egypt',
               'SV' => 'El Salvador',
               'GQ' => 'Equatorial Guinea',
               'ER' => 'Eritrea',
               'EE' => 'Estonia',
               'ET' => 'Ethiopia',
               'FK' => 'Falkland Islands (Malvinas)',
               'FO' => 'Faroe Islands',
               'FJ' => 'Fiji',
               'FI' => 'Finland',
               'FR' => 'France',
               'GF' => 'French Guiana',
               'PF' => 'French Polynesia',
               'TF' => 'French Southern Territories',
               'GA' => 'Gabon',
               'GM' => 'Gambia',
               'GE' => 'Georgia',
               'DE' => 'Germany',
               'GH' => 'Ghana',
               'GI' => 'Gibraltar',
               'GR' => 'Greece',
               'GL' => 'Greenland',
               'GD' => 'Grenada',
               'GP' => 'Guadeloupe',
               'GU' => 'Guam',
               'GT' => 'Guatemala',
               'GG' => 'Guernsey',
               'GN' => 'Guinea',
               'GW' => 'Guinea-Bissau',
               'GY' => 'Guyana',
               'HT' => 'Haiti',
               'HM' => 'Heard Island and Mcdonald Islands',
               'VA' => 'Vatican City State',
               'HN' => 'Honduras',
               'HK' => 'Hong Kong',
               'HU' => 'Hungary',
               'IS' => 'Iceland',
               'IN' => 'India',
               'ID' => 'Indonesia',
               'IR' => 'Iran, Islamic Republic of',
               'IQ' => 'Iraq',
               'IE' => 'Ireland',
               'IM' => 'Isle of Man',
               'IT' => 'Italy',
               'JM' => 'Jamaica',
               'JP' => 'Japan',
               'JE' => 'Jersey',
               'JO' => 'Jordan',
               'KZ' => 'Kazakhstan',
               'KE' => 'KENYA',
               'KI' => 'Kiribati',
               'KP' => 'Korea, Democratic People\'s Republic of',
               'KR' => 'Korea, Republic of',
               'KW' => 'Kuwait',
               'KG' => 'Kyrgyzstan',
               'LA' => 'Lao People\'s Democratic Republic',
               'LV' => 'Latvia',
               'LB' => 'Lebanon',
               'LS' => 'Lesotho',
               'LR' => 'Liberia',
               'LY' => 'Libyan Arab Jamahiriya',
               'LI' => 'Liechtenstein',
               'LT' => 'Lithuania',
               'LU' => 'Luxembourg',
               'MO' => 'Macao',
               'MK' => 'Macedonia, the Former Yugoslav Republic of',
               'MG' => 'Madagascar',
               'MW' => 'Malawi',
               'MY' => 'Malaysia',
               'MV' => 'Maldives',
               'ML' => 'Mali',
               'MT' => 'Malta',
               'MH' => 'Marshall Islands',
               'MQ' => 'Martinique',
               'MR' => 'Mauritania',
               'MU' => 'Mauritius',
               'YT' => 'Mayotte',
               'MX' => 'Mexico',
               'FM' => 'Micronesia, Federated States of',
               'MD' => 'Moldova, Republic of',
               'MC' => 'Monaco',
               'MN' => 'Mongolia',
               'ME' => 'Montenegro',
               'MS' => 'Montserrat',
               'MA' => 'Morocco',
               'MZ' => 'Mozambique',
               'MM' => 'Myanmar',
               'NA' => 'Namibia',
               'NR' => 'Nauru',
               'NP' => 'Nepal',
               'NL' => 'Netherlands',
               'AN' => 'Netherlands Antilles',
               'NC' => 'New Caledonia',
               'NZ' => 'New Zealand',
               'NI' => 'Nicaragua',
               'NE' => 'Niger',
               'NG' => 'Nigeria',
               'NU' => 'Niue',
               'NF' => 'Norfolk Island',
               'MP' => 'Northern Mariana Islands',
               'NO' => 'Norway',
               'OM' => 'Oman',
               'PK' => 'Pakistan',
               'PW' => 'Palau',
               'PS' => 'Palestinian Territory, Occupied',
               'PA' => 'Panama',
               'PG' => 'Papua New Guinea',
               'PY' => 'Paraguay',
               'PE' => 'Peru',
               'PH' => 'Philippines',
               'PN' => 'Pitcairn',
               'PL' => 'Poland',
               'PT' => 'Portugal',
               'PR' => 'Puerto Rico',
               'QA' => 'Qatar',
               'RE' => 'Réunion',
               'RO' => 'Romania',
               'RU' => 'Russian Federation',
               'RW' => 'Rwanda',
               'SH' => 'Saint Helena',
               'KN' => 'Saint Kitts and Nevis',
               'LC' => 'Saint Lucia',
               'PM' => 'Saint Pierre and Miquelon',
               'VC' => 'Saint Vincent and the Grenadines',
               'WS' => 'Samoa',
               'SM' => 'San Marino',
               'ST' => 'Sao Tome and Principe',
               'SA' => 'Saudi Arabia',
               'SN' => 'Senegal',
               'RS' => 'Serbia',
               'SC' => 'Seychelles',
               'SL' => 'Sierra Leone',
               'SG' => 'Singapore',
               'SK' => 'Slovakia',
               'SI' => 'Slovenia',
               'SB' => 'Solomon Islands',
               'SO' => 'Somalia',
               'ZA' => 'South Africa',
               'GS' => 'South Georgia and the South Sandwich Islands',
               'ES' => 'Spain',
               'LK' => 'Sri Lanka',
               'SD' => 'Sudan',
               'SR' => 'Suriname',
               'SJ' => 'Svalbard and Jan Mayen',
               'SZ' => 'Swaziland',
               'SE' => 'Sweden',
               'CH' => 'Switzerland',
               'SY' => 'Syrian Arab Republic',
               'TW' => 'Taiwan, Province of China',
               'TJ' => 'Tajikistan',
               'TZ' => 'Tanzania, United Republic of',
               'TH' => 'Thailand',
               'TL' => 'Timor-Leste',
               'TG' => 'Togo',
               'TK' => 'Tokelau',
               'TO' => 'Tonga',
               'TT' => 'Trinidad and Tobago',
               'TN' => 'Tunisia',
               'TR' => 'Turkey',
               'TM' => 'Turkmenistan',
               'TC' => 'Turks and Caicos Islands',
               'TV' => 'Tuvalu',
               'UG' => 'Uganda',
               'UA' => 'Ukraine',
               'AE' => 'United Arab Emirates',
               'GB' => 'United Kingdom',
               'US' => 'United States',
               'UM' => 'United States Minor Outlying Islands',
               'UY' => 'Uruguay',
               'UZ' => 'Uzbekistan',
               'VU' => 'Vanuatu',
               'VE' => 'Venezuela',
               'VN' => 'Viet Nam',
               'VG' => 'Virgin Islands, British',
               'VI' => 'Virgin Islands, U.S.',
               'WF' => 'Wallis and Futuna',
               'EH' => 'Western Sahara',
               'YE' => 'Yemen',
               'ZM' => 'Zambia',
               'ZW' => 'Zimbabwe',
            );
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    2.4
	 */
	public function enqueue_styles() {

		/**
		 * An instance of this class should be passed to the run() function
		 * defined in Weather_Press_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Weather_Press_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/weather-press-admin-min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    2.4
	 */
	public function enqueue_scripts() {

		/**
		 * An instance of this class should be passed to the run() function
		 * defined in Weather_Press_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Weather_Press_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/weather-press-admin-min.js', array( 'jquery' ), $this->version, false );


	}
	
    public function add_plugin_admin_menu() {

    /*
     * Add a settings page for this plugin to the Settings menu.
     *
     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
     *
     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
     *
     */
	
	    add_menu_page('Weather Press Premium Control Panel', 'Weather Press', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'), plugin_dir_url( __FILE__ ) . 'images/weather-press-admin-icon.svg', 69);
}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    2.4
	 *
	 */	 
	public function add_action_links( $links ) {
		
		return array_merge(
			array(
				'settings'   => '<a href="' . admin_url( 'admin.php?page=' . $this->plugin_name ) . '">' . __( 'Settings', $this->plugin_name ) . '</a>',
				'go premium' => '<a href="https://www.weather-press.com/weather-press-store.php" target="_blank">' . __( 'Premium version', $this->plugin_name ) . '</a>'
			),
			$links
		);

	}

	/**
	 * Add the weather press fav icon to the header of the control panel.
	 *
	 * @since    2.4
	 *
	 */	 
	public function weather_press_add_favicon() {
		
		echo '<link rel="shortcut icon" href="'. plugin_dir_url( __FILE__ ) . 'images/favicon.png" type="image/vnd.microsoft.icon"/>';
		
		echo '<link rel="icon" href="'. plugin_dir_url( __FILE__ ) . 'images/favicon.png" type="image/x-ico"/>';

	}

	/**
	 * The administrator control panel.
	 *
	 * @since    2.4
	 */	
    public function display_plugin_setup_page() {
	
        $weather_press_Translation = array();
	
	    require_once plugin_dir_path( dirname( __FILE__ ) )  . 'includes/class-weather-press-translator.php';

	    $weather_press_current_Language = get_option('weather_press_lang');
		$weather_press_current_Unit     = get_option('weather_press_unit');

	    $weather_press_Translation_Object = new Weather_Press_Translator( $weather_press_current_Language );
	    $weather_press_Translation = $weather_press_Translation_Object->weather_press_returned_Translation;

		//read weather press ads

		$weather_press_ads_1 = array();
		$weather_press_ads_2 = array();
		$weather_press_ads_3 = array();

		$weather_press_ads_XML = new DOMDocument('1.0', "UTF-8");
		if ( @$weather_press_ads_XML->load( 'https://drive.google.com/uc?id=0B3MRVuLsCZ-NZXVTSThmN25PaE0' ) ) {
			
            $weather_press_ads_XML->preserveWhiteSpace = false;			
            $weather_press_ads_XML->formatOutput = true;
			
		    $weather_press_ads_xpath = new DOMXPath( $weather_press_ads_XML );
		
		    $weather_press_ads_1['red'] = $weather_press_ads_xpath->query( "//ad1/red" )->item(0)->nodeValue;
		    $weather_press_ads_1['link'] = $weather_press_ads_xpath->query( "//ad1/link" )->item(0)->nodeValue;
		    $weather_press_ads_1['title1'] = $weather_press_ads_xpath->query( "//ad1/title1" )->item(0)->nodeValue;
		    $weather_press_ads_1['title2'] = $weather_press_ads_xpath->query( "//ad1/title2" )->item(0)->nodeValue;
		    $weather_press_ads_1['description'] = $weather_press_ads_xpath->query( "//ad1/description" )->item(0)->nodeValue;
			
		    $weather_press_ads_2['red'] = $weather_press_ads_xpath->query( "//ad2/red" )->item(0)->nodeValue;
		    $weather_press_ads_2['link'] = $weather_press_ads_xpath->query( "//ad2/link" )->item(0)->nodeValue;			
		    $weather_press_ads_2['title1'] = $weather_press_ads_xpath->query( "//ad2/title1" )->item(0)->nodeValue;
		    $weather_press_ads_2['title2'] = $weather_press_ads_xpath->query( "//ad2/title2" )->item(0)->nodeValue;
		    $weather_press_ads_2['description'] = $weather_press_ads_xpath->query( "//ad2/description" )->item(0)->nodeValue;

		    $weather_press_ads_3['red'] = $weather_press_ads_xpath->query( "//ad3/red" )->item(0)->nodeValue;
		    $weather_press_ads_3['link'] = $weather_press_ads_xpath->query( "//ad3/link" )->item(0)->nodeValue;			
		    $weather_press_ads_3['title1'] = $weather_press_ads_xpath->query( "//ad3/title1" )->item(0)->nodeValue;
		    $weather_press_ads_3['title2'] = $weather_press_ads_xpath->query( "//ad3/title2" )->item(0)->nodeValue;
		    $weather_press_ads_3['description'] = $weather_press_ads_xpath->query( "//ad3/description" )->item(0)->nodeValue;			
			
		 } else {
			 
		    $weather_press_ads_1['red'] = 'no';
		    $weather_press_ads_1['link'] = '#';
		    $weather_press_ads_1['title1'] = '';
		    $weather_press_ads_1['title2'] = '';
		    $weather_press_ads_1['description'] = '';

		    $weather_press_ads_2['red'] = 'internet';
			$weather_press_ads_2['link'] = '#';
		    $weather_press_ads_2['title1'] = '';
		    $weather_press_ads_2['title2'] = '';
		    $weather_press_ads_2['description'] = '';

		    $weather_press_ads_3['red'] = '!';
			$weather_press_ads_3['link'] = '#';
		    $weather_press_ads_3['title1'] = '';
		    $weather_press_ads_3['title2'] = '';
		    $weather_press_ads_3['description'] = '';			
		 }
		
	    $weather_Press_Plugin_Path = plugins_url();
	    include_once( 'partials/weather-press-admin-display.php' );

    }

	/**
	 *
	 * Saving data, handle translated errors messages and redirection.
	 *
	 * no xml @since    4.7
	 *
	 */	
    public function weather_press_save_options() {

	    try {

/***********************************************************************

                        Security check using wordpress nonce

************************************************************************/		  
		  $retrieved_nonce = $_REQUEST['_wpnonce'];
		  
          if ( !wp_verify_nonce($retrieved_nonce, 'weather_press_form_nonce' ) ) {
			  
			  throw new Exception ('nonce');
		  }
/***********************************************************************

                        Language

************************************************************************/		  

	    $Getlanguage = $_REQUEST['language'];
		update_option('weather_press_lang', $Getlanguage);

/***********************************************************************

                        locations

************************************************************************/
        if( ( isset( $_REQUEST['weather_press_main_location'] ) ) && ( !empty( $_REQUEST['weather_press_main_location'] ) ) ) {

			require_once ABSPATH . 'wp-content/plugins/weather-press/includes/class-weather-press-fetcher.php';

			$Getmainlocation_id    =  sanitize_text_field( $_REQUEST['weather_press_main_location'] );
			$weather_press_Fetcher = new weather_Press_Fetcher();

			$weather_data = $weather_press_Fetcher->isValidUrl( 'http://api.openweathermap.org/data/2.5/weather', 'tunis', 'metric', 1, $Getmainlocation_id );
			$countryTab   = $this->countryTab;

			$main_location_array [0]['country_name']  = isset( $countryTab[ $weather_data['sys']['country'] ] ) ? $countryTab[ $weather_data['sys']['country'] ] : $weather_data['sys']['country'];
			$main_location_array [0]['city_name']     = $weather_data['name'];
			$main_location_array [0]['location_id']   = $Getmainlocation_id;

			update_option('weather_press_mainLocation', json_encode( $main_location_array ));
		}

        if( ( isset( $_REQUEST['weather_press_secondary_location'] ) ) && ( !empty( $_REQUEST['weather_press_secondary_location'] ) ) ) {

			require_once ABSPATH . 'wp-content/plugins/weather-press/includes/class-weather-press-fetcher.php';

			$Getsecondarylocation_id =  sanitize_text_field( $_REQUEST['weather_press_secondary_location'] );
			$weather_press_Fetcher   = new weather_Press_Fetcher();

			$weather_data = $weather_press_Fetcher->isValidUrl( 'http://api.openweathermap.org/data/2.5/weather', 'tunis', 'metric', 1, $Getsecondarylocation_id );
			$countryTab   = $this->countryTab;

			$secondary_location_array [0]['country_name']  = isset( $countryTab[ $weather_data['sys']['country'] ] ) ? $countryTab[ $weather_data['sys']['country'] ] : $weather_data['sys']['country'];
			$secondary_location_array [0]['city_name']     = $weather_data['name'];
			$secondary_location_array [0]['location_id']   = $Getsecondarylocation_id;

			update_option('weather_press_secondary_location', json_encode( $secondary_location_array ));
		}

/***********************************************************************

                        Unit

************************************************************************/

	    $radio_value = $_REQUEST['unit'];
		if( $radio_value != get_option('weather_press_unit') ){

			global $wpdb;
			//delete old weather press transients from the database
			$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->prefix}options WHERE option_name LIKE %s", '%_weather_press_%' ) );
		}

		update_option('weather_press_unit', $radio_value);

	// This treatment is needed to give us your website url in order to check how you did use weather press and help us to improve weather press for you
    // If you just don't want to help us with that, delete the next lines until ' END DELETE HERE '

	$not_Sent_Urls = array( '127.0.0.1', '::1' );

	$weather_press_where = get_option('weather_press_where');
	$weather_press_newUser = 'empty';
	@$weather_press_newUser = get_option( 'admin_email' );

	if( ( $weather_press_where == 0 ) && ( !in_array( $_SERVER['REMOTE_ADDR'], $not_Sent_Urls ) ) ) {

		@wp_mail( 'geagoir@gmail.com', 'New Free weather press user website url ( Free V 4.7 ) : ', get_site_url(). ' FROM : ' .$weather_press_newUser );

		update_option('weather_press_where', '1');

	}// END DELETE HERE	

/***********************************************************************

 Saving data and Redirection *** Enregistrement des donnees et redirection   

************************************************************************/

	        wp_redirect( admin_url( 'admin.php?page=weather-press&status=ok&response=empty' ) );

	    } catch( Exception $e ) {

	        wp_redirect( admin_url( 'admin.php?page=weather-press&status=error&response=' . $e->getMessage() ) );

	    }

    } // end of weather_press_save_options()
 
} // End of the Class