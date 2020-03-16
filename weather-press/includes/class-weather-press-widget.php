<?php
/*
---------------------------------------------------------------------------------------------------
                  THANK YOU FOR CHOOSING WEATHER PRESS
				  
				       www.weather-press.com
---------------------------------------------------------------------------------------------------
*/
/**
 * The Widget Class
 *
 * @link       https://www.weather-press.com
 * @since      2.4
 *
 * @package    weather-press
 * @subpackage weather-press/includes
 * @author     Zied Bouzidi <geagoir@gmail.com>
 */
class weather_Press_Widget extends WP_Widget {

    /**
     * @since    2.4
     *
     * @var      string
     */
    protected $widget_slug = 'weather-press';

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	 * Specifies the classname and description, instantiates the widget,
	 * loads localization files, and includes necessary stylesheets and JavaScript.
	 */
	public function __construct() {

		// load plugin text domain
		add_action( 'init', array( $this, 'widget_textdomain' ) );

		// Hooks fired when the Widget is activated and deactivated
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

		parent::__construct(

			$this->get_widget_slug(),
			__( 'weather Press', $this->get_widget_slug() ),
			array(
				'classname'  => $this->get_widget_slug().'-class',
				'description' => __( 'Change the look and feel of your website.', $this->get_widget_slug() )
			)
		);

		// Refreshing the widget's cached output with each new post
		add_action( 'save_post',    array( $this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );

	} // end constructor


    /**
     * Return the widget slug.
     *
     * @since    2.4
     *
     * @return    Plugin slug variable.
     */
    public function get_widget_slug() {

        return $this->widget_slug;
    }

	/*--------------------------------------------------*/
	/* Widget API Functions
	/*--------------------------------------------------*/

	/**
	 * Outputs the content of the widget.
	 *
	 * @param array args  The array of form elements
	 * @param array instance The current instance of the widget
	 */
	public function widget( $args, $instance ) {

		
		// Check if there is a cached output
		$cache = wp_cache_get( $this->get_widget_slug(), 'widget' );

		if ( !is_array( $cache ) )
			$cache = array();

		if ( ! isset ( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset ( $cache[ $args['widget_id'] ] ) )
			return print $cache[ $args['widget_id'] ];

		extract( $args, EXTR_SKIP );

		$widget_string = $before_widget;

		// Here is where we manipulate our widget's values based on their input fields
		ob_start();
		
		// Output the widget title
		echo '<h3>' . $instance['title'] . '</h3>';
		
		// Here we are simply using the plugin shortcode inside our widget
		echo do_shortcode( '[weather_press]' );
		
		$widget_string .= ob_get_clean();
		$widget_string .= $after_widget;

		$cache[ $args['widget_id'] ] = $widget_string;

		wp_cache_set( $this->get_widget_slug(), $cache, 'widget' );

		print $widget_string;

	} // end of widget()	
	
	public function flush_widget_cache() 
	{
    	wp_cache_delete( $this->get_widget_slug(), 'widget' );
	}
	/**
	 * Processes the widget's options to be saved.
	 *
	 * @param array new_instance The new instance of values to be generated via the update.
	 * @param array old_instance The previous instance of values before the update.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		// Here is where you update your widget's old values with the new, incoming values

		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;

	}// end widget

	/**
	 * Generates the administration form for the widget.
	 *
	 * @param array instance The array of keys and values for the widget.
	 */
	public function form( $instance ) {	
		
		$instance = wp_parse_args( (array) $instance, array( 'title' => __('') ) );

		$title = strip_tags($instance['title']);
?>
        <p>
            <a href='admin.php?page=weather-press' title="<?php _e('Settings'); ?>"><?php _e('Settings'); ?></a>
        </p>
	
	    <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
	            <?php _e('Title'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	        </label>
        </p>
<?php
	} // end form

	/*--------------------------------------------------*/
	/* Public Functions
	/*--------------------------------------------------*/

	/**
	 * Loads the Widget's text domain for localization and translation.
	 */
	public function widget_textdomain() {

		load_plugin_textdomain( $this->get_widget_slug(), false, plugin_dir_path( __FILE__ ) . 'lang/' );

	} // end widget_textdomain

}