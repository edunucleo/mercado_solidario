<!-- Start: Footer Sidebar
============================= -->
<?php if ( is_active_sidebar( 'footer-widget-area' ) ) { ?>
	<footer id="footer-widgets" class="footer-sidebar footer_bg">
		<div class="footer-widgets">
			<div class="container">
				<div class="row">
					<?php  dynamic_sidebar( 'footer-widget-area' ); ?>
				</div>
			</div>
		</div>
	</footer>
<?php } ?>
<!-- End: Footer Sidebar
============================= -->
<?php 
	$hide_show_copyright = get_theme_mod('hide_show_copyright','1');	
	$copyright_content   = get_theme_mod('copyright_content','Copyright &copy; [current_year] [site_title] | Powered by [theme_author]');
?>

<section id="footer-copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="text-center">
					<?php if($hide_show_copyright == '1') { ?>
						<p>
							 <?php 
									$startkit_copyright_allowed_tags = array(
										'[current_year]' => date_i18n('Y'),
										'[site_title]'   => get_bloginfo('name'),
										'[theme_author]' => sprintf(__('<a href="#" target="_blank">StartKit</a>', 'startkit')),
									);
									echo apply_filters('startkit_footer_copyright', wp_kses_post(startkit_str_replace_assoc($startkit_copyright_allowed_tags, $copyright_content)));
							 ?>
						</p>
					<?php  } ?>
					<a href="#" class="scrollup"><i class="fa fa-arrow-up"></i></a>
				</div>
			</div>
			 <div class="col-md-6">
				<?php 
					$hide_show_payment = get_theme_mod('hide_show_payment','1');
					$footer_Payment_icon= get_theme_mod('footer_Payment_icon'); 					
				?>
				<?php if($hide_show_payment == '1') { ?>
					<ul class="payment-icon">
						<?php
							$footer_Payment_icon = json_decode($footer_Payment_icon);
							if( $footer_Payment_icon!='' )
							{
							foreach($footer_Payment_icon as $footer_Payment_item){
							$icon = ! empty( $footer_Payment_item->icon_value ) ? apply_filters( 'startkit_translate_single_string', $footer_Payment_item->icon_value, 'footer section' ) : '';	
							$icon_link = ! empty( $footer_Payment_item->link ) ? apply_filters( 'startkit_translate_single_string', $footer_Payment_item->link, 'footer section' ) : '';	
						?>
							<?php if ( ! empty( $icon ) ) :?>
										<li><a href="<?php echo esc_url($icon_link); ?>"><i class="fa <?php echo esc_attr( $icon ); ?>"></i></a></li>
							<?php endif; ?>
						<?php  } } ?>
					</ul>
				<?php } ?>
            </div>
		</div>
	</div>
</section>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
