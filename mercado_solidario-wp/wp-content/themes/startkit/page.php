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
 * @package startkit
 */

get_header(); ?>

<section id="service-page" class="section-padding-80">
	<div class="container">
		<div class="row">		
			<?php 
				echo '<div class="col-lg-'.( !is_active_sidebar( "sidebar-primary" ) ?"12" :"9" ).'">';
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
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>

<?php get_footer(); ?>

