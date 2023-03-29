<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package startkit
 */

get_header();
?>
<!-- Start: 404 page
============================= -->
<section id="wrapper-404">
	<div class="container">
		<div class="inner-content">
			<div class="row">
				<div class="col-md-6 text-center text-md-right">
					<img src=<?php echo esc_url(get_template_directory_uri()."/images/404robot.png"); ?> alt="">
				</div>
				<div class="col-md-6 text-center text-md-left">
					<h1><?php esc_html_e('404','startkit'); ?></h1>
					<p><?php esc_html_e( 'Ops! Something happened...', 'startkit' ); ?></p>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="boxed-btn reload"><?php esc_html_e( 'Home', 'startkit' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End: 404 page
 ============================= -->

<?php get_footer(); ?>
