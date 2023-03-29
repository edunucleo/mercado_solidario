<?php 
namespace MetForm\Core\Integrations\Onboard;

use MetForm\Core\Integrations\Onboard\Classes\Utils;
use MetForm\Plugin;
use MetForm\Traits\Singleton;

defined( 'ABSPATH' ) || exit;

class Attr{

    use Singleton;
    
    public $utils;

    public static function get_dir(){
        return Plugin::instance()->core_dir() . 'integrations/onboard/';
    }

    public static function get_url(){
        return Plugin::instance()->core_url() . 'integrations/onboard/';
    }

    public function __construct() {

        $this->utils = Utils::instance();

        add_action( 'admin_enqueue_scripts', [$this, 'enqueue_scripts'] );
    }

    public function enqueue_scripts() {

        wp_register_style( 'metform-onboard-icon', self::get_url() . 'assets/css/onboard-icon.css', Plugin::instance()->version() );
        wp_register_style( 'metform-init-css-admin', self::get_url() . 'assets/css/admin-style.css', Plugin::instance()->version() );
        
        wp_enqueue_style( 'metform-onboard-icon' );

        wp_enqueue_style( 'metform-init-css-admin' );

        wp_enqueue_script( 'mf-admin-core', self::get_url() . 'assets/js/metform-onboard.js', ['jquery'], Plugin::instance()->version(), true );

        $data['rest_url']   = get_rest_url();
	    $data['nonce']      = wp_create_nonce('wp_rest');

	    wp_localize_script('mf-admin-core', 'rest_config', $data);

        wp_localize_script('mf-admin-core', 'mf_ajax_var', array(
            'nonce' => wp_create_nonce('ajax-nonce')
        ));
    }
}
