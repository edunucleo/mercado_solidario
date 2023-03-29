<?php
/**
 * Blog Options Customizer
 *
 * @package OliveWP Theme
*/

function olivewp_blog_customizer ( $wp_customize ) {

	$wp_customize->add_panel('olivewp_theme_panel',
        array(
            'priority' 		=> 2,
            'capability' 	=> 'edit_theme_options',
            'title' 		=> esc_html__('Blog Options', 'olivewp' )
        )
    );

	$wp_customize->add_section('olivewp_blog_section', 
		array(
			'title' 	=> esc_html__('Blog Page' , 'olivewp' ),
			'panel' 	=> 'olivewp_theme_panel',
			'priority' 	=> 1
		)
	);


	/* ====================
	* Blog Page
	==================== */
	$wp_customize->add_setting('blog_page_title_option', 
		array(
			'default' 			=> esc_html__('Home','olivewp' ),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'olivewp_sanitize_text'
		)
	);
	$wp_customize->add_control( 'blog_page_title_option',
		array(
			'label'		=> esc_html__('Main Title','olivewp' ),
			'section'	=> 'olivewp_blog_section',
			'type' 		=> 'text',
			'priority' 	=> 1
		)
	);


	/* ====================
	* Blog Content 
	==================== */
	$wp_customize->add_setting('olivewp_blog_content', 
		array(
			'default' 			=> esc_html__('excerpt','olivewp' ),
			'sanitize_callback' => 'olivewp_sanitize_select'
		)
	);

	$wp_customize->add_control('olivewp_blog_content', 
		array(		
			'label' 	=> esc_html__('Choose Options', 'olivewp' ),		
			'section' 	=> 'olivewp_blog_section',
			'type' 		=> 'radio',
			'priority' 	=> 2,
			'choices' 	=>  
			array(
				'excerpt' 	=> esc_html__('Excerpt', 'olivewp' ),
				'content' 	=> esc_html__('Full Content', 'olivewp' )
			)
		)
	);


	/* ====================
	* Blog Length 
	==================== */
	$wp_customize->add_setting( 'olivewp_blog_content_length',
		array(
			'default'           => 30,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'olivewp_sanitize_number_range'
		)
	);
	$wp_customize->add_control( 'olivewp_blog_content_length',
		array(
			'label'       	=> esc_html__( 'Excerpt Length', 'olivewp'  ),
			'section'     	=> 'olivewp_blog_section',
			'type'        	=> 'number',
			'priority'		=> 3,
			'input_attrs' 	=> 
			array( 
				'min' => 10, 
				'max' => 200, 
				'step' => 1, 
				'style' => 'width: 200px;' 
			)
		)
	);


	/* ====================
    * Blog Post Order 
    ==================== */
    $default = array( 'blog_image','blog_meta', 'blog_title','blog_content');
    $choices = array(
        'blog_image'  => esc_html__( 'Featured Image', 'olivewp'  ),        
        'blog_meta'   => esc_html__( 'Meta', 'olivewp'  ),
        'blog_title'  => esc_html__( 'Title', 'olivewp'  ),
        'blog_content'=> esc_html__( 'Content', 'olivewp'  ),
    );

    $wp_customize->add_setting( 'olivewp_blog_post_order', 
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_array',
            'default'           => $default
        ) 
    );

    $wp_customize->add_control( new Olivewp_Control_Sortable( $wp_customize, 'olivewp_blog_post_order', 
        array(
            'label'     => esc_html__( 'Blog Post Order', 'olivewp'  ),
            'description' => esc_html__( 'Drag And Drop To Rearrange', 'olivewp'  ),
            'section'   => 'olivewp_blog_section',
            'setting'   => 'olivewp_blog_post_order',
            'priority'  => 10,
            'type'      => 'sortable',
            'choices'   => $choices
        ) 
    ));

	/* ====================
	* Blog Meta Rearrange
	==================== */

	$default = array( 'blog_date', 'blog_category','blog_comment');

	$choices = array(
        'blog_date' 		=> esc_html__( 'Date', 'olivewp'  ),
        'blog_category' 	=> esc_html__( 'Category', 'olivewp'  ),
        'blog_comment' 		=> esc_html__( 'Comment', 'olivewp'  )
    );
    
	$wp_customize->add_setting( 'olivewp_blog_meta_sort', 
	    array(
	        'capability'  		=> 'edit_theme_options',
	        'sanitize_callback' => 'olivewp_sanitize_array',
	        'default'     		=> $default
	    ) 
	);

	$wp_customize->add_control( new Olivewp_Control_Sortable( $wp_customize, 'olivewp_blog_meta_sort', 
	    array(
	        'label' 	=> esc_html__( 'Drag And Drop To Rearrange', 'olivewp'  ),
	        'section' 	=> 'olivewp_blog_section',
	        'setting' 	=> 'olivewp_blog_meta_sort',
	        'priority'	=> 10,
	        'type'		=> 'sortable',
	        'choices'   => $choices
    	) 
	));


	$wp_customize->add_setting('olivewp_plus_enable_post_read_more',
        array(
            'default'           => true,
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control($wp_customize, 'olivewp_plus_enable_post_read_more',
        array(
            'label'     => esc_html__('Hide/Show Read More', 'olivewp' ),
            'type'      => 'toggle',
            'section'   => 'olivewp_blog_section',
            'priority'  => 11
        )
    ));


    $wp_customize->add_setting('olivewp_read_more_align',
        array(
            'default'           => 'right',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control($wp_customize, 'olivewp_read_more_align',
        array(
            'label'     => esc_html__('Read More Alignment', 'olivewp' ),
            'section'   => 'olivewp_blog_section',
            'type' 		=> 'radio',
			'priority' 	=> 12,
			'active_callback' => 'olivewp_blog_readmore_callback',
			'choices' 	=>  
			array(
				'left' 	=> esc_html__('Left', 'olivewp' ),
				'right' 	=> esc_html__('Right', 'olivewp' )
			)
        )
    ));
    
}
add_action( 'customize_register', 'olivewp_blog_customizer' );