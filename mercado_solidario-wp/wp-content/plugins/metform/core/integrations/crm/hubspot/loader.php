<?php

namespace MetForm\Core\Integrations\Crm\Hubspot;

use MetForm\Traits\Singleton;
use MetForm\Utils\Render;

defined('ABSPATH') || exit;

class Integration
{
    use Singleton;

    /**
     * @var mixed
     */
    private $tab_id;
    /**
     * @var mixed
     */
    private $tab_title;
    /**
     * @var mixed
     */
    private $tab_sub_title;
    /**
     * @var mixed
     */
    private $sub_tab_id;
    /**
     * @var mixed
     */
    private $sub_tab_title;

    public function init()
    {
        /**
         *
         * Create a new tab in admin settings tab
         *
         */
        $this->tab_id        = 'mf_crm';
        $this->tab_title     = esc_html__('CRM & Marketing Integrations', 'metform');
        $this->tab_sub_title = esc_html__('All CRM and Marketing integrations info here', 'metform');
        $this->sub_tab_id    = 'hub';
        $this->sub_tab_title = esc_html__('HubSpot', 'metform');

        add_action('metform_settings_tab', [$this, 'settings_tab']);

        add_action('metform_settings_content', [$this, 'settings_tab_content']);

        add_action('metform_settings_subtab_' . $this->tab_id, [$this, 'sub_tab']);

        add_action('metform_settings_subtab_content_' . $this->tab_id, [$this, 'sub_tab_content']);

        add_action('metform_after_store_form_data', [$this, 'hubspot_action'], 10, 4);
    }

    public function settings_tab()
    {
        Render::tab($this->tab_id, $this->tab_title, $this->tab_sub_title);
    }

    public function settings_tab_content()
    {
        Render::tab_content($this->tab_id, $this->tab_title);
    }

    public function sub_tab()
    {
        Render::sub_tab($this->sub_tab_title, $this->sub_tab_id, 'active');
    }

    public function contents()
    {
        $data = [
            'lable' => esc_html__('Token', 'metform'),
            'name' => 'mf_hubsopt_token',
            'description' => '',
            'placeholder' => esc_html__('Enter HubSpot token here', 'metform'),
        ];

        $section_id = 'mf_crm';
        $current_page = isset($_GET["page"]) ? admin_url("admin.php?page=" . sanitize_text_field(wp_unslash($_GET["page"]))) : '';
        $settings_option = \MetForm\Core\Admin\Base::instance()->get_settings_option();


        if(isset($_GET['redirect_nonce_url']) && !wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['redirect_nonce_url'])))){
            die("You are not allowed to view the page.");
        }

        if (
            isset($_GET['refresh_token']) &&
            isset($_GET['token_type']) &&
            isset($_GET['access_token']) &&
            isset($_GET['expires_in'])
        ) {
            $token_type    = sanitize_text_field(wp_unslash($_GET['token_type']));
            $refresh_token = sanitize_text_field(wp_unslash($_GET['refresh_token']));
            $access_token  = sanitize_text_field(wp_unslash($_GET['access_token']));
            $expires_in    = sanitize_text_field(wp_unslash($_GET['expires_in']));

            $settings_option['mf_hubsopt_token'] = $access_token;
            $settings_option['mf_hubsopt_refresh_token'] = $refresh_token;
            $settings_option['mf_hubsopt_token_type'] = $token_type;
            $settings_option['mf_hubsopt_expires_in'] = $expires_in;

            // Save the results in a transient named latest_5_posts
            set_transient('mf_hubsopt_token_transient', $access_token, $expires_in);

            // Update settings options
            update_option('metform_option__settings', $settings_option);

            echo '
                <script type="text/javascript">
                    window.location.href = "' . esc_js($current_page ."&redirect_nonce_url=".wp_create_nonce() ).'#mf_crm";
                </script>
            ';
        }

        if (!empty($settings_option['mf_hubsopt_token'])) {
?>
            <div class="mf-hubspot-hidden-input-field hidden">
                <?php
                $data = [
                    'lable' => esc_html__('Token', 'metform'),
                    'name' => 'mf_hubsopt_token',
                    'description' => '',
                    'placeholder' => esc_html__('Enter Hubsopt token here', 'metform'),
                ];
                Render::textbox($data);
                ?>
            </div>
            <div class="mf-hubspot-settings-contents">
                <p><?php esc_html_e('Your HubSpot account is now connected with Metform! You can remove the access anytime using the below button.', 'metform') ?></p>
                <a href="#" id="mf-remove-hubspot-access" class="mf-admin-setting-btn fatty" data-nonce="<?php echo esc_attr(wp_create_nonce( 'wp_rest' )); ?>"><?php esc_html_e('Disconnect HubSpot Account', 'metform'); ?></a>
            </div>

        <?php
        } else { ?>
            <div class="mf-hubspot-settings-contents">
                <p><?php esc_html_e('HubSpot is an all-in-one CRM and marketing platform that helps turn your website visitors into leads, leads into customers, and customers into raving fans.', 'metform'); ?></p>
                <p><?php esc_html_e('With MetForm, you can sync your form submissions seamlessly to HubSpot to build lists, email marketing campaigns and so much more.', 'metform'); ?></p>
                <p><?php esc_html_e('If you don\'t already have a HubSpot account, you can', 'metform'); ?> <a href="https://app.hubspot.com/signup-hubspot/marketing?utm_source=MetForm&utm_medium=Forms&utm_campaign=Plugin" target="_blank"><?php esc_html_e('sign up for a free HubSpot account here.', 'metform'); ?></a></p>
                <a href="<?php echo esc_url('https://api.wpmet.com/public/hubspot-auth/?redirect_url=' . $current_page . '&section_id=' . $section_id); ?>" class="mf-admin-setting-btn fatty"><?php esc_html_e('Click Here To Connect Your HubSpot Account', 'metform'); ?></a>
            </div>
<?php }
    }

    public function sub_tab_content()
    {
        Render::sub_tab_content($this->sub_tab_id, [$this, 'contents'], 'active');
    }

    /**
     * @param $form_id
     * @param $form_data
     * @param $form_settings
     */
    public function hubspot_action($form_id, $form_data, $form_settings, $attributes)
    {
        $hubspot = new Hubspot;

        if (isset($form_settings['mf_hubspot']) && $form_settings['mf_hubspot'] == '1') {

            $hubspot->create_contact($form_data, $attributes);
        }

        if (isset($form_settings['mf_hubspot_forms']) && $form_settings['mf_hubspot_forms'] == '1') {

            $hubspot->submit_data($form_id, $form_data);
        }
    }
}

Integration::instance()->init();
