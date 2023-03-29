<?php
/**
 * Typography Customizer
 *
 * @package OliveWP Theme
*/
function olivewp_typography_customizer($wp_customize) {

    $wp_customize->add_panel('olivewp_typography_setting', 
        array(
            'priority'      => 113,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__('Typography Settings', 'olivewp' )
        )
    );

    $line_height = array();
    for($i=1; $i<=100; $i++) {           
        $line_height[$i] = $i;
    }

    $font_family = olivewp_typo_fonts();
	
	  /* ====================
    * Enable Local google font  section 
    ==================== */
	
$wp_customize->add_section('local_google_font',
	array(
		'title' => esc_html__('Performance(Google Font)', 'olivewp'),
		'panel' => 'olivewp_typography_setting',
		'priority' => 1
	));


$wp_customize->add_setting('olivewp_enable_local_google_font',
	array(
		'default' => true,
		'sanitize_callback' => 'olivewp_sanitize_checkbox',
	)
);
$wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'olivewp_enable_local_google_font',
	array(
		'label' => esc_html__('Load Google Fonts Locally?', 'olivewp'),
		'type' => 'toggle',
		'section' => 'local_google_font',
		'priority' => 4,
	)
));

    /* ====================
    * Header typography section 
    ==================== */
    $wp_customize->add_section('olivewp_header_typography', 
        array(
            'title'     => esc_html__('Header', 'olivewp' ),
            'panel'     => 'olivewp_typography_setting',
            'priority'  => 1
        )
    );
    /* == Enable/Disable Header typography section === */
    $wp_customize->add_setting('enable_header_typography',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'enable_header_typography',
        array(
            'label'             => esc_html__( 'Enable to apply the settings', 'olivewp'  ),
            'section'           => 'olivewp_header_typography',
            'type'              => 'toggle'
        )
    ));
    /* == Heading for the site title == */
    class Olivewp_Sitetitle_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Site Title', 'olivewp' ); ?></h3>
        <?php }
    }
    $wp_customize->add_setting('site_title',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Sitetitle_Customize_Control($wp_customize, 'site_title', 
        array(
                'section'           =>  'olivewp_header_typography',
                'active_callback'   =>  'olivewp_header_typography_callback',
                'setting'           =>  'site_title'
            )
    ));
    /* == Font family for the site title == */
    $wp_customize->add_setting('site_title_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('site_title_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'section'           => 'olivewp_header_typography',
            'setting'           => 'site_title_fontfamily',
            'type'              => 'select',
            'active_callback'   => 'olivewp_header_typography_callback',
            'choices'           => $font_family
    ));
    /* == Font size for the site title == */
    $wp_customize->add_setting( 'site_title_fontsize',
        array(
            'default'           => 30,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'site_title_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'section'           => 'olivewp_header_typography',
            'setting'           => 'site_title_fontsize',
            'active_callback'   => 'olivewp_header_typography_callback',
            'input_attrs'   => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the site title == */
    $wp_customize->add_setting( 'site_title_line_height',
        array(
            'default'           => 39,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'site_title_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'section'           => 'olivewp_header_typography',
            'setting'           => 'site_title_line_height',
            'active_callback'   => 'olivewp_header_typography_callback',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));

    /* == Heading for the Tagline == */
    class Olivewp_Tagline_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Site Tagline', 'olivewp' ); ?></h3>
        <?php }
    }
    $wp_customize->add_setting('tagline',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Tagline_Customize_Control($wp_customize, 'tagline', 
        array(
                'section'           =>  'olivewp_header_typography',
                'active_callback'   =>  'olivewp_header_typography_callback',
                'setting'           =>  'tagline'
            )
    ));
    /* == Font family for the tagline == */
    $wp_customize->add_setting('tagline_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('tagline_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'section'           => 'olivewp_header_typography',
            'setting'           => 'tagline_fontfamily',
            'active_callback'   => 'olivewp_header_typography_callback',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the tagline == */
    $wp_customize->add_setting( 'tagline_fontsize',
        array(
            'default'           => 18,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'tagline_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp' ),
            'section'           => 'olivewp_header_typography',
            'active_callback'   => 'olivewp_header_typography_callback',
            'setting'           => 'tagline_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the tagline == */
    $wp_customize->add_setting( 'tagline_line_height',
        array(
            'default'           => 29,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'tagline_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'section'           => 'olivewp_header_typography',
            'active_callback'   => 'olivewp_header_typography_callback',
            'setting'           => 'tagline_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));

    /* == Heading for the Menu == */
    class Olivewp_Menu_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Menus', 'olivewp' ); ?></h3>
        <?php }
    }
    $wp_customize->add_setting('menu',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Menu_Customize_Control($wp_customize, 'menu', 
        array(
                'section'           =>  'olivewp_header_typography',
                'active_callback'   =>  'olivewp_header_typography_callback',
                'setting'           =>  'menu'
            )
    ));
    /* == Font family for the menu == */
    $wp_customize->add_setting('menu_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('menu_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'section'           => 'olivewp_header_typography',
            'active_callback'   => 'olivewp_header_typography_callback',
            'setting'           => 'menu_fontfamily',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the menu == */
    $wp_customize->add_setting( 'menu_fontsize',
        array(
            'default'           => 14,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'menu_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_header_typography_callback',
            'section'           => 'olivewp_header_typography',
            'setting'           => 'menu_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the menu == */
    $wp_customize->add_setting( 'menu_line_height',
        array(
            'default'           => 22,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'menu_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_header_typography_callback',
            'section'           => 'olivewp_header_typography',
            'setting'           => 'menu_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));

    /* == Heading for the Sub-menu == */
    class Olivewp_Sub_Menu_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Submenus', 'olivewp' ); ?></h3>
            
        <?php }
    }
    $wp_customize->add_setting('submenu',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Sub_Menu_Customize_Control($wp_customize, 'submenu', 
        array(
                'active_callback'   => 'olivewp_header_typography_callback',
                'section'           => 'olivewp_header_typography',
                'setting'           => 'submenu'
            )
    ));
    /* == Font family for the submenu == */
    $wp_customize->add_setting('submenu_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('submenu_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'active_callback'   => 'olivewp_header_typography_callback',
            'section'           => 'olivewp_header_typography',
            'setting'           => 'submenu_fontfamily',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the submenu == */
    $wp_customize->add_setting( 'submenu_fontsize',
        array(
            'default'           => 14,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'submenu_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_header_typography_callback',
            'section'           => 'olivewp_header_typography',
            'setting'           => 'submenu_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the submenu == */
    $wp_customize->add_setting( 'submenu_line_height',
        array(
            'default'           => 20,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'submenu_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_header_typography_callback',
            'section'           => 'olivewp_header_typography',
            'setting'           => 'submenu_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));



    /* ====================
    * Content(H1----H6, Paragraph, Button) typography section 
    ==================== */
    $wp_customize->add_section('olivewp_content_typography', 
        array(
            'title'     => esc_html__('Content', 'olivewp' ),
            'panel'     => 'olivewp_typography_setting',
            'priority'  => 2
        )
    );
    /* == Enable/Disable Content typography section === */
    $wp_customize->add_setting('enable_content_typography',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'enable_content_typography',
        array(
            'label'     => esc_html__( 'Enable to apply the settings', 'olivewp'  ),
            'section'   => 'olivewp_content_typography',
            'type'      => 'toggle'
        )
    ));
    /* == Heading for the H1 == */
    class Olivewp_H1_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Heading 1 (H1)', 'olivewp' ); ?></h3>
            
        <?php }
    }
    $wp_customize->add_setting('content_h1',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_H1_Customize_Control($wp_customize, 'content_h1', 
        array(
                'active_callback'   => 'olivewp_content_typography_callback',
                'section'           =>  'olivewp_content_typography',
                'setting'           =>  'content_h1'
            )
    ));
     /* == Font family for the H1 == */
    $wp_customize->add_setting('content_h1_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('content_h1_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h1_fontfamily',
            'active_callback'   => 'olivewp_content_typography_callback',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the H1 == */
    $wp_customize->add_setting( 'content_h1_fontsize',
        array(
            'default'           => 42,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_h1_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h1_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the H1 == */
    $wp_customize->add_setting( 'content_h1_line_height',
        array(
            'default'           => 63,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_h1_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h1_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));

    /* == Heading for the H2 == */
    class Olivewp_H2_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Heading 2 (H2)', 'olivewp' ); ?></h3>        
        <?php }
    }
    $wp_customize->add_setting('content_h2',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_H2_Customize_Control($wp_customize, 'content_h2', 
        array(
                'active_callback'   => 'olivewp_content_typography_callback',
                'section'           =>  'olivewp_content_typography',
                'setting'           =>  'content_h2'
            )
    ));
     /* == Font family for the H2 == */
    $wp_customize->add_setting('content_h2_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('content_h2_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h2_fontfamily',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the H2 == */
    $wp_customize->add_setting( 'content_h2_fontsize',
        array(
            'default'           => 30,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_h2_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h2_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the H2 == */
    $wp_customize->add_setting( 'content_h2_line_height',
        array(
            'default'           => 45,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_h2_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h2_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));

    /* == Heading for the H3 == */
    class Olivewp_H3_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Heading 3 (H3)', 'olivewp' ); ?></h3>
            
        <?php }
    }
    $wp_customize->add_setting('content_h3',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_H3_Customize_Control($wp_customize, 'content_h3', 
        array(
                'active_callback'   => 'olivewp_content_typography_callback',
                'section'           =>  'olivewp_content_typography',
                'setting'           =>  'content_h3'
            )
    ));
     /* == Font family for the H3 == */
    $wp_customize->add_setting('content_h3_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('content_h3_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h3_fontfamily',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the H3 == */
    $wp_customize->add_setting( 'content_h3_fontsize',
        array(
            'default'           => 24,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_h3_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h3_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the H3 == */
    $wp_customize->add_setting( 'content_h3_line_height',
        array(
            'default'           => 36,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_h3_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h3_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));

    /* == Heading for the H4 == */
    class Olivewp_H4_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Heading 4 (H4)', 'olivewp' ); ?></h3>
            
        <?php }
    }
    $wp_customize->add_setting('content_h4',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_H4_Customize_Control($wp_customize, 'content_h4', 
        array(
                'active_callback'   => 'olivewp_content_typography_callback',
                'section'           =>  'olivewp_content_typography',
                'setting'           =>  'content_h4'
            )
    ));
     /* == Font family for the H4 == */
    $wp_customize->add_setting('content_h4_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('content_h4_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h4_fontfamily',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the H4 == */
    $wp_customize->add_setting( 'content_h4_fontsize',
        array(
            'default'           => 20,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_h4_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h4_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the H4 == */
    $wp_customize->add_setting( 'content_h4_line_height',
        array(
            'default'           => 30,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_h4_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h4_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));

    /* == Heading for the H5 == */
    class Olivewp_H5_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Heading 5 (H5)', 'olivewp' ); ?></h3>
            
        <?php }
    }
    $wp_customize->add_setting('content_h5',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_H5_Customize_Control($wp_customize, 'content_h5', 
        array(
                'active_callback'   => 'olivewp_content_typography_callback',
                'section'           =>  'olivewp_content_typography',
                'setting'           =>  'content_h5'
            )
    ));
     /* == Font family for the H5 == */
    $wp_customize->add_setting('content_h5_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('content_h5_fontfamily', 
        array(
            'label'             =>  esc_html__('Font family', 'olivewp' ),
            'active_callback'   =>  'olivewp_content_typography_callback',
            'section'           =>  'olivewp_content_typography',
            'setting'           =>  'content_h5_fontfamily',
            'type'              =>  'select',
            'choices'           =>  $font_family
    ));
    /* == Font size for the H5 == */
    $wp_customize->add_setting( 'content_h5_fontsize',
        array(
            'default'           => 18,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_h5_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h5_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the H5 == */
    $wp_customize->add_setting( 'content_h5_line_height',
        array(
            'default'           => 27,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_h5_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h5_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));

    /* == Heading for the H6 == */
    class Olivewp_H6_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Heading 6 (H6)', 'olivewp' ); ?></h3>
            
        <?php }
    }
    $wp_customize->add_setting('content_h6',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_H6_Customize_Control($wp_customize, 'content_h6', 
        array(
                'active_callback'   => 'olivewp_content_typography_callback',
                'section'           =>  'olivewp_content_typography',
                'setting'           =>  'content_h6'
            )
    ));
     /* == Font family for the H6 == */
    $wp_customize->add_setting('content_h6_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('content_h6_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h6_fontfamily',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the H6 == */
    $wp_customize->add_setting( 'content_h6_fontsize',
        array(
            'default'           => 16,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_h6_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h6_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the H6 == */
    $wp_customize->add_setting( 'content_h6_line_height',
        array(
            'default'           => 24,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_h6_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_h6_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));

    /* == Heading for the Paragraph == */
    class Olivewp_Paragraph_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Paragraph', 'olivewp' ); ?></h3>
            
        <?php }
    }
    $wp_customize->add_setting('content_p',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Paragraph_Customize_Control($wp_customize, 'content_p', 
        array(
                'active_callback'   => 'olivewp_content_typography_callback',
                'section'           =>  'olivewp_content_typography',
                'setting'           =>  'content_p'
            )
    ));
     /* == Font family for the Paragraph == */
    $wp_customize->add_setting('content_p_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('content_p_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_p_fontfamily',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the Paragraph == */
    $wp_customize->add_setting( 'content_p_fontsize',
        array(
            'default'           => 18,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_p_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_p_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the Paragraph == */
    $wp_customize->add_setting( 'content_p_line_height',
        array(
            'default'           => 29,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_p_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_p_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));

    /* == Heading for the Button == */
    class Olivewp_Button_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Button Text', 'olivewp' ); ?></h3>
            
        <?php }
    }
    $wp_customize->add_setting('content_button',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Button_Customize_Control($wp_customize, 'content_button', 
        array(
                'active_callback'   => 'olivewp_content_typography_callback',
                'section'           =>  'olivewp_content_typography',
                'setting'           =>  'content_button'
            )
    ));
     /* == Font family for the Button == */
    $wp_customize->add_setting('content_button_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('content_button_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_button_fontfamily',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the Button == */
    $wp_customize->add_setting( 'content_button_fontsize',
        array(
            'default'           => 14,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_button_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_button_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the Button == */
    $wp_customize->add_setting( 'content_button_line_height',
        array(
            'default'           => 14,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'content_button_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_content_typography_callback',
            'section'           => 'olivewp_content_typography',
            'setting'           => 'content_button_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));




    /* ====================
    * Blog/Archive/Single Post typography section 
    ==================== */
    $wp_customize->add_section('olivewp_post_typography', 
        array(
            'title'     => esc_html__(' Blog/Archive/Single Post', 'olivewp' ),
            'panel'     => 'olivewp_typography_setting',
            'priority'  => 3
        )
    );
    /* == Enable/Disable Post typography section === */
    $wp_customize->add_setting('enable_post_typography',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'enable_post_typography',
        array(
            'label'     => esc_html__( 'Enable to apply the settings', 'olivewp'  ),
            'section'   => 'olivewp_post_typography',
            'type'      => 'toggle'
        )
    ));
    /* == Font family for the Post == */
    $wp_customize->add_setting('post_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('post_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'active_callback'   => 'olivewp_post_typography_callback',
            'section'           => 'olivewp_post_typography',
            'setting'           => 'post_fontfamily',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the Post == */
    $wp_customize->add_setting( 'post_fontsize',
        array(
            'default'           => 24,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'post_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_post_typography_callback',
            'section'           => 'olivewp_post_typography',
            'setting'           => 'post_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the Post == */
    $wp_customize->add_setting( 'post_line_height',
        array(
            'default'           => 36,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'post_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_post_typography_callback',
            'section'           => 'olivewp_post_typography',
            'setting'           => 'post_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));



    /* ====================
    * Shop page typography section 
    ==================== */
    $wp_customize->add_section('olivewp_shop_page_typography', 
        array(
            'title'     => esc_html__('Shop Page', 'olivewp' ),
            'panel'     => 'olivewp_typography_setting',
            'priority'  => 4
        )
    );
    /* == Enable/Disable shop page typography section === */
    $wp_customize->add_setting('enable_shop_typography',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'enable_shop_typography',
        array(
            'label'     => esc_html__( 'Enable to apply the settings', 'olivewp'  ),
            'section'   => 'olivewp_shop_page_typography',
            'type'      => 'toggle'
        )
    ));
    /* == Heading for the Shop H1 == */
    class Olivewp_Shop_H1_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Heading 1 (H1)', 'olivewp' ); ?></h3>
            
        <?php }
    }
    $wp_customize->add_setting('shop_h1',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Shop_H1_Customize_Control($wp_customize, 'shop_h1', 
        array(
                'active_callback'   => 'olivewp_shop_typography_callback',
                'section'           =>  'olivewp_shop_page_typography',
                'setting'           =>  'shop_h1'
            )
    ));
     /* == Font family for the Shop H1 == */
    $wp_customize->add_setting('shop_h1_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('shop_h1_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'active_callback'   => 'olivewp_shop_typography_callback',
            'section'           => 'olivewp_shop_page_typography',
            'setting'           => 'shop_h1_fontfamily',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the Shop H1 == */
    $wp_customize->add_setting( 'shop_h1_fontsize',
        array(
            'default'           => 42,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'shop_h1_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_shop_typography_callback',
            'section'           => 'olivewp_shop_page_typography',
            'setting'           => 'shop_h1_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the Shop H1 == */
    $wp_customize->add_setting( 'shop_h1_line_height',
        array(
            'default'           => 63,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'shop_h1_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_shop_typography_callback',
            'section'           => 'olivewp_shop_page_typography',
            'setting'           => 'shop_h1_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));

    /* == Heading for the Shop H2 == */
    class Olivewp_Shop_H2_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Heading 2 (H2)', 'olivewp' ); ?></h3>
            
        <?php }
    }
    $wp_customize->add_setting('shop_h2',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Shop_H2_Customize_Control($wp_customize, 'shop_h2', 
        array(
                'active_callback'   => 'olivewp_shop_typography_callback',
                'section'           =>  'olivewp_shop_page_typography',
                'setting'           =>  'shop_h2'
            )
    ));
     /* == Font family for the Shop H2 == */
    $wp_customize->add_setting('shop_h2_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('shop_h2_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'active_callback'   => 'olivewp_shop_typography_callback',
            'section'           => 'olivewp_shop_page_typography',
            'setting'           => 'shop_h2_fontfamily',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the Shop H2 == */
    $wp_customize->add_setting( 'shop_h2_fontsize',
        array(
            'default'           => 18,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'shop_h2_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_shop_typography_callback',
            'section'           => 'olivewp_shop_page_typography',
            'setting'           => 'shop_h2_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the Shop H2 == */
    $wp_customize->add_setting( 'shop_h2_line_height',
        array(
            'default'           => 27,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'shop_h2_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_shop_typography_callback',
            'section'           => 'olivewp_shop_page_typography',
            'setting'           => 'shop_h2_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));

    /* == Heading for the Shop H3 == */
    class Olivewp_Shop_H3_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Heading 3 (H3)', 'olivewp' ); ?></h3>
            
        <?php }
    }
    $wp_customize->add_setting('shop_h3',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Shop_H3_Customize_Control($wp_customize, 'shop_h3', 
        array(
                'active_callback'   => 'olivewp_shop_typography_callback',
                'section'           =>  'olivewp_shop_page_typography',
                'setting'           =>  'shop_h3'
            )
    ));
     /* == Font family for the Shop H3 == */
    $wp_customize->add_setting('shop_h3_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('shop_h3_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'active_callback'   => 'olivewp_shop_typography_callback',
            'section'           => 'olivewp_shop_page_typography',
            'setting'           => 'shop_h3_fontfamily',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the Shop H3 == */
    $wp_customize->add_setting( 'shop_h3_fontsize',
        array(
            'default'           => 24,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'shop_h3_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_shop_typography_callback',
            'section'           => 'olivewp_shop_page_typography',
            'setting'           => 'shop_h3_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the Shop H3 == */
    $wp_customize->add_setting( 'shop_h3_line_height',
        array(
            'default'           => 36,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'shop_h3_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_shop_typography_callback',
            'section'           => 'olivewp_shop_page_typography',
            'setting'           => 'shop_h3_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));




    /* ====================
    * Sidebar widgets typography section 
    ==================== */
    $wp_customize->add_section('olivewp_sidebar_typography', 
        array(
            'title'     => esc_html__('Sidebar Widgets', 'olivewp' ),
            'panel'     => 'olivewp_typography_setting',
            'priority'  => 5
        )
    );
    /* == Enable/Disable sidebar widgets typography section === */
    $wp_customize->add_setting('enable_sidebar_typography',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'enable_sidebar_typography',
        array(
            'label'     => esc_html__( 'Enable to apply the settings', 'olivewp'  ),
            'section'   => 'olivewp_sidebar_typography',
            'type'      => 'toggle'
        )
    ));
    /* == Heading for the sidebar widgets title == */
    class Olivewp_Sidebar_Title_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Widget Title', 'olivewp' ); ?></h3>
            
        <?php }
    }
    $wp_customize->add_setting('sidebar_widget_title',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Sidebar_Title_Customize_Control($wp_customize, 'sidebar_widget_title', 
        array(
                'active_callback'   => 'olivewp_sidebar_widget_typography_callback',
                'section'           =>  'olivewp_sidebar_typography',
                'setting'           =>  'sidebar_widget_title'
            )
    ));
     /* == Font family for the sidebar widgets title == */
    $wp_customize->add_setting('sidebar_widget_title_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('sidebar_widget_title_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'section'           => 'olivewp_sidebar_typography',
            'setting'           => 'sidebar_widget_title_fontfamily',
            'active_callback'   => 'olivewp_sidebar_widget_typography_callback',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the sidebar widgets title == */
    $wp_customize->add_setting( 'sidebar_widget_title_fontsize',
        array(
            'default'           => 30,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'sidebar_widget_title_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_sidebar_widget_typography_callback',
            'section'           => 'olivewp_sidebar_typography',
            'setting'           => 'sidebar_widget_title_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the sidebar widgets title == */
    $wp_customize->add_setting( 'sidebar_widget_title_line_height',
        array(
            'default'           => 45,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'sidebar_widget_title_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'section'           => 'olivewp_sidebar_typography',
            'setting'           => 'sidebar_widget_title_line_height',
            'active_callback'   => 'olivewp_sidebar_widget_typography_callback',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));

    /* == Heading for the sidebar widgets content == */
    class Olivewp_Sidebar_Content_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Widget Content', 'olivewp' ); ?></h3>
            
        <?php }
    }
    $wp_customize->add_setting('sidebar_widget_content',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Sidebar_Content_Customize_Control($wp_customize, 'sidebar_widget_content', 
        array(
                'active_callback'   => 'olivewp_sidebar_widget_typography_callback',
                'section'           =>  'olivewp_sidebar_typography',
                'setting'           =>  'sidebar_widget_content'
            )
    ));
     /* == Font family for the sidebar widgets content == */
    $wp_customize->add_setting('sidebar_widget_content_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('sidebar_widget_content_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'section'           => 'olivewp_sidebar_typography',
            'setting'           => 'sidebar_widget_content_fontfamily',
            'active_callback'   => 'olivewp_sidebar_widget_typography_callback',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the sidebar widgets content == */
    $wp_customize->add_setting( 'sidebar_widget_content_fontsize',
        array(
            'default'           => 18,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'sidebar_widget_content_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_sidebar_widget_typography_callback',
            'section'           => 'olivewp_sidebar_typography',
            'setting'           => 'sidebar_widget_content_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the sidebar widgets content == */
    $wp_customize->add_setting( 'sidebar_widget_content_line_height',
        array(
            'default'           => 29,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'sidebar_widget_content_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_sidebar_widget_typography_callback',
            'section'           => 'olivewp_sidebar_typography',
            'setting'           => 'sidebar_widget_content_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));




    /* ====================
    * Footer widgets typography section 
    ==================== */
    $wp_customize->add_section('olivewp_footer_typography', 
        array(
            'title'     => esc_html__('Footer Widgets', 'olivewp' ),
            'panel'     => 'olivewp_typography_setting',
            'priority'  => 6
        )
    );
    /* == Enable/Disable footer widgets typography section === */
    $wp_customize->add_setting('enable_footer_typography',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control( $wp_customize, 'enable_footer_typography',
        array(
            'label'     => esc_html__( 'Enable to apply the settings', 'olivewp'  ),
            'section'   => 'olivewp_footer_typography',
            'type'      => 'toggle'
        )
    ));
    /* == Heading for the footer widgets title == */
    class Olivewp_Footer_Title_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Widget Title', 'olivewp' ); ?></h3>
            
        <?php }
    }
    $wp_customize->add_setting('footer_widget_title',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Footer_Title_Customize_Control($wp_customize, 'footer_widget_title', 
        array(
                'active_callback'   => 'olivewp_footer_widget_typography_callback',
                'section'           =>  'olivewp_footer_typography',
                'setting'           =>  'footer_widget_title'
            )
    ));
     /* == Font family for the footer widgets title == */
    $wp_customize->add_setting('footer_widget_title_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('footer_widget_title_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'active_callback'   => 'olivewp_footer_widget_typography_callback',
            'section'           => 'olivewp_footer_typography',
            'setting'           => 'footer_widget_title_fontfamily',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the footer widgets title == */
    $wp_customize->add_setting( 'footer_widget_title_fontsize',
        array(
            'default'           => 30,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'footer_widget_title_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_footer_widget_typography_callback',
            'section'           => 'olivewp_footer_typography',
            'setting'           => 'footer_widget_title_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the footer widgets title == */
    $wp_customize->add_setting( 'footer_widget_title_line_height',
        array(
            'default'           => 30,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'footer_widget_title_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_footer_widget_typography_callback',
            'section'           => 'olivewp_footer_typography',
            'setting'           => 'footer_widget_title_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));

    /* == Heading for the footer widgets content == */
    class Olivewp_Footer_Content_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Widget Content', 'olivewp' ); ?></h3>
            
        <?php }
    }
    $wp_customize->add_setting('footer_widget_content_h3',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control(new Olivewp_Footer_Content_Customize_Control($wp_customize, 'footer_widget_content_h3', 
        array(
                'active_callback'   => 'olivewp_footer_widget_typography_callback',
                'section'           =>  'olivewp_footer_typography',
                'setting'           =>  'footer_widget_content_h3'
            )
    ));
     /* == Font family for the footer widgets content == */
    $wp_customize->add_setting('footer_widget_content_fontfamily',
        array(
            'default'           => 'Poppins',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'olivewp_sanitize_text'
        )
    );
    $wp_customize->add_control('footer_widget_content_fontfamily', 
        array(
            'label'             => esc_html__('Font family', 'olivewp' ),
            'active_callback'   => 'olivewp_footer_widget_typography_callback',
            'section'           => 'olivewp_footer_typography',
            'setting'           => 'footer_widget_content_fontfamily',
            'type'              => 'select',
            'choices'           => $font_family
    ));
    /* == Font size for the footer widgets content == */
    $wp_customize->add_setting( 'footer_widget_content_fontsize',
        array(
            'default'           => 18,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'footer_widget_content_fontsize',
        array(
            'label'             => esc_html__( 'Font size (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_footer_widget_typography_callback',
            'section'           => 'olivewp_footer_typography',
            'setting'           => 'footer_widget_content_fontsize',
            'input_attrs'       => array(
                'min'   =>  8,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
    /* == Line height for the footer widgets content == */
    $wp_customize->add_setting( 'footer_widget_content_line_height',
        array(
            'default'           => 29,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Olivewp_Slider_Custom_Control( $wp_customize, 'footer_widget_content_line_height',
        array(
            'label'             => esc_html__( 'Line height (px)', 'olivewp'  ),
            'active_callback'   => 'olivewp_footer_widget_typography_callback',
            'section'           => 'olivewp_footer_typography',
            'setting'           => 'footer_widget_content_line_height',
            'input_attrs'       => array(
                'min'   =>  1,
                'max'   =>  100,
                'step'  =>  1
            ),
        )
    ));
}

add_action( 'customize_register', 'olivewp_typography_customizer' );