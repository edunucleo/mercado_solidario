<?php
namespace MetForm\Core\Entries;
defined( 'ABSPATH' ) || exit;

Class Base{

    use \MetForm\Traits\Singleton;

    public $cpt;

    public $api;

    public $meta_data;

    public function __construct(){
        Hooks::instance();
        $this->cpt = new Cpt();
        $this->api = new Api();
        $this->meta_data = new Meta_Data();
    }

}