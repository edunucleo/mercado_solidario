<?php

/**
 * Taxonomies Dropdown Custom Control
 */


if ( !class_exists( 'Olivewp_Companion_Taxonomies_Dropdown_CustomControl' ) ) {

    class Olivewp_Companion_Taxonomies_Dropdown_CustomControl extends WP_Customize_Control {

        /**
         * The type of control being rendered
         */
        public $type = 'dropdown_select2';

        /**
         * The type of Select2 Dropwdown to display. Can be either a single select dropdown or a multi-select dropdown. Either false for true. Default = false
         */
        private $multiselect = false;

        /**
         * The Placeholder value to display. Select2 requires a Placeholder value to be set when using the clearall option. Default = 'Please select...'
         */
        private $placeholder = 'Please select...';

        /**
         * Constructor
         */
        public function __construct($manager, $id, $args = array(), $options = array()) {
            parent::__construct($manager, $id, $args);
            // Check if this is a multi-select field
            if (isset($this->input_attrs['multiselect']) && $this->input_attrs['multiselect']) {
                $this->multiselect = true;
            }
            // Check if a placeholder string has been specified
            if (isset($this->input_attrs['placeholder']) && $this->input_attrs['placeholder']) {
                $this->placeholder = $this->input_attrs['placeholder'];
            }
        }

        /**
         * Enqueue our scripts and styles
         */
        public function enqueue() {
            wp_enqueue_script('olivewp-companion-select2-js', OWC_PLUGIN_URL . '/inc/control/assets/js/select2.full.min.js', array('jquery'), '4.0.13', true);
            wp_enqueue_script('olivewp-companion-custom-controls-js', OWC_PLUGIN_URL . '/inc/control/assets/js/customizer.js', array('olivewp-companion-select2-js'), '1.0', true);
            wp_enqueue_style('olivewp-companion-custom-controls-css', OWC_PLUGIN_URL . '/inc/control/assets/css/customizer.css', array(), '1.1', 'all');
            wp_enqueue_style('olivewp-companion-select2-css', OWC_PLUGIN_URL . '/inc/control/assets/css/select2.min.css', array(), '4.0.13', 'all');
        }

        /**
         * Render the control in the customizer
         */
        public function render_content() {
            $defaultValue = $this->value();
            
            if(is_array($defaultValue)){
                $defaultValue= implode(',', $defaultValue);
            }
            
            if ($this->multiselect) {
                $defaultValue = explode(',', $defaultValue);
            }

    //        $this->choices=get_categories();
                $taxonomy     = 'product_cat';
                  $orderby      = 'name';  
                  $show_count   = 0;      // 1 for yes, 0 for no
                  $pad_counts   = 0;      // 1 for yes, 0 for no
                  $hierarchical = 1;      // 1 for yes, 0 for no  
                  $title        = '';  
                  $empty        = 0;
                $args = array(
                         'taxonomy'     => $taxonomy,
                         'orderby'      => $orderby,
                         'show_count'   => $show_count,
                         'pad_counts'   => $pad_counts,
                         'hierarchical' => $hierarchical,
                         'title_li'     => $title,
                         'hide_empty'   => $empty
                  );
           $olivewp_companion_cats = get_categories( $args );
           $olivewp_companion_CatIdName = array();
            foreach ($olivewp_companion_cats as $value) {
                $olivewp_companion_CatIdName[$value->term_id] = $value->name;
            }
            $this->choices = $olivewp_companion_CatIdName;
            ?>
            <div class="dropdown_select2_control">
                <?php if (!empty($this->label)) { ?>
                    <label for="<?php echo esc_attr($this->id); ?>" class="customize-control-title">
                        <?php echo esc_html($this->label); ?>
                    </label>
                <?php } ?>
                <?php if (!empty($this->description)) { ?>
                    <span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
                <?php } ?>
                <input type="hidden" id="<?php echo esc_attr($this->id); ?>" class="customize-control-dropdown-select2" value="<?php echo esc_attr($this->value()); ?>" name="<?php echo esc_attr($this->id); ?>" <?php esc_attr ( $this->link() ); ?> />
                <select name="select2-list-<?php echo ( $this->multiselect ? 'multi[]' : 'single' ); ?>" class="customize-control-select2" data-placeholder="<?php echo $this->placeholder; ?>" <?php echo ( $this->multiselect ? 'multiple="multiple" ' : '' ); ?>>
                    <?php
                    if (!$this->multiselect) {
                        // When using Select2 for single selection, the Placeholder needs an empty <option> at the top of the list for it to work (multi-selects dont need this)
                        echo '<option></option>';
                    }
                    foreach ($this->choices as $key => $value) {
                        if (is_array($value)) {
                            echo '<optgroup label="' . esc_attr($key) . '">';
                            foreach ($value as $optgroupkey => $optgroupvalue) {
                                if ($this->multiselect) {
                                    echo '<option value="' . esc_attr($optgroupkey) . '" ' . ( in_array(esc_attr($optgroupkey), $defaultValue) ? 'selected="selected"' : '' ) . '>' . esc_attr($optgroupvalue) . '</option>';
                                } else {
                                    echo '<option value="' . esc_attr($optgroupkey) . '" ' . selected(esc_attr($optgroupkey), $defaultValue, false) . '>' . esc_attr($optgroupvalue) . '</option>';
                                }
                            }
                            echo '</optgroup>';
                        } else {
                            if ($this->multiselect) {
                                echo '<option value="' . esc_attr($key) . '" ' . ( in_array(esc_attr($key), $defaultValue) ? 'selected="selected"' : '' ) . '>' . esc_attr($value) . '</option>';
                            } else {
                                echo '<option value="' . esc_attr($key) . '" ' . selected(esc_attr($key), $defaultValue, false) . '>' . esc_attr($value) . '</option>';
                            }
                        }
                    }
                    ?>
                </select>
            </div>
            <?php
        }

    }
}