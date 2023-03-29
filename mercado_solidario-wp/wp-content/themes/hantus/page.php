<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hantus
 */

get_header();
?>

<section id="default-page" class="section-padding">
	<div class="container">		
		<div class="row padding-top-60 padding-bottom-60">		
			<?php 
				echo '<div class="col-lg-'.( !is_active_sidebar( "hantus-sidebar-primary" ) ?"12" :"8" ).'">';
			?>
				<div class="site-content">
					<?php 
						if( have_posts()) :  the_post();
						the_content(); 
						endif;
						if( $post->comment_status == 'open' ) { 
							comments_template( '', true ); // show comments 
						}
					?>
				</div><!-- /.posts -->		
			</div><!-- /.col -->
			<!--/End of Blog Detail-->
			<?php get_sidebar(); ?>	
		</div>
	</div><!-- /.container -->
</section>

<?php get_footer(); ?>

