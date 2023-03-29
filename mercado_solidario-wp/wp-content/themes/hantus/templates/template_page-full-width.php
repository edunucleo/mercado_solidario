<?php
/**
Template Name: Page Fullwidth
**/

get_header();
?>
<section id="site-content" class="full-width section-padding">
	<div class="container">
		<div class="row full-width">
			<div class="col-md-12 col-sm-12" >
				<div class="site-content">
					<?php 
						if ( has_post_thumbnail() ) { 
							 the_post_thumbnail(); 
						 } 
					 ?>	
					<?php the_post(); the_content(); ?>
				</div>
				
				<?php 
					if( $post->comment_status == 'open' ) { 
						comments_template( '', true ); // show comments
					}
				?>	
			</div>	
		</div>
	</div>
</section>
<?php get_footer(); ?>

