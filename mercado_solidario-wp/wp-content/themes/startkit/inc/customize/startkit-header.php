<?php
function startkit_header_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 21,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header Section', 'startkit'),
		) 
	);

	/*=========================================
	Header search & cart Settings Section
	=========================================*/
	// Header search & cart Setting Section // 
	$wp_customize->add_section(
        'header_contact_cart',
        array(
        	'priority'      => 3,
            'title' 		=> esc_html__('Header Search','startkit'),
			'panel'  		=> 'header_section',
		)
    );
	// hide/show  search & cart settings
	$wp_customize->add_setting( 
		'cart_header_setting' , 
			array(
			'default' => esc_html__('1','startkit'),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_checkbox',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Startkit_Customizer_Toggle_Control( $wp_customize, 
	'cart_header_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'startkit' ),
			'section'     => 'header_contact_cart',
			'type'        => 'ios', // light, ios, flat
			'priority' => 2,
		) 
	));
	
	/*=========================================
	 Header booknow button Section
	=========================================*/
	$wp_customize->add_section(
        'header_booknow',
        array(
        	'priority'      => 4,
            'title' 		=> esc_html__('Button Setting','startkit'),
			'panel'  		=> 'header_section',
		)
    );
	
	// hide/show  search & cart settings
	$wp_customize->add_setting( 
		'booknow_setting' , 
			array(
			'default' => esc_html__('1','startkit'),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_checkbox',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Startkit_Customizer_Toggle_Control( $wp_customize, 
	'booknow_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'startkit' ),
			'section'     => 'header_booknow',
			'type'        => 'ios', // light, ios, flat
			'priority' => 2,
		) 
	));
	// Header button icon Setting // 
	$wp_customize->add_setting(
    	'header_btn_icon',
    	array(
	        'default'			=> esc_html__('fa-book','startkit'),
			'sanitize_callback' => 'startkit_sanitize_text',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Startkit_Customizer_Icon_Picker_Control($wp_customize,  
		'header_btn_icon',
		array(
		    'label'   => esc_html__('Button Icon','startkit'),
		    'section' => 'header_booknow',
			'iconset' => 'fa',
			'priority' => 6,
		))  
	);
	// Header button label Setting // 
	$wp_customize->add_setting(
    	'header_btn_lbl',
    	array(
			'sanitize_callback' => 'startkit_sanitize_text',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control( 
		'header_btn_lbl',
		array(
		    'label'   => esc_html__('Button label','startkit'),
		    'section' => 'header_booknow',
			'type' => 'text',
			'priority' => 7,
		)  
	);
	
	// Header button link Setting // 
	$wp_customize->add_setting(
    	'header_btn_link',
    	array(
			'sanitize_callback' => 'startkit_sanitize_url',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control( 
		'header_btn_link',
		array(
		    'label'   => esc_html__('Button link','startkit'),
		    'section' => 'header_booknow',
			'type' => 'text',
			'priority' => 8,
		)  
	);
	/*=========================================
	Sticky Header Section
	=========================================*/
	$wp_customize->add_section(
        'sticky_header',
        array(
        	'priority'      => 3,
            'title' 		=> esc_html__('Sticky Header','startkit'),
			'panel'  		=> 'header_section',
		)
    );
	
	
	$wp_customize->add_setting( 
		'sticky_header_setting' , 
			array(
			'default' =>  esc_html__('1','startkit'),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control( new Startkit_Customizer_Toggle_Control( $wp_customize, 
	'sticky_header_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'startkit' ),
			'section'     => 'sticky_header',
			'type'        => 'ios', // light, ios, flat
		) 
	));
}

add_action( 'customize_register', 'startkit_header_setting' );

// header selective refresh
function startkit_home_header_section_partials( $wp_customize ){
// hide show contact
	$wp_customize->selective_refresh->add_partial(
		'booknow_setting', array(
			'selector' => '.book-now-btn',
			'container_inclusive' => true,
			'render_callback' => 'header_booknow',
			'fallback_refresh' => true,
		)
	);
	
	// hide show cart 
	$wp_customize->selective_refresh->add_partial(
		'cart_header_setting', array(
			'selector' => '.search-cart-se',
			'container_inclusive' => true,
			'render_callback' => 'header_contact_cart',
			'fallback_refresh' => true,
		)
	);
	
	// header_search_icon
		
	$wp_customize->selective_refresh->add_partial( 'header_search', array(
		'selector'            => '#header .header-right-bar .search-button i',
		'settings'            => 'header_search',
		'render_callback'  => 'startkit_header_section_search_render_callback',
	
	) );
	
	// book now button
	$wp_customize->selective_refresh->add_partial( 'header_btn_lbl', array(
		'selector'            => '#header .header-right-bar .book-now-btn',
		'settings'            => 'header_btn_lbl',
		'render_callback'  => 'startkit_header_section_booknow_render_callback',
	
	) );
	}
add_action( 'customize_register', 'startkit_home_header_section_partials' );

// search 
function startkit_header_section_search_render_callback() {
	return get_theme_mod( 'header_search' );
}
// book now button 
function startkit_header_section_booknow_render_callback() {
	return get_theme_mod( 'header_btn_lbl' );
}
