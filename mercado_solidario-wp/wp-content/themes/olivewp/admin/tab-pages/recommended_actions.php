<?php 

	$olivewp_actions = $this->recommended_actions;
	$olivewp_actions_todo = get_option( 'recommended_actions', false );
?>
<div id="recommended_actions" class="olivewp-tab-pane panel-close">
	<div class="action-list">
		<?php 
		if($olivewp_actions): 
			foreach ($olivewp_actions as $key => $olivewp_val): 
				if($olivewp_val['id']!='install_one-click-demo-import' && $olivewp_val['id']!='install_elementor'):?>
					<div class="action spice-col-3" id="<?php echo esc_attr($olivewp_val['id']); ?>">
						<div class="action-box">
							<div class="action-watch">
							<?php if(!$olivewp_val['is_done']): ?>
								<?php if(!isset($olivewp_actions_todo[$olivewp_val['id']]) || !$olivewp_actions_todo[$olivewp_val['id']]): ?>
									<span class="dashicons dashicons-visibility"></span>
								<?php else: ?>
									<span class="dashicons dashicons-hidden"></span>
								<?php endif; ?>
							<?php else: ?>
								<span class="dashicons dashicons-yes"></span>
							<?php endif; ?>
							</div>
							<div class="action-inner">
								<h3 class="action-title"><?php echo esc_html($olivewp_val['title']); ?></h3>
								<div class="action-desc"><?php echo esc_html($olivewp_val['desc']); ?></div>
								<?php echo wp_kses_post($olivewp_val['link']); ?>
							</div>
						</div>
					</div>
					<?php 
				endif;
			endforeach; 
		endif; ?>
	</div>
</div>