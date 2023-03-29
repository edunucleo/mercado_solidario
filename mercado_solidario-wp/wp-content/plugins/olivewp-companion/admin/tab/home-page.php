<?php  
function olivewp_companion_home_page_fn(){
	$olivewp_companion_name = wp_get_theme();?>
	<div id="Home" class="tabcontent" style="display:block;">
		<div class="spice-container">
			<div class="spice-col-3"> 
				<div class="olivewp-page">
					<div class="olivewp-page-top"><?php 
					/* translators: %s: theme name */
					printf( esc_html__( 'Additional features in %s Plus', 'olivewp-companion' ), esc_html($olivewp_companion_name) ); ?>						
					</div>
					<div class="olivewp-page-content">
						<ul class="olivewp-page-list-flex first">
							<li>
								<?php echo esc_html__('Header Presets','olivewp-companion'); ?>
							</li>													
							<li>
								<?php echo esc_html__('Predefined Color Schemes','olivewp-companion'); ?>
							</li>									
							<li>
								<?php echo esc_html__('Multiple Search Effects','olivewp-companion'); ?>
							</li>															
							<li>
								<?php echo esc_html__('Post Navigation Styles','olivewp-companion'); ?>
							</li>
							<li>
								<?php echo esc_html__('Enhanced Footer Bar Settings','olivewp-companion'); ?>
							</li>									
							<li>
								<?php echo esc_html__('Additional Colors & Background Features','olivewp-companion'); ?>
							</li>
													
						</ul>
						<ul class="olivewp-page-list-flex second">									
							<li>
								<?php echo esc_html__('Multiple Blog Templates','olivewp-companion'); ?>
							</li>									
							<li>
								<?php echo esc_html__('Multiple Preloader Designs','olivewp-companion'); ?>
							</li>								
							<li>
								<?php echo esc_html__('Breadcrumb Settings','olivewp-companion'); ?>
							</li>								
							<li>
								<?php echo esc_html__('Enhanced Footer Widgets Settings','olivewp-companion'); ?>
							</li>									
							<li>
								<?php echo esc_html__('Additional Typography Features','olivewp-companion'); ?>
							</li>																	
							<li>
								<?php echo esc_html__('Enhanced Container Width Settings','olivewp-companion'); ?>
							</li>						
						</ul>
					</div>
				</div>
			</div>

			<div class="spice-col-3"> 					
				<div class="olivewp-page">
					<div class="olivewp-page-top"><?php esc_html_e( 'Useful Links', 'olivewp-companion' ); ?></div>
					<div class="olivewp-page-content">
						<ul class="olivewp-page-list-flex first">
							<li>
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://olivewp.org/starter-sites/'); ?>" target="_blank"><?php echo esc_html__('Starter Sites','olivewp-companion'); ?>											
								</a>
							</li>
						    <li> 
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://wordpress.org/support/theme/olivewp/reviews/#new-post'); ?>" target="_blank"><?php echo esc_html__('Your feedback is valuable to us','olivewp-companion'); ?>											
								</a>
							</li>									
						    <li> 
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://olivewp.org/contact/'); ?>" target="_blank"><?php echo esc_html__('Pre-sales enquiry','olivewp-companion'); ?>										
								</a>
							</li> 
							<li> 
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://olivewp.org/docs/'); ?>" target="_blank"><?php echo esc_html__('OliveWP Documentation','olivewp-companion'); ?>										
								</a>
							</li>									 
						</ul>
						<ul class="olivewp-page-list-flex second">
							<li>
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://wordpress.org/support/theme/olivewp/'); ?>" target="_blank"><?php 
									/* translators: %s: theme name */
									printf( esc_html__('%s Theme Support','olivewp-companion'), esc_html($olivewp_companion_name) ); ?>												
								</a>
							</li>										
							<li>
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://olivewp.org'); ?>" target="_blank"><?php 
									/* translators: %s: theme name */
									printf( esc_html__('%s Plus Details','olivewp-companion'), esc_html($olivewp_companion_name) ); ?>												
								</a>
							</li>
							<li> 
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://olivewp.org/olivewp-free-vs-plus/'); ?>" target="_blank"><?php echo esc_html__('Free vs Plus','olivewp-companion'); ?>								
								</a>
							</li>
							<li> 
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://olivewp.org/olivewp-changelog/'); ?>" target="_blank"><?php echo esc_html__('Changelog','olivewp-companion'); ?>									
								</a>
							</li>									 
						</ul>
					</div>
				</div>
			</div>		
		</div>
		<div class="owc-customizer-shortcode">
			<h2><?php echo esc_html__('Customizer Shortcuts','olivewp-companion');?></h2>

			<div class="sub-tab" id="trending-posts-tab">		
				<h4><?php echo esc_html__('Trending Posts','olivewp-companion');?></h4>
				<p><?php echo esc_html__('Highlight your most popular posts or products based on the number of comments.','olivewp-companion');?></p>
				<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=customizer_trending_post_panel' ) ); ?> 
				" class="owc-button"><?php echo esc_html__('Go to option','olivewp-companion');?></a>
			</div>

			<div class="sub-tab">		
				<h4><?php echo esc_html__('Color Options','olivewp-companion');?></h4>
				<p><?php echo esc_html__('Set the theme global colors, select the font, button and background colors.','olivewp-companion');?></p>
				<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=colors_back_settings' ) ); ?> 
				" class="owc-button"><?php echo esc_html__('Go to option','olivewp-companion');?></a>
			</div>

			<div class="sub-tab">		
				<h4><?php echo esc_html__('Breadcrumb','olivewp-companion');?></h4>
				<p><?php echo esc_html__('Set the theme Breadcrumb, Page Title Position, Markup and Alignment.','olivewp-companion');?></p>
				<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=bredcrumb_section' ) ); ?> 
				" class="owc-button"><?php echo esc_html__('Go to option','olivewp-companion');?></a>
			</div>

			<div class="sub-tab">		
				<h4><?php echo esc_html__('Container Width','olivewp-companion');?></h4>
				<p><?php echo esc_html__('Set the theme Container Width, adjust also Content Width and Sidebar Width.','olivewp-companion');?></p>
				<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=container_width_section' ) ); ?> 
				" class="owc-button"><?php echo esc_html__('Go to option','olivewp-companion');?></a>
			</div>

			<div class="sub-tab">		
				<h4><?php echo esc_html__('Sidebar Layout','olivewp-companion');?></h4>
				<p><?php echo esc_html__('Set the theme Sidebar Layout, select Blog/Archives, Single and Page Layout.','olivewp-companion');?></p>
				<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=sidebar_layout_setting_section' ) ); ?> 
				" class="owc-button"><?php echo esc_html__('Go to option','olivewp-companion');?></a>
			</div>

			<!-- Next Row -->
			<div class="sub-tab">		
				<h4><?php echo esc_html__('Blog Options','olivewp-companion');?></h4>
				<p><?php echo esc_html__('Set the theme Blog Layout, select Blog/Archives, Single and Meta settings.','olivewp-companion');?></p>
				<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=olivewp_theme_panel' ) ); ?> 
				" class="owc-button"><?php echo esc_html__('Go to option','olivewp-companion');?></a>
			</div>

			<div class="sub-tab">		
				<h4><?php echo esc_html__('Theme Style Settings','olivewp-companion');?></h4>
				<p><?php echo esc_html__('Set the theme Style & Layout, Select custom color skin and theme Layout.','olivewp-companion');?></p>
				<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=theme_style' ) ); ?> 
				" class="owc-button"><?php echo esc_html__('Go to option','olivewp-companion');?></a>
			</div>

			<div class="sub-tab">		
				<h4><?php echo esc_html__('General Settings','olivewp-companion');?></h4>
				<p><?php echo esc_html__('Set the theme General Settings, select Preloader, Sticky Header, Breadcrumb etc.','olivewp-companion');?></p>
				<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=olivewp_general_settings' ) ); ?> 
				" class="owc-button"><?php echo esc_html__('Go to option','olivewp-companion');?></a>
			</div>

			<div class="sub-tab">		
				<h4><?php echo esc_html__('Typography Settings','olivewp-companion');?></h4>
				<p><?php echo esc_html__('Set the theme Typography Settings, select Fonts Families, Size and Line height.','olivewp-companion');?></p>
				<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=olivewp_typography_setting' ) ); ?> 
				" class="owc-button"><?php echo esc_html__('Go to option','olivewp-companion');?></a>
			</div>
		</div>

		<div class="owc-support-container">
			<h2><?php echo esc_html__('Need help or advice?','olivewp-companion');?></h2>
			<p><?php echo esc_html__('Got a question or need help with the theme? You can always submit a support ticket or ask for help from our support team.','olivewp-companion');?></p>
			<a target="_blank" href="<?php echo esc_url('https://olivewp.org/support/');?>" class="owc-button" data-hover="blue" target="_blank"><?php echo esc_html__('Submit a Support Ticket','olivewp-companion');?></a> 
		</div>

	</div>
	<?php
}
add_action('olivewp_companion_home_page','olivewp_companion_home_page_fn');