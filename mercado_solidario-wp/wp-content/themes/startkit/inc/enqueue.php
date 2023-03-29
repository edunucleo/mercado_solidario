<?php
 /**
 * Enqueue scripts and styles.
 */
function startkit_scripts() {
	
	// Styles

	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/css/bootstrap.min.css');
	
	wp_enqueue_style('meanmenu-min',get_template_directory_uri().'/css/meanmenu.min.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/fonts/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_style('animate',get_template_directory_uri().'/css/animate.css');

	wp_enqueue_style('startkit-widget',get_template_directory_uri().'/css/widget.css');
	
	wp_enqueue_style('startkit-color-default',get_template_directory_uri().'/css/colors/default.css');
	
	wp_enqueue_style('startkit-wp-test',get_template_directory_uri().'/css/wp-test.css');
	
	wp_enqueue_style('startkit-menu',get_template_directory_uri().'/css/menu.css');	
	
	wp_enqueue_style( 'startkit-style', get_stylesheet_uri() );
	
	wp_enqueue_style('startkit-gutenberg',get_template_directory_uri().'/css/gutenberg.css');
	
	wp_enqueue_style('startkit-responsive',get_template_directory_uri().'/css/responsive.css');
	
	// Scripts
	wp_enqueue_script( 'jquery-ui-core');
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.3.1', true); 
	
	wp_enqueue_script('sticky-js', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), false, true);
	
	wp_enqueue_script('meanmenu', get_template_directory_uri() . '/js/jquery.meanmenu.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('wow-js', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('startkit-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), false, true);
	
	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'startkit_scripts' );

//Admin Enqueue for Admin
function startkit_admin_enqueue_scripts(){	
	wp_enqueue_style('startkit-style-customizer',get_template_directory_uri(). '/css/style-customizer.css');
	wp_enqueue_script( 'startkit-admin-script', get_template_directory_uri() . '/js/startkit-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'startkit-admin-script', 'startkit_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'startkit_admin_enqueue_scripts' );

function startkit_customizer_script() {
	 wp_enqueue_script( 'startkit_customizer_section', get_template_directory_uri() .'/js/customizer-section.js', array("jquery"),'', true  );	
}
add_action( 'customize_controls_enqueue_scripts', 'startkit_customizer_script' );
?>