<?php
/**
 * Register widget area.
 *
*/
function olivewp_widgets_init() {

    /**
    * Sidebar widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__( 'Primary', 'olivewp' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets in right sidebar widget area', 'olivewp' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    /**
    * Footer1 widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__('Footer 1', 'olivewp' ),
            'id'            => 'footer-sidebar-1',
            'description'   => esc_html__('Add widgets in footer widget area 1', 'olivewp' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    /**
    * Footer2 widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__('Footer 2', 'olivewp' ),
            'id'            => 'footer-sidebar-2',
            'description'   => esc_html__('Add widgets in footer widget area 2', 'olivewp' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    /**
    * Footer3 widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__('Footer 3', 'olivewp' ),
            'id'            => 'footer-sidebar-3',
            'description'   => esc_html__('Add widgets in footer widget area 3', 'olivewp' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    /**
    * Footer4 widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__('Footer 4', 'olivewp' ),
            'id'            => 'footer-sidebar-4',
            'description'   => esc_html__('Add widgets in footer widget area 4', 'olivewp' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    /**
    * WooCommerce widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__('WooCommerce sidebar widget area', 'olivewp' ),
            'id'            => 'woocommerce',
            'description'   => esc_html__('Add widgets in WooCommerce sidebar widget area', 'olivewp' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}

add_action('widgets_init', 'olivewp_widgets_init');