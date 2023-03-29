<?php
function hantus_breadcrumb_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Breadcrumb Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'breadcrumb_setting', 
		array(
			'priority'      => 33,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Page Breadcrumb', 'hantus'),
		) 
	);

	/*=========================================
	Background Section
	=========================================*/ 
	$wp_customize->add_section(
        'breadcrumb_design',
        array(
        	'priority'      => 1,
            'title' 		=> __('Settings','hantus'),
			'panel'  		=> 'breadcrumb_setting',
		)
    );
	
	$wp_customize->add_setting( 
		'hide_show_breadcrumb' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_checkbox',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Hantus_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide/Show breadcrumbs', 'hantus' ),
			'section'     => 'breadcrumb_design',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	
	$wp_customize->add_section(
        'breadcrumb_background',
        array(
        	'priority'      => 2,
            'title' 		=> __('Background','hantus'),
			'panel'  		=> 'breadcrumb_setting',
		)
    );
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'breadcrumb_background_setting' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/bg/breadcrumb-bg.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_url',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'breadcrumb_background_setting' ,
		array(
			'label'          => __( 'Background Image', 'hantus' ),
			'section'        => 'breadcrumb_background',
		) 
	));
	
}

add_action( 'customize_register', 'hantus_breadcrumb_setting' );

// breadcrumb selective refresh
function hantus_home_breadcrumb_section_partials( $wp_customize ){

	// hide show breadcrumb
	$wp_customize->selective_refresh->add_partial(
		'hide_show_breadcrumb', array(
			'selector' => '#breadcrumb-area',
			'container_inclusive' => true,
			'render_callback' => 'breadcrumb_design',
			'fallback_refresh' => true,
		)
	);	
	}

add_action( 'customize_register', 'hantus_home_breadcrumb_section_partials' );