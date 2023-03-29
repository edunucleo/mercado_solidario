<?php
function hantus_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 32,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer Section', 'hantus'),
		) 
	);

	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copyright',
        array(
            'title' 		=> __('Copyright Content','hantus'),
			'panel'  		=> 'footer_section',
		)
    );
	

	// Copyright Content Hide/Show Setting // 
	//Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hide_show_copyright' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_checkbox',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Hantus_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_copyright', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'hantus' ),
			'section'     => 'footer_copyright',
			'type'        => 'ios', // light, ios, flat
			'priority' => 2,
		) 
	));

	// Copyright Content Setting //
	$hantus_copyright = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'hantus' );	
	$wp_customize->add_setting(
    	'copyright_content',
    	array(
			'default'			=> $hantus_copyright,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_html',
		)
	);	

	$wp_customize->add_control( 
		'copyright_content',
		array(
		    'label'   		=> __('Copyright Content','hantus'),
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
            'title' 		=> __('Payment Icon','hantus'),
			'panel'  		=> 'footer_section',
		)
    );
	

	// Payment Icon Hide/Show Setting // 
	$wp_customize->add_setting( 
		'hide_show_payment' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_checkbox',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Hantus_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_payment', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'hantus' ),
			'section'     => 'footer_icon',
			'settings'    => 'hide_show_payment',
			'type'        => 'ios', // light, ios, flat
			'priority' => 2,
		) 
	));

	/**
	 * Customizer Repeater for add payment icon
	 */
		$wp_customize->add_setting( 'footer_Payment_icon', 
			array(
			 'sanitize_callback' => 'hantus_repeater_sanitize',
			)
		);
		
		$wp_customize->add_control( 
			new hantus_Repeater( $wp_customize, 
				'footer_Payment_icon', 
					array(
						'label'   => esc_html__('Payment Icon','hantus'),
						'section' => 'footer_icon',
						'add_field_label'                   => esc_html__( 'Add New Icon', 'hantus' ),
						'item_name'                         => esc_html__( 'Icon', 'hantus' ),
						'priority' => 6,
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);

	// Footer Background Section // 
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_bg',
        array(
            'title' 		=> __('Background','hantus'),
			'panel'  		=> 'footer_section',
		)
    );
	// Background Image // 
    $wp_customize->add_setting( 
    	'footer_background_setting' , 
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_url',
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'footer_background_setting' ,
		array(
			'label'          => __( 'Background Image', 'hantus' ),
			'section'        => 'footer_bg',
		) 
	));
}

add_action( 'customize_register', 'hantus_footer' );

// footer selective refresh
function hantus_home_footer_section_partials( $wp_customize ){
	
	// hide_show_copyright
	$wp_customize->selective_refresh->add_partial(
		'hide_show_copyright', array(
			'selector' => '#footer-copyright .copy-content',
			'container_inclusive' => true,
			'render_callback' => 'footer_copyright',
			'fallback_refresh' => true,
		)
	);
	// hide_show_payment
	$wp_customize->selective_refresh->add_partial(
		'hide_show_payment', array(
			'selector' => '#footer-copyright .payment-method',
			'container_inclusive' => true,
			'render_callback' => 'footer_icon',
			'fallback_refresh' => true,
		)
	);
	
	// copyright_content
	$wp_customize->selective_refresh->add_partial( 'copyright_content', array(
		'selector'            => '.copyright-text .copy-content a',
		'settings'            => 'copyright_content',
		'render_callback'  => 'hantus_section_copyright_render_callback',
	
	) );
	
	}

add_action( 'customize_register', 'hantus_home_footer_section_partials' );

// social icons
function hantus_section_copyright_render_callback() {
	return get_theme_mod( 'copyright_content' );
}
