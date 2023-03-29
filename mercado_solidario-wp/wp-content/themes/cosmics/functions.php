<?php
/**
 * Define Theme Version
 */
define( 'COSMICS_THEME_VERSION', '1.7' );

function cosmics_css() {
	$parent_style = 'hantus-parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'cosmics-style', get_stylesheet_uri(), array( $parent_style ));
	
	wp_enqueue_style('cosmics-default',get_stylesheet_directory_uri() .'/assets/css/colors/default.css');
	wp_dequeue_style('hantus-default');
	
	wp_enqueue_style('cosmics-responsive',get_stylesheet_directory_uri().'/assets/css/responsive.css');
	wp_dequeue_style('hantus-responsive');

}
add_action( 'wp_enqueue_scripts', 'cosmics_css',999);
 

/**
 * Called all the Customize file.
 */
require( get_stylesheet_directory() . '/inc/customize/cosmics-premium.php');

/**
 * Import Options From Parent Theme
 *
 */
function cosmics_parent_theme_options() {
	$hantus_mods = get_option( 'theme_mods_hantus' );
	if ( ! empty( $hantus_mods ) ) {
		foreach ( $hantus_mods as $hantus_mod_k => $hantus_mod_v ) {
			set_theme_mod( $hantus_mod_k, $hantus_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'cosmics_parent_theme_options' );