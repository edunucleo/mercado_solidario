<?php
require OWC_PLUGIN_DIR . '/admin/tab/home-page.php';
require OWC_PLUGIN_DIR . '/admin/tab/extensions.php';
require OWC_PLUGIN_DIR . '/admin/tab/recommended.php';
require OWC_PLUGIN_DIR . 'admin/tab/changelog.php';
require OWC_PLUGIN_DIR . 'admin/tab/addons.php';

if(!function_exists('olivewp_plus_activate')){?>
	<header>
		<div class="owc-header">
			<h2 class="owc-title">
				<svg height="88" width="60">
					<defs>
						<linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
							<stop offset="0%" style="stop-color: rgb(255,111,97);stop-opacity:1"></stop>
	                        <stop offset="100%" style="stop-color:rgb(255,111,97);stop-opacity:1"></stop>
						</linearGradient>
					</defs>
					<ellipse cx="30" cy="42" rx="24" ry="15" fill="url(#grad1)"></ellipse>
					<text fill="#ffffff" font-size="12" font-family="Verdana" x="15" y="48"><?php echo esc_html('OWC','olivewp-companion');?></text>
				</svg>
				<?php echo esc_html('OliveWP Companion','olivewp-companion');?>
			</h2>
			<p><?php echo esc_html__('The most innovative, intuitive and lightning fast WordPress theme. Build your next web project visually, in no time.','olivewp-companion');?></p>
		</div>
		
		<div class="tab">
			<button class="tablinks active" onclick="olivewp_companion_opentab(event, 'Home')"><?php echo esc_html__('Home','olivewp-companion');?></button>

			<button class="tablinks" onclick="olivewp_companion_opentab(event, 'Extensions')" ><?php echo esc_html__('Extensions','olivewp-companion');?></button>

			<button class="tablinks" onclick="olivewp_companion_opentab(event, 'recommended_actions')"><?php echo esc_html__('Recommended Plugin','olivewp-companion');?></button>
			
			<button class="tablinks" onclick="olivewp_companion_opentab(event, 'Changelog')"><?php echo esc_html__('Changelog','olivewp-companion');?></button>
		</div>
	</header>

	<?php  
	do_action('olivewp_companion_home_page');

	do_action('olivewp_companion_extensions_page');

	do_action('olivewp_companion_recommanded_page');

	do_action('olivewp_companion_changelog_page');

}
else{?>
	<header>
		<div class="tab">
			<button class="tablinks active" onclick="olivewp_companion_opentab(event, 'Extensions')" ><?php echo esc_html__('Extensions','olivewp-companion');?></button>
			<button class="tablinks" onclick="olivewp_companion_opentab(event, 'Addons')" ><?php echo esc_html__('Addons','olivewp-companion');?></button>
		</div>
	</header>

	<?php 
	do_action('olivewp_companion_extensions_page'); 

	do_action('olivewp_plus_addon_page');

} ?>

<script type="text/javascript">
	
    var d1=window.location.href;
   
    if (d1.includes("action2")) { 
    	dummyString = d1.split('&')[0];
        window.location.replace(dummyString);
    }
  
</script>