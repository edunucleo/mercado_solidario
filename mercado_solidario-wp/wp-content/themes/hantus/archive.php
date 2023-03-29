<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hantus
 */

get_header();
?>
<section id="blog-content" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Blog Content -->
                <div class="<?php esc_attr(hantus_post_layout()); ?> mb-5 mb-lg-0">
					<?php if( have_posts() ): ?>
						<div class="row">
							<?php while( have_posts() ): the_post(); ?>
								<?php get_template_part('template-parts/content/content','page'); ?>
							<?php endwhile; ?>
						</div>  
                   <?php else: ?>
						<?php get_template_part('template-parts/content/content','none'); ?>
					<?php endif; ?>
                </div>
                <!-- Sidebar -->
                <?php get_sidebar(); ?>
            </div>
        </div>
</section>
<?php get_footer(); ?>
