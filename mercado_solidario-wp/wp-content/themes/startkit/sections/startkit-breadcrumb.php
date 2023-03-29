<?php 
$startkit_hs_bread			= get_theme_mod('hide_show_breadcrumb','1');
$startkit_bread_bg_setting  = get_theme_mod('breadcrumb_background_setting',esc_url(get_template_directory_uri() .'/images/breadcumb-bg.jpg')); 

if($startkit_hs_bread == '1') :

?>
<section id="breadcrumb-area" style="background:url('<?php echo esc_url($startkit_bread_bg_setting); ?>') no-repeat center scroll;">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
					<h1>
						<?php 
							if ( is_home() || is_front_page()):
			
								single_post_title();
											
							elseif ( is_day() ) : 
							
								printf( __( 'Daily Archives: %s', 'startkit' ), get_the_date() );
							
							elseif ( is_month() ) :
							
								printf( __( 'Monthly Archives: %s', 'startkit' ), (get_the_date( 'F Y' ) ));
								
							elseif ( is_year() ) :
							
								printf( __( 'Yearly Archives: %s', 'startkit' ), (get_the_date( 'Y' ) ) );
								
							elseif ( is_category() ) :
							
								printf( __( 'Category Archives: %s', 'startkit' ), (single_cat_title( '', false ) ));

							elseif ( is_tag() ) :
							
								printf( __( 'Tag Archives: %s', 'startkit' ), (single_tag_title( '', false ) ));
								
							elseif ( is_404() ) :

								printf( __( 'Error 404', 'startkit' ));
								
							elseif ( is_author() ) :
							
								printf( __( 'Author: %s', 'startkit' ), (get_the_author( '', false ) ));		
								
							else :
									the_title();
							endif;
						?>
					</h1>
					<ul class="breadcrumb-nav list-inline">
						<?php if (function_exists('startkit_breadcrumbs')) startkit_breadcrumbs();?>
					</ul>
			</div>
		</div>
	</div>
</section>
<section id="startkitdrops" class="startkitdrops" style="height: 28px;"></section>
<?php
	else :
?>	
	<div class="breadcrumb_space"></div>
<?php 			
	endif;
?>