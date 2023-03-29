<?php
/**
 * Theme Style Customizer
 *
 * @package OliveWP Theme
*/

function olivewp_theme_style ( $wp_customize ) {

    /* ====================
    * Theme Layout 
    ==================== */
    /* Theme Style settings */
    $wp_customize->add_section( 'theme_style' , 
        array(
            'title'      => esc_html__('Theme Style Settings', 'olivewp' ),
            'priority'   => 110,
        )
    );

    /* ====================
    * Enable/disable custom color settings  
    ==================== */
    $wp_customize->add_setting('custom_color_enable', 
        array(
            'capability'        => 'edit_theme_options',
            'default'           => false,
            'sanitize_callback' => 'olivewp_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize,'custom_color_enable',
        array(
            'type'      =>  'toggle',
            'label'     =>  esc_html__('Enable custom color skin','olivewp' ),
            'section'   =>  'theme_style',
            'priority'  =>  2
        )
    ));

    
    /* ====================
    * Link color settings
    ==================== */
    $wp_customize->add_setting('link_color', 
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '#ff6f61',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'link_color', 
        array(
            'label'             => esc_html__( 'Skin Color', 'olivewp'  ),
            'active_callback'   => 'olivewp_custom_color_callback',
            'section'           => 'theme_style',
            'setting'           => 'link_color',
            'priority'          =>  3,
        ) 
    ));  


    /* ====================
    * Theme Layout 
    ==================== */
    $wp_customize->add_setting( 'olivewp_layout_style', 
        array(
            'default'           => 'wide',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_select'
        )
    );
    $wp_customize->add_control(new olivewp_Style_Layout_Control($wp_customize, 'olivewp_layout_style',
        array(
            'label'     => esc_html__('Layout style', 'olivewp'),
            'section'   => 'theme_style',
            'type'      => 'radio',
            'priority'  =>  5,
            'choices'   => array(
                'wide'  => 'wide.png',
                'boxed' => 'boxed.png'
            )
        )
    ));

}

add_action( 'customize_register', 'olivewp_theme_style' );