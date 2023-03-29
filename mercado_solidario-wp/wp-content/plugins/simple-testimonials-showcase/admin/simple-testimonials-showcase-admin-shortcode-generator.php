<?php if (!defined('ABSPATH')) { exit; } // Exit if accessed directly
/**
 * Simple_Testimonials_Showcase_Admin_Shortcode_Generator Class.
 *
 * Define the shortcode button and parameters in TinyMCE editor. Also creates 
 * shortcodes with given parameters.
 * 
 * @link       http://presstigers.com
 * @since      1.0.0
 * 
 * @package    Simple_Testimonials_Showcase
 * @subpackage Simple_Testimonials_Showcase/admin
 * @author     PressTigers <support@presstigers.com>
 */

class Simple_Testimonials_Showcase_Admin_Shortcode_Generator
{
    /**
     * Initialize the class and set its properties.
     * 
     * @since   1.0.0
     */
    public function __construct()
    {
        // Action -> Add TinyMCE Button. 
        add_action('admin_head', array($this, 'sts_add_tinymce_button'));
    }

    /**
     * Add filters for the TinyMCE buttton.
     *
     * @since   1.0.0
     */
    public function sts_add_tinymce_button()
    {
        global $typenow;

        // Check user permissions
        if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
            return;
        }

        // Verify the post type
        if (!in_array($typenow, array('post', 'page'))) {
            return;
        }

        // Check if WYSIWYG is enabled
        if ('true' === get_user_option('rich_editing')) {
            add_filter('mce_external_plugins', array($this, 'sts_add_mce_external_plugins'));
            add_filter('mce_buttons', array($this, 'sts_register_mce_buttons'));
        }
    }

    /**
     * Loads the TinyMCE button js file.
     * 
     * This function specifies the path of JS for shortcode generator for TinyMCE.
     *
     * @since   1.0.0
     * 
     * @param   array   $plugin_array 
     * @return  array   $plugin_array
     */
    function sts_add_mce_external_plugins($plugin_array) {
        $plugin_array['sts_shortcode_mce_button'] = plugins_url('/js/simple-testimonials-showcase-admin-shortcode-generator.js', __FILE__);
        return $plugin_array;
    }

    /**
     * Add TinyMCE button to the post, page editor buttons.
     *
     * @since   1.0.0
     * 
     * @param   array   $buttons     TinyMCE buttons
     * @return  array   $buttons     Append STS Testimonial Shortcode Generator Button in TinyMCE Editor. 
     *                               
     */
    function sts_register_mce_buttons($buttons) {
        array_push($buttons, 'sts_shortcode_mce_button');
        return $buttons;
    }
}
new Simple_Testimonials_Showcase_Admin_Shortcode_Generator();