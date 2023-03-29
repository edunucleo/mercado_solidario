<?php

namespace MetForm\Base;

defined('ABSPATH') || exit;

class Shortcode
{

	use \MetForm\Traits\Singleton;


	public function __construct()
	{
		add_shortcode('metform', [$this, 'render_form']);
		add_shortcode('mf_thankyou', [$this, 'render_thank_you_page']);
		add_shortcode('mf_first_name', [$this, 'render_first_name']);
		add_shortcode('mf_last_name', [$this, 'render_last_name']);
		add_shortcode('mf_payment_status', [$this, 'render_payment_status']);
		add_shortcode('mf_transaction_id', [$this, 'render_transaction_id']);
		add_shortcode('mf',[$this,'render_mf_field']);
	}

	public function enqueue_form_assets(){
		wp_enqueue_style('metform-ui');
		wp_enqueue_style('metform-style');
		wp_enqueue_script('htm');
		wp_enqueue_script('metform-app');
	}


	public function render_form($atts)
	{
		$this->enqueue_form_assets();

		$attributes = shortcode_atts(array(
			'form_id' => 'test',
		), $atts);

		return '<div class="mf-form-shortcode">' . \MetForm\Utils\Util::render_form_content($attributes['form_id'], $attributes['form_id']) . '</div>';
	}

	public function render_thank_you_page($atts)
	{
		if($GLOBALS['pagenow'] == 'post.php'){
			return;
		}
		global $post;
		
		$this->enqueue_form_assets();

		$a = shortcode_atts(array(
			'fname' => '',
			'lname' => '',
		), $atts);

		$settings = \MetForm\Core\Admin\Base::instance()->get_settings_option();
		$page_id = 	 $settings['mf_thank_you_page'];
		//phpcs:ignore WordPress.Security.NonceVerification -- Nonce can't be added, Its a callback function of 'add_shortcode'
		$post_id = isset($_GET['id']) ? sanitize_text_field(wp_unslash($_GET['id'])) : '';
		$postMeta = get_post_meta(
			$post_id,
			'metform_entries__form_data',
			true
		);
		$first_name = !empty($postMeta[$a['fname']]) ? $postMeta[$a['fname']] : '';

		$payment_status = get_post_meta(
			$post_id,
			'metform_entries__payment_status',
			true
		);

		$tnx_id = get_post_meta(
			$post_id,
			'metform_entries__payment_trans',
			true
		);
	
		$msg = '';

		if ($payment_status == 'paid') {
			$msg = $first_name . ' Thank you for your payment. <br>' . ' Your transcation ID : ' . $tnx_id;
		} else {
			$msg = 'Thank you . Your payment status : ' . $payment_status;
		}
		
		return $msg;
	}

	public function render_mf_field($atts){
		$this->enqueue_form_assets();

		$a = shortcode_atts(array(
			'field' => ''
		),$atts);

		$settings = \MetForm\Core\Admin\Base::instance()->get_settings_option();
		$page_id = 	 $settings['mf_thank_you_page'];
		//phpcs:ignore WordPress.Security.NonceVerification -- Nonce can't be added, Its a callback function of 'add_shortcode'
		$post_id = isset($_GET['id']) ? sanitize_text_field(wp_unslash($_GET['id'])) : '';
		$field = get_post_meta(
			$post_id,
			'metform_entries__form_data',
			true
		)[$a['field']];

		return $field;
	}

	public function render_first_name($atts)
	{
		$this->enqueue_form_assets();
		//phpcs:ignore WordPress.Security.NonceVerification -- Nonce can't be added, Its a callback function of 'add_shortcode'
		$post_id = isset($_GET['id']) ? sanitize_text_field(wp_unslash($_GET['id'])) : '';
		$first_name = get_post_meta(
			$post_id,
			'metform_entries__form_data',
			true
		)['mf-listing-fname'];
		return $first_name;
	}

	public function render_last_name($atts)
	{
		$this->enqueue_form_assets();
		//phpcs:ignore WordPress.Security.NonceVerification -- Nonce can't be added, Its a callback function of 'add_shortcode'
		$post_id = isset($_GET['id']) ? sanitize_text_field(wp_unslash($_GET['id'])) : '';
		$last_name = get_post_meta(
			$post_id,
			'metform_entries__form_data',
			true
		)['mf-listing-lname'];
		return $last_name;
	}

	public function render_payment_status($atts)
	{
		$this->enqueue_form_assets();
		//phpcs:ignore WordPress.Security.NonceVerification -- Nonce can't be added, Its a callback function of 'add_shortcode'
		$post_id = isset($_GET['id']) ? sanitize_text_field(wp_unslash($_GET['id'])) : '';
		$payment_status = get_post_meta(
			$post_id,
			'metform_entries__payment_status',
			true
		);
		return $payment_status;
	}

	public function render_transaction_id($atts)
	{
		$this->enqueue_form_assets();
		//phpcs:ignore WordPress.Security.NonceVerification -- Nonce can't be added, Its a callback function of 'add_shortcode'
		$post_id = isset($_GET['id']) ? sanitize_text_field(wp_unslash($_GET['id'])) : '';
		$tnx_id = get_post_meta(
			$post_id,
			'metform_entries__payment_trans',
			true
		);

		return $tnx_id;
	}
}
