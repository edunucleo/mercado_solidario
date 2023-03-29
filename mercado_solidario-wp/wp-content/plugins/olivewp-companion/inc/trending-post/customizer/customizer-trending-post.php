<?php
/**
 * Customizer Trending Post
 *
 * @package OliveWP Companion
*/

add_action( 'customize_register', 'olivewp_companion_customizer_trending_post' );

if(!function_exists('olivewp_companion_customizer_trending_post')){

    function olivewp_companion_customizer_trending_post( $wp_customize ) {
        $wp_customize->add_panel('customizer_trending_post_panel',
            array(
                'priority'      => 1100,
                'title'         => esc_html__('Trending Posts', 'olivewp-companion' )
            )   
        );
        $wp_customize->add_section('customizer_trending_post_general',
            array(
                'priority'      => 1,
                'panel'     => 'customizer_trending_post_panel',
                'title'         => esc_html__('General', 'olivewp-companion' )
            )   
        );

    //Title
        $wp_customize->add_setting('customizer_trending_post_title', 
            array(
                'default'           => esc_html__('Trending Now','olivewp-companion' ),
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'olivewp_companion_sanitize_text'
            )
        );
        $wp_customize->add_control( 'customizer_trending_post_title',
            array(
                'label'     => esc_html__('Title','olivewp-companion' ),
                'section'   => 'customizer_trending_post_general',
                'type'      => 'text',
                'priority'  => 1
            )
        );

    //Title Tag
        $wp_customize->add_setting('customizer_trending_post_tag', 
            array(
                'default'           => 'h4',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'olivewp_companion_sanitize_select'
            )
        );
        $wp_customize->add_control( 'customizer_trending_post_tag',
            array(
                'label'     => esc_html__('Title Tag','olivewp-companion' ),
                'section'   => 'customizer_trending_post_general',
                'type'      => 'select',
                'priority'  => 2,
                'choices'   =>  
                array(
                    'h1'          =>  esc_html__('Heading H1', 'olivewp-companion' ),
                    'h2'          =>  esc_html__('Heading H2', 'olivewp-companion' ),
                    'h3'          =>  esc_html__('Heading H3', 'olivewp-companion' ),
                    'h4'          =>  esc_html__('Heading H4', 'olivewp-companion' ),
                    'h5'          =>  esc_html__('Heading H5', 'olivewp-companion' ),
                    'h6'          =>  esc_html__('Heading H6', 'olivewp-companion' ),

                )
            )
        );

    //Post Type
        $wp_customize->add_setting('customizer_trending_post_type', 
            array(
                'default'           => 'post',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'olivewp_companion_sanitize_select'
            )
        );
        $wp_customize->add_control( 'customizer_trending_post_type',
            array(
                'label'     => esc_html__('Post Type','olivewp-companion' ),
                'section'   => 'customizer_trending_post_general',
                'type'      => 'select',
                'priority'  => 3,
                'choices'   =>  
                array(
                    'post'              =>  esc_html__('Posts', 'olivewp-companion' ),
                    'product'          =>  esc_html__('Products', 'olivewp-companion' ),
                )
            )
        );

    //Source
        $wp_customize->add_setting('customizer_trending_post_source', 
            array(
                'default'           => 'taxonomies',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'olivewp_companion_sanitize_select'
            )
        );
        $wp_customize->add_control( 'customizer_trending_post_source',
            array(
                'label'     => esc_html__('Source','olivewp-companion' ),
                'section'   => 'customizer_trending_post_general',
                'type'      => 'select',
                'priority'  => 4,
                'choices'   =>  
                array(
                    'taxonomies'      =>  esc_html__('Taxonomies', 'olivewp-companion' ),
                    'custom_query'    =>  esc_html__('Custom Query', 'olivewp-companion' ),
                )
            )
        );

    //Post ID
        $wp_customize->add_setting('customizer_trending_post_id', 
            array(
                'default'           => '',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'olivewp_companion_sanitize_text'
            )
        );
        $wp_customize->add_control( 'customizer_trending_post_id',
            array(
                'label'     => esc_html__('Post ID','olivewp-companion' ),
                'description' => esc_html__('Separate posts ID by comma. How to find the post ID.','olivewp-companion' ),
                'section'   => 'customizer_trending_post_general',
                'type'      => 'text',
                'priority'  => 5
            )
        );

     //Category 
        $wp_customize->add_setting(
                'customizer_trending_post_category',
                array(
                    'default' => 'Uncategorized',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'olivewp_companion_select2_text_sanitization',
                )
        );
        $wp_customize->add_control(new Olivewp_Companion_Category_Dropdown_CustomControl($wp_customize, 'customizer_trending_post_category', array(
                    'label' => esc_html__('Category', 'olivewp-companion'),
                    'section' => 'customizer_trending_post_general',
                    'priority'  => 6,
                    'input_attrs' => array(
                        'placeholder' => esc_html__('Please select category', 'olivewp-companion'),
                        'multiselect' => true,
                    ),
        )));

    //Taxonomy 
        $wp_customize->add_setting(
                'customizer_trending_post_taxonomy',
                array(
                    'default' => 'Uncategorized',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'olivewp_companion_select2_text_sanitization',
                )
        );
        $wp_customize->add_control(new Olivewp_Companion_Taxonomies_Dropdown_CustomControl($wp_customize, 'customizer_trending_post_taxonomy', array(
                    'label' => esc_html__('Taxonomies', 'olivewp-companion'),
                    'section' => 'customizer_trending_post_general',
                    'priority'  =>7,
                    'input_attrs' => array(
                        'placeholder' => esc_html__('Please select Taxonomies', 'olivewp-companion'),
                        'multiselect' => true,
                    ),
        )));


    //Trending From
        $wp_customize->add_setting('customizer_trending_post_from', 
            array(
                'default'           => 'all',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'olivewp_companion_sanitize_select'
            )
        );
        $wp_customize->add_control( 'customizer_trending_post_from',
            array(
                'label'     => esc_html__('Trending From','olivewp-companion' ),
                'section'   => 'customizer_trending_post_general',
                'type'      => 'select',
                'priority'  => 8,
                'choices'   =>  
                array(
                    'all'      =>  esc_html__('All', 'olivewp-companion' ),
                    'day24'    =>  esc_html__('Last 24 Hours ', 'olivewp-companion' ),
                    'day7'    =>  esc_html__('Last 7 Days ', 'olivewp-companion' ),
                    'month'    =>  esc_html__('Last Month ', 'olivewp-companion' ),
                )
            )
        );

    //Container Visibility    
        $wp_customize->add_setting( 'customizer_trending_post_visibility',
            array(
                'default' => 'desktop,ipad',
                'transport' => 'refresh',
                'sanitize_callback' => 'olivewp_companion_sanitize_text'
            )
        );
        $wp_customize->add_control( new Olivewp_Companion_Image_Checkbox_Custom_Control( $wp_customize, 'customizer_trending_post_visibility',
            array(
                'label'     => esc_html__('Container Visibility','olivewp-companion' ),
                'section'   => 'customizer_trending_post_general',
                'choices' => array(
                    'desktop' => array( // Required. Setting for this particular radio button choice
                        'image' => trailingslashit( OWC_PLUGIN_URL) . 'inc/control/assets/img/desktop.png', // Required. URL for the image
                        'name' => esc_html__( 'Desktop','olivewp-companion' ) // Required. Title text to display
                    ),
                    'ipad' => array(
                        'image' => trailingslashit( OWC_PLUGIN_URL ) . 'inc/control/assets/img/ipad.png',
                        'name' => esc_html__( 'Ipad','olivewp-companion' )
                    ),
                    'mobile' => array(
                        'image' => trailingslashit( OWC_PLUGIN_URL ) . 'inc/control/assets/img/mobile.png',
                        'name' => esc_html__( 'Mobile','olivewp-companion' )
                    ),
                )
            )
        ) );

    //Container Height    

        $wp_customize->add_setting( 'trending_post_container_spacing',
            array(
                'default'           => 35.2,
                'transport'         => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control( new Olivewp_Companion_Slider_Custom_Control( $wp_customize, 'trending_post_container_spacing',
            array(
                'label'         =>  esc_html__( 'Container Inner Spacing (In px)', 'olivewp-companion'  ),
                'section'       =>  'customizer_trending_post_general',
                'input_attrs'   => 
                array(
                    'min'   => 0,
                    'max'   => 100,
                    'step'  => 1
                )
            )
        ));

        /* ===================================================================================================================
        * Trending Post Typography Setting *
        ====================================================================================================================== */

        $trending_post_font_size = array();
        for($i=10; $i<=100; $i++) {
          $trending_post_font_size[$i] = $i;
        }

        $trending_post_line_height = array();
        for($i=0; $i<=100; $i++) {
            $trending_post_line_height[$i] = $i;
        }
        $trending_post_font_style = array('normal'=>'Normal','italic'=>'Italic');
        $trending_post_text_transform = array('default'=>'Default','capitalize'=>'Capitalize','lowercase'=>'Lowercase','Uppercase'=>'Uppercase');
        $trending_post_font_weight = array('100'=>'100','200'=>'200','300'=>'300','400'=>'400','500'=>'500','600'=>'600','700'=>'700','800'=>'800','900'=>'900');
        $trending_post_font_family = olivewp_companion_typo_fonts();

     
        $wp_customize->add_section( 'trending_post_typo_section' , array(
            'title'   => esc_html__('Typography Settings', 'olivewp-companion'),
            'priority'=> 2,
            'panel'   => 'customizer_trending_post_panel',
        ) );

        $wp_customize->add_setting('trending_post_typo',
            array(
                'default'           => false,
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' => 'olivewp_companion_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Olivewp_Companion_Toggle_Control( $wp_customize, 'trending_post_typo',
            array(
                'label'     =>  esc_html__( 'Enable to apply the settings', 'olivewp-companion'  ),
                'section'   =>  'trending_post_typo_section',
                'setting'   =>  'trending_post_typo',
                'type'      =>  'toggle'
            )
        ));

        /* == Heading for the Post title == */

        class Olivewp_Companion_Title_Customize_Control extends WP_Customize_Control {
            public function render_content() { ?>
                <h3><?php esc_html_e('Section Title', 'olivewp-companion' ); ?></h3>
            <?php }
        }
        $wp_customize->add_setting('owc_section_title',
            array(
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'olivewp_companion_sanitize_text'
            )
        );
        $wp_customize->add_control(new Olivewp_Companion_Title_Customize_Control($wp_customize, 'owc_section_title', 
            array(
                    'section'           =>  'trending_post_typo_section',
                    'active_callback'   =>  'olivewp_companion_trending_post_typo_callback',
                    'setting'           =>  'owc_section_title'
                )
        ));

        $wp_customize->add_setting(
        'trending_post_fontfamily',
        array(
            'default'           =>  'Poppins',
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' => 'olivewp_companion_sanitize_text'
            )   
        );
        $wp_customize->add_control('trending_post_fontfamily', array(
                'label'           => esc_html__('Font family','olivewp-companion'),
                'section'         => 'trending_post_typo_section',
                'setting'         => 'trending_post_fontfamily',
                'type'            =>  'select',
                'choices'         =>  $trending_post_font_family,
                'active_callback' =>  'olivewp_companion_trending_post_typo_callback',
        ));

        $wp_customize->add_setting(
            'trending_post_fontstyle',
            array(
                'default'           =>  'normal',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' => 'olivewp_companion_sanitize_text'
            )   
        );
        $wp_customize->add_control('trending_post_fontstyle', array(
                'label'   => esc_html__('Font style','olivewp-companion'),
                'section' => 'trending_post_typo_section',
                'setting' => 'trending_post_fontstyle',
                'type'    => 'select',
                'choices' => $trending_post_font_style,
                'active_callback' =>  'olivewp_companion_trending_post_typo_callback',
        ));



        $wp_customize->add_setting(
            'trending_post_transform',
            array(
                'default'           =>  'default',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' => 'olivewp_companion_sanitize_text'
            )   
        );
        $wp_customize->add_control('trending_post_transform', array(
                'label'   => esc_html__('Text Transform','olivewp-companion'),
                'section' => 'trending_post_typo_section',
                'setting' => 'trending_post_transform',
                'type'    => 'select',
                'choices'=>  $trending_post_text_transform,
                'active_callback' =>  'olivewp_companion_trending_post_typo_callback',
        ));

        $wp_customize->add_setting(
        'trending_post_fontsize',
        array(
            'default'           =>  20,
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'absint'
            )   
        );

        $wp_customize->add_control(new Olivewp_Companion_Slider_Custom_Control($wp_customize,'trending_post_fontsize', array(
                'label'   => esc_html__('Font size (px)','olivewp-companion'),
                'section' => 'trending_post_typo_section',
                'setting' => 'trending_post_fontsize',
                'active_callback' => 'olivewp_companion_trending_post_typo_callback',
                'input_attrs'       => array(
                    'min'   =>  8,
                    'max'   =>  100,
                    'step'  =>  1
                ),
            )));
       

        $wp_customize->add_setting('trending_post_lheight',
            array(
                'default'           =>  30,
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' =>  'absint'
                )   
            );
        $wp_customize->add_control(new Olivewp_Companion_Slider_Custom_Control( $wp_customize,'trending_post_lheight', array(
                'label'   =>  esc_html__('Line Height (px)','olivewp-companion'),
                'section' => 'trending_post_typo_section',
                'setting' => 'trending_post_lheight',
                'active_callback' => 'olivewp_companion_trending_post_typo_callback',
                'input_attrs'       => array(
                    'min'   =>  1,
                    'max'   =>  100,
                    'step'  =>  1
                ),
            )));


        $wp_customize->add_setting(
            'trending_post_fontweight',
            array(
                'default'           =>  700,
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' =>  'absint'
            )   
        );
        $wp_customize->add_control(new Olivewp_Companion_Slider_Custom_Control( $wp_customize,'trending_post_fontweight', array(
                'label'   => esc_html__('Font Weight','olivewp-companion'),
                'section' => 'trending_post_typo_section',
                'setting' => 'trending_post_fontweight',
                'active_callback' =>  'olivewp_companion_trending_post_typo_callback',
                'input_attrs'       => array(
                    'min'   =>  100,
                    'max'   =>  900,
                    'step'  =>  100
                ),
        )));

        /* == Heading for the Post title == */

        class Olivewp_Companion_Post_Title_Customize_Control extends WP_Customize_Control {
            public function render_content() { ?>
                <h3><?php esc_html_e('Post Title', 'olivewp-companion' ); ?></h3>
            <?php }
        }
        $wp_customize->add_setting('owc_post_title',
            array(
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'olivewp_companion_sanitize_text'
            )
        );
        $wp_customize->add_control(new Olivewp_Companion_Post_Title_Customize_Control($wp_customize, 'owc_post_title', 
            array(
                    'section'           =>  'trending_post_typo_section',
                    'active_callback'   =>  'olivewp_companion_trending_post_typo_callback',
                    'setting'           =>  'owc_post_title'
                )
        ));


        $wp_customize->add_setting('trending_post_title_fontfamily',
        array(
            'default'           =>  'Poppins',
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' => 'olivewp_companion_sanitize_text'
            )   
        );
        $wp_customize->add_control('trending_post_title_fontfamily', array(
                'label'           => esc_html__('Font family','olivewp-companion'),
                'section'         => 'trending_post_typo_section',
                'setting'         => 'trending_post_title_fontfamily',
                'type'            =>  'select',
                'choices'         =>  $trending_post_font_family,
                'active_callback' =>  'olivewp_companion_trending_post_typo_callback',
        ));

        $wp_customize->add_setting('trending_post_title_fontstyle',
            array(
                'default'           =>  'normal',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' => 'olivewp_companion_sanitize_text'
            )   
        );
        $wp_customize->add_control('trending_post_title_fontstyle', array(
                'label'   => esc_html__('Font style','olivewp-companion'),
                'section' => 'trending_post_typo_section',
                'setting' => 'trending_post_title_fontstyle',
                'type'    => 'select',
                'choices' => $trending_post_font_style,
                'active_callback' =>  'olivewp_companion_trending_post_typo_callback',
        ));

        $wp_customize->add_setting(
            'trending_post_title_transform',
            array(
                'default'           =>  'default',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' => 'olivewp_companion_sanitize_text'
            )   
        );
        $wp_customize->add_control('trending_post_title_transform', array(
                'label'   => esc_html__('Text Transform','olivewp-companion'),
                'section' => 'trending_post_typo_section',
                'setting' => 'trending_post_title_transform',
                'type'    => 'select',
                'choices'=>  $trending_post_text_transform,
                'active_callback' =>  'olivewp_companion_trending_post_typo_callback',
        ));

        $wp_customize->add_setting('trending_post_title_fontsize',
        array(
            'default'           =>  14,
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'absint'
            )   
        );

        $wp_customize->add_control(new Olivewp_Companion_Slider_Custom_Control( $wp_customize,'trending_post_title_fontsize', array(
                'label'   => esc_html__('Font size (px)','olivewp-companion'),
                'section' => 'trending_post_typo_section',
                'setting' => 'trending_post_title_fontsize',
                'active_callback' => 'olivewp_companion_trending_post_typo_callback',
                'input_attrs'       => array(
                    'min'   =>  8,
                    'max'   =>  100,
                    'step'  =>  1
                ),
            )));

        $wp_customize->add_setting('trending_post_title_lheight',
            array(
                'default'           =>  22,
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' =>  'absint'
                )   
            );
        $wp_customize->add_control(new Olivewp_Companion_Slider_Custom_Control( $wp_customize,'trending_post_title_lheight', 
            array(
                'label'   =>  esc_html__('Line Height (px)','olivewp-companion'),
                'section' => 'trending_post_typo_section',
                'setting' => 'trending_post_title_lheight',
                'active_callback' => 'olivewp_companion_trending_post_typo_callback',
                'input_attrs'       => array(
                    'min'   =>  1,
                    'max'   =>  100,
                    'step'  =>  1
                ),
            )));

        $wp_customize->add_setting(
            'trending_post_title_fontweight',
            array(
                'default'           =>  500,
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' =>  'absint'
            )   
        );
        $wp_customize->add_control(new Olivewp_Companion_Slider_Custom_Control( $wp_customize,'trending_post_title_fontweight', array(
                'label'   => esc_html__('Font Weight','olivewp-companion'),
                'section' => 'trending_post_typo_section',
                'setting' => 'trending_post_title_fontweight',
                'active_callback' =>  'olivewp_companion_trending_post_typo_callback',
                 'input_attrs'       => array(
                    'min'   =>  100,
                    'max'   =>  900,
                    'step'  =>  100
                ),
        )));


        /* ===================================================================================================================
        * Trending Post Color Setting *
        ====================================================================================================================== */
        $wp_customize->add_section('trending_post_clr_section', 
            array(
                'title'    => esc_html__('Color Settings', 'olivewp-companion' ),
                'panel'    => 'customizer_trending_post_panel',
                'priority' => 3
            )
        );
        
        $wp_customize->add_setting('enable_trending_post_clr',
            array(
                'default'           => false,
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' => 'olivewp_companion_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Olivewp_Companion_Toggle_Control( $wp_customize, 'enable_trending_post_clr',
            array(
                'label'     =>  esc_html__( 'Enable to apply the settings', 'olivewp-companion'  ),
                'section'   =>  'trending_post_clr_section',
                'setting'   =>  'enable_trending_post_clr',
                'type'      =>  'toggle'
            )
        ));

        $wp_customize->add_setting('trending_post_heading_color', 
            array(
                'default'           => '#000000',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trending_post_heading_color', 
            array(
                'label'             =>  esc_html__('Section Title Color', 'olivewp-companion' ),
                'active_callback'   =>  'olivewp_companion_trending_post_color_callback',
                'section'           =>  'trending_post_clr_section',
                'setting'           =>  'trending_post_heading_color'
            )
        ));

        $wp_customize->add_setting('trending_post_title_color', 
            array(
                'default'           => '#000000',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trending_post_title_color', 
            array(
                'label'             =>  esc_html__('Post Title Color', 'olivewp-companion' ),
                'active_callback'   =>  'olivewp_companion_trending_post_color_callback',
                'section'           =>  'trending_post_clr_section',
                'setting'           =>  'trending_post_heading_color'
            )
        ));
        
        $wp_customize->add_setting('trending_post_heading_hover_color', 
            array(
                'default'           => '#ff6f61',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trending_post_heading_hover_color', 
            array(
                'label'             =>  esc_html__('Post Title Hover Color', 'olivewp-companion' ),
                'active_callback'   =>  'olivewp_companion_trending_post_color_callback',
                'section'           =>  'trending_post_clr_section',
                'setting'           =>  'trending_post_heading_hover_color'
            )
        ));

        $wp_customize->add_setting('trending_post_bg_color', 
            array(
                'default'           => '#f0f4f7',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trending_post_bg_color', 
            array(
                'label'             =>  esc_html__('Background Color', 'olivewp-companion' ),
                'active_callback'   =>  'olivewp_companion_trending_post_color_callback',
                'section'           =>  'trending_post_clr_section',
                'setting'           =>  'trending_post_bg_color'
            )
        ));        
    }
}