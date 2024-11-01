<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://latitudeinnovation.com.my
 * @since      1.0.0
 *
 * @package    Web_Visitor_Counter
 * @subpackage Web_Visitor_Counter/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Web_Visitor_Counter
 * @subpackage Web_Visitor_Counter/public
 * @author     Latitude Innovation <inquiry@latitudeinnovation.com.my>
 */
class Web_Visitor_Counter_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
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
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Web_Visitor_Counter_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Web_Visitor_Counter_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/web-visitor-counter-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Web_Visitor_Counter_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Web_Visitor_Counter_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/web-visitor-counter-public.js', array( 'jquery' ), $this->version, false );

	}
    
    public function register_shortcodes() {
        add_shortcode( 'page_view', array( $this, 'read_page_view' ) );
    }
    
    public function read_page_view(){
        global $post;
        $post_id = $post->ID;
        $views = get_transient('views' . $post_id);
        
        if( !is_object( $post ) || true === $views ) return;
        
        if( function_exists( 'stats_get_csv' ) ) {
            
            $args = array(
                          'days'=>-1,
                          'post_id'=>$post_id
                          );
            $page_stats = stats_get_csv( 'postviews', $args );
            $views = $page_stats[0]['views'];
            set_transient('views' . $post_id ,$views, 60*60);
            
        }
        
        $message = '<span class="ast-page-view">Page Views:'. number_format_i18n($views).'</span>';
        
        return $message;
    }

}
