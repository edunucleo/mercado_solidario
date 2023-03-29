<!-- Start: Recent Blog
============================= -->
<?php 
	$startkit_hs_blog 		= get_theme_mod('hide_show_blog','1');
	$startkit_blog_title 	= get_theme_mod('blog_title');
	$startkit_blog_subttl 	= get_theme_mod('blog_subttl');
	$startkit_blog_desc 	= get_theme_mod('blog_description'); 
	$startkit_blog_display_num = get_theme_mod('blog_display_num','3');
?>
<?php if($startkit_hs_blog == '1') {?>
<section id="recent-blog" class="section-padding">
	<div class="container">
		<?php if ( ! empty( $startkit_blog_title ) || ! empty( $startkit_blog_subttl )  || ! empty( $startkit_blog_desc )) :?>
			<div class="row">
				<div class="col-md-6 offset-md-3 text-center">
					<div class="section-header">
						<?php if ( ! empty( $startkit_blog_subttl ) ) : ?>
							<div class="subtitle"><?php echo wp_kses_post( $startkit_blog_subttl ); ?></div>
						<?php endif; ?>
						<?php if($startkit_blog_title) { ?>
							<h2><?php echo esc_html($startkit_blog_title); ?></h2>
						<?php } ?>
						<hr class="liner">
						<?php if($startkit_blog_desc) { ?>
							<p class="wow fadeInUp" data-wow-delay="0.1s"><?php echo esc_html($startkit_blog_desc); ?></p>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row">
			<?php 	
					$startkit_args = array( 'post_type' => 'post','posts_per_page' => $startkit_blog_display_num,'post__not_in'=>get_option("sticky_posts")) ; 
					$startkit_wp_query = new WP_Query($startkit_args);
					if($startkit_wp_query)
					{	
					while($startkit_wp_query->have_posts()):$startkit_wp_query->the_post(); ?>
					<div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-4">
						<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post blog-style-2'); ?>>
							<div class="post-thumbnail">
								<div class="post-overlayed">
									<?php if ( has_post_thumbnail() ) { ?>
									<?php $tag_list = get_the_tag_list();
									$before = '';
									$seperator = ''; // blank instead of comma
									$after = '';
									if(!empty($tag_list)) { ?>                                      
									<div class="tags tags-cat"><a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-hand-o-right"></i> <?php the_tags( $before, $seperator, $after ); ?></a></div>
									<?php } ?>                                  
									<?php } ?>
									<a  href="<?php esc_url(the_permalink()); ?>" class="img-responsive center-block home-blogs" ><?php the_post_thumbnail(); ?></a>
								</div>
							</div>
							<div class="post-content">
								<div class="post-content-inner read-more-wrapper">
									<div class="post-date"><?php echo esc_html(get_the_date('j M Y')); ?></div>
									<?php     
										if ( is_single() ) :
										
										the_title('<h5 class="post-title">', '</h5>' );
										else:
										the_title( sprintf( '<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
										endif; 
									?>
								   <?php 
										the_content( 
											sprintf( 
												__( 'Read More', 'startkit' ), 
												'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
											) 
										);
									?>
								</div><!-- .entry-content -->
							</div>
							<div class="post-footer">
								<div class="post-author">
									<div class="posted-by"><i class="fa fa-user" aria-hidden="true"></i> <?php esc_html_e('By','startkit'); ?> <a class="url fn n" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html(the_author()); ?></a></div>
								</div>
								<div class="post-cat">
									<?php $cat_list = get_the_category_list();
									if(!empty($cat_list)) { ?>                                      
									<div class="post-category"><i class="fa fa-folder-open" aria-hidden="true"></i> <a href="<?php esc_url(the_permalink()); ?>"> <?php the_category(', '); ?></a></div>
									<?php } ?>
								</div>
							</div>
						</article>
					</div>
			<?php 
				endwhile; 
				wp_reset_postdata(); 
				}
			?>
		</div>
	</div>
</section>
<?php } ?>
<!-- End: Recent Blog
============================= -->