<?php
/**
 * Logo Width Customizer
 *
 * @package OliveWP Theme
*/

function olivewp_logo_width( $wp_customize )  {

    $wp_customize->add_setting( 'olivewp_logo_length',
        array(
            'default'           => 235,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'olivewp_logo_length',
        array(
            'label'         => esc_html__( 'Logo Width', 'olivewp'  ),
            'priority'      => 10,
            'section'       => 'title_tagline',
            'input_attrs'   => array(
                'min'   => 0,
                'max'   => 500,
                'step'  => 1,
            ),
        )
    ));
}

add_action('customize_register', 'olivewp_logo_width');