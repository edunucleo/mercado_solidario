<?php
/**
 * Plugin Name: MetForm
 * Plugin URI:  http://products.wpmet.com/metform/
 * Description: Most flexible and design friendly form builder for Elementor
 * Version: 3.2.4
 * Author: Wpmet
 * Author URI:  https://wpmet.com
 * Text Domain: metform
 * Domain Path: /languages
 * License:  GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

defined( 'ABSPATH' ) || exit;

require_once plugin_dir_path( __FILE__ ) . 'utils/notice/notice.php';
require_once plugin_dir_path( __FILE__ ) . 'utils/banner/banner.php';

require_once plugin_dir_path( __FILE__ ) . 'utils/stories/stories.php';
require_once plugin_dir_path( __FILE__ ) . 'utils/pro-awareness/pro-awareness.php';
require_once plugin_dir_path( __FILE__ ) . 'utils/rating/rating.php';

require plugin_dir_path( __FILE__ ) .'autoloader.php';
require plugin_dir_path( __FILE__ ) .'plugin.php';

// init notice class
\Oxaim\Libs\Notice::init();
// \Wpmet\Rating\Rating::init();
\Wpmet\Libs\Pro_Awareness::init();


register_activation_hook( __FILE__, [ MetForm\Plugin::instance(), 'flush_rewrites'] );

add_action( 'plugins_loaded', function(){
    do_action('metform/before_load');
    MetForm\Plugin::instance()->init();
    do_action('metform/after_load');
}, 111);


// Added Date: 20/07/2022
add_action('plugins_loaded', function(){
    if(class_exists('MetForm_Pro\Core\Integrations\Crm\Hubspot\Integration')){
        return;
    }
    require trailingslashit(plugin_dir_path(__FILE__)) . "core/integrations/crm/hubspot/loader.php";
}, 222);
