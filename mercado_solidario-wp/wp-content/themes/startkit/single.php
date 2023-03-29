<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package startkit
 */

get_header();
?>
<section  id="blog-content">
	<div class="container">
		<div class="row">
			<div class="<?php esc_attr(startkit_post_layout()); ?>" >
			<?php if( have_posts() ): ?>
					
						<?php while( have_posts() ): the_post(); ?>
							<?php get_template_part('template-parts/content','page-grid'); ?>
						<?php endwhile; ?>
						
						<!-- Pagination -->
						
								<div class="paginations">
									<?php						
										// Previous/next page navigation.
										the_posts_pagination( 
											array(
												'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
												'next_text'          => '<i class="fa fa-angle-double-right"></i>',
											) 
										); 
									?>
								</div>
					
						<!-- Pagination -->
						
					<?php else: ?>
						
						<?php get_template_part('template-parts/content','none'); ?>
						
					<?php endif; ?>
					<?php comments_template( '', true ); // show comments  ?>
			</div>
				<?php get_sidebar(); ?>
		</div>
	</div>
</section>	
<!-- End of Blog & Sidebar Section -->
 
<div class="clearfix"></div>

<?php get_footer(); ?>
