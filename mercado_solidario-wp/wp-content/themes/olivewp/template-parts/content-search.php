<?php
/**
 * Template part for displaying results in search pages
 *
 * @package OliveWP Theme
 */
$olivewp_blog_post_order = get_theme_mod('olivewp_blog_post_order',array( 'blog_image','blog_meta', 'blog_title','blog_content'));
$olivewp_thumbnail_top='';
$olivewp_thumbnail_bottom='';
if(has_post_thumbnail()):
	if($olivewp_blog_post_order[array_key_first($olivewp_blog_post_order)]=='blog_image') { $olivewp_thumbnail_top='thumbnail_top';}
	if(end($olivewp_blog_post_order)=='blog_image') { $olivewp_thumbnail_top='thumbnail_bottom';}
endif; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post '.$olivewp_thumbnail_top.''.$olivewp_thumbnail_bottom.''); ?> >
	<?php $olivewp_blog_post_order = get_theme_mod( 'olivewp_blog_post_order', 
									array( 'blog_image','blog_meta', 'blog_title','blog_content'));	
	if ( ! empty( $olivewp_blog_post_order ) && is_array( $olivewp_blog_post_order ) ) :
		foreach ( $olivewp_blog_post_order as $olivewp_blog_post_order_key => $olivewp_blog_post_order_val ) :
			if ( 'blog_image' === $olivewp_blog_post_order_val ) :
				if(has_post_thumbnail()): ?>
					<figure class="post-thumbnail">
						<a href="<?php the_permalink(); ?>" >
							<?php the_post_thumbnail('full', array('class'=>'img-fluid', 'loading' => false )); ?>
						</a>				
					</figure>
				<?php endif; 
			endif;
			if ( 'blog_meta' === $olivewp_blog_post_order_val ) :?>
			        <!-- Entry Meta --> 
					<div class="entry-meta">
						<?php 
						/**
			 			* Meta Drag & Drop Feature
			 			*/ 
			 			$olivewp_meta_sort = get_theme_mod( 'olivewp_blog_meta_sort', 
												array('blog_date','blog_category','blog_comment')
									);
			 			if ( ! empty( $olivewp_meta_sort ) && is_array( $olivewp_meta_sort ) ) :
			 				foreach ( $olivewp_meta_sort as $olivewp_meta_sort_key => $olivewp_meta_sort_val ) : ?>
			 					
			 					<!-- Post Author -->
			 					<?php if ( 'blog_date' === $olivewp_meta_sort_val ) : ?>	
									<span class="date">	
										<?php if(get_theme_mod('olivewp_enable_meta_icon',true)==true):?>
											<i class="far fa-clock"></i>
										<?php 
										else: 
											echo '<span class="meta-links">'.esc_html__('Posted on:','olivewp').'</span>';
										endif;?>
										<a href="<?php echo esc_url(home_url()); ?>/<?php echo esc_html(date('Y/m', strtotime(get_the_date()))); ?>" alt="<?php esc_attr_e('date-time','olivewp'); ?>">
										   <time class="entry-date"><?php echo esc_html(get_the_date()); ?></time>
										</a>
									</span>
								<?php endif; ?>

								<!-- Post Category -->
								<?php if ( 'blog_category' === $olivewp_meta_sort_val ) :
									if ( has_category() ) :
										echo '<span class="cat-links">';
										if(get_theme_mod('olivewp_enable_meta_icon',true)==true):?>
											<i class="far fa-folder-open"></i>
										<?php 
										else: 
											echo '<span class="meta-links">'.esc_html__('Posted in:','olivewp').'</span>';
										endif; 
										the_category( ', ' );
										echo '</span>';
									endif; 
								endif;?>

								<!-- Post Comment -->
								<?php if ( 'blog_comment' === $olivewp_meta_sort_val ) : ?>
									<span class="comments-link">
										<?php if(get_theme_mod('olivewp_enable_meta_icon',true)==true):?>
											<i class="far fa-comment-alt"></i>
										<?php 
										else: 
											echo '<span class="meta-links">'.esc_html__('Comment:','olivewp').'</span>';
										endif;?>
							     		<a href="<?php the_permalink(); ?>#respond" alt="<?php esc_attr_e('Comments','olivewp'); ?>">
							     			<?php echo esc_html(get_comments_number()); ?>&nbsp;<?php echo esc_html__('Comments','olivewp'); ?>
								     	</a>
							     	</span>
								<?php endif; 
							endforeach;
						endif; ?>
					</div>
				<?php endif;

				if ( 'blog_title' === $olivewp_blog_post_order_val ) :?>
					<!-- Post Title -->
					<header class="entry-header">
						<h3 class="entry-title">
							<a href="<?php the_permalink();?>"><?php the_title();?></a>
						</h3>                                                  
					</header>
				<?php endif;

				if ( 'blog_content' === $olivewp_blog_post_order_val ) :?>

					<!-- Post Content -->
					<div class="entry-content">
						<?php do_action( 'olivewp_post_content_data' ); ?>
						<div class="spice-seprator"></div>
						<div class="footer-meta entry-meta">
							<i class="far fa-user"></i>
							<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><span class="author"><?php echo esc_html(get_the_author());?></span></a>
						</div> 
						<?php $olivewp_button_show_hide=get_theme_mod('olivewp_blog_content','excerpt');
						if($olivewp_button_show_hide=="excerpt")
						{	
							if(get_theme_mod('olivewp_plus_enable_post_read_more',true)==true):?>
								<a href="<?php echo esc_url(get_the_permalink());?>" class="more-link" alt="more-details"><?php esc_html_e('Read More','olivewp');?><i class="fas fa-chevron-right"></i></a>
							<?php 
							endif;
						} ?>
					</div>
				<?php 
				endif;
		endforeach;
	endif;?>
</article>