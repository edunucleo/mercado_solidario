<?php
/**
 * Customizer Control: Style Layout.
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Olivewp_Style_Layout_Control')) {

	//Layout Style
	class Olivewp_Style_Layout_Control extends WP_Customize_Control {

    	public $type = 'new_menu';

	    function render_content() {

        	echo '<h3>', esc_html__('Theme Layout', 'olivewp') . '</h3>';
	        $name = '_customize-layout-radio-' . $this->id;
	        foreach ($this->choices as $key => $value) {
	            ?>
	            <label>
                	<input type="radio" value="<?php echo esc_attr($key); ?>" name="<?php echo esc_attr($name); ?>" data-customize-setting-link="<?php echo esc_attr($this->id); ?>" <?php if ($this->value() == $key) {
	                echo 'checked'; } ?>>
	                <img <?php if ($this->value() == $key) { echo 'class="color_scheem_active"'; } ?> src="<?php echo esc_url(OLIVEWP_TEMPLATE_DIR_URI); ?>/inc/customizer/assets/img/<?php echo esc_attr($value); ?>" alt="<?php echo esc_attr($value); ?>" />
	            </label>

	            <?php 
	       	} ?>
	        <script>
	            jQuery(document).ready(function ($) {
	                jQuery("#customize-control-olivewp_layout_style label img").click(function () {
	                    jQuery("#customize-control-olivewp_layout_style label img").removeClass("color_scheem_active");
	                    jQuery(this).addClass("color_scheem_active");
	                });
	            });
	        </script>
	        <?php
	    }
	}
}