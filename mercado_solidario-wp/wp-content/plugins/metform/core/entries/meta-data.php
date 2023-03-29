<?php

namespace MetForm\Core\Entries;

defined('ABSPATH') || exit;

#[\AllowDynamicProperties]
class Meta_Data
{

    private $browser_data = null;
    private $file_meta_data = null;

    private $form_id;
    private $form_data;
    private $form_settings;

    private $fields;

    public function __construct()
    {
        $this->cpt = new Cpt();
        add_action('save_post', [$this, 'store_form_data_cmb']);
        add_action('add_meta_boxes', [$this, 'add_form_id_cmb']);
        add_action('add_meta_boxes', [$this, 'add_form_data_cmb']);

        add_action('add_meta_boxes', [$this, 'add_browser_data_cmb']);
        add_action('add_meta_boxes', [$this, 'add_file_upload_cmb']);
        add_action('add_meta_boxes', [$this, 'add_form_payment_status_cmb']);
        add_action('add_meta_boxes', [$this, 'add_woo_payment_status_cmb']);
    }

    function add_form_id_cmb()
    {
        add_meta_box(
            'metform_entries__form_id',
            esc_html__('Info', 'metform'),
            [$this, 'show_form_id_cmb'],
            $this->cpt->get_name(),
            'side',
            'high'
        );
    }

    function show_form_id_cmb($post)
    {
        wp_nonce_field('meta_nonce', 'meta_nonce');

        $this->form_id = get_post_meta($post->ID, 'metform_entries__form_id', true);
        // get fields by form id for further use
        $this->fields = Action::instance()->get_fields($this->form_id);
        $form_title = get_the_title((int)$this->form_id);

        ?>

        <div class="metform-entry-data container">
            <table class='mf-entry-data' cellpadding="5" cellspacing="0">
                <tbody>
                <tr class="mf-data-label">
                    <td colspan='2'><strong><?php esc_html_e('Form Name ', 'metform'); ?></strong></td>
                </tr>
                <tr class='mf-data-value'>
                    <td><?php echo esc_attr($form_title); ?></td>
                </tr>
                <tr class="mf-data-label">
                    <td colspan='2'><strong><?php esc_html_e('Entry ID', 'metform'); ?></strong></td>
                </tr>
                <tr class='mf-data-value'>
                    <td>
                        <?php
                            $metform_entries_serial_no = get_post_meta($post->ID, 'metform_entries_serial_no', true);
                            echo esc_html(isset($metform_entries_serial_no)? $metform_entries_serial_no : '');
                        ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <?php
    }

    function add_form_data_cmb()
    {
        // Get the form settings data
        //phpcs:ignore WordPress.Security.NonceVerification -- Nonce can't be added in CPT edit page URL
        $post_id = isset($_GET['post']) ? sanitize_text_field(wp_unslash($_GET['post'])) : '';
        $form_id = get_post_meta($post_id, 'metform_entries__form_id', true);

        
        $form_settings = \MetForm\Core\Forms\Action::instance()->get_all_data($form_id);

        // Change the form entries main title based on the form type
        $data_title = esc_html__('Data', 'metform');
        
        if(isset($form_settings['form_type']) && $form_settings['form_type'] == 'quiz-form'){
            $data_title = esc_html__('Quiz Data', 'metform');
        }

        add_meta_box(
            'metform_entries__form_data',
            $data_title,
            [$this, 'show_form_data_cmb'],
            $this->cpt->get_name(),
            'normal',
            'high'
        );
    }

    function add_browser_data_cmb()
    {
        // call browser data meta when browser data present
        //phpcs:ignore WordPress.Security.NonceVerification -- Nonce can't be added in CPT edit page URL
        $post_id = (isset($_GET['post']) ? sanitize_text_field(wp_unslash($_GET['post'])) : '');
        $form_id = get_post_meta($post_id, 'metform_entries__form_id', true);
        $form_settings = \MetForm\Core\Forms\Action::instance()->get_all_data($form_id);

        $this->browser_data = get_post_meta($post_id, 'metform_form__entry_browser_data', true);
        if ($this->browser_data == '' && !isset($form_settings['capture_user_browser_data'])) {
            return;
        }

        add_meta_box(
            'metform_form__entry_browser_data',
            esc_html__('Browser Data', 'metform'),
            [$this, 'show_browser_data_cmb'],
            $this->cpt->get_name(),
            'side',
            'low'
        );
    }

    function show_browser_data_cmb($post)
    {
        if ($this->browser_data != '') {
            ?>
            <div class="metform-entry-data container">
                <table class='mf-entry-data' cellpadding="5" cellspacing="0">
                    <?php
                    foreach ($this->browser_data as $key => $value) {
                        ?>
                        <tbody>
                        <tr class="mf-data-label">
                            <td colspan='2'><strong><?php echo esc_attr($key); ?></strong></td>
                        </tr>
                        <tr class='mf-data-value'>
                            <td><?php echo esc_attr($value); ?></td>
                        </tr>
                        </tbody>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <?php
        } else {
            echo esc_html__('Browser data not captured.', 'metform');
        }
    }

    function add_file_upload_cmb()
    {
        // call file meta when file data present
        //phpcs:ignore WordPress.Security.NonceVerification -- Nonce can't be added in CPT edit page URL
        $post_id = (isset($_GET['post']) ? sanitize_text_field(wp_unslash($_GET['post'])) : '');
        $file_meta_data = get_post_meta($post_id, 'metform_entries__file_upload', true);
        $file_meta_data_new = get_post_meta($post_id, 'metform_entries__file_upload_new', true);
        if(is_array($file_meta_data) || is_array($file_meta_data_new)){
            add_meta_box(
                'metform_entries__file_upload',
                esc_html__('Files', 'metform'),
                [$this, 'show_file_upload_cmb'],
                $this->cpt->get_name(),
                'normal',
                'low'
            );
        }
    }

    function show_form_data_cmb($post)
    {
        wp_nonce_field('meta_nonce', 'meta_nonce');

        $this->form_data = get_post_meta($post->ID, 'metform_entries__form_data', true);


        $this->form_data = (isset($this->form_data)) ? $this->form_data : "";
        // format all form data into html table
        if ($this->form_data != '') {
            $form_html = \MetForm\Core\Entries\Form_Data::format_form_data($this->form_id, $this->form_data);
            \MetForm\Utils\Util::metform_content_renderer($form_html);
        }
    }

    function show_file_upload_cmb($post)
    {
        // call file meta when file data present
        //phpcs:ignore WordPress.Security.NonceVerification -- Nonce can't be added in CPT edit page URL
        $post_id = (isset($_GET['post']) ? sanitize_text_field(wp_unslash($_GET['post'])) : '');
        $file_meta_data = get_post_meta($post_id, 'metform_entries__file_upload', true);

        if (!is_array($file_meta_data)) {
            $file_meta_data = get_post_meta($post_id, 'metform_entries__file_upload_new', true);
            if(!is_array($file_meta_data)) {
                return;
            } else {
                foreach($file_meta_data as $key => $value) {
                    if(!empty($value)) {
                        $this->show_file($value, $key);
                    }
                }
            }
        } else {
            $this->show_file($file_meta_data);
        }
    }

    public function show_file($files, $name = false)
    {
        echo '<ul>';
            if($name) {
                echo '<li>';
                echo esc_html(((isset($this->fields[$name]->mf_input_label)) ? $this->fields[$name]->mf_input_label : $name) . " : ");
                echo '</li><ul style="padding-left:15px;">';
            }

            foreach($files as $key => $file) {
                if(is_null($name)) {
                    $name = $key;
                }
                echo "<li><i class='mf mf-file-2'></i>";
                $file_url = isset($file['url']) ? $file['url'] : '';
                $file_type = isset($file['type']) ? $file['type'] : '';

                if ($file_url != '') {
                    if(!$name) {
                        echo esc_html(((isset($this->fields[$key]->mf_input_label)) ? $this->fields[$key]->mf_input_label : $key+1) . " : ");
                    }
                    echo "<a target='_blank' class='mf-file-url' href=" . esc_url($file_url) . " download>" . esc_html__('Download', 'metform') . "</a>";
                    echo((in_array($file_type, ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/ico'])) ? ' | <a href="#" class="" data-toggle="modal" data-target="#mfFileUploadModal' . esc_attr($name . $key) . '">' . esc_html__('View', 'metform') . '</a>' : '');
                } else {
                    echo esc_html(((isset($this->fields[$name]->mf_input_label)) ? $this->fields[$name]->mf_input_label : $key) . " : ") . esc_html__('This file is not uploaded.', 'metform');
                }
                
                echo "</li>";
                
                $this->file_modal($name.$key, $file_url);
            }
        echo '</ul></ul>';
    }

    public function file_modal($key, $file_url) {
        ?>
        <div class="attr-modal attr-fade mf-modal-container" id="mfFileUploadModal<?php echo esc_attr($key) ?>" tabindex="-1"
            role="dialog" aria-labelledby="mfFileUploadodalMLabel" aria-hidden="true">
            <div class="attr-modal-dialog" role="document">
                <div class="attr-modal-content">
                    <div class="attr-modal-header">
                        <button type="button" class="attr-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="attr-modal-body">
                        <img class="attr-img-responsive" src="<?php echo esc_url($file_url); ?>">
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    function store_form_data_cmb($post_id)
    {
        // add save code here
    }

    function add_woo_payment_status_cmb()
    {
        add_meta_box(
            'metform_entries__woo_checkout_status',
            esc_html__('Woocommerce Checkout', 'metform'),
            [$this, 'show_woo_checkout_status_cmb'],
            $this->cpt->get_name(),
            'side',
            'high'
        );
    }

    function show_woo_checkout_status_cmb($post)
    {
        $order_id = get_post_meta($post->ID, 'mf_woo_order_id', true);
        if($order_id == null) {
            return;
        }
        $order = wc_get_order($order_id);
        $order_url = get_admin_url() . 'post.php?post=' . $order_id . '&action=edit';
        ?>

        <div class="metform-entry-data container">
            <table class='mf-entry-data' cellpadding="5" cellspacing="0">
                <tbody>
                <tr class="mf-data-label">
                    <td colspan='2'><strong><?php esc_html_e('Order ID ', 'metform'); ?></strong></td>
                </tr>
                <tr class='mf-data-value'>
                    <td><?php echo esc_attr($order_id); ?></td>
                </tr>
                <tr class="mf-data-label">
                    <td colspan='2'><strong><?php esc_html_e('Order Status', 'metform'); ?></strong></td>
                </tr>
                <tr class='mf-data-value'>
                    <td><?php echo esc_attr($order->get_status()); ?></td>
                </tr>

                <tr class="mf-data-label">
                    <td colspan='2'><strong><?php esc_html_e('Total', 'metform'); ?></strong></td>
                </tr>
                <tr class='mf-data-value'>
                    <td><?php echo esc_attr($order->get_total() . ' ' . $order->get_currency()); ?></td>
                </tr>

                <tr class="mf-data-label">

                </tr>
                <tr class='mf-data-value'>
                    <td><a class="button" href="<?php echo esc_url($order_url); ?>" target="__blank"><?php echo esc_html__('Order Details', 'metform'); ?></a></td>
                </tr>

                </tbody>
            </table>
        </div>


        <?php
    }

    function add_form_payment_status_cmb()
    {

        add_meta_box(
            'metform_entries__payment_status',
            esc_html__('Payment', 'metform'),
            [$this, 'show_form_payment_status_cmb'],
            $this->cpt->get_name(),
            'side',
            'high'

        );
    }

    function show_form_payment_status_cmb($post)
    {
        echo "Status : " . esc_html(get_post_meta($post->ID, 'metform_entries__payment_status', true)) . "<br>";

        if (get_post_meta($post->ID, 'metform_entries__payment_invoice', true)) {
            echo "Invoice : ";
            echo esc_html(get_post_meta($post->ID, 'metform_entries__payment_invoice', true)) . "<br>";
        }
    }
}
