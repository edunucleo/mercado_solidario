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
					
						<?php while( have_posts() ): the_post(); ?>
                            <article class="blog-post">
                                <div class="post-thumb">
                                     <?php the_post_thumbnail(); ?>
                                </div>

                                <div class="post-content">
										<ul class="meta-info">
											<li class="post-date"><a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><?php esc_html_e('On','hantus'); ?> <?php echo esc_html(get_the_date('j')); ?> <?php echo esc_html(get_the_date('M')); ?>, <?php echo esc_html(get_the_date('Y')); ?></a></li>
											<li class="posted-by"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html_e('By','hantus'); ?> <?php esc_html(the_author()); ?></a></li>
											 <li class="post-category"><a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-folder-open"></i> <?php the_category(', '); ?></a></li>
											<li class="comments-quantity"><a href="<?php echo esc_url(get_comments_link( $post->ID )); ?>"><i class="fa fa-wechat"></i> <?php echo esc_html(get_comments_number($post->ID)); ?> <?php esc_html_e('Comments','hantus'); ?></a></li>
										</ul>	
                                   <?php     
											if ( is_single() ) :
											
											the_title('<h4 class="post-title">', '</h4>' );
											
											else:
											
											the_title( sprintf( '<h4 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
											
											endif; 
										?>
                                    <?php 
										the_content( 
											sprintf( 
												__( 'Read More', 'hantus' ), 
												'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
											) 
										);
									?>
                                </div>
								<?php comments_template( '', true ); // show comments  ?>
                            </article>   
						<?php endwhile; ?>						
					<?php endif; ?>
						
                </div>
				<?php get_sidebar(); ?>
                <!-- Sidebar -->
                
            </div>

        </div>
    </section>

<div class="clearfix"></div>

<?php get_footer(); ?>
