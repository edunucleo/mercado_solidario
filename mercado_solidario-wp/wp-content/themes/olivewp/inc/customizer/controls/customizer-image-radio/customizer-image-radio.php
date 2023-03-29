<?php
if ( class_exists( 'WP_Customize_Control' ) ) {
	class Olivewp_Img_Radio_Control extends WP_Customize_Control {
		protected function get_olivewp_resource_url() {
			if( strpos( wp_normalize_path( __DIR__ ), wp_normalize_path( WP_PLUGIN_DIR ) ) === 0 ) {
				// We're in a plugin directory and need to determine the url accordingly.
				return plugin_dir_url( __DIR__ );
			}

			return trailingslashit( get_template_directory_uri() );
		}
	}

	class Olivewp_Image_Radio_Button_Custom_Control extends Olivewp_Img_Radio_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'image_radio_button';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_style( 'olivewp-custom-img-radio-controls-css', OLIVEWP_TEMPLATE_DIR_URI . '/inc/customizer/controls/customizer-image-radio/css/customizer.css', array(), '1.0', 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
		?>
			<div class="image_radio_button_control">
				<?php if( !empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>

				<?php foreach ( $this->choices as $key => $value ) { ?>
					<label class="radio-button-label">
						<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
						<img src="<?php echo esc_attr( $value['image'] ); ?>" alt="<?php echo esc_attr( isset($value['name']) ); ?>" title="<?php echo esc_attr( isset($value['name']) ); ?>" />
					</label>
				<?php	} ?>
			</div>

			<script type="text/javascript">
                jQuery(document).ready(function () {
	               	if(jQuery("#_customize-input-after_menu_multiple_option").val()=='menu_btn')
	                {
	                    jQuery("#customize-control-after_menu_btn_txt").show();
	                    jQuery("#customize-control-after_menu_btn_link").show();
	                    jQuery("#customize-control-after_menu_btn_new_tabl").show();
	                    jQuery("#customize-control-after_menu_btn_border").show();
	                    jQuery("#customize-control-after_menu_html").hide();  
	                    jQuery("#customize-control-after_menu_widget_area_section").hide();
	                }
	                else if(jQuery("#_customize-input-after_menu_multiple_option").val()=='html')
	                {
	                    jQuery("#customize-control-after_menu_btn_txt").hide();
	                    jQuery("#customize-control-after_menu_btn_link").hide();
	                    jQuery("#customize-control-after_menu_btn_new_tabl").hide();
	                    jQuery("#customize-control-after_menu_btn_border").hide();
	                    jQuery("#customize-control-after_menu_widget_area_section").hide();
	                    jQuery("#customize-control-after_menu_html").show(); 
	                }                
	                else
	                {
	                    jQuery("#customize-control-after_menu_btn_txt").hide();
	                    jQuery("#customize-control-after_menu_btn_link").hide();
	                    jQuery("#customize-control-after_menu_btn_new_tabl").hide();
	                    jQuery("#customize-control-after_menu_btn_border").hide();
	                    jQuery("#customize-control-after_menu_html").hide();
	                    jQuery("#customize-control-after_menu_widget_area_section").hide();
	                }
	            });
            </script>
		<?php
		}
	}
}