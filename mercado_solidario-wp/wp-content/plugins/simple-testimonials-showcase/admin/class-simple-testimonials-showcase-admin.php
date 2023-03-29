<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @link        http://presstigers.com
 * @since       1.0.0
 * 
 * @package     Simple_Testimonials_Showcase
 * @subpackage  Simple_Testimonials_Showcase/admin
 * @author      PressTigers <support@presstigers.com>
 */
class Simple_Testimonials_Showcase_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param    string    $plugin_name       The name of this plugin.
     * @param    string    $version           The version of this plugin.
     */
    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;

        /**
         * The class is responsible for defining shortcode's generator in page and post editor.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/simple-testimonials-showcase-admin-shortcode-generator.php';

        /**
         * The class is responsible for defining the Meta Box 'simple_testimonials'.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-simple-testimonials-showcase-meta-box.php';

        /**
         * The class responsible for defining all the plugin settings that occur in the front end area.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-simple-testimonials-showcase-settings.php';
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/simple-testimonials-showcase-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {
        
        global $wp_version;
        
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/simple-testimonials-showcase-admin.js', array('jquery'), $this->version, TRUE);
        
        wp_register_script('sts-wp-color-picker-alpha', plugin_dir_url(__FILE__) . 'js/wp-color-picker-alpha.js', array('wp-color-picker'), '1.0.0', TRUE);
        
        // WP Alpha Color Picker Support in WP 5.5
        if ($wp_version >= 5.5) {

            wp_localize_script(
                    'sts-wp-color-picker-alpha', 'wpColorPickerL10n', array(
                'clear' => __('Clear'),
                'clearAriaLabel' => __('Clear color'),
                'defaultString' => __('Default'),
                'defaultAriaLabel' => __('Select default color'),
                'pick' => __('Select Color'),
                'defaultLabel' => __('Color value'),
            ));
        }        
    }
}