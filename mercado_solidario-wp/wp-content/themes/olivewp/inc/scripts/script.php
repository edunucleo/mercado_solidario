<?php

/**
 * Enqueue scripts and styles.
 */
function olivewp_scripts() {

    /* Enqueue the CSS scripts */
    $suffix = ( defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ) ? '' : '.min';

    wp_enqueue_style('animate', OLIVEWP_TEMPLATE_DIR_URI. '/assets/css/animate.css');
    if ( ! function_exists( 'olivewp_plus_activate' ) ):
        wp_enqueue_style('olivewp-menu-css', OLIVEWP_TEMPLATE_DIR_URI. '/assets/css/theme-menu.css');
        wp_style_add_data('olivewp-menu-css', 'rtl', 'replace');
        wp_enqueue_style( 'olivewp-style', get_stylesheet_uri() );
        wp_style_add_data('olivewp-style', 'rtl', 'replace');
        if (get_theme_mod('custom_color_enable') == true) {
            add_action('wp_footer','olivewp_custom_color_css');
        }
        else {
            wp_enqueue_style('olivewp-default', OLIVEWP_TEMPLATE_DIR_URI . '/assets/css/default.css');
        }
    endif;
    // Remove font awesome style from plugins.
    wp_deregister_style( 'font-awesome' );
    wp_deregister_style( 'fontawesome' );
    
    wp_enqueue_style('font-awesome', OLIVEWP_TEMPLATE_DIR_URI . '/assets/css/font-awesome/css/all' . $suffix . '.css', array(), '');


    /* Enqueue the JS scripts */

    if ( ! function_exists( 'ssh_activation' ) )
    {
        wp_enqueue_script('olivewp-custom-js', OLIVEWP_TEMPLATE_DIR_URI . '/assets/js/custom.js', array('jquery'), '', true);
    }

    wp_enqueue_script('olivewp-menu-js', OLIVEWP_TEMPLATE_DIR_URI . '/assets/js/menu/menu.js', array('jquery'), '', true);

    wp_enqueue_script('olivewp-main-js', OLIVEWP_TEMPLATE_DIR_URI . '/assets/js/main.js', array('jquery'), '', true);

    wp_enqueue_script('jquery', OLIVEWP_TEMPLATE_DIR_URI . '/assets/js/jquery' . $suffix . '.js', array('jquery'), '', true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'olivewp_scripts' );