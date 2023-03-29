<?php 
namespace MetForm\Controls;

defined( 'ABSPATH' ) || exit;

class Form_Picker extends \Elementor\Base_Data_Control {
	/**
	 * Get choose control type.
	 *
	 * Retrieve the control type, in this case `choose`.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Control type.
	 */
	public function get_type() {
		return 'formpicker';
	}

	/**
	 * Enqueue ontrol scripts and styles.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function enqueue() {
		// Styles
		wp_register_style( 'metform-css-formpicker-control-inspactor',  Base::get_url() . 'assets/css/form-picker-inspactor.css', [], '1.0.0' );
		wp_enqueue_style( 'metform-css-formpicker-control-inspactor' );

		// Script
		wp_register_script( 'metform-js-formpicker-control-inspactor',  Base::get_url() . 'assets/js/form-picker-inspactor.js' );
		wp_enqueue_script( 'metform-js-formpicker-control-inspactor' );
	}


	/**
	 * Render choose control output in the editor.
	 *
	 * Used to generate the control HTML in the editor using Underscore JS
	 * template. The variables for the class are available using `data` JS
	 * object.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function content_template() {
		$control_uid = $this->get_control_uid();
		?>
		<div style="display:none" class="elementor-control-field">
			<label for="<?php echo esc_attr($control_uid); ?>" class="elementor-control-title">{{{ data.label }}}</label>
			<div class="elementor-control-input-wrapper">
				<textarea id="<?php echo esc_attr($control_uid); ?>"  data-setting="{{ data.name }}"></textarea>
			</div>
		</div>
		<!-- <button id="metform-inspactor-edit-button">Edit Form Content</button> -->
		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{{ data.description }}}</div>
		<# } #>
		<?php
	}

	/**
	 * Get choose control default settings.
	 *
	 * Retrieve the default settings of the choose control. Used to return the
	 * default settings while initializing the choose control.
	 *
	 * @since 1.0.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */
	protected function get_default_settings() {
		return [
			'label_block' => true,
		];
	}
}