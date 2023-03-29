<?php	
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hantus
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
 
function hantus_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'hantus' ),
		'id' => 'hantus-sidebar-primary',
		'description' => __( 'Primary widget area', 'hantus' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'hantus' ),
		'id' => 'hantus-footer-widget-area',
		'description' => __( 'Footer Widget Area', 'hantus' ),
		'before_widget' => '<div class="col-lg-3 col-sm-6 mb-lg-0 mb-md-4 mb-4"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );	
}
add_action( 'widgets_init', 'hantus_widgets_init' );
 
?>