<?php

namespace MetForm\Core\Integrations\Crm\Hubspot;

use Exception;

defined('ABSPATH') || exit;

class Hubspot
{
    /**
     * @param $form_data
     * @param $settings
     */
    public function create_contact($form_data, $settings)
    {      

        // Refresh token if needed
        self::refresh_token();

        $settings_option = \MetForm\Core\Admin\Base::instance()->get_settings_option();

        // Return from the function if there is no hubspot token available.
        if( !isset( $settings_option['mf_hubsopt_token'] ) || empty( $settings_option['mf_hubsopt_token'] ) ){
            return;
        }

        $arr             = [
            'properties' => [
                [
                    'property' => 'email',
                    'value'    => (isset($form_data[$settings['email_field_name']]) ? $form_data[$settings['email_field_name']] : '')
                ],
                [
                    'property' => 'firstname',
                    'value'    => (isset($form_data['mf-listing-fname']) ? $form_data['mf-listing-fname'] : '')
                ],
                [
                    'property' => 'lastname',
                    'value'    => (isset($form_data['mf-listing-lname']) ? $form_data['mf-listing-lname'] : '')
                ],
                [
                    'property' => 'phone',
                    'value'    => (isset($form_data['mf-listing-phone']) ? $form_data['mf-listing-phone'] : '')
                ]
            ]
        ];
        $post_json = json_encode($arr);

        if(isset($settings_option['mf_hubsopt_token_type']) || !empty($settings_option['mf_hubsopt_token_type'])){
            
            $token = $settings_option['mf_hubsopt_token'];
            // API Endpoint
            $url = "https://api.hubapi.com/contacts/v1/contact";
            $headers = [
                'Authorization' => "Bearer " . $token,
                'Content-Type' => 'application/json'
            ];
            $options = [
                'method'      => 'POST',
                'body'        => $post_json,
                'headers'     => $headers,
                'sslverify'   => false,
            ];

            wp_remote_post( $url, $options );

        } else {

            // If the API configuration is old model
            if(isset($settings_option['mf_hubsopt_token'])){
                $hapikey = $settings_option['mf_hubsopt_token'];
                $endpoint = 'https://api.hubapi.com/contacts/v1/contact?hapikey=' . $hapikey;
                $headers = [
                    'Content-Type' => 'application/json'
                ];
    
                $options = [
                    'method'      => 'POST',
                    'body'        => $post_json,
                    'headers'     => $headers,
                    'sslverify'   => false,
                ];
    
                wp_remote_post( $endpoint, $options );
            }
        }
    }

    /**
     * @param $form_id
     * @param $form_data
     * @param $settings
     */
    public function submit_data($form_id, $form_data)
    {
        $portal_id = get_option('mf_hubspot_form_portalId_'.$form_id);
        $gu_id = get_option('mf_hubspot_form_guid_'.$form_id);
        $dd = get_option('mf_hubspot_form_data_' . $form_id);
        $data = [];
        foreach($dd as $d){
            foreach($d as $key => $value){
                $k = str_replace('mf_hubspot_form_field_name_','',$key);
                if(isset($form_data[$value])){
                    array_push($data,[
                        'name' => $k,
                        'value' => $form_data[$value]
                    ]);
                }
            }
        }
        $api_url = 'https://api.hsforms.com/submissions/v3/integration/submit/' . $portal_id . '/' . $gu_id;
        $body = json_encode(['fields' => $data]);
        try{
            $response = wp_remote_post(
                $api_url,
                [
                    'method'      => 'POST',
                    'data_format' => 'body',
                    'timeout'     => 45,
                    'headers'     => [
                        'Content-Type' => 'application/json; charset=utf-8'
                    ],
                    'body'        => $body
                ]
            );

            file_put_contents('debug.json',json_encode($response));

        }catch(Exception $e){

            $myfile = fopen("debug.txt", "w");
            $txt    = $e;
            fwrite($myfile, $txt);
            fclose($myfile);
        }
    }

    public static function refresh_token()
    {
        $response = false;
        $settings_option = \MetForm\Core\Admin\Base::instance()->get_settings_option();
        if(isset($settings_option['mf_hubsopt_token_type']) || !empty($settings_option['mf_hubsopt_token_type'])){
            if(!get_transient( 'mf_hubsopt_token_transient' )){
                // Refresh the token
                $response = wp_remote_get( 'https://api.wpmet.com/public/hubspot-auth/refresh-token.php?refresh_token='. $settings_option['mf_hubsopt_refresh_token'] );
                // Check if request is successful
                if($response['response']['code'] === 200){
                    $responseBody = json_decode($response['body'], true);

                    // Save new token values
                    $settings_option['mf_hubsopt_token'] = $responseBody['access_token'];
                    $settings_option['mf_hubsopt_refresh_token'] = $responseBody['refresh_token'];
                    $settings_option['mf_hubsopt_token_type'] = $responseBody['token_type'];
                    $settings_option['mf_hubsopt_expires_in'] = $responseBody['expires_in'];
    
                    // Save the results in a transient named latest_5_posts
                    set_transient( 'mf_hubsopt_token_transient', $responseBody['access_token'], $responseBody['expires_in'] );
    
                    // Update settings options
                    update_option('metform_option__settings', $settings_option);

                    return true;
                }               
            }
        }
        return $response;
    }
}
