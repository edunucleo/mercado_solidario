<?php
function olivewp_companion_extensions_page_fn(){?>
	<div id="Extensions" class="tabcontent" <?php if(function_exists('olivewp_plus_activate')){ echo 'style="display: block;"';}?>>
		<div class="sub-tab">
			<h3><?php echo esc_html__('Trending Posts','olivewp-companion');?></h3>
			<p><?php echo esc_html__('Highlight your most popular posts or products based on the number of comments or reviews they have gotten in the specified period of time.','olivewp-companion');?></p>
			<div class="ct-extension-actions">
				<?php  
				if(isset($_GET["action1"])){
					$olivewp_companion_action = sanitize_text_field($_GET["action1"]);
				} else{
					$olivewp_companion_action = '';
				}
				if($olivewp_companion_action!=''){
			    update_option('trending_posts_value',$olivewp_companion_action);
			  }
				if(get_option('trending_posts_value')==null){?>
					<a id="button1" class="owc-button-primary" data-hover="white" href="<?php echo esc_url(admin_url('admin.php?page=olivewp-companion&action1=deactivate'));?>" aria-label="Activate" ><?php echo esc_html__('Activate','olivewp-companion');?></a>
				<?php }
				elseif(get_option('trending_posts_value')=='activate'){?>
						<a id="button1" class="owc-button-primary" data-hover="white" href="<?php echo esc_url(admin_url('admin.php?page=olivewp-companion&action1=deactivate'));?>" aria-label="Activate" ><?php echo esc_html__('Activate','olivewp-companion');?></a>
				<?php }
				elseif(get_option('trending_posts_value')=='deactivate'){?>
						<a id="button1" class="owc-button" data-hover="white" href="<?php echo esc_url(admin_url('admin.php?page=olivewp-companion&action1=activate'));?>" aria-label="Activate" ><?php echo esc_html__('Deactivate','olivewp-companion');?></a>
				<?php } ?>

			</div>

			<p style="color: #ff6f61;font-style: italic;"><strong><?php echo esc_html__('Note: ','olivewp-companion');?></strong><?php echo esc_html__('After activating the extension, Go to Appearance >> customizer settings >> Trending Posts and customize it.','olivewp-companion');?></p>	
		</div> 

		<div class="sub-tab">
			<h3><?php echo esc_html__('Spice Starter Sites','olivewp-companion');?></h3>
			<p><?php echo esc_html__('The plugin allows you to create professional designed pixel perfect websites in minutes. Import the stater sites to create the websites.','olivewp-companion');?></p>
			<div class="ct-extension-actions">
				<?php  
				if(isset($_GET["action2"])){
					$olivewp_companion_action = sanitize_text_field($_GET["action2"]);
				} else{
					$olivewp_companion_action = '';
				}
				if($olivewp_companion_action!=''){
			    update_option('spice_starter_sites_value',$olivewp_companion_action);
			  }
				if(get_option('spice_starter_sites_value')==null){?>
					<a id="button2" class="owc-button-primary" data-hover="white" href="<?php echo esc_url(admin_url('admin.php?page=olivewp-companion&action2=deactivate'));?>" aria-label="Activate" ><?php echo esc_html__('Activate','olivewp-companion');?></a>
				<?php }
				elseif(get_option('spice_starter_sites_value')=='activate'){?>
						<a id="button2" class="owc-button-primary" data-hover="white" href="<?php echo esc_url(admin_url('admin.php?page=olivewp-companion&action2=deactivate'));?>" aria-label="Activate" ><?php echo esc_html__('Activate','olivewp-companion');?></a>
				<?php }
				elseif(get_option('spice_starter_sites_value')=='deactivate'){?>
						<a id="button2" class="owc-button" data-hover="white" href="<?php echo esc_url(admin_url('admin.php?page=olivewp-companion&action2=activate'));?>" aria-label="Activate" ><?php echo esc_html__('Deactivate','olivewp-companion');?></a>
				<?php } ?>
			</div>	
		</div>
		
	</div>
	<?php
}
add_action('olivewp_companion_extensions_page','olivewp_companion_extensions_page_fn');