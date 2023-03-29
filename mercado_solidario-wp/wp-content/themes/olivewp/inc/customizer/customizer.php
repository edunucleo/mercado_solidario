<?php 
/**
 * Olivewp Customizer Controls
 *
 * @package OliveWP theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Olivewp_Customizer' ) ) :

	/**
	 * The Olivewp Customizer class
	*/
	class Olivewp_Customizer {

		/**
		 * Setup class
		*/
		public function __construct() {

			add_action( 'customize_register', 					array( $this, 'custom_controls' ) );
			add_action( 'customize_register', 					array( $this, 'controls_helpers' ) );
			add_action( 'after_setup_theme',  					array( $this, 'register_options' ) );
			add_action( 'customize_controls_enqueue_scripts', 	array( $this, 'custom_customize_enqueue' ) );

		}


		/**
		 * Adds custom controls
		*/
		public function custom_controls( $wp_customize ) {

			// Load customize control classes
			require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/controls/customizer-image-radio/customizer-image-radio.php' );
			require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/controls/customizer-slider/customizer-slider.php' );
			require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/controls/sortable/class-sortable-control.php' );
			require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/controls/toggle/class-toggle-control.php' );
			require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/controls/customizer-style-layout/customizer-style-layout.php' );

			// Register custom controls
			$wp_customize->register_control_type('Olivewp_Control_Sortable');
			$wp_customize->register_control_type('Olivewp_Toggle_Control');

		}


		/**
		 * Adds customizer helpers
		*/
		public function controls_helpers() {

			require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/sanitize-callback.php' );
			require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/active-callback.php' );
		}


		/**
		 * Adds customizer options
		*/
		public function register_options() {

			require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/settings/blog-options.php' );
			require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/settings/single-blog-options.php' );
			require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/settings/meta.php' );
			require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/settings/custom-logo-width.php' );
			require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/settings/theme-style.php' );
			require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/settings/color-background.php' );
			require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/settings/general-settings.php' );
			if ( ! function_exists( 'olivewp_plus_activate' ) ) {
				require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/settings/typography.php' );
				require_once ( OLIVEWP_TEMPLATE_DIR . '/inc/customizer/settings/pro-details.php' );
			}

		}


		/**
		 * Load scripts for customizer
		*/
		public function custom_customize_enqueue() {
			/* Enqueue the CSS files */
			wp_enqueue_style( 'olivewp-customize-css', OLIVEWP_TEMPLATE_DIR_URI .'/inc/customizer/assets/css/customize.css' );

			/* Enqueue the JS files */
			if ( ! function_exists( 'olivewp_plus_activate' ) ) {
				
				wp_enqueue_script( 'olivewp-customize-js', OLIVEWP_TEMPLATE_DIR_URI .'/inc/customizer/assets/js/customize.js', array( 'jquery' ) );
			}
		}

	}

endif;

return new olivewp_Customizer();