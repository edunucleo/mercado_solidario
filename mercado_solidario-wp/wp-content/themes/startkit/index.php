<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package startkit
 */

get_header(); ?>
<section  id="blog-content" class="section-padding">
	<div class="container">
		<div class="row">
			
			<!--Blog Detail-->
			<div class="<?php esc_attr(startkit_post_layout()); ?>" >
					<?php 
					$startkit_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					$args = array( 'post_type' => 'post','paged'=>$startkit_paged );	
					$loop = new WP_Query( $args );
					?>
					<?php if( $loop->have_posts() ): ?>
					
						<?php while( $loop->have_posts() ): $loop->the_post(); ?>
							 <?php get_template_part('template-parts/content','page-grid'); ?>
						<?php endwhile; ?>
				<?php endif; ?>
				 <div class="paginations">
					<?php									
					// Previous/next page navigation.
					the_posts_pagination( array(
					'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
					'next_text'          => '<i class="fa fa-angle-double-right"></i>',
					) ); ?>
				 </div>
			</div>
			<?php get_sidebar(); ?>
			<!--/End of Blog Detail-->
		</div>	
	</div>
</section>
<?php get_footer(); ?>
