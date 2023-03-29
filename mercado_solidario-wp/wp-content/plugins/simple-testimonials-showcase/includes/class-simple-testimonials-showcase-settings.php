<?php if (!defined('ABSPATH')) { exit; } // Exit if accessed directly
/**
 * Simple_Testimonials_Showcase_Settings Class
 *
 * This file contains shortcode of 'simple_testimonials' post type. 
 * 
 * @link        http://presstigers.com
 * @since       1.1.0
 *
 * @package    Simple_Testimonials_Showcase
 * @subpackage Simple_Testimonials_Showcase/includes
 * @author     PressTigers <support@presstigers.com>
 */
class Simple_Testimonials_Showcase_Settings
{
    /**
     * Initialize the class and set it's properties.
     *
     * @since    1.1.0
     */
    public function __construct()
    {
        // Action - Add Settings Menu
        add_action( 'admin_menu', array($this, 'admin_menu'), 12 );

        // Action - Save Settings
        add_action( 'admin_notices', array($this, 'sts_save_settings' ) );
    }

    /**
     * Add Settings Page Under Simple Testimonials Menu.
     * 
     * @since   1.1.0
     */
    public function admin_menu() {
        
        add_submenu_page('edit.php?post_type=simple_testimonials', esc_html__('Settings', 'simple-testimonials-showcase'), esc_html__('Settings', 'simple-testimonials-showcase'), 'manage_options', 'simple-testimonials-settings', array($this, 'settings_page'));
    }
    
    /**
     * Add Settings Page
     * 
     * @since   1.1.0
     */
    public function settings_page()
    {
        // Enqueue Alpha Color Picker
        wp_enqueue_script('sts-wp-color-picker-alpha');
        
        // Get Settings For Blockquote & Grid Layout Color Options
        $sts_color_options = ( get_option( 'sts_color_options' ) ) ? get_option( 'sts_color_options' ) : array();
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Settings', 'simple-testimonials-showcase'); ?></h1>        
            <form method="post" id="appearance_options_form">
                
                <!-- Settings For Blockquote Layout Color Options -->
                <h4 class="first"><?php esc_html_e('Quote Layout Color Options', 'simple-testimonials-showcase'); ?></h4>
                <div class="sts-section">
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Blockquote Icon Background Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[blockquote_icon_background_color]" class="color-picker" data-alpha="true" data-default-color="rgba(255,255,255,0.03)" value="<?php echo isset($sts_color_options['blockquote_icon_background_color']) ? esc_attr( $sts_color_options['blockquote_icon_background_color'] ) : 'rgba(255,255,255,0.03)';?>">
                        </li>
                    </ul>
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Blockquote Icon Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[blockquote_icon_color]" class="color-picker" data-alpha="true" data-default-color="rgba(136,136,136,1)" value="<?php echo isset($sts_color_options['blockquote_icon_color']) ? esc_attr($sts_color_options['blockquote_icon_color']) : 'rgba(136,136,136,1)';?>">
                        </li>
                    </ul>
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Blockquote Text Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[blockquote_text_color]" class="color-picker" data-alpha="true" data-default-color="rgba(213,213,213,1)" value="<?php echo isset($sts_color_options['blockquote_text_color']) ? esc_attr($sts_color_options['blockquote_text_color'] ) : 'rgba(213,213,213,1)';?>">
                        </li>
                    </ul>
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Blockquote Inactive Dot Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[blockquote_inactive_dot_color]" class="color-picker" data-alpha="true" data-default-color="rgba(255,255,255,0.5)" value="<?php echo isset($sts_color_options['blockquote_inactive_dot_color']) ? esc_attr( $sts_color_options['blockquote_inactive_dot_color'] ) : 'rgba(255,255,255,0.5)';?>">
                        </li>
                    </ul>
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Blockquote Active Dot Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[blockquote_active_dot_color]" class="color-picker" data-alpha="true" data-default-color="rgba(51,153,251,1)" value="<?php echo isset($sts_color_options['blockquote_active_dot_color']) ? esc_attr($sts_color_options['blockquote_active_dot_color']) : 'rgba(51,153,251,1)';?>">
                        </li>
                    </ul>
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Blockquote Arrow Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[blockquote_arrow_color]" class="color-picker" data-alpha="true" data-default-color="rgba(255,255,255,1)" value="<?php echo isset($sts_color_options['blockquote_arrow_color']) ? esc_attr($sts_color_options['blockquote_arrow_color']) : 'rgba(255,255,255,1)';?>">
                        </li>
                    </ul>
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Blockquote Arrow Inactive Background Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[blockquote_arrow_inactive_background_color]" class="color-picker" data-alpha="true" data-default-color="rgba(34,34,34,0.5)" value="<?php echo isset($sts_color_options['blockquote_arrow_inactive_background_color']) ? esc_attr($sts_color_options['blockquote_arrow_inactive_background_color']) : 'rgba(34,34,34,0.5)';?>">
                        </li>
                    </ul>
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Blockquote Arrow Active Background Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[blockquote_arrow_active_background_color]" class="color-picker" data-alpha="true" data-default-color="rgba(34,34,34,1)" value="<?php echo isset($sts_color_options['blockquote_arrow_active_background_color']) ? esc_attr($sts_color_options['blockquote_arrow_active_background_color']) : 'rgba(34,34,34,0.5)';?>">
                        </li>
                    </ul>
                </div>
                
                <!-- Settings For Grid Layout Color Options -->
                <h4 class="first"><?php esc_html_e('Grid Layout Color Options', 'simple-testimonials-showcase'); ?></h4>
                <div class="sts-section">
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Grid Background Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[grid_background_color]" class="color-picker" data-alpha="true" data-default-color="rgba(0, 0, 0, 0.1)" value="<?php echo isset($sts_color_options['grid_background_color']) ? esc_attr($sts_color_options['grid_background_color']) : 'rgba(0, 0, 0, 0.1)';?>">
                        </li>
                    </ul>
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Author Text Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[author_text_color]" class="color-picker" data-alpha="true" data-default-color="rgba(102,102,102,1)" value="<?php echo isset($sts_color_options['author_text_color']) ? esc_attr($sts_color_options['author_text_color']) : 'rgba(102,102,102,1)';?>">
                        </li>
                    </ul>
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Author Role/Organization Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[author_role_organization_color]" class="color-picker" data-alpha="true" data-default-color="rgba(51,153,251,1)" value="<?php echo isset($sts_color_options['author_role_organization_color']) ? esc_attr($sts_color_options['author_role_organization_color']) : 'rgba(51,153,251,1)';?>">
                        </li>
                    </ul>
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Grid Text Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[grid_text_color]" class="color-picker" data-alpha="true" data-default-color="rgba(0,0,0,1)" value="<?php echo isset($sts_color_options['grid_text_color']) ? esc_attr($sts_color_options['grid_text_color']) : 'rgba(0,0,0,1)';?>">
                        </li>
                    </ul>
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Grid Inactive Dot Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[grid_inactive_dot_color]" class="color-picker" data-alpha="true" data-default-color="rgba(0, 0, 0, 0.5)" value="<?php echo isset($sts_color_options['grid_inactive_dot_color']) ? esc_attr($sts_color_options['grid_inactive_dot_color']) : 'rgba(0, 0, 0, 0.5)';?>">
                        </li>
                    </ul>
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Grid Active Dot Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[grid_active_dot_color]" class="color-picker" data-alpha="true" data-default-color="rgba(51,153,251,1)" value="<?php echo isset($sts_color_options['grid_active_dot_color']) ? esc_attr($sts_color_options['grid_active_dot_color']) : 'rgba(51,153,251,1)';?>">
                        </li>
                    </ul>
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Grid Arrow Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[grid_arrow_color]" class="color-picker" data-alpha="true" data-default-color="rgba(255,255,255,1)" value="<?php echo isset($sts_color_options['grid_arrow_color']) ? esc_attr($sts_color_options['grid_arrow_color']) : 'rgba(255,255,255,1)';?>">
                        </li>
                    </ul>
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Grid Arrow Inactive Background Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[grid_arrow_inactive_background_color]" class="color-picker" data-alpha="true" data-default-color="rgba(34,34,34,0.5)" value="<?php echo isset($sts_color_options['grid_arrow_inactive_background_color']) ? esc_attr($sts_color_options['grid_arrow_inactive_background_color']) : 'rgba(34,34,34,0.5)';?>">
                        </li>
                    </ul>
                    <ul class="sts-color-option">
                        <li class="sts-color-option-label">
                            <label><?php esc_html_e('Grid Arrow Active Background Color', 'simple-testimonials-showcase'); ?></label>
                        </li>
                        <li class="sts-color-option-input">
                            <input type="text" name="sts_color_options[grid_arrow_active_background_color]" class="color-picker" data-alpha="true" data-default-color="rgba(34,34,34,1)" value="<?php echo isset($sts_color_options['grid_arrow_active_background_color']) ? esc_attr($sts_color_options['grid_arrow_active_background_color']) : 'rgba(34,34,34,1)';?>">
                        </li>
                    </ul>
                </div>
                <input type="hidden" value="1" name="sts_admin_notices" />
                <input type="submit" name="sts_color_options_trigger" id="sts_color_options_trigger" class="button button-primary" value="<?php echo esc_html__('Save Changes', 'simple-testimonials-showcase'); ?>" />
            </form>
        </div>
        <?php
    }
    
    /**
     * Save Settings.
     * 
     * @since   1.1.0
     */
    public function sts_save_settings()
    {
        // Save Simple Testimonials Color Options
        $sts_color_options = filter_input( INPUT_POST, 'sts_color_options', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY );
        if ( !empty( $sts_color_options ) ) {
            update_option('sts_color_options', array_map( 'sanitize_text_field', $sts_color_options ));
        }
        
        // Admin Notices
        $admin_notices = filter_input( INPUT_POST, 'sts_admin_notices' );
        if ( isset( $admin_notices ) ) {
    ?>
        <div class="updated">
            <p><?php esc_html_e('Settings have been saved.', 'simple-testimonials-showcase'); ?></p>
        </div>
<?php
        }
    }
}
new Simple_Testimonials_Showcase_Settings();