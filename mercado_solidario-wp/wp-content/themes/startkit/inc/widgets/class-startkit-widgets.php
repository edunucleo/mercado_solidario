<?php
/**
 * Startkit Widgets - Loader.
 *
 * @package Startkit Widget
 * @since 1.0.0
 */

if ( ! class_exists( 'Startkit_Widgets_Loader' ) ) {

	/**
	 * Customizer Initialization
	 *
	 * @since 1.0.0
	 */
	class Startkit_Widgets_Loader {

		/**
		 * Member Variable
		 *
		 * @var instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 *  Constructor
		 */
		public function __construct() {


			// Add Widget.
			require_once get_template_directory() . '/inc/widgets/social-icons.php';
			require_once get_template_directory() . '/inc/widgets/social-widget.php';
			require_once get_template_directory() . '/inc/widgets/widget_info.php';

			 add_action( 'widgets_init', array( $this, 'register_startkit_widgets' ) );
			 add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
		}
		
		function enqueue_admin_scripts() {
			 wp_enqueue_style( 'wp-color-picker');
			 
			 
			 wp_enqueue_script( 'startkit-social-icon-widget-js', get_template_directory_uri() .'/inc/widgets/assets/js/main.js', array( 'jquery', 'jquery-ui-sortable' ) );
			 
			 wp_enqueue_style( 'startkit-social-icon-widget-css', get_template_directory_uri() . '/inc/widgets/assets/css/admin.css', false );
			 
			 wp_enqueue_style('font-awesome',get_template_directory_uri() .'/css/fonts/font-awesome/css/font-awesome.min.css');
			 
			 wp_enqueue_style( 'startkit-icon-picker-css', get_template_directory_uri() . '/inc/widgets/assets/fonticonpicker/jquery.fonticonpicker.min.css', false );
			 
			 wp_enqueue_script( 'wp-color-picker');
			 
			 wp_enqueue_script( 'startkit-icon-picker-js', get_template_directory_uri() .'/inc/widgets/assets/fonticonpicker/jquery.fonticonpicker.min.js', array( 'jquery', 'jquery-ui-sortable' ) );
		}
		
		/**
		 * Regiter List Icons widget
		 *
		 * @return void
		 */
		function register_startkit_widgets() {
			register_widget( 'startkit_social_icon_widget' );
			register_widget( 'startkit_info' );
		}
		
	}
}

/**
*  Kicking this off by calling 'get_instance()' method
*/
Startkit_Widgets_Loader::get_instance();
