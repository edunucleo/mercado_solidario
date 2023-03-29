<?php
/**
 * Getting started template
 */
$olivewp_name = wp_get_theme();
?>
<div id="getting_started" class="olivewp-tab-pane active">
	<div class="spice-container">
		<div class="spice-row">
			<div class="spice-col-1">
				<h1 class="olivewp-info-title text-center"><?php 
				/* translators: %s: theme name */
				printf( esc_html__('%s Theme Configuration','olivewp'), esc_html($olivewp_name) ); ?><?php if( !empty($olivewp_name['Version']) ): ?> <sup id="olivewp-theme-version"><?php echo esc_html( $olivewp_name['Version'] ); ?> </sup><?php endif; ?></h1>
			</div>
		</div>
		<div class="spice-row" style="margin-top: 20px;">

			<div class="spice-col-1">
			    <div class="olivewp-page" style="border: none;box-shadow: none;">
					<div class="mockup">
			    		<img src="<?php echo OLIVEWP_TEMPLATE_DIR_URI.'/admin/assets/img/mockup-lite.png';?>"  width="100%">
			    	</div>
				</div>	
			</div>	

		</div>
		
		<div class="spice-row" style="margin-top: 20px;">
			<div class="spice-col-3"> 
				<div class="olivewp-page">
					<div class="olivewp-page-top"><?php 
					/* translators: %s: theme name */
					printf( esc_html__( 'Additional features in %s Plus', 'olivewp' ), esc_html($olivewp_name) ); ?></div>
					<div class="olivewp-page-content">
						<ul class="olivewp-page-list-flex">
							<li>
								<?php echo esc_html__('Header Presets','olivewp'); ?>
							</li>
							<li>
								<?php echo esc_html__('Multiple Blog Templates','olivewp'); ?>
							</li>					
							<li>
								<?php echo esc_html__('Predefined Color Schemes','olivewp'); ?>
							</li>
							<li>
								<?php echo esc_html__('Multiple Preloader Designs','olivewp'); ?>
							</li>
							<li>
								<?php echo esc_html__('Multiple Search Effects','olivewp'); ?>
							</li>
							<li>
								<?php echo esc_html__('Breadcrumb Settings','olivewp'); ?>
							</li>						
							<li>
								<?php echo esc_html__('Post Navigation Styles','olivewp'); ?>
							</li>
							
							<li>
								<?php echo esc_html__('Enhanced Footer Widgets Settings','olivewp'); ?>
							</li>
							
							<li>
								<?php echo esc_html__('Enhanced Footer Bar Settings','olivewp'); ?>
							</li>
							
							<li>
								<?php echo esc_html__('Additional Typography Features','olivewp'); ?>
							</li>
							<li>
								<?php echo esc_html__('Additional Colors & Background Features','olivewp'); ?>
							</li>
							<li>
								<?php echo esc_html__('Enhanced Container Width Settings','olivewp'); ?>
							</li>						
						</ul>
					</div>
				</div>
			</div>

			<div class="spice-col-3"> 
				<div class="olivewp-page">
					<div class="olivewp-page-top"><?php esc_html_e( 'Links to Customizer Settings', 'olivewp' ); ?></div>
					<div class="olivewp-page-content">
						<ul class="olivewp-page-list-flex">
							<li>
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=title_tagline' ) ); ?>" target="_blank"><?php esc_html_e('Site Logo','olivewp'); ?></a>
							</li>
							<li>
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=olivewp_theme_panel' ) ); ?>" target="_blank"><?php esc_html_e('Blog Options','olivewp'); ?></a>
							</li>
							 <li>
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=widgets' ) ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','olivewp'); ?></a>
							</li>
							<li>
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=olivewp_general_settings' ) ); ?>" target="_blank"><?php esc_html_e('General Settings','olivewp'); ?></a>
							</li>
							<li>
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=colors_back_settings' ) ); ?>" target="_blank"><?php esc_html_e('Colors & Background','olivewp'); ?></a>
							</li>
							<li>
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=olivewp_typography_setting' ) ); ?>" target="_blank"><?php esc_html_e('Typography Settings','olivewp'); ?></a>
							</li>
							<li>
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=theme_style' ) ); ?>" target="_blank"><?php esc_html_e('Theme Style Settings','olivewp'); ?></a>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="olivewp-page">
					<div class="olivewp-page-top"><?php esc_html_e( 'Useful Links', 'olivewp' ); ?></div>
					<div class="olivewp-page-content">
						<ul class="olivewp-page-list-flex">
							<li>
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://olivewp.org/starter-sites/'); ?>" target="_blank"><?php echo esc_html__('Starter Sites','olivewp'); ?></a>
							</li>
							<li>
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://wordpress.org/support/theme/olivewp/'); ?>" target="_blank"><?php 
									/* translators: %s: theme name */
									printf( esc_html__('%s Theme Support','olivewp'), esc_html($olivewp_name) ); ?></a>
							</li>
														
						    <li> 
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://wordpress.org/support/theme/olivewp/reviews/#new-post'); ?>" target="_blank"><?php echo esc_html__('Your feedback is valuable to us','olivewp'); ?></a>
							</li>
							
							<li>
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://olivewp.org'); ?>" target="_blank"><?php 
									/* translators: %s: theme name */
									printf( esc_html__('%s Plus Details','olivewp'), esc_html($olivewp_name) ); ?></a>
							</li>
							
						    <li> 
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://olivewp.org/contact/'); ?>" target="_blank"><?php echo esc_html__('Pre-sales enquiry','olivewp'); ?></a>
							</li> 

							<li> 
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://olivewp.org/olivewp-free-vs-plus/'); ?>" target="_blank"><?php echo esc_html__('Free vs Plus','olivewp'); ?></a>
							</li> 

							<li> 
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://olivewp.org/docs/'); ?>" target="_blank"><?php echo esc_html__('OliveWP Documentation','olivewp'); ?></a>
							</li>

							<li> 
								<a class="olivewp-page-quick-setting-link" href="<?php echo esc_url('https://olivewp.org/olivewp-changelog/'); ?>" target="_blank"><?php echo esc_html__('Changelog','olivewp'); ?></a>
							</li> 						 

						</ul>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>