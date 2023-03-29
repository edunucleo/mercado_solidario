<?php

namespace MetForm\Core\Forms;

defined('ABSPATH') || exit;

Class Action {

	use \MetForm\Traits\Singleton;

	private $key_form_settings;
	private $key_option_settings;
	private $key_form_count_views;
	private $post_type;

	private $fields;
	private $form_id;
	private $form_setting;
	private $title;
	private $response = [];

	public function __construct() {

		$this->key_form_settings = Base::instance()->form->get_key_form_settings();
		$this->key_option_settings = 'metform_option__settings';
		$this->key_form_count_views = 'metform_form__count_views';
		$this->post_type = Base::instance()->form->get_name();

		$this->response = [
			'saved'  => false,
			'status' => esc_html("Something went wrong.", 'metform'),
			'data'   => [
			],
		];
	}

	public function store($form_id, $form_setting) {

		$this->fields = $this->get_fields();
		$this->sanitize($form_setting);
		$this->form_id = $form_id;

		if(isset($form_setting['mf_zapier']) && isset($form_setting['mf_zapier_webhook']) && $form_setting['mf_zapier_webhook'] != '') {

			$map_data = \MetForm\Core\Entries\Action::instance()->get_fields($form_id);
			$email_name = \MetForm\Core\Entries\Action::instance()->get_input_name_by_widget_type('mf-email', $map_data);

			$existing_settings = \MetForm\Core\Forms\Action::instance()->get_all_data($this->form_id);
			$zapier = new \MetForm_Pro\Core\Integrations\Zapier();

			$url = $form_setting['mf_zapier_webhook'];

			if(!empty($existing_settings) && ($existing_settings['mf_zapier_webhook'] != $form_setting['mf_zapier_webhook'])) {
				$this->response['data']['zapier'] = $zapier->call_webhook($form_data[] = null, ['url' => $url, 'email_name' => $email_name]);
			} elseif(empty($existing_settings)) {
				$this->response['data']['zapier'] = $zapier->call_webhook($form_data[] = null, ['url' => $url, 'email_name' => $email_name]);
			}

		}

		if($this->form_id == -1) {
			$this->update_option_settings();
		} else {
			if($this->form_id == 0) {
				$this->insert();
			} else {
				$this->update();
			}
		}

		return $this->response;
	}

	public function update_option_settings() {
		$status = update_option($this->key_option_settings, $this->form_setting);
		if($status) {
			$this->response['saved'] = true;
			$this->response['status'] = esc_html__('Form settings inserted', 'metform');
			$this->response['key'] = $this->key_option_settings;
			$this->response['data'] = $this->form_setting;
		}
	}

	public function insert() {

		$this->title = ($this->form_setting['form_title'] != '') ? $this->form_setting['form_title'] : 'New Form # ' . time();

		$defaults = [
			'post_title'  => $this->title,
			'post_status' => 'publish',
			'post_type'   => $this->post_type,
		];

		$this->form_id = wp_insert_post($defaults);

		update_post_meta($this->form_id, $this->key_form_settings, $this->form_setting);
		update_post_meta($this->form_id, '_wp_page_template', 'elementor_canvas');

		$this->response['saved'] = true;
		$this->response['status'] = esc_html__('Form settings inserted', 'metform');

		if((!array_key_exists('store_entries', $this->form_setting)) && (!array_key_exists('enable_user_notification', $this->form_setting)) && (!array_key_exists('enable_admin_notification', $this->form_setting)) && (!array_key_exists('mf_mail_chimp', $this->form_setting)) && (!array_key_exists('mf_zapier', $this->form_setting))) {
			$this->response['saved'] = false;
			$this->response['status'] = esc_html__('You must active at least one field of these fields "store entry/ Confirmation/ Notification/ MailChimp/ Zapier". ', 'metform');
		}
		if((array_key_exists('mf_paypal', $this->form_setting)) && (!array_key_exists('store_entries', $this->form_setting))) {
			$this->response['saved'] = false;
			$this->response['status'] = esc_html__('You must enable "store entries" for integrating payment method.', 'metform');
		}

		$this->response['data']['id'] = $this->form_id;
		$this->response['data']['title'] = $this->title;
		$this->response['data']['type'] = $this->post_type;
	}

	public function update() {

		$this->title = ($this->form_setting['form_title'] != '') ? $this->form_setting['form_title'] : 'Form # ' . time();

		if(isset($this->form_setting['form_title'])) {
			$update_post = [
				'ID'         => $this->form_id,
				'post_title' => $this->title,
			];
			wp_update_post($update_post);
		}

		update_post_meta($this->form_id, $this->key_form_settings, $this->form_setting);
		update_post_meta($this->form_id, '_wp_page_template', 'elementor_canvas');

		$this->response['saved'] = true;
		$this->response['status'] = esc_html('Form settings updated', 'metform');

		if((!array_key_exists('store_entries', $this->form_setting)) && (!array_key_exists('enable_user_notification', $this->form_setting)) && (!array_key_exists('enable_admin_notification', $this->form_setting)) && (!array_key_exists('mf_mail_chimp', $this->form_setting)) && (!array_key_exists('mf_zapier', $this->form_setting)) && (!array_key_exists('mf_rest_api', $this->form_setting)) && (!array_key_exists('mf_slack', $this->form_setting))) {
			$this->response['saved'] = false;
			$this->response['status'] = esc_html('You must active at least one field of these fields "store entries/ Confirmation/ Notification/ REST API/ MailChimp/ Slack/ Zapier". ', 'metform');
		}
		if((array_key_exists('mf_paypal', $this->form_setting)) && (!array_key_exists('store_entries', $this->form_setting))) {
			$this->response['saved'] = false;
			$this->response['status'] = esc_html__('You must enable "store entries" for integrating payment method.', 'metform');
		}

		$this->response['data']['id'] = $this->form_id;
		$this->response['data']['title'] = $this->title;
		$this->response['data']['type'] = $this->post_type;
	}

	public function get_fields() {
		
		return Base::instance()->form->get_form_settings_fields();
	}

	public function sanitize($form_setting, $fields = null) {
		if($fields == null) {
			$fields = $this->fields;
		}
		foreach($form_setting as $key => $value) {

			if(isset($fields[$key])) {
				$this->form_setting[$key] = $value;
			}

		}
	}


	/**
	 *
	 * @param $post_id
	 *
	 * @return array|null
	 */
	public function get_all_data($post_id) {

		// this hide all the response after form submission 
        // if(!current_user_can('manage_options')) {
		// 	return;
		// }

		$post = get_post($post_id);

		if(!is_object($post)) {
			return null;
		}

		if(!property_exists($post, 'ID')) {
			return null;
		}

		$settings = get_post_meta($post->ID, $this->key_form_settings, true);
		$settings = (is_array($settings) ? $settings : []);
		$settings['entry_title'] = (!isset($settings['entry_title']) ? 'Entry # [mf_id]' : $settings['entry_title']);

		$global_settings = \MetForm\Core\Admin\Base::instance()->get_settings_option();
		$global_settings = (is_array($global_settings) ? $global_settings : []);

		$cKitCache = [];
		$awbCache = [];
		$mpCache = [];

		if(class_exists('\MetForm_Pro\Core\Integrations\Convert_Kit')) {

			$cKitCache = get_option(\MetForm_Pro\Core\Integrations\Convert_Kit::CKIT_FORMS_CACHE_KEY);
		}

		if(class_exists('\MetForm_Pro\Core\Integrations\Aweber')) {

			$awbCache = get_option(\MetForm_Pro\Core\Integrations\Aweber::AWEBER_LISTS_CACHE_KEY);
		}

		if(class_exists('\MetForm_Pro\Core\Integrations\Mail_Poet')) {

			$mpCache = get_option(\MetForm_Pro\Core\Integrations\Mail_Poet::MAIL_POET_LISTS_CACHE_KEY);
		}


		if(empty($global_settings)) {
			$all_settings = $settings;
			$all_settings['mf_recaptcha_version'] = 'recaptcha-v2';
		} else {
			$all_settings = array_merge($settings, $global_settings);
		}

		$all_settings['form_title'] = get_the_title($post_id);

		$map_data = \MetForm\Core\Entries\Action::instance()->get_fields($post_id);

		\MetForm\Core\Entries\Metform_Shortcode::instance()->set_all_keys($map_data);
		$formated_keys = \MetForm\Core\Entries\Metform_Shortcode::instance()->get_all_keys();

		$all_settings['input_names'] = (!empty($formated_keys) ? implode(' ', $formated_keys) : 'Example: [mf-inputname]');

		$all_settings['ckit_opt'] = $cKitCache;
		$all_settings['aweber_opt'] = $awbCache;
		$all_settings['mp_opt'] = $mpCache;

		// Attach hubspot form fields settings with the form settings
		$hubspot_settings = get_option( 'mf_hubspot_form_data_' . $post_id );
		if(!empty($hubspot_settings)){
			foreach($hubspot_settings as $hubspot_setting){
				if(is_array($hubspot_setting)){
					foreach($hubspot_setting as $kay => $value){
						$all_settings[$kay] = $value;
					}
				}
			}
		}

		// Attach Aweber custom fields settings with the form settings
		$aweber_custom_field_settings = get_option( 'mf_aweber_form_data_' . $post_id );
		if(!empty($aweber_custom_field_settings)){
			foreach($aweber_custom_field_settings as $aweber_field_setting){
				if(is_array($aweber_field_setting)){
					foreach($aweber_field_setting as $kay => $value){
						$all_settings[$kay] = $value;
					}
				}
			}
		}

		return $all_settings;
	}

	public function get_count_views($form_id) {
		return get_post_meta($form_id, $this->key_form_count_views, true);
	}

	public function count_views($form_id) {

		$form_setting = $this->get_all_data($form_id);
		//return $form_setting;

		if(isset($form_setting['count_views']) && $form_setting['count_views'] == '1') {
			$count = $this->get_count_views($form_id);
			$count = (int)$count;
			$count++;
			update_post_meta($form_id, $this->key_form_count_views, $count);

			return $count;
		}
	}
}
