<?php
/**
 * The header for our theme
 *
 * @package OliveWP Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<?php do_action('olivewp_wide_boxed_layout');
 	  wp_body_open(); ?>
<div id="page" class="site sps-port">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'olivewp' ); ?></a>

	<?php
	if ( (  function_exists( 'olivewp_plus_activate' ) ) && ( ! function_exists( 'ssh_activation' ) ) ) 
	{
		do_action( 'olivewp_plus_preloader' );
		do_action( 'olivewp_plus_header' );
									
	}
	elseif ( ( ! function_exists( 'olivewp_plus_activate' ) ) && (  function_exists( 'ssh_activation' ) ) ) 
	{
		do_action( 'olivewp_preloader' );
		do_action( 'ssh_header' );
									
	}
	elseif ( (  function_exists( 'olivewp_plus_activate' ) ) && (  function_exists( 'ssh_activation' ) ) ) 
	{
		do_action( 'olivewp_plus_preloader' );
		do_action( 'olivewp_plus_header' );
										
	}
	else
	{
		do_action( 'olivewp_preloader' );
		do_action( 'olivewp_header' );
										
	} 
	?>