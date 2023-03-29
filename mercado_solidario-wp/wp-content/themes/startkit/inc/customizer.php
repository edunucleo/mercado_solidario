<?php
/**
 * startkit Theme Customizer.
 *
 * @package startkit
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function startkit_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_setting('custom_logo')->transport = 'refresh';	
}
add_action( 'customize_register', 'startkit_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function startkit_customize_preview_js() {
	wp_enqueue_script( 'startkit_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'startkit_customize_preview_js' );



/**
 * Register panels for Customizer.
 *
 * @since startkit 
 */
function startkit_customizer_register( $wp_customize ) {
	
	$wp_customize->add_panel(
		'startkit_frontpage_sections', array(
			'priority' => 22,
			'title' => esc_html__( 'Homepage Section', 'startkit' ),
		)
	);	
}
add_action( 'customize_register', 'startkit_customizer_register' );