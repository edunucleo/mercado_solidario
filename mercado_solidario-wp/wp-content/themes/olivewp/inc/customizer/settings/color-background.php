<?php
/**
 * Color & Background Customizer
 *
 * @package OliveWP Theme
*/

function olivewp_color_back_customizer($wp_customize) {

    $selective_refresh = isset($wp_customize->selective_refresh) ? 'postMessage' : 'refresh';

    /* ====================
    * Colors & Background Panel 
    ==================== */
    $wp_customize->add_panel('colors_back_settings', 
        array(
            'priority'      => 111,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__('Colors & Background', 'olivewp' ),
        )
    );



    /* ====================
    * Background Image Section 
    ==================== */
    class Olivewp_Image_Background_Control extends WP_Customize_Control {

        public function render_content() {
            ?>
            <p><?php esc_html_e('Note: This setting will only work with the boxed layout', 'olivewp' ); ?></p>
            <?php
        }

    }
    $wp_customize->add_section('background_image', 
        array(
            'title' => esc_html__('Background Image', 'olivewp' ),
            'panel' => 'colors_back_settings',
            'priority'  => 1
        )
    );
    $wp_customize->add_setting('image_back_note',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Image_Background_Control($wp_customize, 'image_back_note', 
        array(
            'section' => 'background_image'
        )
    ));



    /* ====================
    * Background Color Section 
    ==================== */
    class Olivewp_Color_Background_Control extends WP_Customize_Control {

        public function render_content() {
            ?>
            <p><?php esc_html_e('Note: This setting will only work with the Boxed layout', 'olivewp' ); ?></p>
            <?php
        }

    }
    $wp_customize->add_section('colors', 
        array(
            'title' => esc_html__('Background Color', 'olivewp' ),
            'panel' => 'colors_back_settings',
            'priority'  => 2
        )
    );
    $wp_customize->add_setting('color_back_note',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Color_Background_Control($wp_customize, 'color_back_note', 
        array(
            'section' => 'colors'
        )
    ));



    /* ====================
    * Site title & Tagline 
    ==================== */
    $wp_customize->add_section('olivewp_header_color', 
        array(
            'title'     => esc_html__('Header', 'olivewp' ),
            'panel'     => 'colors_back_settings',
            'priority'  => 3
        )
    );
    /* == Enable/Disable the Header setting === */
    $wp_customize->add_setting('enable_header_color',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'enable_header_color',
        array(
            'label'     =>  esc_html__( 'Enable to apply the settings', 'olivewp'  ),
            'section'   =>  'olivewp_header_color',
            'setting'   =>  'enable_header_color',
            'priority'  =>  3,
            'type'      =>  'toggle'
        )
    ));
    /* == Heading for the site title == */
    class Olivewp_SiteColor_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Site Title', 'olivewp' ); ?></h3>
        <?php }
    }
    $wp_customize->add_setting('site_title_color',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_SiteColor_Customize_Control($wp_customize, 'site_title_color', 
        array(
            'section'           =>  'olivewp_header_color',
            'active_callback'   =>  'olivewp_header_color_callback',
            'setting'           =>  'site_title_color'
        )
    ));
    /* == setting for the site title color == */
    $wp_customize->add_setting('site_title_link_color', 
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'site_title_link_color', 
        array(
            'label'             =>  esc_html__('Link Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_header_color_callback',
            'section'           =>  'olivewp_header_color',
            'setting'           =>  'site_title_link_color'
        )
    ));
    /* == setting for the site title hover color == */
    $wp_customize->add_setting('site_title_link_hover_color', 
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'site_title_link_hover_color', 
        array(
            'label'             =>  esc_html__('Link Hover Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_header_color_callback',
            'section'           =>  'olivewp_header_color',
            'setting'           =>  'site_title_link_hover_color'
        )
    ));

    /* == Heading for the Tagline == */
    class Olivewp_TaglineColor_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Site Tagline', 'olivewp' ); ?></h3>
        <?php }
    }
    $wp_customize->add_setting('tagline_color',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_TaglineColor_Customize_Control($wp_customize, 'tagline_color', 
        array(
            'section'           =>  'olivewp_header_color',
            'active_callback'   =>  'olivewp_header_color_callback',
            'setting'           =>  'tagline_color'
        )
    ));
    /* == setting for the tagline color == */
    $wp_customize->add_setting('tagline_text_color', 
        array(
            'default'           => '#c5c5c5',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tagline_text_color', 
        array(
            'label'             =>  esc_html__('Text Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_header_color_callback',
            'section'           =>  'olivewp_header_color',
            'setting'           =>  'tagline_text_color'
        )
    ));



    /* ====================
    * Primary menu 
    ==================== */
    $wp_customize->add_section('olivewp_menu_color', 
        array(
            'title'     => esc_html__('Primary Menu', 'olivewp' ),
            'panel'     => 'colors_back_settings',
            'priority'  => 5
        )
    );
    /* == Enable/Disable the primary menus setting === */
    $wp_customize->add_setting('enable_menu_color',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'enable_menu_color',
        array(
            'label'     => esc_html__( 'Enable to apply the settings', 'olivewp'  ),
            'section'   => 'olivewp_menu_color',
            'type'      => 'toggle'
        )
    ));
    /* == Heading for the Menu == */
    class Olivewp_MenuColor_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Menus', 'olivewp' ); ?></h3>
        <?php }
    }
    $wp_customize->add_setting('menu_color',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_MenuColor_Customize_Control($wp_customize, 'menu_color', 
        array(
            'section'           =>  'olivewp_menu_color',
            'active_callback'   =>  'olivewp_menu_color_callback',
            'setting'           =>  'menu_color'
        )
    ));
    /* == setting for the menu link color == */
    $wp_customize->add_setting('menu_link_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_link_color', 
        array(
            'label'             =>  esc_html__('Text/Link Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_menu_color_callback',
            'section'           =>  'olivewp_menu_color',
            'setting'           =>  'menu_link_color'
        )
    ));
    /* == setting for the menu hover color == */
    $wp_customize->add_setting('menu_link_hover_color', 
        array(
            'default'           => '#ff6f61',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_link_hover_color', 
        array(
            'label'             =>  esc_html__('Link Hover Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_menu_color_callback',
            'section'           =>  'olivewp_menu_color',
            'setting'           =>  'menu_link_hover_color'
        )
    ));
    /* == setting for the menu active color == */
    $wp_customize->add_setting('menu_active_link_color', 
        array(
            'default'           => '#ff6f61',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_active_link_color', 
        array(
            'label'             =>  esc_html__('Active Link Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_menu_color_callback',
            'section'           =>  'olivewp_menu_color',
            'setting'           =>  'menu_active_link_color'
        )
    ));

    /* == Heading for the Submenu == */
    class Olivewp_SubmenuColor_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Submenus', 'olivewp' ); ?></h3>
        <?php }
    }
    $wp_customize->add_setting('submenu_color',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_SubmenuColor_Customize_Control($wp_customize, 'submenu_color', 
        array(
            'section'           =>  'olivewp_menu_color',
            'active_callback'   =>  'olivewp_menu_color_callback',
            'setting'           =>  'submenu_color'
        )
    ));
    /* == setting for the submenu background color == */
    $wp_customize->add_setting('submenu_bg_color', 
        array(
            'default'           => '#21202e',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'submenu_bg_color', 
        array(
            'label'             =>  esc_html__('Background Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_menu_color_callback',
            'section'           =>  'olivewp_menu_color',
            'setting'           =>  'submenu_bg_color'
        )
    ));
    /* == setting for the submenu link color == */
    $wp_customize->add_setting('submenu_link_color', 
        array(
            'default'           => '#d5d5d5',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'submenu_link_color', 
        array(
            'label'             =>  esc_html__('Text/Link Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_menu_color_callback',
            'section'           =>  'olivewp_menu_color',
            'setting'           =>  'submenu_link_color'
        )
    ));
    /* == setting for the submenu hover color == */
    $wp_customize->add_setting('submenu_link_hover_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'submenu_link_hover_color', 
        array(
            'label'             =>  esc_html__('Link Hover Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_menu_color_callback',
            'section'           =>  'olivewp_menu_color',
            'setting'           =>  'submenu_link_hover_color'
        )
    ));



    /* ====================
    * Content (H1---H6, paragraph) 
    ==================== */
    $wp_customize->add_section('olivewp_content_color', 
        array(
            'title'     => esc_html__('Content', 'olivewp' ),
            'panel'     => 'colors_back_settings',
            'priority'  => 8
        )
    );
    /* == Enable/Disable the content setting === */
    $wp_customize->add_setting('enable_content_color',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'enable_content_color',
        array(
            'label'     => esc_html__( 'Enable to apply the settings', 'olivewp'  ),
            'section'   => 'olivewp_content_color',
            'type'      => 'toggle'
        )
    ));
    /* == setting for the H1 heading color == */
    $wp_customize->add_setting('h1_color', 
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h1_color', 
        array(
            'label'             =>  esc_html__('H1 Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_content_color_callback',
            'section'           =>  'olivewp_content_color',
            'setting'           =>  'h1_color'
        )
    ));
    /* == setting for the H2 heading color == */
    $wp_customize->add_setting('h2_color', 
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h2_color', 
        array(
            'label'             =>  esc_html__('H2 Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_content_color_callback',
            'section'           =>  'olivewp_content_color',
            'setting'           =>  'h2_color'
        )
    ));
    /* == setting for the H3 heading color == */
    $wp_customize->add_setting('h3_color', 
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h3_color', 
        array(
            'label'             =>  esc_html__('H3 Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_content_color_callback',
            'section'           =>  'olivewp_content_color',
            'setting'           =>  'h3_color'
        )
    ));
    /* == setting for the H4 heading color == */
    $wp_customize->add_setting('h4_color', 
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h4_color', 
        array(
            'label'             =>  esc_html__('H4 Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_content_color_callback',
            'section'           =>  'olivewp_content_color',
            'setting'           =>  'h4_color'
        )
    ));
    /* == setting for the H5 heading color == */
    $wp_customize->add_setting('h5_color', 
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h5_color', 
        array(
            'label'             =>  esc_html__('H5 Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_content_color_callback',
            'section'           =>  'olivewp_content_color',
            'setting'           =>  'h5_color'
        )
    ));
    /* == setting for the H6 heading color == */
    $wp_customize->add_setting('h6_color', 
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h6_color', 
        array(
            'label'             =>  esc_html__('H6 Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_content_color_callback',
            'section'           =>  'olivewp_content_color',
            'setting'           =>  'h6_color'
        )
    ));
    /* == setting for the paragraph color == */
    $wp_customize->add_setting('p_color', 
        array(
            'default'           => '#858585',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'p_color', 
        array(
            'label'             =>  esc_html__('Paragraph Text Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_content_color_callback',
            'section'           =>  'olivewp_content_color',
            'setting'           =>  'p_color'
        )
    ));
    /* == setting for the button color == */
    $wp_customize->add_setting('button_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_color', 
        array(
            'label'             =>  esc_html__('Button Text Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_content_color_callback',
            'section'           =>  'olivewp_content_color',
            'setting'           =>  'button_color'
        )
    ));
    /* == setting for the button background color == */
    $wp_customize->add_setting('button_back_color', 
        array(
            'default'           => '#ff6f61',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_back_color', 
        array(
            'label'             =>  esc_html__('Button Background Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_content_color_callback',
            'section'           =>  'olivewp_content_color',
            'setting'           =>  'button_back_color'
        )
    ));
    /* == setting for the button hover color == */
    $wp_customize->add_setting('button_hover_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_hover_color', 
        array(
            'label'             =>  esc_html__('Button Text Hover Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_content_color_callback',
            'section'           =>  'olivewp_content_color',
            'setting'           =>  'button_hover_color'
        )
    ));
    /* == setting for the button background hover color == */
    $wp_customize->add_setting('button_back_hover_color', 
        array(
            'default'           => '#ff6f61',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_back_hover_color', 
        array(
            'label'             =>  esc_html__('Button Background Hover Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_content_color_callback',
            'section'           =>  'olivewp_content_color',
            'setting'           =>  'button_back_hover_color'
        )
    ));



    /* ====================
    * Sidebar 
    ==================== */
    $wp_customize->add_section('olivewp_sidebar_color', 
        array(
            'title'     => esc_html__('Sidebar', 'olivewp' ),
            'panel'     => 'colors_back_settings',
            'priority'  => 11
        )
    );
    /* == Enable/Disable sidebar setting === */
    $wp_customize->add_setting('enable_sidebar_color',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'enable_sidebar_color',
        array(
            'label'     => esc_html__( 'Enable to apply the settings', 'olivewp'  ),
            'section'   => 'olivewp_sidebar_color',
            'type'      => 'toggle'
        )
    ));
    /* == setting for the sidebar title color == */
    $wp_customize->add_setting('sidebar_title_color', 
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_title_color', 
        array(
            'label'             =>  esc_html__('Title Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_sidebar_color_callback',
            'section'           =>  'olivewp_sidebar_color',
            'setting'           =>  'sidebar_title_color'
        )
    ));
    /* == setting for the sidebar text color == */
    $wp_customize->add_setting('sidebar_text_color', 
        array(
            'default'           => '#858585',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_text_color', 
        array(
            'label'             =>  esc_html__('Text Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_sidebar_color_callback',
            'section'           =>  'olivewp_sidebar_color',
            'setting'           =>  'sidebar_text_color'
        )
    ));
    /* == setting for the sidebar link color == */
    $wp_customize->add_setting('sidebar_link_color', 
        array(
            'default'           => '#858585',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_link_color', 
        array(
            'label'             =>  esc_html__('Link Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_sidebar_color_callback',
            'section'           =>  'olivewp_sidebar_color',
            'setting'           =>  'sidebar_link_color'
        )
    ));
    /* == setting for the sidebar link hover color == */
    $wp_customize->add_setting('sidebar_link_hover_color', 
        array(
            'default'           => '#ff6f61',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_link_hover_color', 
        array(
            'label'             =>  esc_html__('Link Hover Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_sidebar_color_callback',
            'section'           =>  'olivewp_sidebar_color',
            'setting'           =>  'sidebar_link_hover_color'
        )
    ));



    /* ====================
    * Footer 
    ==================== */
    if ( ! function_exists( 'olivewp_plus_activate' ) ) {
        $wp_customize->add_section('olivewp_footer_color', 
            array(
                'title'     => esc_html__('Footer', 'olivewp' ),
                'panel'     => 'colors_back_settings',
                'priority'  => 12
            )
        );
    }
    else {
        $wp_customize->add_section('olivewp_footer_color', 
            array(
                'title'     => esc_html__('Footer Widgets', 'olivewp' ),
                'panel'     => 'colors_back_settings',
                'priority'  => 12
            )
        );
    }
    /* == Enable/Disable footer setting === */
    $wp_customize->add_setting('enable_footer_color',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'enable_footer_color',
        array(
            'label'     => esc_html__( 'Enable to apply the settings', 'olivewp'  ),
            'section'   => 'olivewp_footer_color',
            'type'      => 'toggle'
        )
    ));
    /* == setting for the footer background color == */
    $wp_customize->add_setting('footer_bg_color', 
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bg_color', 
        array(
            'label'             =>  esc_html__('Background Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_footer_color_callback',
            'section'           =>  'olivewp_footer_color',
            'setting'           =>  'footer_bg_color'
        )
    ));
    /* == setting for the footer title color == */
    $wp_customize->add_setting('footer_title_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_title_color', 
        array(
            'label'             =>  esc_html__('Title Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_footer_color_callback',
            'section'           =>  'olivewp_footer_color',
            'setting'           =>  'footer_title_color'
        )
    ));
    /* == setting for the footer text color == */
    $wp_customize->add_setting('footer_text_color', 
        array(
            'default'           => '#858585',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_text_color', 
        array(
            'label'             =>  esc_html__('Text Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_footer_color_callback',
            'section'           =>  'olivewp_footer_color',
            'setting'           =>  'footer_text_color'
        )
    ));
    /* == setting for the footer link color == */
    $wp_customize->add_setting('footer_link_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_link_color', 
        array(
            'label'             =>  esc_html__('Link Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_footer_color_callback',
            'section'           =>  'olivewp_footer_color',
            'setting'           =>  'footer_link_color'
        )
    ));
    /* == setting for the footer link hover color == */
    $wp_customize->add_setting('footer_link_hover_color', 
        array(
            'default'           => '#ff6f61',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_link_hover_color', 
        array(
            'label'             =>  esc_html__('Link Hover Color', 'olivewp' ),
            'active_callback'   =>  'olivewp_footer_color_callback',
            'section'           =>  'olivewp_footer_color',
            'setting'           =>  'footer_link_hover_color'
        )
    ));
}

add_action('customize_register', 'olivewp_color_back_customizer');