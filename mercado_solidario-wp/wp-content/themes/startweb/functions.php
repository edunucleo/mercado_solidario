<?php
/**
 * Define Theme Version
 */
define( 'STARTWEB_THEME_VERSION', '2.0' );

function startweb_css() {
	$parent_style = 'startkit-parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'startweb-style', get_stylesheet_uri(), array( $parent_style ));
	
	wp_enqueue_style('startweb-color-default',get_stylesheet_directory_uri() .'/css/colors/default.css');
	wp_dequeue_style('startkit-color-default');
	
	wp_enqueue_style('startweb-responsive',get_stylesheet_directory_uri().'/css/responsive.css');
	wp_dequeue_style('startkit-responsive');

}
add_action( 'wp_enqueue_scripts', 'startweb_css',999);

/**
 * Called all the Customize file.
 */
require( get_stylesheet_directory() . '/inc/customize/startweb-premium.php');
   	
/**
 * Import Options From Parent Theme
 *
 */
function startweb_parent_theme_options() {
	$startkit_mods = get_option( 'theme_mods_startkit' );
	if ( ! empty( $startkit_mods ) ) {
		foreach ( $startkit_mods as $startkit_mod_k => $startkit_mod_v ) {
			set_theme_mod( $startkit_mod_k, $startkit_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'startweb_parent_theme_options' );