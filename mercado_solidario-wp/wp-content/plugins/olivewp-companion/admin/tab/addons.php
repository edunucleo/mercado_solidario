<?php
function olivewp_plus_addon_page_fn(){?>
	<div id="Addons" class="tabcontent">
		<div class="sub-tab">
			<h3><?php echo esc_html__('Spice Portfolio','olivewp-companion');?></h3>
			<p><?php echo esc_html__('Showcase the portfolio anywhere on your website in a beautiful way','olivewp-companion');?></p>
			<div class="ct-extension-actions">
				<a id="button1" target="_blank" class="owc-button" data-hover="white" href="<?php echo esc_url('https://olivewp.org/portfolio/');?>" aria-label="purchase-now" ><?php echo esc_html__('Purchase Now','olivewp-companion');?></a>
			</div>	
		</div>

		<div class="sub-tab">
			<h3><?php echo esc_html__('Spice White Label','olivewp-companion');?></h3>
			<p><?php echo esc_html__('The clients can change the theme details like name by their own brand name','olivewp-companion');?></p>
			<div class="ct-extension-actions">
				<a id="button1" target="_blank" class="owc-button" data-hover="white" href="<?php echo esc_url('https://olivewp.org/white-label/');?>" aria-label="white-label" ><?php echo esc_html__('Purchase Now','olivewp-companion');?></a>
			</div>	
		</div>

		<div class="sub-tab">
			<h3><?php echo esc_html__('Spice Cookies','olivewp-companion');?></h3>
			<p><?php echo esc_html__('Display the cookie notice in your website with the accept button','olivewp-companion');?></p>
			<div class="ct-extension-actions">
				<a id="button1" target="_blank" class="owc-button" data-hover="white" href="<?php echo esc_url('https://olivewp.org/cookies/');?>" aria-label="" ><?php echo esc_html__('Purchase Now','olivewp-companion');?></a>
			</div>	
		</div>

		<div class="sub-tab">
			<h3><?php echo esc_html__('Spice Sticky Footer','olivewp-companion');?></h3>
			<p><?php echo esc_html__('Stick your footer to the bottom of the screen during scroll','olivewp-companion');?></p>
			<div class="ct-extension-actions">
				<a id="button1" target="_blank" class="owc-button" data-hover="white" href="<?php echo esc_url('https://olivewp.org/footer/');?>" aria-label="footer" ><?php echo esc_html__('Purchase Now','olivewp-companion');?></a>
			</div>	
		</div>

		<div class="sub-tab">
			<h3><?php echo esc_html__('Spice Sticky Header','olivewp-companion');?></h3>
			<p><?php echo esc_html__('Stick your header on the top of the screen during scroll','olivewp-companion');?></p>
			<div class="ct-extension-actions">
				<a id="button1" target="_blank" class="owc-button" data-hover="white" href="<?php echo esc_url('https://olivewp.org/header/');?>" aria-label="header" ><?php echo esc_html__('Purchase Now','olivewp-companion');?></a>
			</div>	
		</div>

		<div class="sub-tab">
			<h3><?php echo esc_html__('Spice Side Panel','olivewp-companion');?></h3>
			<p><?php echo esc_html__('Add useful content in the side panel with the help of widgets','olivewp-companion');?></p>
			<div class="ct-extension-actions">
				<a id="button1" target="_blank" class="owc-button" data-hover="white" href="<?php echo esc_url('https://olivewp.org/side-panel/');?>" aria-label="side-panel" ><?php echo esc_html__('Purchase Now','olivewp-companion');?></a>
			</div>	
		</div>

		<div class="sub-tab">
			<h3><?php echo esc_html__('Spice Popup Login','olivewp-companion');?></h3>
			<p><?php echo esc_html__('This plugin to add the popup login or register form','olivewp-companion');?></p>
			<div class="ct-extension-actions">
				<a id="button1" target="_blank" class="owc-button" data-hover="white" href="<?php echo esc_url('https://olivewp.org/popup-login/');?>" aria-label="popup-login" ><?php echo esc_html__('Purchase Now','olivewp-companion');?></a>
			</div>	
		</div>

		<div class="sub-tab">
			<h3><?php echo esc_html__('Spice Instagram','olivewp-companion');?></h3>
			<p><?php echo esc_html__('Display your instagram feeds with multiple customization options','olivewp-companion');?></p>
			<div class="ct-extension-actions">
				<a id="button1" target="_blank" class="owc-button" data-hover="white" href="<?php echo esc_url('https://olivewp.org/instagram/');?>" aria-label="instagram" ><?php echo esc_html__('Purchase Now','olivewp-companion');?></a>
			</div>	
		</div>

		<div class="sub-tab">
			<h3><?php echo esc_html__('Spice Adobe Fonts','olivewp-companion');?></h3>
			<p><?php echo esc_html__('Add your favorite font collections on your website.','olivewp-companion');?></p>
			<div class="ct-extension-actions">
				<a id="button1" target="_blank" class="owc-button" data-hover="white" href="<?php echo esc_url('https://olivewp.org/adobe-fonts/');?>" aria-label="adobe-fonts" ><?php echo esc_html__('Purchase Now','olivewp-companion');?></a>
			</div>	
		</div>

		<div class="sub-tab">
			<h3><?php echo esc_html__('Spice Starter Sites Plus','olivewp-companion');?></h3>
			<p><?php echo esc_html__('Import starter sites demo and create beautiful website.','olivewp-companion');?></p>
			<div class="ct-extension-actions">
				<a id="button1" target="_blank" class="owc-button" data-hover="white" href="<?php echo esc_url('https://olivewp.org/starter-sites/');?>" aria-label="starter-sites" ><?php echo esc_html__('Purchase Now','olivewp-companion');?></a>
			</div>	
		</div>

	</div>
	<?php
}
add_action('olivewp_plus_addon_page','olivewp_plus_addon_page_fn');