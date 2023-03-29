<?php
namespace MetForm\Core\Entries;

defined('ABSPATH') || exit;

class Hooks
{
    use \MetForm\Traits\Singleton;

    public function __construct()
    {

        add_filter('manage_metform-entry_posts_columns', [$this, 'set_columns']);
        add_action('manage_metform-entry_posts_custom_column', [$this, 'render_column'], 10, 2);
        add_filter('parse_query', [$this, 'query_filter']);
        add_filter('wp_mail_from_name', [$this, 'wp_mail_from']);
    }

    public function set_columns($columns)
    {

        $date_column = $columns['date'];

        unset($columns['date']);

		$columns['form_name'] = esc_html__('Form Name', 'metform');
		
        $columns['referral'] = esc_html__('Referral','metform');

        if(class_exists('\MetForm_Pro\Plugin')) {
            $columns['email_verified'] = esc_html__('Email Verified','metform');
        }

        $columns['date'] = esc_html($date_column);

        // Show PDF export column when pro plugin is activated
        if(in_array('metform-pro/metform-pro.php', apply_filters('active_plugins', get_option('active_plugins')))):
            $columns['export_actions'] = esc_html('Export Actions', 'metform');
        endif;

        
        return $columns;
    }

    public function render_column($column, $post_id)
    {
        if(!empty(get_option('permalink_structure', true))) {
            $entry_api = get_rest_url('', 'metform-pro/v1/pdf-export/entry?entry_id');
        }else{
            $entry_api = get_rest_url('', 'metform-pro/v1/pdf-export/entry&entry_id');
        }

        switch ($column) {
            case 'form_name':
                $form_id = get_post_meta($post_id, 'metform_entries__form_id', true);
                $form_name = get_post((int) $form_id);
                $post_title = (isset($form_name->post_title) ? $form_name->post_title : '');

                global $wp;
                $current_url = add_query_arg($wp->query_string . "&mf_form_id=" . $form_id, '', home_url($wp->request));
                $current_url.='&mf-entry-flter-form-nonce='.wp_create_nonce('mf-entry-flter-form-action');
                echo "<a data-metform-form-id=" . esc_attr($form_id) . " class='mf-entry-filter mf-entry-flter-form_id' href=" . esc_url($current_url) . ">" . esc_html($post_title) . "</a>";
                break;

            case 'referral':
                $page_id = get_post_meta( $post_id, 'mf_page_id',true );

                global $wp;
                $current_url = add_query_arg($wp->query_string . "&mf_ref_id=" . $page_id, '', home_url($wp->request));
                $current_url.='&mf-entry-flter-ref-nonce='.wp_create_nonce('mf-entry-flter-ref-action');
				echo "<a class='mf-entry-filter mf-entry-flter-form_id' href='" . esc_url($current_url) . "'>".esc_html(get_the_title($page_id))."</a>";
                break;
            
            case 'email_verified':
                $email_verified = get_post_meta($post_id, 'email_verified', true);
                if($email_verified == true) {
                    echo "<button type='button' style='background:#00cd00;box-shadow:1px 1px 5px rgba(0, 205, 0, 0.3);border:none;color:white;padding:2px 6px 3px;border-radius: 5px;font-weight:400'>".esc_html__('Yes', 'metform')."</button>";
                }else {
                    echo "<button type='button' style='background:#888;border:none;color:white;padding:2px 6px 3px;border-radius: 5px;font-weight:400'>".esc_html__('No', 'metform')."</button>";
                }
                break;

            case 'export_actions':
                // Show PDF export button when pro plugin is activated
                if(in_array('metform-pro/metform-pro.php', apply_filters('active_plugins', get_option('active_plugins')))):
                    echo "<button class='metform-pdf-export-btn attr-btn attr-btn-primary' data-id=". esc_attr($post_id) ." data-rest-api=".esc_url($entry_api).'='.esc_attr($post_id).">".esc_html__('PDF Export', 'metform')." <i class='pdf-spinner'></i></button"; 
                endif;
        }
    }

    public function query_filter($query)
    {
        global $pagenow;
        //phpcs:ignore WordPress.Security.NonceVerification -- Ignore because of This is CPT page
        $current_page = isset($_GET['post_type']) ? sanitize_key($_GET['post_type']) : '';

        if (
            is_admin()
            && 'metform-entry' == $current_page
            && 'edit.php' == $pagenow
            && $query->query_vars['post_type'] == 'metform-entry'
            && isset($_GET['mf_form_id'])
            && $_GET['mf_form_id'] != 'all'
            && isset($_GET['mf-entry-flter-form-nonce'])
            && wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['mf-entry-flter-form-nonce'])),'mf-entry-flter-form-action')
        ) {
            $form_id = sanitize_key($_GET['mf_form_id']);
            $query->query_vars['meta_key'] = 'metform_entries__form_id';
            $query->query_vars['meta_value'] = $form_id;
            $query->query_vars['meta_compare'] = '=';
        }

        if (
            is_admin()
            && 'metform-entry' == $current_page
            && 'edit.php' == $pagenow
            && $query->query_vars['post_type'] == 'metform-entry'
            && isset($_GET['mf_ref_id'])
            && $_GET['mf_ref_id'] != 'all'
            && isset($_GET['mf-entry-flter-ref-nonce'])
            && wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['mf-entry-flter-ref-nonce'])),'mf-entry-flter-ref-action')
        ) {
            $page_id = sanitize_key($_GET['mf_ref_id']);
            $query->query_vars['meta_key'] = 'mf_page_id';
            $query->query_vars['meta_value'] = $page_id;
            $query->query_vars['meta_compare'] = '=';
        }
    }




    public function wp_mail_from($name)
    {
        return get_bloginfo('name');
    }

}
