<?php
namespace MetForm\Core\Integrations;
defined( 'ABSPATH' ) || exit;

class Slack {

    public function call_webhook( $form_data, $settings ){
        $msg = [];
        $data = [
            "text" => "New form submitted.",
            "pretext" => "from slack Webhook",
            "color" => "#36a64f",
            "fields" => [
                [
                    "title" => "First Name",
                    "value" => isset($form_data["mf-listing-fname"]) ? $form_data["mf-listing-fname"] : '',
                ],
                [
                    "title" => "Last Name",
                    "value" => isset($form_data["mf-listing-lname"]) ? $form_data["mf-listing-lname"] : '',
                ],
                [
                    "title" => "Email",
                    "value" => isset($form_data[$settings['email_name']]) ? $form_data[$settings['email_name']] : '',
                ],
            ],
        ];
        
        $status = wp_remote_post( $settings['url'], array(
            'method' => 'POST',
            'timeout' => 30,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => array(),
            'body' => json_encode($data),
            'cookies' => array()
            )
        );

        if(is_wp_error($status)){
            $msg['status'] = 0;
            $msg['msg'] = "Something went wrong : ".$status->get_error_message();
        }else{
            $msg['status'] = 1;
            $msg['msg'] = esc_html__('Your data inserted on slack.', 'metform');
        }
        return $msg;
    }
}