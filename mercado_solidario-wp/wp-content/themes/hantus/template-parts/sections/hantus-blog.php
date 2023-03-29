<!-- Start: Recent Blog
============================= -->
<?php 
	$hantus_hs_blog 			= get_theme_mod('hide_show_blog','1');
	$hantus_blog_title 			= get_theme_mod('blog_title');
	$hantus_blog_desc 			= get_theme_mod('blog_description');
	$hantus_blog_display_num 	= get_theme_mod('blog_display_num','3');	
	if($hantus_hs_blog == '1') { 
?>
 <section id="blog-content" class="section-padding">
        <div class="container">
			<div class="row">
                <div class="col-lg-6 offset-lg-3 col-12 text-center">
					<div class="section-title service-section">
						<?php if($hantus_blog_title) { ?>
							<h2><?php echo esc_html($hantus_blog_title); ?></h2>
						<?php } ?>	
						<?php if($hantus_blog_desc) { ?>
							<p><?php echo esc_html($hantus_blog_desc); ?></p>
						<?php } ?>	
					</div>
				</div>
			</div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
						<?php 	
							$hantus_blog_args = array( 'post_type' => 'post','posts_per_page' => $hantus_blog_display_num,'post__not_in'=>get_option("sticky_posts")) ; 
								$hantus_wp_query = new WP_Query($hantus_blog_args);
								if($hantus_wp_query)
								{	
								while($hantus_wp_query->have_posts()):$hantus_wp_query->the_post(); ?>
									<div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-4">
										<article class="blog-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<div class="post-thumb">
												<?php if ( has_post_thumbnail() ) { ?>
													<?php the_post_thumbnail(); ?>
												<?php } ?>	
											</div>

											<div class="post-content">
												<ul class="meta-info">
													<li class="post-date"><a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><?php esc_html_e('On','hantus'); ?> <?php echo esc_html(get_the_date('j M Y')); ?></a></li>
													<li class="posted-by"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html_e('By','hantus'); ?> <?php esc_html(the_author()); ?></a></li>
												</ul>
												<?php     
													if ( is_single() ) :
														the_title('<h4  class="post-title">', '</h4 >' );
													else:
														the_title( sprintf( '<h4  class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4 >' );
													endif; 
													the_content( 
														sprintf( 
															__( 'Read More', 'hantus' ), 
															'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
														) 
													);
												?>
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
			</div>
		</div>
	</section>
<?php } ?>	