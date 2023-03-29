<?php 
namespace MetForm\Controls;

defined( 'ABSPATH' ) || exit;

class Form_Picker_Utils{

	function init(){
		add_action('elementor/editor/after_enqueue_styles', array( $this, 'modal_content' ) );
	}

	public function modal_content() { 
		?>
		<div class="metform_open_content_editor_modal">
			<?php include 'form-picker-modal.php'; ?>
			<?php include \MetForm\Plugin::instance()->core_dir() . 'forms/views/modal-editor.php'; ?>
		</div>
		<div class="formpicker_iframe_modal">
			<?php include 'form-editor-modal.php'; ?>
		</div>
		<?php
	}

	public static function parse($key, $widget_key){
		$extract_key = explode('***', $key);
		$extract_key = $extract_key[0];
		ob_start(); ?>

		<div class="formpicker_warper formpicker_warper_editable" data-metform-formpicker-key="<?php echo esc_attr($extract_key); ?>" >
				<?php if(\Elementor\Plugin::$instance->editor->is_edit_mode() == true) : ?>
					<div style="display:none;" class="formpicker_warper_edit" data-metform-formpicker-key="<?php echo esc_attr($extract_key); ?>" data-nonce="<?php echo esc_attr(wp_create_nonce('wp_rest'));?>"  resturl="<?php echo esc_url(get_rest_url()); ?>metform/v1/forms/templates/" >
						<i class="metform-builder-edit" aria-hidden="true"></i>
						<a href="#" class="elementor-screen-only" title="<?php esc_html_e('Edit Form Content', 'metform'); ?>"><?php esc_html_e('Edit', 'metform'); ?></a>
					</div>
				<?php endif; ?>

			<div class="elementor-widget-container">
				<?php 
					if ($extract_key == ''){
						echo esc_html__('No content is added yet.', 'metform');
					} else {
						\MetForm\Utils\Util::metform_content_renderer(\MetForm\Utils\Util::render_form_content($extract_key, $widget_key));
					}
				?>
			</div>
		</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
}
