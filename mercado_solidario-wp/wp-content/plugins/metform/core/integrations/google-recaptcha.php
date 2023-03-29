<?php
namespace MetForm\Core\Integrations;
defined( 'ABSPATH' ) || exit;

class Google_Recaptcha {

    use \MetForm\Traits\Singleton;

    private $return;

    public function verify_captcha_v2( $form_data, $form_settings ){

        $secretKey = ((isset($form_settings['mf_recaptcha_secret_key']) && ($form_settings['mf_recaptcha_secret_key'] != '')) ? $form_settings['mf_recaptcha_secret_key'] : '');
            
        $captcha = (isset($form_data['g-recaptcha-response']) ? $form_data['g-recaptcha-response'] : '');
        
        $data = array(
            'secret' => $secretKey,
            'response' => $captcha,
            'remoteip' => isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'])):''
        );

        $endpoint = 'https://www.google.com/recaptcha/api/siteverify';
        $options = [
            'method'      => 'POST',
            'body'        => $data,
            'sslverify'   => false,
        ];

        $response = wp_remote_post( $endpoint, $options );
        $responseKeys = json_decode($response['body'],true);
        $this->return['responseKeys'] = $responseKeys;

        if($responseKeys["success"]) {
            $this->return['status'] = 1;
        } else {
            $this->return['status'] = 0;
            $this->return['error'] = esc_html__('Captcha is not verified.','metform');
        }

        return $this->return;
    }

    public function verify_captcha_v3( $form_data, $form_settings ){
        
        $secretKey = ((isset($form_settings['mf_recaptcha_secret_key_v3']) && ($form_settings['mf_recaptcha_secret_key_v3'] != '')) ? $form_settings['mf_recaptcha_secret_key_v3'] : '');
            
        $captcha = (isset($form_data['g-recaptcha-response-v3']) ? $form_data['g-recaptcha-response-v3'] : '');
        
        $data = array(
            'secret' => $secretKey,
            'response' => $captcha,
        );

        $endpoint = 'https://www.google.com/recaptcha/api/siteverify';
        $options = [
            'method'      => 'POST',
            'body'        => $data,
            'sslverify'   => false,
        ];

        $response = wp_remote_post( $endpoint, $options );

        $responseKeys = json_decode($response['body'],true);
        $this->return['responseKeys'] = $responseKeys;

        if($responseKeys["success"]) {
            $this->return['status'] = 1;
        } else {
            $this->return['status'] = 0;
            $this->return['error'] = esc_html__('Captcha is not verified.','metform');
        }

        return $this->return;
    }
}