<?php 
namespace MetForm\Controls;

defined( 'ABSPATH' ) || exit;

class Admin_Add_New_Form {

    public function init(){
        add_action( 'admin_footer', [$this, 'output_form_editor_contents'] );
    }

    public function output_form_editor_contents(){
        $screen = get_current_screen();
        
        if($screen->id == 'edit-metform-form' || $screen->id == 'metform_page_mt-form-settings'){
            // Include new modal for add new form
            ?>
            <div class="formpicker_iframe_modal">
                <?php include 'form-editor-modal.php'; ?>
            </div>
            <?php
        }
    ?>



    <?php }

}