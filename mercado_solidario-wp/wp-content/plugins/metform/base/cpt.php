<?php
namespace MetForm\Base;
defined( 'ABSPATH' ) || exit;

abstract Class Cpt{

    public function __construct() {
        
        $name = $this->get_name();
        $args = $this->post_type();

        add_action('init',function() use($name,$args) {
            register_post_type( $name, $args );
        });  
    }

    public abstract function post_type();

}

