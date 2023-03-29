<?php
/**
 * @package olivewp
 */
if ( ! class_exists( 'Olivewp_Layout_Meta_Box' ) ) {

  class Olivewp_Layout_Meta_Box
  {

    public function __construct()
        {
          add_action( 'admin_enqueue_scripts', array( $this,'olivewp_admin_script'));
          add_action( 'add_meta_boxes', array( $this, 'olivewp_meta_fn'));
          add_action( 'save_post', array( $this, 'olivewp_meta_save'));
        }

    /**
     * Load Admin Script
     *
     */
     public function olivewp_admin_script()
     {   
      wp_enqueue_style('olivewp-meta', OLIVEWP_TEMPLATE_DIR_URI.'/inc/meta-boxes/assets/css/meta-box.css');
     }


    //Add Meta Box
    function olivewp_meta_fn()
    {
      add_meta_box( 'olivewp_meta_id', esc_html__('Layout Settings (Layout setting will  not work with the custom templates except default template.)','olivewp'), array($this,'olivewp_meta_cb_fn'), '','normal','high' );
    }

    //Callback Meta Function
    function olivewp_meta_cb_fn()
    {
      require_once('olivewp-meta-box-page-settings.php');
    }


    //Save Meta Values
    function olivewp_meta_save($post_id) 
      {  
        if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
              return;
          
        if ( ! current_user_can( 'edit_page', $post_id ) )
        {   return ;  } 
          
        if(isset( $_POST['post_ID']))
        {   
          $post_ID = absint($_POST['post_ID']);
            update_post_meta($post_ID, 'olivewp_site_layout', sanitize_text_field($_POST['olivewp_site_layout']));
            update_post_meta($post_ID, 'olivewp_page_sidebar', sanitize_text_field($_POST['olivewp_page_sidebar']));
        }       
      }

  }

}


new Olivewp_Layout_Meta_Box();