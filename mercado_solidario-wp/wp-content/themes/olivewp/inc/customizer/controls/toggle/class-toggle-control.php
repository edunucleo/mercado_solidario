<?php
/**
 * Customizer Control: toggle.
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Olivewp_Toggle_Control')) {

    /**
     * Toggle control (modified checkbox).
     */
    class Olivewp_Toggle_Control extends WP_Customize_Control {

        public $type = 'toggle';
        public $tooltip = '';

        public function to_json() {
            parent::to_json();

            if (isset($this->default)) {
                $this->json['default'] = $this->default;
            } else {
                $this->json['default'] = $this->setting->default;
            }

            $this->json['value'] = $this->value();
            $this->json['link'] = $this->get_link();
            $this->json['id'] = $this->id;
            $this->json['tooltip'] = $this->tooltip;

            $this->json['inputAttrs'] = '';
            foreach ($this->input_attrs as $attr => $value) {
                $this->json['inputAttrs'] .= $attr . '="' . esc_attr($value) . '" ';
            }
        }

        public function enqueue() {
            wp_enqueue_style('olivewp-toggle', get_template_directory_uri() . '/inc/customizer/controls/toggle/toggle.css', null);
            wp_enqueue_script('olivewp-toggle', get_template_directory_uri() . '/inc/customizer/controls/toggle/toggle.js', array('jquery'), false, true); //for toggle        
        }

        protected function content_template() {
            ?>
            <# if ( data.tooltip ) { #>
            <a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
            <# } #>
            <label for="toggle_{{ data.id }}">
                <span class="customize-control-title">
                    {{{ data.label }}}
                </span>
                <# if ( data.description ) { #>
                <span class="description customize-control-description">{{{ data.description }}}</span>
                <# } #>
                <input {{{ data.inputAttrs }}} name="toggle_{{ data.id }}" id="toggle_{{ data.id }}" type="checkbox" value="{{ data.value }}" {{{ data.link }}}<# if ( '1' == data.value ) { #> checked<# } #> hidden />
                <span class="switch" style="margin-top:7px;"></span>
            </label>
            <?php
        }

    }

}