<?php
namespace MetForm\Core\Forms;
defined( 'ABSPATH' ) || exit;

Class Base extends \MetForm\Base\Common{

    use \MetForm\Traits\Singleton;

    public $form;

    public $api;

    public function get_dir(){
        return dirname(__FILE__);
    }

    public function __construct(){
    }

    public function init(){
        $this->form = new Cpt();
        $this->api = new Api();
        Hooks::instance()->Init();
        \MetForm\Base\Shortcode::instance();

        add_action('admin_footer', [$this, 'modal_view']);
    }

    public function modal_view(){

        $screen = get_current_screen();

        if($screen->id == 'edit-metform-form' || $screen->id == 'metform_page_mt-form-settings'){
            include_once 'views/modal-editor.php';

            // Include new modal for add new form
            include_once 'views/modal-add-new-form.php';
        }
    }
}
