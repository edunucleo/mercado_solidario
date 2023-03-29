<?php
function startkit_blog_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
/*=========================================
	Blog Section Panel
	=========================================*/
		$wp_customize->add_section(
			'blog_setting', array(
				'title' => esc_html__( 'Blog Section', 'startkit' ),
				'panel' => 'startkit_frontpage_sections',
				'priority' => apply_filters( 'startkit_section_priority', 128, 'startkit_blog' ),
			)
		);
	/*=========================================
	Blog Settings Section
	=========================================*/
	// Blog Settings Section // 
	$wp_customize->add_setting( 
		'hide_show_blog' , 
			array(
			'default' => esc_html__( '1', 'startkit' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_checkbox',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Startkit_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_blog', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'startkit' ),
			'section'     => 'blog_setting',
			'type'        => 'ios', // light, ios, flat
			'priority' => 2,
		) 
	));
		// Blog Title // 
	$wp_customize->add_setting(
    	'blog_title',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'blog_title',
		array(
		    'label'   => esc_html__('Title','startkit'),
		    'section' => 'blog_setting',
			'type'           => 'text',
			'priority' => 6,
		)  
	);
	
	// Blog Subtitle // 
	$wp_customize->add_setting(
    	'blog_subttl',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'blog_subttl',
		array(
		    'label'   => __('Subtitle','startkit'),
		    'section' => 'blog_setting',
			'type'           => 'textarea',
			'priority' => 6,
		)  
	);
	
	// Blog Description // 
	$wp_customize->add_setting(
    	'blog_description',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	$wp_customize->add_control( 
		'blog_description',
		array(
		    'label'   => esc_html__('Description','startkit'),
		    'section' => 'blog_setting',
			'type'           => 'textarea',
			'priority' => 7,
		)  
	);
	// Blog Display Setting // 
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
	$wp_customize->add_setting(
    	'blog_display_num',
    	array(
	        'default'			=> '3',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 
	new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'blog_display_num', 
		array(
			'section'  => 'blog_setting',
			'label'    => __( 'Select number of Posts','startkit' ),
			'priority' => 9,
			'input_attrs' => array(
				'min'    => 1,
				'max'    => 500,
				'step'   => 1,
				//'suffix' => 'px', //optional suffix
			),
		) ) 
	);
	}
}
add_action( 'customize_register', 'startkit_blog_setting' );

// Blog selective refresh
function startkit_home_blog_section_partials( $wp_customize ){
	// hide show feature
	$wp_customize->selective_refresh->add_partial(
		'hide_show_blog', array(
			'selector' => '#recent-blog',
			'container_inclusive' => true,
			'render_callback' => 'blog_setting',
			'fallback_refresh' => true,
		)
	);
	// title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '#recent-blog .section-header h2',
		'settings'            => 'blog_title',
		'render_callback'  => 'startkit_home_section_blog_title_render_callback',
	) );
	
	// blog_subttl
	$wp_customize->selective_refresh->add_partial( 'blog_subttl', array(
		'selector'            => '#recent-blog .section-header h2',
		'settings'            => 'blog_subttl',
		'render_callback'  => 'startkit_home_section_blog_subttl_render_callback',
	) );
	
	// description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '#recent-blog .section-header p',
		'settings'            => 'blog_description',
		'render_callback'  => 'startkit_home_section_blog_desc_render_callback',
	
	) );	
	}
add_action( 'customize_register', 'startkit_home_blog_section_partials' );

// title
function startkit_home_section_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog_subttl
function startkit_home_section_blog_subttl_render_callback() {
	return get_theme_mod( 'blog_subttl' );
}

// description
function startkit_home_section_blog_desc_render_callback() {
	return get_theme_mod( 'blog_description' );
}