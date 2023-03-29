<?php
class hantus_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof hantus_import_dummy_data ) ) {
			self::$instance = new hantus_import_dummy_data;
			self::$instance->hantus_setup_actions();
		}

	}

	/**
	 * Setup the class props based on the config array.
	 */
	

	/**
	 * Setup the actions used for this class.
	 */
	public function hantus_setup_actions() {

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'hantus_import_customize_scripts' ), 0 );

	}
	
	

	public function hantus_import_customize_scripts() {

	wp_enqueue_script( 'hantus-import-customizer-js', get_template_directory_uri() . '/assets/js/hantus-import-customizer.js', array( 'customize-controls' ) );
	}
}

$hantus_import_customizers = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
hantus_import_dummy_data::init( apply_filters( 'hantus_import_customizer', $hantus_import_customizers ) );