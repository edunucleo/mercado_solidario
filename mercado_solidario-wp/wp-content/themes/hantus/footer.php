<!-- Start: Footer Sidebar
============================= -->
<?php if ( is_active_sidebar( 'hantus-footer-widget-area' ) ) { ?>
	<footer id="footer-widgets" class="footer-sidebar">
		<div class="container">
			<div class="row">
				<?php  dynamic_sidebar( 'hantus-footer-widget-area' );  ?>
			</div>
		</div>
	</footer>
<?php } ?>
<!-- End: Footer Sidebar
============================= -->

<!-- Start: Footer Copyright
============================= -->
<?php 
	
	$hide_show_copyright 		= get_theme_mod('hide_show_copyright','1');	
	$copyright_content 			= get_theme_mod('copyright_content','Copyright &copy; [current_year] [site_title] | Powered by [theme_author]');
	$footer_background_setting  = get_theme_mod('footer_background_setting');
?>

	<section id="footer-copyright" style="background:url('<?php echo esc_url($footer_background_setting); ?>') no-repeat center / cover ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 text-lg-left text-center copyright-text">
                     <?php if($hide_show_copyright == '1') { ?>
						<ul id="menu-footer" class="">
							<li class="copy-content">
								<?php 	
									$hantus_copyright_allowed_tags = array(
										'[current_year]' => date_i18n('Y'),
										'[site_title]'   => get_bloginfo('name'),
										'[theme_author]' => sprintf(__('<a href="https://www.nayrathemes.com/">Hantus WordPress Theme</a>', 'hantus')),
									);
								?>
								<p>
									<?php
										echo apply_filters('hantus_footer_copyright', wp_kses_post(hantus_str_replace_assoc($hantus_copyright_allowed_tags, $copyright_content)));
									?>
								</p>
							  </li>
						</ul>
					<?php  } ?>	
                </div>
                <div class="col-lg-6 col-12">
                    <ul class="text-lg-right text-center payment-method">
						<?php 
							$hide_show_payment = get_theme_mod('hide_show_payment','1');
							$footer_Payment_icon= get_theme_mod('footer_Payment_icon'); 					
						?>
				
						<?php if($hide_show_payment == '1') { ?>
							<?php
				
								$footer_Payment_icon = json_decode($footer_Payment_icon);
								if( $footer_Payment_icon!='' )
								{
								foreach($footer_Payment_icon as $footer_Payment_item){
								$icon = ! empty( $footer_Payment_item->icon_value ) ? apply_filters( 'hantus_translate_single_string', $footer_Payment_item->icon_value, 'footer section' ) : '';	
								$icon_link = ! empty( $footer_Payment_item->link ) ? apply_filters( 'hantus_translate_single_string', $footer_Payment_item->link, 'footer section' ) : '';
							?>
							<?php if ( ! empty( $icon )) { ?>
									<li><a href="<?php echo esc_url($icon_link); ?>"><i class="fa <?php echo esc_attr( $icon ); ?>"></i></a></li>
						<?php  } } } } ?>
                    </ul>
					<a href="#" class="scrollup"><i class="fa fa-arrow-up"></i></a>
                </div>
            </div>
        </div>
    </section>
<!-- End: Footer Copyright
============================= -->
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
