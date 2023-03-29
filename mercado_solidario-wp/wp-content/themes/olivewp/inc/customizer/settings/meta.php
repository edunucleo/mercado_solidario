<?php
/**
 * Meta Options Customizer Customizer
 *
 * @package OliveWP Theme
*/

function olivewp_blog_meta_customizer($wp_customize) {

    $wp_customize->add_section('olivewp_meta_section',
        array(
            'title'     => esc_html__('Meta', 'olivewp' ),
            'panel'     => 'olivewp_theme_panel',
            'priority'  => 3
        )
    );

    $wp_customize->add_setting('olivewp_enable_meta_icon',
        array(
            'default'           => true,
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control($wp_customize, 'olivewp_enable_meta_icon',
        array(
            'label'     => esc_html__('Hide/Show Meta Icon', 'olivewp' ),
            'type'      => 'toggle',
            'section'   => 'olivewp_meta_section',
            'priority'  => 1
        )
    ));
}
add_action('customize_register', 'olivewp_blog_meta_customizer');