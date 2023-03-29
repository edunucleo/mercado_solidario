<?php
/**
 * Template part for displaying single post content
 *
 * @package OliveWP Theme
 */
$olivewp_single_post_order = get_theme_mod( 'olivewp_single_post_order', array( 'post_image','post_meta', 'post_title','post_content'));
$olivewp_single_post_thumbnail_top='';
$olivewp_single_post_thumbnail_bottom='';
$olivewp_only_single_thumbnail='';
if(( sizeof($olivewp_single_post_order)==1)  && ($olivewp_single_post_order[0] =='post_image') && (! has_post_thumbnail())){ $olivewp_only_single_thumbnail=1;}
if(!empty($olivewp_single_post_order) && $olivewp_only_single_thumbnail!=1):
if(has_post_thumbnail()):
	if($olivewp_single_post_order[array_key_first($olivewp_single_post_order)]=='post_image') { $olivewp_single_post_thumbnail_top='thumbnail_top';}
	if(end($olivewp_single_post_order)=='post_image') { $olivewp_single_post_thumbnail_bottom='thumbnail_bottom';}
endif; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post single '.$olivewp_single_post_thumbnail_top.''.$olivewp_single_post_thumbnail_bottom.''); ?> >	
	<?php ?>
	<!-- Post Featured Image -->
	<?php 
	if ( ! empty( $olivewp_single_post_order ) && is_array( $olivewp_single_post_order ) ) :
		foreach ( $olivewp_single_post_order as $olivewp_single_post_order_key => $olivewp_single_post_order_val ) :
			if ( 'post_image' === $olivewp_single_post_order_val ) : 
				if(has_post_thumbnail()): ?>
					<figure class="post-thumbnail">
						<?php the_post_thumbnail('full', array('class'=>'img-fluid', 'loading' => false )); ?>
					</figure>
				<?php endif; 
			endif;?>
	
			<!-- Entry Meta --> 
	        <?php          
	        $olivewp_single_post_meta_sort = get_theme_mod( 'olivewp_single_post_meta_sort', 
											array( 'single_post_date', 'single_post_category','single_post_comment'));
	        if ( ! empty( $olivewp_single_post_meta_sort )): 
				if ( 'post_meta' === $olivewp_single_post_order_val ) :?>
					<div class="entry-meta">
						<!-- Post Date -->
						<?php 
						if ( ! empty( $olivewp_single_post_meta_sort ) && is_array( $olivewp_single_post_meta_sort ) ) :
							foreach ( $olivewp_single_post_meta_sort as $olivewp_single_post_meta_sort_key => $olivewp_single_post_meta_sort_val ) :
								if ( 'single_post_date' === $olivewp_single_post_meta_sort_val ) : ?>	
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
								<?php if ( 'single_post_category' === $olivewp_single_post_meta_sort_val ) :
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
								endif; ?>

								<!-- Post Comments -->
								<?php 
								if ( 'single_post_comment' === $olivewp_single_post_meta_sort_val ) :  ?>
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
						endif;?>
					</div>
				
				<?php if(get_theme_mod('olivewp_enable_separator',true)==true):?><div class="spice-seprator"></div>
				<?php 
			endif;
				endif;
			endif;
			if ( 'post_title' === $olivewp_single_post_order_val ) :?>
				<!-- Post Title -->
				<header class="entry-header">
					<h3 class="entry-title">
						<?php the_title();?>
					</h3>                                                  
				</header>
			<?php endif;
			if ( 'post_content' === $olivewp_single_post_order_val ) :?>
				<!-- Post Content -->
				<div class="entry-content">
					<?php the_content();
					wp_link_pages( ); ?> 
				</div>
			<?php endif;
		endforeach;
	endif;
	if(get_theme_mod('olivewp_enable_single_post_tag',true)==true):
		if(has_tag()): ?>
			<div class="spice-seprator"></div>
			<div class="footer-meta entry-meta">
				<span class="tag-links"><?php the_tags('',' ');?></span>
			</div>
		<?php endif;
	endif; ?>
</article>
<?php endif;?>