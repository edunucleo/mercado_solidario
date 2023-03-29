<?php
/**
 * hantus Theme Customizer.
 *
 * @package hantus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hantus_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_setting('custom_logo')->transport = 'refresh';	
	
	$wp_customize->add_panel(
		'hantus_frontpage_sections', array(
			'priority' => 31,
			'title' => esc_html__( 'Homepage Sections', 'hantus' ),
		)
	);
}
add_action( 'customize_register', 'hantus_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hantus_customize_preview_js() {
	wp_enqueue_script( 'hantus_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hantus_customize_preview_js' );