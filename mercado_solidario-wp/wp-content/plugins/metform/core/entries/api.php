<?php

namespace MetForm\Core\Entries;

use MetForm\Core\Integrations\Get_Response;
use MetForm\Core\Integrations\Mail_Chimp;

defined('ABSPATH') || exit;

class Api extends \MetForm\Base\Api
{

    public function config()
    {
        $this->prefix = 'entries';
        $this->param = "/(?P<id>\w+)";
    }

    public function post_insert()
    {
        $url = wp_get_referer();
        $post_id = url_to_postid($url);
        $post_id;

        $id = $this->request['id'];

        $form_data = $this->request->get_params();

        $file_data = $this->request->get_file_params();

        return Action::instance()->submit($id, $form_data, $file_data,$post_id);
    }

    public function get_export()
    {
        if(!current_user_can('manage_options')) {
			return;
		}

        $id = $this->request['id'];

        return Export::instance()->export_data($id);
    }

    public function get_get_response_list_id()
    {
        if(!current_user_can('manage_options')) {
			return;
		}

        $post_id = $this->request['id'];
        return get_option('wpmet_get_response_list_' . $post_id);
    }

    public function get_paypal()
    {

        $args = [
            'method' => (isset($this->request['action']) ? $this->request['action'] : ''),
            'action' => (isset($this->request['id']) ? $this->request['id'] : ''),
            'entry_id' => (isset($this->request['entry_id']) ? $this->request['entry_id'] : ''),
        ];

        if (class_exists('\MetForm_Pro\Core\Integrations\Payment\Paypal')) {
            return \MetForm_Pro\Core\Integrations\Payment\Paypal::instance()->init($args, $this->request);
        }
        return 'Pro needed';
    }

    public function get_stripe()
    {
        $args = [
            'method' => (isset($this->request['action']) ? $this->request['action'] : ''),
            'action' => (isset($this->request['id']) ? $this->request['id'] : ''),
            'entry_id' => (isset($this->request['entry_id']) ? $this->request['entry_id'] : ''),
            'token' => (isset($this->request['token']) ? $this->request['token'] : ''),
        ];
        if (class_exists('\MetForm_Pro\Core\Integrations\Payment\Stripe')) {
            return \MetForm_Pro\Core\Integrations\Payment\Stripe::instance()->init($args);
        }
        return 'Pro needed';
    }

    public function get_views()
    {
        return $this->request->get_params();
    }

    public function get_get_response_list()
    {
        if(!current_user_can('manage_options')) {
			return;
		}

        $post_id = $this->request['id'];
        return get_option('wpmet_get_response_list_' . $post_id);
    }

    public function get_store_get_response_list()
    {
        if(!current_user_can('manage_options')) {
			return;
		}

        if (class_exists('\MetForm_Pro\Core\Integrations\Email\Getresponse\Get_Response')) {

            $post_id = $this->request['id'];
            $data = \MetForm\Core\Forms\Action::instance()->get_all_data($post_id);
            $api_key = isset($data['mf_get_reponse_api_key']) ? $data['mf_get_reponse_api_key'] : null;

            $get_response_list = \MetForm_Pro\Core\Integrations\Email\Getresponse\Get_Response::get_list($api_key);

            delete_option('wpmet_get_response_list_' . $post_id, $get_response_list);
            update_option('wpmet_get_response_list_' . $post_id, $get_response_list);

            return get_option('wpmet_get_response_list_' . $post_id);
        }

        return 'error';
    }

    public function get_get_mailchimp_list()
    {
        if(!current_user_can('manage_options')) {
			return;
		}
        $post_id = $this->request['id'];
        return get_option('wpmet_get_mailchimp_list_' . $post_id);
    }

    public function get_store_mailchimp_list()
    {
        if(!current_user_can('manage_options')) {
			return;
		}

        $post_id = $this->request['id'];
        $data = \MetForm\Core\Forms\Action::instance()->get_all_data($post_id);
        $api_key = $data['mf_mailchimp_api_key'];

        $mailChimp_list = json_decode(Mail_Chimp::get_list($api_key)['body']);

        delete_option('wpmet_get_mailchimp_list_' . $post_id, $mailChimp_list);
        update_option('wpmet_get_mailchimp_list_' . $post_id, $mailChimp_list);

        return get_option('wpmet_get_mailchimp_list_' . $post_id, $mailChimp_list);
    }

    public function get_test()
    {
    }

}
