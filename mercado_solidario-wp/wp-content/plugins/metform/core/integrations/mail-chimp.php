<?php

namespace MetForm\Core\Integrations;

defined('ABSPATH') || exit;

class Mail_Chimp
{

	public function call_api($form_data, $settings)
	{
		
		$return = [];
		$auth = [
			'api_key' => ($settings['auth']['mf_mailchimp_api_key'] != '') ? $settings['auth']['mf_mailchimp_api_key'] : null,
			'list_id' => ($settings['auth']['mf_mailchimp_list_id'] != '') ? $settings['auth']['mf_mailchimp_list_id'] : null,

		];

		$data = [
			'email_address' => (isset($form_data[$settings['email_name']]) ? $form_data[$settings['email_name']] : ''),
			'status' => 'subscribed',
			'status_if_new' => 'subscribed',
			'merge_fields' => [
				'FNAME' => (isset($form_data['mf-listing-fname']) ? $form_data['mf-listing-fname'] : ''),
				'LNAME' => (isset($form_data['mf-listing-lname']) ? $form_data['mf-listing-lname'] : ''),
			],
		];
		$server = explode('-', $auth['api_key']);
		$url = 'https://' . $server[1] . '.api.mailchimp.com/3.0/lists/' . $auth['list_id'] . '/members/';

		$response = wp_remote_post(
			$url,
			[
				'method' => 'POST',
				'data_format' => 'body',
				'timeout' => 45,
				'headers' => [

					'Authorization' => 'apikey ' . $auth['api_key'],
					'Content-Type' => 'application/json; charset=utf-8'
				],
				'body' => json_encode($data)
			]
		);

		if (is_wp_error($response)) {
			$error_message = $response->get_error_message();
			$return['status'] = 0;
			$return['msg'] = "Something went wrong: " . esc_html($error_message);
		} else {
			$return['status'] = 1;
			$return['msg'] = esc_html__('Your data inserted on ActiveCampaign.', 'metform');
		}

		return $return;
	}

	public static function get_list($api_key){

		$server = explode('-',$api_key);

        $url = 'https://'.$server[1].'.api.mailchimp.com/3.0/lists';

		$response = wp_remote_post( $url, [
			'method' => 'GET',
			'data_format' => 'body',
			'timeout' => 45,
			'headers' => [

							'Authorization' => 'apikey '.$api_key,
							'Content-Type' => 'application/json; charset=utf-8'
					],
			'body' => ''
			]
		);

		return $response;
	}
}
