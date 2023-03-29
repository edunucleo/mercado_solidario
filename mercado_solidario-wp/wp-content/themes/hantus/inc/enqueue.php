<?php
 /**
 * Enqueue scripts and styles.
 */
function hantus_scripts() {
	
	// Styles
	
	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/assets/css/bootstrap.min.css');
	
	wp_enqueue_style('meanmenu-min',get_template_directory_uri().'/assets/css/meanmenu.min.css');	
	
	wp_enqueue_style('hantus-typography', get_template_directory_uri() .'/assets/css/typography/typograhpy.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/fonts/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_style('owl-carousel-min',get_template_directory_uri().'/assets/css/owl.carousel.min.css');

	wp_enqueue_style('hantus-wp-test',get_template_directory_uri().'/assets/css/wp-test.css');
	wp_enqueue_style('hantus-woocommerce',get_template_directory_uri().'/assets/css/woo.css');
	
	wp_enqueue_style('hantus-widget',get_template_directory_uri().'/assets/css/widget.css');
	
	wp_enqueue_style( 'hantus-style', get_stylesheet_uri() );
	wp_enqueue_style('hantus-responsive',get_template_directory_uri().'/assets/css/responsive.css');
	wp_enqueue_style('hantus-default', get_template_directory_uri() . '/assets/css/colors/default.css');
	
	// Scripts
	
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0', true);
	
	wp_enqueue_script('jquery-owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), true);

	wp_enqueue_script('meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('hantus-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'),true);

	wp_enqueue_script( 'hantus-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hantus_scripts' );

//Customizer Enqueue for Premium Buttons
function hantus_premium_css()	{
	wp_enqueue_style('hantus-style-customizer',get_template_directory_uri(). '/assets/css/style-customizer.css');
}
add_action('customize_controls_print_styles','hantus_premium_css');


function hantus_customizer_script() {
	wp_enqueue_script( 'hantus-customizer-section', get_template_directory_uri() .'/assets/js/customizer-section.js', array("jquery"),'', true  );	
}
add_action( 'customize_controls_enqueue_scripts', 'hantus_customizer_script' );

if ( ! function_exists( 'hantus_admin_scripts' ) ) :
function hantus_admin_scripts() {
    wp_enqueue_media();
	wp_enqueue_style( 'hantus-admin-styles', get_template_directory_uri() .'/assets/css/admin.css' );
    wp_enqueue_script( 'hantus-admin-script', get_template_directory_uri() . '/assets/js/hantus-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'hantus-admin-script', 'hantus_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
endif;
add_action( 'admin_enqueue_scripts', 'hantus_admin_scripts' );
