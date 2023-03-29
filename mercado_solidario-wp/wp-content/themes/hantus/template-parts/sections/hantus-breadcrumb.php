<?php 
$hantus_breadcrumb			= get_theme_mod('hide_show_breadcrumb','1');
$hantus_bread_bg_setting	= get_theme_mod('breadcrumb_background_setting',get_template_directory_uri() .'/assets/images/bg/breadcrumb-bg.jpg'); 
if($hantus_breadcrumb == '1') :
?>
<section id="breadcrumb-area" style="background:url('<?php echo esc_url($hantus_bread_bg_setting); ?>') no-repeat center scroll;">

	<div class="container">
            <div class="row">
                <div class="col-12 text-center">
					<h2>
						<?php 
							if ( is_day() ) : 
							
								printf( __( 'Daily Archives: %s', 'hantus' ), get_the_date() );
							
							elseif ( is_month() ) :
							
								printf( __( 'Monthly Archives: %s', 'hantus' ), (get_the_date( 'F Y' ) ));
								
							elseif ( is_year() ) :
							
								printf( __( 'Yearly Archives: %s', 'hantus' ), (get_the_date( 'Y' ) ) );
								
							elseif ( is_category() ) :
							
								printf( __( 'Category Archives: %s', 'hantus' ), (single_cat_title( '', false ) ));

							elseif ( is_tag() ) :
							
								printf( __( 'Tag Archives: %s', 'hantus' ), (single_tag_title( '', false ) ));
								
							elseif ( is_404() ) :

								printf( __( 'Error 404', 'hantus' ));
								
							elseif ( is_author() ) :
							
								printf( __( 'Author: %s', 'hantus' ), (get_the_author( '', false ) ));		
							
							else :
									the_title();
									
							endif;
							
						?>
					</h2>
					<ul class="breadcrumb-nav list-inline">
						<?php if (function_exists('hantus_breadcrumbs')) hantus_breadcrumbs();?>
					</ul>
			</div>
		</div>
	</div>
</section>
<?php 
endif;
?>