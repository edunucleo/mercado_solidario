<?php
function hantus_header_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 30,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header Section', 'hantus'),
		) 
	);
	
	/*=========================================
	Header search 
	=========================================*/
	// Header search & cart Setting Section // 
	$wp_customize->add_section(
        'header_contact_cart',
        array(
        	'priority'      => 3,
            'title' 		=> __('Header Search','hantus'),
			'panel'  		=> 'header_section',
		)
    );
	// hide/show  search settings
	$wp_customize->add_setting( 
		'search_header_setting' , 
			array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_checkbox',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Hantus_Customizer_Toggle_Control( $wp_customize, 
	'search_header_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'hantus' ),
			'section'     => 'header_contact_cart',
			'type'        => 'ios', // light, ios, flat
			'priority' => 2,
		) 
	));
	// Header search Setting // 
	$wp_customize->add_setting(
    	'header_search',
    	array(
			'sanitize_callback' => 'hantus_sanitize_select_icon',
			'capability' => 'edit_theme_options',
			'priority' => 4,
		)
	);	

	$wp_customize->add_control(new Hantus_Icon_Picker_Control($wp_customize, 
		'header_search',
		array(
		    'label'   => __('Search Icon','hantus'),
		    'section' => 'header_contact_cart',
			'iconset' => 'fa',
		) ) 
	);
	
	/*=========================================
	Header contact 
	=========================================*/
	$wp_customize->add_section(
        'header_menu_contact',
        array(
        	'priority'      => 3,
            'title' 		=> __('Header Contact','hantus'),
			'panel'  		=> 'header_section',
		)
    );
	
	// hide/show 
	$wp_customize->add_setting( 
		'menu_contact_hs' , 
			array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_checkbox',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Hantus_Customizer_Toggle_Control( $wp_customize, 
	'menu_contact_hs', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'hantus' ),
			'section'     => 'header_menu_contact',
			'type'        => 'ios', // light, ios, flat
			'priority' => 2,
		) 
	));
	
	// Icon // 
	$wp_customize->add_setting(
    	'menu_contact_icon',
    	array(
			'sanitize_callback' => 'hantus_sanitize_select_icon',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Hantus_Icon_Picker_Control($wp_customize, 
		'menu_contact_icon',
		array(
		    'label'   => __('Icon','hantus'),
		    'section' => 'header_menu_contact',
			'iconset' => 'fa',
			'priority' => 4,
		) ) 
	);
	// Title // 
	$wp_customize->add_setting(
    	'menu_contact_title',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_html'
		)
	);	
	
	$wp_customize->add_control( 
		'menu_contact_title',
		array(
		    'label'   => __('Title','hantus'),
		    'section' => 'header_menu_contact',
			'type'           => 'text',
			'priority' => 5,
		)  
	);
	
	// Subtitle // 
	$wp_customize->add_setting(
    	'menu_contact_subtitle',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_html',
		)
	);	
	
	$wp_customize->add_control( 
		'menu_contact_subtitle',
		array(
		    'label'   => __('Subtitle','hantus'),
		    'section' => 'header_menu_contact',
			'type'           => 'text',
			'priority' => 6,
		)  
	);
	
	// Link // 
	$wp_customize->add_setting(
    	'menu_contact_link',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_url',
		)
	);	
	
	$wp_customize->add_control( 
		'menu_contact_link',
		array(
		    'label'   => __('Link','hantus'),
		    'section' => 'header_menu_contact',
			'type'           => 'text',
			'priority' => 7,
		)  
	);
	/*=========================================
	Sticky Header Section
	=========================================*/
	$wp_customize->add_section(
        'sticky_header',
        array(
        	'priority'      => 3,
            'title' 		=> __('Sticky Header','hantus'),
			'panel'  		=> 'header_section',
		)
    );
	
	
	$wp_customize->add_setting( 
		'sticky_header_setting' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control( new Hantus_Customizer_Toggle_Control( $wp_customize, 
	'sticky_header_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'hantus' ),
			'section'     => 'sticky_header',
			'type'        => 'ios', // light, ios, flat
		) 
	));
}
add_action( 'customize_register', 'hantus_header_setting' );

// header selective refresh
function hantus_home_header_section_partials( $wp_customize ){
	
	// search_header_setting
	$wp_customize->selective_refresh->add_partial(
		'search_header_setting', array(
			'selector' => '#sb-search',
			'container_inclusive' => true,
			'render_callback' => 'header_contact_cart',
			'fallback_refresh' => true,
		)
	);
	
	// menu_contact_hs
	$wp_customize->selective_refresh->add_partial(
		'menu_contact_hs', array(
			'selector' => '.header-info-bg',
			'container_inclusive' => true,
			'render_callback' => 'header_menu_contact',
			'fallback_refresh' => true,
		)
	);
	}

add_action( 'customize_register', 'hantus_home_header_section_partials' );
