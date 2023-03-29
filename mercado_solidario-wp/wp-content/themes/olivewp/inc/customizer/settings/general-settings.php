<?php
/**
 * General Settings Customizer
 *
 * @package OliveWP Theme
*/

function olivewp_general_settings_customizer ( $wp_customize )
{
            
    $wp_customize->add_panel('olivewp_general_settings',
        array(
            'priority'      => 112,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__('General Settings','olivewp')
        )
    );
    
    /* ====================
    * Preloader 
    ==================== */
    $wp_customize->add_section('preloader_section',
        array(
            'title'     =>esc_html__('Preloader','olivewp' ),
            'panel'     => 'olivewp_general_settings',
            'priority'  => 1
        )
    );
    $wp_customize->add_setting('preloader_enable',
        array(
            'default'           => false,
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'preloader_enable',
        array(
            'label'    => esc_html__( 'Enable/Disable Preloader', 'olivewp'),
            'section'  => 'preloader_section',
            'type'     => 'toggle',
            'priority' => 1
        )
    ));


    
    /* ====================
    * After Menu
    ==================== */
    $wp_customize->add_section('after_menu_setting_section',
        array(
            'title'     =>  esc_html__('After Menu','olivewp' ),
            'panel'     =>  'olivewp_general_settings',
            'priority'  =>  4
        )
    );
    /* ====================
    * Dropdown Button or HTML Option
    ==================== */
    if ( ! function_exists( 'olivewp_plus_activate' ) ) {
        $wp_customize->add_setting('after_menu_multiple_option',
            array(
                'default'           =>  'none',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' =>  'olivewp_sanitize_select'
            )
        );
        $wp_customize->add_control('after_menu_multiple_option', 
            array(
                'label'     => esc_html__('After Menu','olivewp' ),
                'section'   => 'after_menu_setting_section',
                'setting'   => 'after_menu_multiple_option',
                'type'      => 'select',
                'choices'   =>  
                array(
                    'none'      =>  esc_html__('None', 'olivewp' ),
                    'menu_btn'  =>  esc_html__('Button', 'olivewp' ),
                    'html'      =>  esc_html__('HTML', 'olivewp' )
                )
            )
        );
    }
    /* ====================
    * After Menu Button Text
    ==================== */
    $wp_customize->add_setting('after_menu_btn_txt',
        array(
            'default'           =>  '',
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('after_menu_btn_txt', 
        array(
            'label'     => esc_html__('Button Text','olivewp' ),
            'section'   => 'after_menu_setting_section',
            'setting'   => 'after_menu_btn_txt',
            'type'      => 'text'  
        )
    );
    /* ====================
    * After Menu Button Link
    ==================== */
    $wp_customize->add_setting('after_menu_btn_link',
        array(
            'default'           =>  '',
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'esc_url_raw'
        )
    );
    $wp_customize->add_control('after_menu_btn_link', 
        array(
            'label'     => esc_html__('Button Link','olivewp' ),
            'section'   => 'after_menu_setting_section',
            'setting'   => 'after_menu_btn_link',
            'type'      => 'text'
        )
    );
    /* ====================
    * Open in New Tab
    ==================== */
    $wp_customize->add_setting('after_menu_btn_new_tabl',
        array(
            'default'           =>  false,
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'olivewp_sanitize_checkbox'
        ) 
    );
    $wp_customize->add_control('after_menu_btn_new_tabl', 
        array(
            'label'     => esc_html__('Open link in a new tab','olivewp'),
            'section'   => 'after_menu_setting_section',
            'setting'   => 'after_menu_btn_new_tabl',
            'type'      =>  'checkbox'
        )
    ); 

    /* ====================
    * Border Radius
    ==================== */

    $wp_customize->add_setting( 'after_menu_btn_border',
        array(
            'default'           => 0,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'after_menu_btn_border',
        array(
            'label'         => esc_html__('Button Border Radius', 'olivewp'),
            'section'       => 'after_menu_setting_section',
            'input_attrs'   => 
            array(
                'min'   => 0,
                'max'   => 30,
                'step'  => 1
            )
        )
    ));
    /* ====================
    * After Menu HTML section
    ==================== */
    $wp_customize->add_setting('after_menu_html', 
        array(
            'default'           => '',
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('after_menu_html', 
        array(
            'label'     => esc_html__('HTML','olivewp' ),
            'section'   => 'after_menu_setting_section',
            'type'      => 'textarea'
        )
    );
    /* ====================
    * Enable/Disable Search Icon
    ==================== */
    if ( ! function_exists( 'olivewp_plus_activate' ) ) {
        $wp_customize->add_setting('search_btn_enable',
            array(
                'default'           => false,
                'sanitize_callback' => 'olivewp_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'search_btn_enable',
            array(
                'label'    => esc_html__( 'Enable/Disable Search Icon', 'olivewp'  ),
                'section'  => 'after_menu_setting_section',
                'type'     => 'toggle'
            )
        ));
    }
    /* ====================
    * Enable/Disable Cart Icon
    ==================== */
    $wp_customize->add_setting('cart_btn_enable',
        array(
            'default'           => false,
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'cart_btn_enable',
        array(
            'label'    => esc_html__( 'Enable/Disable Cart Icon', 'olivewp'  ),
            'section'  => 'after_menu_setting_section',
            'type'     => 'toggle'
        )
    ));



    /* ====================
    * Breadcrumb setting  
    ==================== */   

    if(!function_exists('olivewp_plus_activate')):
        $wp_customize->add_section('bredcrumb_section',
            array(
                'title'     =>  esc_html__('Breadcrumb','olivewp'),
                'panel'     =>  'olivewp_general_settings',
                'priority'  =>  3   
            )
        );
        // Enable/Disable breadcrumbs section
        $wp_customize->add_setting('breadcrumb_banner_enable',
            array(
                'default'           => true,
                'sanitize_callback' => 'olivewp_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'breadcrumb_banner_enable',
            array(
                'label'             =>  esc_html__( 'Enable/Disable Banner', 'olivewp'),
                'section'           =>  'bredcrumb_section',
                'type'              =>  'toggle',
                'priority'          =>  1
            )
        ));
    endif;
    if(!function_exists('olivewp_plus_activate')):
        $bredcrumb_section='bredcrumb_section';
    else:
        $bredcrumb_section='olivewp_plus_breadcrumb';
    endif;
    
    /* == Heading for the page title == */
    class Olivewp_pagetitle_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Page Title', 'olivewp' ); ?></h3>
        <?php }
    }
    $wp_customize->add_setting('bredcrumb_page_title',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_pagetitle_Customize_Control($wp_customize, 'bredcrumb_page_title', 
        array(
                'section'           =>  $bredcrumb_section,
                'setting'           =>  'bredcrumb_page_title',
                'active_callback'   => 'olivewp_breadcrumb_section_callback',
                'priority'  => 1,
            )
    ));

    // Enable/Disable page title
    $wp_customize->add_setting('enable_page_title',
        array(
            'default'           => true,
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'enable_page_title',
        array(
            'label'             =>  esc_html__( 'Enable/Disable Page Title', 'olivewp'),
            'section'           =>  $bredcrumb_section,
            'type'              =>  'toggle',
            'active_callback'   => 'olivewp_breadcrumb_section_callback',
            'priority'          =>  1
        )
    ));

    /* Position */

    $wp_customize->add_setting('bredcrumb_position', 
        array(
            'default'           => esc_html__('page_header','olivewp' ),
            'sanitize_callback' => 'olivewp_sanitize_select'
        )
    );

    $wp_customize->add_control('bredcrumb_position', 
        array(      
            'label'     => esc_html__('Position', 'olivewp' ),        
            'section'   => $bredcrumb_section,
            'type'      => 'radio',
            'active_callback'   => function($control) {
                                        return (
                                            olivewp_breadcrumb_section_callback($control) &&
                                            olivewp_page_title_callback($control)
                                        );
                                    },
            'priority'  => 1,
            'choices'   =>  
            array(
                'page_header'   => esc_html__('Page Header', 'olivewp' ),
                'content_area'   => esc_html__('Content Area', 'olivewp' )
            )
        )
    );

    /* Markup */

    $wp_customize->add_setting('bredcrumb_markup',
        array(
            'default'           =>  'h1',
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'olivewp_sanitize_select'
        )
    );

    $wp_customize->add_control('bredcrumb_markup', 
        array(
            'label'     => esc_html__('Markup','olivewp' ),
            'section'   => $bredcrumb_section,
            'setting'   => 'bredcrumb_markup',
            'active_callback'   => function($control) {
                                        return (
                                            olivewp_breadcrumb_section_callback($control) &&
                                            olivewp_page_title_callback($control)
                                        );
                                    },
            'priority'  => 1,
            'type'      => 'select',
            'choices'   =>  
            array(
                'h1'      =>  esc_html__('Heading 1', 'olivewp' ),
                'h2'      =>  esc_html__('Heading 2', 'olivewp' ),
                'h3'      =>  esc_html__('Heading 3', 'olivewp' ),
                'h4'      =>  esc_html__('Heading 4', 'olivewp' ),
                'h5'      =>  esc_html__('Heading 5', 'olivewp' ),
                'h6'      =>  esc_html__('Heading 6', 'olivewp' ),
                'span'    =>  esc_html__('Span', 'olivewp' ),
                'p'       =>  esc_html__('Paragraph', 'olivewp' ),
                'div'     =>  esc_html__('Div', 'olivewp' ),
            )
        )
    );

    /* Breadcrumb Alignment */

    $wp_customize->add_setting( 'bredcrumb_alignment',
        array(
            'default'           => 'parallel',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_select'
        )
    );
    $wp_customize->add_control( new Olivewp_Image_Radio_Button_Custom_Control( $wp_customize, 'bredcrumb_alignment',
        array(
            'label'     => esc_html__( 'Alignment', 'olivewp'  ),
            'section'   => $bredcrumb_section,
            'active_callback'   => 'olivewp_breadcrumb_section_callback',
            'priority'  => 1,
            'choices'   => 
            array(
                'parallel' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/breadcrumb-right.png'),
                'parallelr' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/breadcrumb-left.png'),
                'centered' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/breadcrumb-center.png'),
                'left' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/both-on-left.png'),
                'right' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/both-on-right.png')   
            )
        )
    ));


    /* ====================
    * Sticky Header  
    ==================== */
    if( ! function_exists ( 'ssh_activation' )):
    $wp_customize->add_section('sticky_header_section',
        array(
            'title'     =>  esc_html__('Sticky Header','olivewp'),
            'panel'     =>  'olivewp_general_settings',
            'priority'  =>  2   
        )
    );
    $wp_customize->add_setting('sticky_header_enable',
        array(
            'default'           => false,
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'sticky_header_enable',
        array(
            'label'    =>   esc_html__( 'Enable/Disable Sticky Header', 'olivewp'),
            'section'  =>   'sticky_header_section',
            'type'     =>   'toggle',
            'priority' =>   1
        )
    ));
    endif;



    /* ====================
    * Container Width
    ==================== */
    $wp_customize->add_section('container_width_section',
        array(
            'title'     =>  esc_html__('Container Width','olivewp' ),
            'panel'     =>  'olivewp_general_settings',
            'priority'  =>  7
        )
    );
    $wp_customize->add_setting( 'container_width',
        array(
            'default'           => 1200,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'container_width',
        array(
            'label'         =>  esc_html__( 'Container Width (In px)', 'olivewp'  ),
            'description'   =>  esc_html__( 'Note: Container Width will not work with stretched sidebar layout.', 'olivewp'  ),
            'section'       =>  'container_width_section',
            'priority'      =>  1,
            'input_attrs'   => 
            array(
                'min'   => 600,
                'max'   => 1920,
                'step'  => 1
            )
        )
    ));

    $wp_customize->add_setting( 'content_width',
        array(
            'default'           => 66.6,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_width',
        array(
            'label'         =>  esc_html__( 'Content Width (In %)', 'olivewp'  ),
            'description'   =>  esc_html__( 'Note: Content Width will work only with sidebar layout.', 'olivewp'  ),
            'section'       =>  'container_width_section',
            'priority'      =>  2,
            'input_attrs'   => 
            array(
                'min'   => 0,
                'max'   => 100,
                'step'  => 1
            )
        )
    ));

     $wp_customize->add_setting( 'sidebar_width',
        array(
            'default'           => 33.3,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'sidebar_width',
        array(
            'label'         =>  esc_html__( 'Sidebar Width (In %)', 'olivewp'  ),
            'description'   =>  esc_html__( 'Note: Sidebar Width will work only with sidebar layout.', 'olivewp'  ),
            'section'       =>  'container_width_section',
            'priority'      =>  3,
            'input_attrs'   => 
            array(
                'min'   => 0,
                'max'   => 100,
                'step'  => 1
            )
        )
    ));



    /* ====================
    * Scroll to top  
    ==================== */
    $wp_customize->add_section('scrolltotop_setting_section',
        array(
            'title'     =>  esc_html__('Scroll to Top','olivewp' ),
            'panel'     =>  'olivewp_general_settings',
            'priority'  =>  9  
        )
    );
    $wp_customize->add_setting('scrolltotop_setting_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'scrolltotop_setting_enable',
        array(
            'label'    =>   esc_html__( 'Enable/Disable Scroll to Top', 'olivewp'  ),
            'section'  =>   'scrolltotop_setting_section',
            'type'     =>   'toggle',
            'priority' =>   1
        )
    )); 


    /* =============================================================
    *                       Side Bar Layout Sections
    ================================================================ */

        $wp_customize->add_section('sidebar_layout_setting_section',
            array(
                'title'     => esc_html__('Sidebar Layout','olivewp' ),
                'panel'     => 'olivewp_general_settings'
            )
        );

        /* ====== Sidebar Layout ====== */
        
        /* Blog/Archives */
        $wp_customize->add_setting( 'blog_sidebar_layout',
            array(
                'default'           => 'right',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'olivewp_sanitize_select'
            )
        );
        $wp_customize->add_control( new Olivewp_Image_Radio_Button_Custom_Control( $wp_customize, 'blog_sidebar_layout',
            array(
                'label'     => esc_html__( 'Blog/Archives', 'olivewp'  ),
                'section'   => 'sidebar_layout_setting_section',
                'priority'  => 1,
                'choices'   => 
                array(
                    'right' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/right.jpg'),
                    'left' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/left.jpg'),
                    'full' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/full.jpg'),
                    'stretched' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/stretched.jpg')   
                )
            )
        ));

        /* Single Post */
        $wp_customize->add_setting( 'single_blog_sidebar_layout',
            array(
                'default'           => 'right',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'olivewp_sanitize_select'
            )
        );
        $wp_customize->add_control( new Olivewp_Image_Radio_Button_Custom_Control( $wp_customize, 'single_blog_sidebar_layout',
            array(
                'label'     => esc_html__( 'Single Post', 'olivewp'  ),
                'section'   => 'sidebar_layout_setting_section',
                'priority'  => 2,
                'choices'   => 
                array(
                    'right' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/right.jpg'),
                    'left' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/left.jpg'),
                    'full' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/full.jpg')  ,
                    'stretched' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/stretched.jpg')   
                )
            )
        ));

        /* Page Layout */
        $wp_customize->add_setting( 'page_sidebar_layout',
            array(
                'default'           => 'right',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'olivewp_sanitize_select'
            )
        );
        $wp_customize->add_control( new Olivewp_Image_Radio_Button_Custom_Control( $wp_customize, 'page_sidebar_layout',
            array(
                'label'     => esc_html__( 'Page', 'olivewp'  ),
                'section'   => 'sidebar_layout_setting_section',
                'priority'  => 3,
                'choices'   => 
                array(
                    'right' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/right.jpg'),
                    'left' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/left.jpg'),
                    'full' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/full.jpg')  ,
                    'stretched' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/stretched.jpg')   
                )
            )
        ));


    /* ====================
    * Footer
    ==================== */
    if ( ! function_exists( 'olivewp_plus_activate' ) ) {
        $wp_customize->add_section('fwidgets_setting_section',
            array(
                'title'     => esc_html__('Footer','olivewp' ),
                'panel'     => 'olivewp_general_settings'
            )
        );

        /* ====== Footer Copyright ====== */
        /*Enable Disable Footer Copyright */
        $wp_customize->add_setting( 'footer_copyright_enable',
            array(
                'default'           => true,
                'sanitize_callback' => 'olivewp_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'footer_copyright_enable',
            array(
                'label'     => esc_html__( 'Enable/Disable Copyright Text', 'olivewp'  ),
                'section'   => 'fwidgets_setting_section',
                'type'      => 'toggle',
                'priority'  => 1
            )
        ));
        /* Edit the Copyright */
        $wp_customize->add_setting('footer_copyright', 
            array(
                'default'           => '<p>'.__( 'Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: OliveWP by <a href="https://olivewp.org" rel="nofollow">olivewp.org</a>', 'olivewp' ).'</p>',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'olivewp_sanitize_text'
            )
        );
        $wp_customize->add_control('footer_copyright', 
            array(
                'label'             => esc_html__('Copyright Text','olivewp' ),
                'section'           => 'fwidgets_setting_section',
                'type'              => 'textarea',
                'active_callback'   => 'olivewp_footer_copyright_callback',
                'priority'          => 2
            )
        );

        /* ====== Footer Widgets ====== */

        /*Enable Disable Footer Widgets */
        $wp_customize->add_setting( 'footer_widget_enable',
            array(
                'default'           => true,
                'sanitize_callback' => 'olivewp_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'footer_widget_enable',
            array(
                'label'     => esc_html__( 'Enable/Disable Widgets', 'olivewp'  ),
                'section'   => 'fwidgets_setting_section',
                'type'      => 'toggle',
                'priority'  => 3
            )
        ));
        /* Footer Widgets Layout */
        $wp_customize->add_setting( 'footer_widget_layout',
            array(
                'default'           => 3,
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'olivewp_sanitize_select'
            )
        );
        $wp_customize->add_control( new Olivewp_Image_Radio_Button_Custom_Control( $wp_customize, 'footer_widget_layout',
            array(
                'label'     => esc_html__( 'Widgets Layout', 'olivewp'  ),
                'section'   => 'fwidgets_setting_section',
                'active_callback'   => 'olivewp_footer_widgets_callback',
                'priority'  => 4,
                'choices'   => 
                array(
                    2 => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/2-col.png'),
                    3 => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/3-col.png'),
                    4 => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/4-col.png')   
                )
            )
        ));
    }

}

add_action( 'customize_register', 'olivewp_general_settings_customizer' );