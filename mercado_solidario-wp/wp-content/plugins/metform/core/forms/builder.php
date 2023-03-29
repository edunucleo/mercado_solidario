<?php
namespace MetForm\Core\Forms;
defined( 'ABSPATH' ) || exit;

Class Builder{

    use \MetForm\Traits\Singleton;

    public function get_editor( $form_id ){
        $builder_form_id = get_post($form_id);
        $builder_form_id = $builder_form_id->ID;

        $url = get_admin_url() . '/post.php?post='.$builder_form_id.'&action=elementor';
        wp_safe_redirect( $url );
        exit;
    }

    public function create_form($title, $template_id = 0, $data = []){
        $template_id = 'template-' . (($template_id == '') ? 0 : $template_id);
        $title = ($title == '' ? 'New Form # ' . time() : $title);
        $template_content = \MetForm\Templates\Base::instance()->get_template_contents($template_id);
        
        $user_id = get_current_user_id();

        $defaults = array(
            'post_author'  => $user_id,
            'post_content' => '',
            'post_title'   => $title,
            'post_status'  => 'publish',
            'post_type'    => 'metform-form',
        );
        $builder_form_id = wp_insert_post($defaults);

        $default_settings = array_map(function(){
            return '';
        }, \MetForm\Core\Forms\Base::instance()->form->get_form_settings_fields());

        $default_settings['success_message'] = esc_html('Thank you! Form submitted successfully.');
        $default_settings['store_entries'] = '1';
        $default_settings['form_title'] = $defaults['post_title'];

        if(isset($data['form_type']) && !empty($data['form_type'])){
            $default_settings['form_type'] = $data['form_type'];

            // Unset form type from $data array
            unset($data['form_type']);
        }

        update_post_meta( $builder_form_id, '_wp_page_template', 'elementor_canvas' );
        update_post_meta( $builder_form_id, \MetForm\Core\Forms\Base::instance()->form->get_key_form_settings(), $default_settings );
        update_post_meta( $builder_form_id, '_elementor_edit_mode', 'builder');

        if($data != ''){
            update_post_meta( $builder_form_id, '_metform_cloned_id', $template_id);
        }

        if($template_content != null){
            update_post_meta($builder_form_id, '_elementor_data', json_encode($template_content));
        }   

        return $builder_form_id;
    }
}