<?php 
// Creating the widget
	class startkit_info extends WP_Widget {
	 
	function __construct() {
		parent::__construct(
			'startkit_info_widget', // Base ID
			__('StartKit : Info Widget','startkit'), // Widget Name
			array(
				'classname' => 'startkit_info',
				'description' => __('Info Widget Area','startkit'),
			)
		);
		
	 }
	 public function widget($args,$instance) {
	 $args['before_widget']; ?>
		<?php if(!empty($instance['startkit_info_widget_icon'])) : ?>
				<div class="widget widget_info">
					<?php if(!empty($instance['startkit_info_widget_icon'])) { ?>
						<i class="fa <?php echo esc_attr($instance['startkit_info_widget_icon']);?> mr-2" ></i> 
					<?php } ?>
					<?php if(!empty($instance['startkit_info_widget_title'])) { ?>
						<span><?php echo esc_html($instance['startkit_info_widget_title']);?></span>
					<?php }  ?>
				</div>
		<?php endif; ?>
	<?php
	echo $args['after_widget'];
	}
	// Widget Backend
	public function form( $instance ) {
	if ( isset( $instance[ 'startkit_info_widget_title' ])){
	$startkit_info_widget_title = $instance[ 'startkit_info_widget_title' ];
	}
	else {
	$startkit_info_widget_title = '';
	}
	if ( isset( $instance[ 'startkit_info_widget_icon' ])){
	$startkit_info_widget_icon = $instance[ 'startkit_info_widget_icon' ];
	}
	else {
	$startkit_info_widget_icon = '';
	}
	?>
	
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'startkit_info_widget_title' )); ?>"><?php _e( 'Info Title:','startkit' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'startkit_info_widget_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'startkit_info_widget_title' )); ?>" type="text" value="<?php if($startkit_info_widget_title) echo esc_attr( $startkit_info_widget_title ); ?>" />
		</p>

		<p class="info-icon-picker">
			<label for="<?php echo esc_attr($this->get_field_id( 'startkit_info_widget_icon' )); ?>"><?php _e( 'Info Icons:','startkit' ); ?></label>
			<?php $icons = startkit_widget_get_social(); ?>
			<select class="iconPicker" id="<?php echo esc_attr($this->get_field_id('startkit_info_widget_icon')); ?>"
					name="<?php echo esc_attr($this->get_field_name('startkit_info_widget_icon')); ?>" value="<?php if($startkit_info_widget_icon) echo esc_attr( $startkit_info_widget_icon ); ?>"type="text" style="font-family: 'FontAwesome', Arial; width: 82%">
			<?php foreach($icons as $key => $value) { ?>
				<option value="<?php echo esc_attr($key); ?>" <?php if ($startkit_info_widget_icon==$key) { echo 'selected="selected"'; } ?>>
				<?php echo esc_html($value); ?></option>
			<?php } ?>
			</select> 
		</p>
	
	<?php
    }
	     
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	
	$instance = array();
		$instance['startkit_info_widget_title'] = ( ! empty( $new_instance['startkit_info_widget_title'] ) ) ? sanitize_text_field( $new_instance['startkit_info_widget_title'] ) : '';
		
		$instance['startkit_info_widget_icon'] = ( ! empty( $new_instance['startkit_info_widget_icon'] ) ) ? sanitize_text_field( $new_instance['startkit_info_widget_icon'] ) : '';
		
		return $instance;
	}
	}