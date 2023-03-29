<?php
function startkit_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 24,
			'capability'    => 'edit_theme_options',
			'title'			=> esc_html__('Footer Section', 'startkit'),
		) 
	);
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copyright',
        array(
            'title' 		=> esc_html__('Copyright Content','startkit'),
			'panel'  		=> 'footer_section',
		)
    );

	// Copyright Content Hide/Show Setting // 
	// Team Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hide_show_copyright' , 
			array(
			'default' => esc_html__('1','startkit'),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_checkbox',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Startkit_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_copyright', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'startkit' ),
			'section'     => 'footer_copyright',
			'type'        => 'ios', // light, ios, flat
			'priority' => 2,
		) 
	));

	// Copyright Content Setting // 
	$startkit_footer_copyright = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'startkit' );
	$wp_customize->add_setting(
    	'copyright_content',
    	array(
			'default'     	=> $startkit_footer_copyright,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
		)
	);	

	$wp_customize->add_control( 
		'copyright_content',
		array(
		    'label'   		=> esc_html__('Copyright Content','startkit'),
		    'section'		=> 'footer_copyright',
			'type' 			=> 'textarea',
			'priority' => 6,
		)  
	);	
	/*=========================================
	Footer Payment Icon Section
	=========================================*/
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_icon',
        array(
            'title' 		=> esc_html__('Payment Icon','startkit'),
			'panel'  		=> 'footer_section',
		)
    );
	
	// Payment Icon Hide/Show Setting // 
	$wp_customize->add_setting( 
		'hide_show_payment' , 
			array(
			'default' => esc_html__('1','startkit'),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_checkbox',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Startkit_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_payment', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'startkit' ),
			'section'     => 'footer_icon',
			'type'        => 'ios', // light, ios, flat
			'priority'	  => 2,
		) 
	));

	/**
	 * Customizer Repeater for add payment icon
	 */
		$wp_customize->add_setting( 'footer_Payment_icon', 
			array(
			 'sanitize_callback' => 'startkit_repeater_sanitize',
			)
		);
		
		$wp_customize->add_control( 
			new Startkit_Repeater( $wp_customize, 
				'footer_Payment_icon', 
					array(
						'label'   => esc_html__('Payment Icon','startkit'),
						'section' => 'footer_icon',
						'add_field_label'                   => esc_html__( 'Add New Icon', 'startkit' ),
						'item_name'                         => esc_html__( 'Icon', 'startkit' ),
						'priority' => 6,
						
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
}
add_action( 'customize_register', 'startkit_footer' );

// footer selective refresh
function startkit_home_footer_section_partials( $wp_customize ){
	// hide show copyright
	$wp_customize->selective_refresh->add_partial(
		'hide_show_copyright', array(
			'selector' => '#footer-copyright p',
			'container_inclusive' => true,
			'render_callback' => 'footer_copyright',
			'fallback_refresh' => true,
		)
	);
	// hide show paymenet icon
	$wp_customize->selective_refresh->add_partial(
		'hide_show_payment', array(
			'selector' => '#footer-copyright .payment-icon',
			'container_inclusive' => true,
			'render_callback' => 'footer_icon',
			'fallback_refresh' => true,
		)
	);
	// copyright_content
	$wp_customize->selective_refresh->add_partial( 'copyright_content', array(
		'selector'            => '#footer-copyright p ',
		'settings'            => 'copyright_content',
		'render_callback'  => 'startkit_home_section_copyright_render_callback',
	
	) );
	}
add_action( 'customize_register', 'startkit_home_footer_section_partials' );

// social icons
function startkit_home_section_copyright_render_callback() {
	return get_theme_mod( 'copyright_content' );
}