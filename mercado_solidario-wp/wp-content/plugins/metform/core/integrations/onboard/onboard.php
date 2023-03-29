<?php

namespace MetForm\Core\Integrations\Onboard;

use MetForm\Plugin;
use MetForm\Traits\Singleton;
use MetForm\Core\Integrations\Onboard\Classes\Plugin_Data_Sender;

defined( 'ABSPATH' ) || exit;

class Onboard {

	use Singleton;
	protected  $optionKey = 'met_form_onboard_status';
	protected  $optionValue = 'onboarded';

	const CONTACT_LIST_ID = 2;
	const ENVIRONMENT_ID = 2;

	public function views() {
		?>
			<div class="metform-onboard-dashboard">
				<div class="metform_container">
					<form action="" method="POST" id="mf-admin-settings-form">
						<?php
							include self::get_dir().'views/layout-onboard.php';
						?>
					</form>
				</div>
			</div>
		<?php
	}

	public static function get_dir() {
		return Plugin::instance()->core_dir() . 'integrations/onboard/';
	}

	public static function get_url(){
        return Plugin::instance()->core_url() . 'integrations/onboard/';
    }

	public function init() {
		
		new Classes\Ajax;

		if ( get_option( $this->optionKey ) ) {
			//phpcs:disable WordPress.Security.NonceVerification -- its just checking met-onboard-steps is finished or not.
			if(isset($_GET['met-onboard-steps'])) {
				wp_safe_redirect($this->get_plugin_url());
			}
			return true;
		}
	
		add_action('metform/admin/after_save', [$this, 'ajax_action']);

		$param      = isset( $_GET['met-onboard-steps'] ) ?  sanitize_text_field(wp_unslash($_GET['met-onboard-steps'])) : null;
		$requestUri = ( isset( $_GET['post_type'] ) ?  sanitize_text_field(wp_unslash($_GET['post_type'])) : '' ) . ( isset( $_GET['page'] ) ?  sanitize_text_field(wp_unslash($_GET['page'])) : '' );
		//phpcs:enable
		if ( strpos( $requestUri, 'metform' ) !== false && is_admin() ) {
			if ( $param !== 'loaded' && ! get_option( $this->optionKey ) ) {
				wp_safe_redirect( $this->get_onboard_url() );
				exit;
			}
		}

		return true;
	}

	public  function ajax_action(){
		$this->finish_onboard();
		if( isset($_POST['nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])),'ajax-nonce')){
	
			if ( isset( $_POST['settings']['tut_term'] ) &&  sanitize_text_field(wp_unslash($_POST['settings']['tut_term'])) == 'user_agreed' ) {
				Plugin_Data_Sender::instance()->send( 'diagnostic-data' ); // send non-sensitive diagnostic data and details about plugin usage.
			}

			if ( isset( $_POST['settings']['newsletter_email'] ) && !empty($_POST['settings']['newsletter_email'])) {
				$data = [
					'email'           =>  sanitize_text_field(wp_unslash($_POST['settings']['newsletter_email'])),
					'environment_id'  => Onboard::ENVIRONMENT_ID,
					'contact_list_id' => Onboard::CONTACT_LIST_ID,
				];

				$response = Plugin_Data_Sender::instance()->sendAutomizyData( 'email-subscribe', $data);
				\MetForm\Utils\Util::metform_content_renderer(print_r($response));
				exit;
			}
		}
	}

	private  function get_onboard_url() {
		return add_query_arg(
			array(
				'page'               		=> 'metform-menu-settings',
				'met-onboard-steps' 		=> 'loaded',
				'met-onboard-steps-nonce'	=> wp_create_nonce('met-onboard-steps-action')
			),
			admin_url( 'admin.php' )
		);
	}

	public function redirect_onboard() {
		if (is_null(get_option( $this->optionKey ) )) {
			wp_safe_redirect( $this->get_onboard_url() );
			exit;
		}
	}

	private static function get_plugin_url() {
		return add_query_arg(
			array(
				'page' => 'metform-menu-settings',
			),
			admin_url( 'admin.php' )
		);
	}

	public function finish_onboard() {
		if ( ! get_option( $this->optionKey ) ) {
			add_option( $this->optionKey,  $this->optionValue );
		}
	}
}