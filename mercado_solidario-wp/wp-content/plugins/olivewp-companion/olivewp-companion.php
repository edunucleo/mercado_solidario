<?php 
/* 
* Plugin Name:          OliveWP Companion
* Plugin URI:
* Description:          OliveWP Companion plugin enhances the functionality of OliveWP theme. This plugin requires OliveWP theme to be installed.
* Version:              1.1.2
* Requires at least:    5.3
* Requires PHP:         5.2
* Tested up to:         6.0
* Author:               Spicethemes
* Author URI:           https://spicethemes.com
* License:              GPLv2 or later
* License URI:          https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:          olivewp-companion
* Domain Path:          /languages
*/

// define the constant for the URL
define( 'OWC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'OWC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

add_action( 'admin_menu', 'olivewp_companion_options_page',999 );
if(!function_exists('olivewp_companion_options_page')){
    function olivewp_companion_options_page() {
        if(!function_exists('olivewp_plus_activate')){
            $theme = wp_get_theme();
            // checking for olivewp theme
            if ( 'OliveWP' == $theme->name || 'OliveWP Child' == $theme->name ) {
               add_menu_page(
                    esc_html__( 'OliveWP Companion', 'olivewp-companion' ),
                    esc_html__( 'OliveWP Companion', 'olivewp-companion' ),
                    'manage_options',
                    'olivewp-companion',
                    function() { require_once OWC_PLUGIN_DIR.'/admin/view.php'; },
                    'dashicons-groups',
                    20
                );
                add_submenu_page(
                    'olivewp-companion',
                    esc_html__( 'OliveWP Panel', 'olivewp-companion' ),
                    esc_html__( 'OliveWP Panel', 'olivewp-companion' ),
                    'manage_options',
                    'olivewp-companion',
                    function() { require_once OWC_PLUGIN_DIR.'/admin/view.php'; },
                    1
                );
                if(get_option('spice_starter_sites_value')== 'deactivate'){
                    if(class_exists('OCDI_Plugin')):
                        $olivewp_companion_ocdi=OCDI\OneClickDemoImport::get_instance();

                        add_submenu_page(
                        'olivewp-companion',
                        esc_html__( 'Starter Sites', 'olivewp-companion' ), 
                        esc_html__( 'Starter Sites', 'olivewp-companion' ), 
                        'manage_options', 
                        'one-click-demo-import',
                        $olivewp_companion_ocdi->create_plugin_page()
                        );
                    endif;
                }
            }
        }    
    }
}

add_action( 'plugins_loaded', 'olivewp_companion_activate' );

function olivewp_companion_remove_submenu() {

    remove_submenu_page('themes.php','one-click-demo-import');
}
add_action( 'admin_menu', 'olivewp_companion_remove_submenu', 11 );

if(!function_exists('olivewp_companion_activate')){

    function olivewp_companion_activate() {
        // gets the current theme
        $theme = wp_get_theme();

        // checking for olivewp theme
        if ( 'OliveWP' == $theme->name || 'OliveWP Child' == $theme->name ) {     
            require_once OWC_PLUGIN_DIR . 'admin/owc-script.php';
            require_once OWC_PLUGIN_DIR . 'inc/control/fonts.php';
            require_once OWC_PLUGIN_DIR . 'inc/control/sanitization.php';
            if(get_option('trending_posts_value')=='deactivate'){            
                require_once OWC_PLUGIN_DIR . '/inc/trending-post/customizer/customizer-trending-post.php'; 
                require_once OWC_PLUGIN_DIR . '/inc/trending-post/olivewp-companion-trending-post.php';
                
            }             
            if(class_exists('Spice_Starter_Sites')){
                if(!get_option('spice_starter_sites_value')){
                    update_option('spice_starter_sites_value','deactivate');
                }
            }
        }     
    }
}

function olivewp_companion_deactivate_plugin_conditional() {
    if ( get_option('spice_starter_sites_value')== 'deactivate') {
    deactivate_plugins('spice-starter-sites/spice-starter-sites.php');    
    }
}
add_action( 'admin_init', 'olivewp_companion_deactivate_plugin_conditional' );

add_action( 'customize_register','olivewp_companion_custom_controls');

if(!function_exists('olivewp_companion_custom_controls')){
    
    function olivewp_companion_custom_controls( $wp_customize ) {
        // Load customize control classes
        require_once ( OWC_PLUGIN_DIR . '/inc/control/customizer-category-dropdown-custom-control.php');
        require_once ( OWC_PLUGIN_DIR . '/inc/control/customizer-taxonomy-dropdown-custom-control.php');
        require_once ( OWC_PLUGIN_DIR . '/inc/control/customizer-image-checkbox-custom-control.php');
        require_once ( OWC_PLUGIN_DIR . 'inc/control/toggle/class-toggle-control.php' );
        require_once ( OWC_PLUGIN_DIR . '/inc/control/customizer-slider/customizer-slider.php' );
    }
}

/**
 * Load the localisation file.
*/
function olivewp_companion_load_plugin_textdomain() {
    load_plugin_textdomain( 'olivewp-companion', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action('init','olivewp_companion_load_plugin_textdomain');


/*
Spice Starter Sites


/**
 * Set up and initialize
 */

class Olivewp_Companion_Spice_Starter_Sites {
        private static $instance;

        /**
         * Actions setup
         */
        public function __construct() {
            add_action( 'plugins_loaded', array( $this, 'includes' ), 4 );
            add_action('admin_notices', array( $this, 'admin_notice' ), 6 );  
        }

        /**
         * Includes
         */
        function includes() {
            if(!class_exists('Spice_Starter_Sites_Plus')){
                require_once( OWC_PLUGIN_DIR . 'inc/spice-starter-sites/demo-content/setup.php' );
            }
        }

        /*
        * Admin Notice
        * Warning when the site doesn't have One Click Demo Importer installed or activated    
        */
        public function admin_notice() {
            if (!class_exists('OCDI_Plugin')){
                if(!class_exists('Spice_Starter_Sites_Plus')){
                    echo '<div class="notice notice-warning is-dismissible"><p><strong>', esc_html__('"Spice Starter Sites" requires "One Click Demo Import" to be installed and activated.','olivewp-companion'), '</strong></p>';
                    if(function_exists('olivewp_plus_activate')){
                        $olivewp_companion_about_page=olivewp_plus_about_page();
                    }
                    else{
                        $olivewp_companion_about_page=olivewp_about_page();            
                    }
                    $olivewp_companion_actions = $olivewp_companion_about_page->recommended_actions;
                    $olivewp_companion_actions_todo = get_option( 'recommended_actions', false );
                    if($olivewp_companion_actions): 
                        foreach ($olivewp_companion_actions as $key => $olivewp_companion_val):
                            if($olivewp_companion_val['id']=='install_one-click-demo-import'):
                                /* translators: %s: theme name */
                                echo '<p>'.wp_kses_post($olivewp_companion_val['link']).'</p></div>';
                            endif;
                        endforeach;
                    endif;
                }
            }
        }

        static function install() {
            if ( version_compare(PHP_VERSION, '5.4', '<=') ) {
                wp_die( __( 'Spice Starter Sites requires PHP 5.4. Please contact your host to upgrade your PHP. The plugin was <strong>not</strong> activated.', 'olivewp-companion' ) );
            };

        }

        /**
         * Returns the instance.
        */
        public static function get_instance() {

            if ( !self::$instance )
                self::$instance = new self;

            return self::$instance;
        }
}

if(get_option('spice_starter_sites_value')== 'deactivate'){
    if(!class_exists('Spice_Starter_Sites_Plus')){
        Olivewp_Companion_Spice_Starter_Sites::get_instance();
    }
}

if(!function_exists('olivewp_plus_activate')){
    function olivewp_companion_activation_redirect( $plugin ) {
        global $pagenow;
        if( $pagenow == 'plugins.php' ) 
        {
            if( $plugin == plugin_basename( __FILE__ ) ) {
                exit( wp_redirect( admin_url( 'admin.php?page=olivewp-companion' ) ) );
            }
        }
    }
    add_action( 'activated_plugin', 'olivewp_companion_activation_redirect' );
}

// Notice to Upgrade Plugin
function olivewp_companion_admin_notice_success() {
    if ( get_option( 'dismissed-olivewp_comanion_success_plugin', false ) ) {
       return;
    }
    if ( function_exists('olivewp_plus_activate')) {
        return;
    }
    $id = $GLOBALS['hook_suffix'];
    if('toplevel_page_olivewp-companion'==$id):?>
        <div class="updated notice is-dismissible olivewp-theme-success" >
            <div class="olivewp-theme-content">
                <h3><?php printf( esc_html__('Thank you for installing the OliveWP Companion.', 'olivewp-companion')); ?></h3>

                <p style="font-size:14px;"><?php printf(esc_html_e( 'We recommended you install and activate the OliveWP Plus plugin to unlock the enhanced functionality.', 'olivewp-companion' )); ?></p>

                <p style="font-size:14px;"><?php printf(esc_html_e( 'The Premium version of the OliveWP comes with many powerful features. You can get access:', 'olivewp-companion' )); ?></p>

                <ul style="padding: revert; list-style-type:square;">
                    <li><?php printf(esc_html_e( 'Enhance the theme functionality', 'olivewp-companion' )); ?></li>
                    <li><?php printf(esc_html_e( 'Premium starter sites', 'olivewp-companion' )); ?></li>
                    <li><?php printf(esc_html_e( 'Sticky Header & Footer', 'olivewp-companion' )); ?></li>
                    <li><?php printf(esc_html_e( 'and much more', 'olivewp-companion' )); ?></li>
                </ul>
                <p style="font-size:14px";><a href="<?php echo esc_url('https://olivewp.org/pricing/');?>" target="_blank" class="button-primary"><?php echo esc_html('Upgrade','olivewp-companion');?></a></p>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(function($) {
            $( document ).on( 'click', '.olivewp-theme-success .notice-dismiss', function () {
                var type = $( this ).closest( '.olivewp-theme-success' ).data( 'notice' );
                $.ajax( ajaxurl,
                  {
                    type: 'POST',
                    data: {
                      action: 'dismissed_plugin_success_handler',
                      type: type,
                    }
                  } );
              } );
          });
        </script>
        <?php
    endif;

}
add_action( 'admin_notices', 'olivewp_companion_admin_notice_success' );

function olivewp_companion_success_ajax_handler() {
    update_option( 'dismissed-olivewp_comanion_success_plugin', TRUE );
}
add_action( 'wp_ajax_dismissed_plugin_success_handler', 'olivewp_companion_success_ajax_handler');