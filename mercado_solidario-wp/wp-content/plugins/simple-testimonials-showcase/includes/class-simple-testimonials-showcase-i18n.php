<?php
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://presstigers.com
 * @since      1.0.0
 * 
 * @package     Simple_Testimonials_Showcase
 * @subpackage  Simple_Testimonials_Showcase/includes
 * @author      PressTigers <support@presstigers.com>
 */
class Simple_Testimonials_Showcase_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'simple-testimonials-showcase',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}