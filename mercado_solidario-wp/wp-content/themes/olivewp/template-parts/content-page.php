<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package OliveWP Theme
 */

?>

<article <?php post_class('post'); ?> >
	<div class="post-content">
		<?php if(has_post_thumbnail()) {
			if ( is_single() ) { ?>
				<figure class="post-thumbnail">
					<?php the_post_thumbnail('full', array('class'=>'img-fluid', 'loading' => false )); ?>					
				</figure>
			<?php }
			else { ?>
				<figure class="post-thumbnail">
					<a href="<?php the_permalink(); ?>" >
						<?php the_post_thumbnail('full', array('class'=>'img-fluid', 'loading' => false )); ?>
					</a>				
				</figure>
			<?php }
		}?>					
		<div class="entry-content">
			<?php the_content();?>
		</div>
	</div>
</article>