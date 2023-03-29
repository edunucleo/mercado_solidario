<?php
function olivewp_companion_recommanded_page_fn(){
	$olivewp_companion_about_page=olivewp_about_page();
	$olivewp_companion_actions = $olivewp_companion_about_page->recommended_actions;
	$olivewp_companion_actions_todo = get_option( 'recommended_actions', false );?>
	<div id="recommended_actions" class="tabcontent lite">
		<div class="action-list">
		<?php 
		if($olivewp_companion_actions): 
			foreach ($olivewp_companion_actions as $key => $olivewp_companion_val):
				if($olivewp_companion_val['id']!='install_olivewp-companion'):?>
					<div class="sub-tab" id="<?php echo esc_attr($olivewp_companion_val['id']); ?>">
						<div class="action-box">
							<div class="action-watch">
							<?php if(!$olivewp_companion_val['is_done']): ?>
								<?php if(!isset($olivewp_companion_actions_todo[$olivewp_companion_val['id']]) || !$olivewp_companion_actions_todo[$olivewp_companion_val['id']]): ?>
									<span class="dashicons dashicons-visibility"></span>
								<?php else: ?>
									<span class="dashicons dashicons-hidden"></span>
								<?php endif; ?>
							<?php else: ?>
								<span class="dashicons dashicons-yes"></span>
							<?php endif; ?>
							</div>
							<div class="action-inner">
								<h3 class="action-title"><?php echo esc_html($olivewp_companion_val['title']); ?></h3>
								<div class="action-desc"><?php echo esc_html($olivewp_companion_val['desc']); ?></div>
								<div class="ct-extension-actions"><?php echo wp_kses_post($olivewp_companion_val['link']); ?></div>
							</div>
						</div>
					</div>
				<?php
				endif; 
			endforeach; 
		endif;?>
		</div>
	</div>
	<?php
}
add_action('olivewp_companion_recommanded_page','olivewp_companion_recommanded_page_fn');