<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.weather-press.com
 * @since      2.4
 *
 * @package    Weather_Press
 * @subpackage Weather_Press/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      2.4
 * @package    Weather_Press
 * @subpackage Weather_Press/includes
 * @author     Zied Bouzidi <geagoir@gmail.com>
 */
class Weather_Press {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    2.4
	 * @access   protected
	 * @var      Weather_Press_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    2.4
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    2.4
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    2.4
	 */
	public function __construct() {

		$this->plugin_name = 'weather-press';
		$this->version = '4.7';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Weather_Press_Loader. Orchestrates the hooks of the plugin.
	 * - Weather_Press_i18n. Defines internationalization functionality.
	 * - Weather_Press_Admin. Defines all hooks for the admin area.
	 * - Weather_Press_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    2.4
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-weather-press-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-weather-press-i18n.php';
		
		/**
		 * The class responsible for defining the weather press widget.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-weather-press-widget.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-weather-press-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-weather-press-public.php';

		$this->loader = new Weather_Press_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Weather_Press_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    2.4
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Weather_Press_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    2.4
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Weather_Press_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		// Add an action link pointing to the options page.
		$plugin_basename = plugin_basename( plugin_dir_path( realpath( dirname( __FILE__ ) ) ) . $this->plugin_name . '.php' );
		$this->loader->add_filter( 'plugin_action_links_' . $plugin_basename, $plugin_admin, 'add_action_links', 10, 2 );
		
        // Add menu item
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_admin_menu' );
        
		// Save/Update our plugin options
		$this->loader->add_action( 'admin_post_weather_press_save_options', $plugin_admin, 'weather_press_save_options' );
		
		// Add the weather press fav icon to the header of the control panel
		$this->loader->add_action('admin_head-toplevel_page_weather-press', $plugin_admin, 'weather_press_add_favicon');
		
		// the weather press widget hook
		add_action( 'widgets_init', create_function( '', 'register_widget("weather_Press_Widget");' ) );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    2.4
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Weather_Press_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		
		//Ajax calls for the public-facing functionality
		$this->loader->add_action( 'wp_ajax_nopriv_weather_press_public_ajaxCalls', $plugin_public, 'weather_press_public_ajaxCalls' );
		$this->loader->add_action( 'wp_ajax_weather_press_public_ajaxCalls', $plugin_public, 'weather_press_public_ajaxCalls' );
		
		add_shortcode('weather_press', array($plugin_public, 'weather_Press_Shortcode'));

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    2.4
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     2.4
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     2.4
	 * @return    Weather_Press_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     2.4
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}