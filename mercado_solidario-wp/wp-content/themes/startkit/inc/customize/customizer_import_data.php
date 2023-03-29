<?php
class startkit_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof startkit_import_dummy_data ) ) {
			self::$instance = new startkit_import_dummy_data;
			self::$instance->startkit_setup_actions();
		}

	}

	/**
	 * Setup the actions used for this class.
	 */
	public function startkit_setup_actions() {

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'startkit_import_customize_scripts' ), 0 );

	}
	
	

	public function startkit_import_customize_scripts() {

	wp_enqueue_script( 'startkit-import-customizer-js', get_template_directory_uri() . '/js/startkit-import-customizer.js', array( 'customize-controls' ) );
	}
}

$startkit_import_customizers = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
startkit_import_dummy_data::init( apply_filters( 'startkit_import_customizer', $startkit_import_customizers ) );