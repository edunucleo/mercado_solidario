<?php
function olivewp_companion_changelog_page_fn(){?>
	<div id="Changelog" class="tabcontent">
		<?php 
		$olivewp_companion_path = OWC_PLUGIN_DIR."/changelog.txt";
		$olivewp_companion_file = file_get_contents($olivewp_companion_path);
		$olivewp_companion_result = htmlentities($olivewp_companion_file);?>
		<code><pre><?php echo wp_kses_post($olivewp_companion_result);?></pre></code>
	</div>
	<?php
}
add_action('olivewp_companion_changelog_page','olivewp_companion_changelog_page_fn');