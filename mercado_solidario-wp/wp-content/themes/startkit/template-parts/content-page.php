<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package startkit
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post blog-style-1'); ?>>
	<?php if ( has_post_thumbnail() ) { ?> 
		<div class="post-thumbnail">
			<ul class="meta-info list-inline">
				<li class="posted-by"><i class="fa  fa-user"></i> <?php esc_html_e('By','startkit'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html(the_author()); ?></a></li>
				<li class="post-date"><a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><i class="fa fa-calendar"></i> <?php echo esc_html(get_the_date('j M, Y')); ?></a></li>				
				<li class="post-category"><i class="fa fa-folder-open"></i> <a href="<?php esc_url(the_permalink()); ?>"><?php the_category(', '); ?></a></li>
			</ul>
			<a  href="<?php esc_url(the_permalink()); ?>" class="img-responsive center-block" ><?php the_post_thumbnail(); ?></a>
		</div>
	<?php } ?>
	<div class="post-content">
		<div class="post-content-inner read-more-wrapper">
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
					__( 'Read More', 'startkit' ), 
					'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
				) 
			);
		?>
		</div>
	</div>
</article>			