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
 * @package hantus
 */

get_header(); ?>

<section id="blog-content" class="full-width section-padding">
        <div class="container">
            <div class="row">				
				<div class="<?php esc_attr(hantus_post_layout()); ?> mb-lg-0 mb-4">
					<?php 
						$hantus_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						$args = array( 'post_type' => 'post','paged'=>$hantus_paged );	
					?>
					<?php if( have_posts() ): ?>
						<div class="row">
							<?php while( have_posts() ): the_post(); ?>
									<?php get_template_part('template-parts/content/content','page'); ?> 
							<?php endwhile; ?>
						</div>
						<div class="paginations">
							<?php								
							// Previous/next page navigation.
							the_posts_pagination( array(
							'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
							'next_text'          => '<i class="fa fa-angle-double-right"></i>',
							) ); ?>
						</div>
						<?php else: ?>
							<?php get_template_part('template-parts/content/content','none'); ?>
						<?php endif; ?>
				</div>		
			 <?php get_sidebar(); ?>
            </div>
        </div>
    </section>


<div class="clearfix"></div>

<?php get_footer(); ?>
