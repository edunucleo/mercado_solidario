<?php
/**
 * Single Blog Options Customizer Customizer
 *
 * @package OliveWP Theme
*/

function olivewp_single_blog_customizer($wp_customize) {

    $wp_customize->add_section('olivewp_single_blog_section',
        array(
            'title'     => esc_html__('Single Post', 'olivewp' ),
            'panel'     => 'olivewp_theme_panel',
            'priority'  => 2
        )
    );


    $wp_customize->add_setting('olivewp_enable_single_post_tag',
        array(
            'default'           => true,
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control($wp_customize, 'olivewp_enable_single_post_tag',
        array(
            'label'     => esc_html__('Hide/Show Tag', 'olivewp' ),
            'type'      => 'toggle',
            'section'   => 'olivewp_single_blog_section',
            'priority'  => 4
        )
    ));

    $wp_customize->add_setting('olivewp_enable_single_post_admin_details',
        array(
            'default'           => true,
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control($wp_customize, 'olivewp_enable_single_post_admin_details',
        array(
            'label'     => esc_html__('Hide/Show Author Details', 'olivewp' ),
            'type'      => 'toggle',
            'section'   => 'olivewp_single_blog_section',
            'priority'  => 5
        )
    ));

    $wp_customize->add_setting('olivewp_enable_separator',
        array(
            'default'           => true,
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control($wp_customize, 'olivewp_enable_separator',
        array(
            'label'     => esc_html__('Hide/Show Separator', 'olivewp' ),
            'type'      => 'toggle',
            'section'   => 'olivewp_single_blog_section',
            'priority'  => 6
        )
    ));


    /* ====================
    * Single Post Order 
    ==================== */
    $default = array( 'post_image','post_meta', 'post_title','post_content');
    $choices = array(
        'post_image'  => esc_html__( 'Featured Image', 'olivewp'  ),        
        'post_meta'   => esc_html__( 'Meta', 'olivewp'  ),
        'post_title'  => esc_html__( 'Title', 'olivewp'  ),
        'post_content'=> esc_html__( 'Content', 'olivewp'  ),
    );

    $wp_customize->add_setting( 'olivewp_single_post_order', 
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_array',
            'default'           => $default
        ) 
    );

    $wp_customize->add_control( new Olivewp_Control_Sortable( $wp_customize, 'olivewp_single_post_order', 
        array(
            'label'     => esc_html__( 'Single Post Order', 'olivewp'  ),
            'description' => esc_html__( 'Drag And Drop To Rearrange', 'olivewp'  ),
            'section'   => 'olivewp_single_blog_section',
            'setting'   => 'olivewp_single_post_order',
            'priority'  => 7,
            'type'      => 'sortable',
            'choices'   => $choices
        ) 
    ));

    
   /*====================
    * Meta Hide Show 
    ==================== */
    $default = array( 'single_post_date', 'single_post_category','single_post_comment');
    $choices = array(
        'single_post_date'         => esc_html__( 'Date', 'olivewp'  ),
        'single_post_category'     => esc_html__( 'Category', 'olivewp'  ),
        'single_post_comment'      => esc_html__( 'Comment', 'olivewp'  )
    );

    $wp_customize->add_setting( 'olivewp_single_post_meta_sort', 
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_array',
            'default'           => $default
        ) 
    );

    $wp_customize->add_control( new Olivewp_Control_Sortable( $wp_customize, 'olivewp_single_post_meta_sort', 
        array(
            'label'     => esc_html__( 'Meta Item Order', 'olivewp'  ),
            'description' => esc_html__( 'Drag And Drop To Rearrange', 'olivewp'  ),
            'section'   => 'olivewp_single_blog_section',
            'setting'   => 'olivewp_single_post_meta_sort',
            'priority'  => 8,
            'type'      => 'sortable',
            'choices'   => $choices
        ) 
    ));
}

add_action('customize_register', 'olivewp_single_blog_customizer');