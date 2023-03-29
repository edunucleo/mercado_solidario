<?php

namespace MetForm\Core\Forms;

defined('ABSPATH') || exit;

class Cpt extends \MetForm\Base\Cpt
{


    public function get_name()
    {
        return 'metform-form';
    }

    public function get_key_form_settings()
    {
        return 'metform_form__form_setting';
    }

    public function get_form_settings_fields()
    {
        $cpt = [

            'form_title' => [
                'name' => 'form_title',
            ],
            'form_type' => [
                'name' => 'form_type',
            ],
            'success_message' => [
                'name' => 'success_message',
            ],
            'quiz_summery' => [
                'name' => 'quiz_summery',
            ],
            'store_entries' => [
                'name' => 'store_entries',
            ],

            'entry_title' => [
                'name' => 'entry_title',
            ],
            'hide_form_after_submission' => [
                'name' => 'hide_form_after_submission',
            ],
            'redirect_to' => [
                'name' => 'redirect_to',
            ],
            'success_url' => [
                'name' => 'success_url',
            ],
            'failed_cancel_url' => [
                'name' => 'failed_cancel_url',
            ],
            'require_login' => [
                'name' => 'require_login',
            ],
            'limit_total_entries_status' => [
                'name' => 'limit_total_entries_status',
            ],
            'limit_total_entries' => [
                'name' => 'limit_total_entries',
            ],
            'count_views' => [
                'name' => 'count_views',
            ],
            'mf_stop_vertical_scrolling' => [
                'name' => 'mf_stop_vertical_scrolling',
            ],
            'multiple_submission' => [
                'name' => 'multiple_submission',
            ],
            'enable_recaptcha' => [
                'name' => 'enable_recaptcha',
            ],
            'capture_user_browser_data' => [
                'name' => 'capture_user_browser_data',
            ],
            'enable_user_notification' => [
                'name' => 'enable_user_notification',
            ],
            'user_email_subject' => [
                'name' => 'user_email_subject',
            ],
            'user_email_from' => [
                'name' => 'user_email_from',
            ],
            'user_email_reply_to' => [
                'name' => 'user_email_reply_to',
            ],
            'user_email_body' => [
                'name' => 'user_email_body',
            ],
            'user_email_attach_submission_copy' => [
                'name' => 'user_email_attach_submission_copy',
            ],
            'enable_admin_notification' => [
                'name' => 'enable_admin_notification',
            ],
            'admin_email_subject' => [
                'name' => 'admin_email_subject',
            ],
            'admin_email_from' => [
                'name' => 'admin_email_from',
            ],
            'admin_email_to' => [
                'name' => 'admin_email_to',
            ],
            'admin_email_reply_to' => [
                'name' => 'admin_email_reply_to',
            ],
            'admin_email_body' => [
                'name' => 'admin_email_body',
            ],
            'admin_email_attach_submission_copy' => [
                'name' => 'admin_email_attach_submission_copy',
            ],
            'mf_mail_chimp' => [
                'name' => 'mf_mail_chimp',
            ],

            'mf_get_response' => [
                'name' => 'mf_get_response',
            ],
            'mf_get_reponse_api_key' => [
                'name' => 'mf_get_reponse_api_key'
            ],
            'mf_get_response_list_id' => [
                'name' => 'mf_get_response_list_id'
            ],

            //automizy
            'mf_automizy' => [
                'name' => 'mf_automizy',
            ],
            'mf_automizy_api_token' => [
                'name' => 'mf_automizy_api_token'
            ],
            'mf_automizy_list_id' => [
		        'name' => 'mf_automizy_list_id'
	        ],

            'mf_rest_api' => [
                'name' => 'mf_rest_api',
            ],
            'mf_rest_api_url' => [
                'name' => 'mf_rest_api_url',
            ],
            'mf_rest_api_method' => [
                'name' => 'mf_rest_api_method',
            ],
            'mf_mailchimp_api_key' => [
                'name' => 'mf_mailchimp_api_key',
            ],
            'mf_active_campaign_api_key' => [
                'name' => 'mf_active_campaign_api_key'
            ],
            'mf_active_campaign_url' => [
                'name' => 'mf_active_campaign_url'
            ],
            'mf_mailchimp_list_id' => [
                'name' => 'mf_mailchimp_list_id',
            ],
            'mf_zapier' => [
                'name' => 'mf_zapier',
            ],
            'mf_zapier_webhook' => [
                'name' => 'mf_zapier_webhook',
            ],
            'mf_slack' => [
                'name' => 'mf_slack',
            ],
            'mf_slack_webhook' => [
                'name' => 'mf_slack_webhook',
            ],
            'mf_fluent' => [
                'name' => 'mf_fluent',
            ],
            'mf_fluent_webhook' => [
                'name' => 'mf_fluent_webhook',
            ],

            'mf_thank_you_page' => [
                'name' => 'mf_thank_you_page'
            ],
            'mf_cancel_page' => [
                'name' => 'mf_cancel_page'
            ],
            'mf_paypal' => [
                'name' => 'mf_paypal',
            ],
            'mf_payment_currency' => [
                'name' => 'mf_payment_currency',
            ],
            'mf_paypal_email' => [
                'name' => 'mf_paypal_email',
            ],
            'mf_paypal_token' => [
                'name' => 'mf_paypal_token',
            ],
            'mf_paypal_sandbox' => [
                'name' => 'mf_paypal_sandbox',
            ],
            'mf_stripe' => [
                'name' => 'mf_stripe',
            ],
            'mf_stripe_image_url' => [
                'name' => 'mf_stripe_image_url',
            ],
            'mf_stripe_live_publishiable_key' => [
                'name' => 'mf_stripe_live_publishiable_key',
            ],
            'mf_stripe_live_secret_key' => [
                'name' => 'mf_stripe_live_secret_key',
            ],
            'mf_stripe_sandbox' => [
                'name' => 'mf_stripe_sandbox',
            ],
            'mf_stripe_test_publishiable_key' => [
                'name' => 'mf_stripe_test_publishiable_key',
            ],
            'mf_stripe_test_secret_key' => [
                'name' => 'mf_stripe_test_secret_key',
            ],
            'mf_google_map_api_key' => [
                'name' => 'mf_google_map_api_key',
            ],
            'mf_save_progress' => [
                'name' => 'mf_save_progress',
            ],
            'mf_recaptcha' => [
                'name' => 'mf_recaptcha',
            ],
            'mf_recaptcha_version' => [
                'name' => 'mf_recaptcha_version',
            ],
            'mf_recaptcha_site_key' => [
                'name' => 'mf_recaptcha_site_key',
            ],
            'mf_recaptcha_secret_key' => [
                'name' => 'mf_recaptcha_secret_key',
            ],
            'mf_recaptcha_site_key_v3' => [
                'name' => 'mf_recaptcha_site_key_v3',
            ],
            'mf_recaptcha_secret_key_v3' => [
                'name' => 'mf_recaptcha_secret_key_v3',
            ],

            'mf_convert_kit' => [
                'name' => 'mf_convert_kit',
            ],
            'mf_ckit_list_id' => [
                'name' => 'mf_ckit_list_id',
            ],
            'mf_ckit_api_key' => [
                'name' => 'mf_ckit_api_key',
            ],
            'mf_ckit_sec_key' => [
                'name' => 'mf_ckit_sec_key',
            ],

            'mf_aweber_dev_api_key' => [
                'name' => 'mf_aweber_dev_api_key',
            ],
            'mf_aweber_dev_api_sec' => [
                'name' => 'mf_aweber_dev_api_sec',
            ],
            'mf_mail_aweber' => [
                'name' => 'mf_mail_aweber',
            ],
            'mf_aweber_list_id' => [
                'name' => 'mf_aweber_list_id',
            ],

            // Active campaign settings....
            'mf_active_campaign' => [
	            'name' => 'mf_active_campaign'
            ],
            'mf_active_campaign_list_id' => [
	            'name' => 'mf_active_campaign_list_id'
            ],
            'mf_active_campaign_tag_id' => [
	            'name' => 'mf_active_campaign_tag_id'
            ],

            #checkBox
            'mf_mail_poet' => [
                'name' => 'mf_mail_poet',
            ],
            #SelectBox
            'mf_mail_poet_list_id' => [
                'name' => 'mf_mail_poet_list_id',
            ],

            // Hubsopt

            'mf_hubspot' => [
                'name' => 'mf_hubspot',
            ],

            'mf_hubspot_forms' => [
                'name' => 'mf_hubspot_forms',
            ],

            'mf_hubsopt_token' => [
                'name' => 'mf_hubsopt_token',
            ],
            'mf_hubspot_form_guid' => [
                'name' => 'mf_hubspot_form_guid'
            ],
            'mf_hubspot_form_portalId' => [
                'name' => 'mf_hubspot_form_portalId'
            ],

            // Zoho

            'mf_zoho' => [
                'name' => 'mf_zoho'
            ],

            'mf_zoho_token' => [
                'name' => 'mf_zoho_token'
            ],

            // Auth

            'mf_registration' => [
                'name' => 'mf_registration'
            ],

            'mf_login' => [
                'name' => 'mf_login'
            ],

            // Post

            'mf_form_to_post' => [
                'name' => 'mf_form_to_post'
            ],

            // Mailster

            'mf_mailster' => [
                'name' => 'mf_mailster'
            ],

            'mf_mailster_list_id' => [
                'name' => 'mf_mailster_list_id'
            ],
            'mf_mailster_fields' => [
                'name' => 'mf_mailster_fields'
            ],

            // Post submission
            'mf_post_submission_post_type' => [
                'name' => 'mf_post_submission_post_type'
            ],
            'mf_post_submission_title' => [
                'name' => 'mf_post_submission_title',
            ],
            'mf_post_submission_content' => [
                'name' => 'mf_post_submission_content'
            ],
            'mf_post_submission_author' => [
                'name' => 'mf_post_submission_author'
            ],
            'mf_post_submission_featured_image' => [
                'name' => 'mf_post_submission_featured_image'
            ],
            // Helpscout
            'mf_helpscout' => [
                'name' => 'mf_helpscout',
            ],
            'mf_helpscout_app_id' => [
                'name' => 'mf_helpscout_app_id',
            ],

            'mf_helpscout_app_secret' => [
                'name' => 'mf_helpscout_app_secret'
            ],
            'mf_helpscout_token' => [
                'name' => 'mf_helpscout_token'
            ],
            'mf_helpscout_mailbox' => [
                'name' => 'mf_helpscout_mailbox'
            ],
            'mf_helpscout_conversation_subject' => [
                'name' => 'mf_helpscout_conversation_subject'
            ],
            'mf_helpscout_conversation_customer_email' => [
                'name' => 'mf_helpscout_conversation_customer_email'
            ],
            'mf_helpscout_conversation_customer_first_name' => [
                'name' => 'mf_helpscout_conversation_customer_first_name'
            ],
            'mf_helpscout_conversation_customer_last_name' => [
                'name' => 'mf_helpscout_conversation_customer_last_name'
            ],
            'mf_helpscout_conversation_customer_message' => [
                'name' => 'mf_helpscout_conversation_customer_message'
            ],
            // google sheet
            'mf_google_sheet' => [
                'name' => 'mf_google_sheet'
            ],
            'mf_google_sheet_client_id' => [
                'name' => 'mf_google_sheet_client_id'
            ],
            'mf_google_sheet_client_secret' => [
                'name' => 'mf_google_sheet_client_secret'
            ],
            // email verification
            'email_verification_enable' => [
                'name'  => 'email_verification_enable'
            ],
            'email_verification_email_subject' => [
                'name'  => 'email_verification_email_subject'
            ],
            'email_verification_confirm_redirect' => [
                'name'  => 'email_verification_confirm_redirect'
            ],
            'email_verification_heading' => [
                'name'  => 'email_verification_heading'
            ],
            'email_verification_paragraph' => [
                'name'  => 'email_verification_paragraph'
            ],
            'mf_sms_status' => [
                'name'  => 'mf_sms_status'
            ],
            'mf_sms_from' => [
                'name'  => 'mf_sms_from'
            ],
            'mf_sms_twilio_account_sid' => [
                'name'  => 'mf_sms_twilio_account_sid'
            ],
            'mf_sms_twilio_auth_token' => [
                'name'  => 'mf_sms_twilio_auth_token'
            ],
            'mf_sms_user_status' => [
                'name'  => 'mf_sms_user_status'
            ],
            'mf_sms_user_body' => [
                'name'  => 'mf_sms_user_body'
            ],
            'mf_sms_admin_status' => [
                'name'  => 'mf_sms_admin_status'
            ],
            'mf_sms_admin_body' => [
                'name'  => 'mf_sms_admin_body'
            ],
            'mf_sms_admin_to' => [
                'name'  => 'mf_sms_admin_to'
            ]
        ];


        return $cpt;
    }

    public function post_type()
    {
        $labels = array(
            'name' => esc_html_x('Forms', 'Post Type General Name', 'metform'),
            'singular_name' => esc_html_x('Form', 'Post Type Singular Name', 'metform'),
            'menu_name' => esc_html__('Form', 'metform'),
            'name_admin_bar' => esc_html__('Form', 'metform'),
            'archives' => esc_html__('Form Archives', 'metform'),
            'attributes' => esc_html__('Form Attributes', 'metform'),
            'parent_item_colon' => esc_html__('Parent Item:', 'metform'),
            'all_items' => esc_html__('Forms', 'metform'),
            'add_new_item' => esc_html__('Add New Form', 'metform'),
            'add_new' => esc_html__('Add New', 'metform'),
            'new_item' => esc_html__('New Form', 'metform'),
            'edit_item' => esc_html__('Edit Form', 'metform'),
            'update_item' => esc_html__('Update Form', 'metform'),
            'view_item' => esc_html__('View Form', 'metform'),
            'view_items' => esc_html__('View Forms', 'metform'),
            'search_items' => esc_html__('Search Forms', 'metform'),
            'not_found' => esc_html__('Not found', 'metform'),
            'not_found_in_trash' => esc_html__('Not found in Trash', 'metform'),
            'featured_image' => esc_html__('Featured Image', 'metform'),
            'set_featured_image' => esc_html__('Set featured image', 'metform'),
            'remove_featured_image' => esc_html__('Remove featured image', 'metform'),
            'use_featured_image' => esc_html__('Use as featured image', 'metform'),
            'insert_into_item' => esc_html__('Insert into form', 'metform'),
            'uploaded_to_this_item' => esc_html__('Uploaded to this form', 'metform'),
            'items_list' => esc_html__('Forms list', 'metform'),
            'items_list_navigation' => esc_html__('Forms list navigation', 'metform'),
            'filter_items_list' => esc_html__('Filter froms list', 'metform'),
        );
        $rewrite = array(
            'slug' => 'metform-form',
            'with_front' => true,
            'pages' => false,
            'feeds' => false,
        );
        $args = array(
            'label' => esc_html__('Forms', 'metform'),
            'description' => esc_html__('metform form', 'metform'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'elementor', 'permalink'),
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => "metform-menu",
            'menu_icon' => 'dashicons-text-page',
            'menu_position' => 5,
            'show_in_admin_bar' => false,
            'show_in_nav_menus' => false,
            'can_export' => true,
            'has_archive' => false,
            'publicly_queryable' => true,
            'rewrite' => $rewrite,
            'query_var' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'capability_type' => 'page',
            'show_in_rest' => false,
            'rest_base' => $this->get_name(),
        );

        return $args;
    }

    public function flush_rewrites()
    {
        $name = $this->get_name();
        $args = $this->post_type();
        register_post_type($name, $args);

        flush_rewrite_rules();
    }
}
