<?php
namespace MetForm\Core\Entries;
defined( 'ABSPATH' ) || exit;

Class Metform_Shortcode{
    use \MetForm\Traits\Singleton;

    private $all_keys;
    private $all_values;
    private $main_data;

    public function get_process_shortcode($string){
        $replace = str_replace($this->all_keys, $this->all_values, $string);
        return $replace;
    }

    public function set_values($main_data){
        $this->main_data = $main_data;
        $this->formate_keys();
        $this->formate_values();
        return $this;
    }

    public function get_all_keys(){
        return $this->all_keys;
    }

    public function get_all_values(){
        return $this->all_values;
    }

    public function set_all_keys($main_data){
        $this->main_data = $main_data;
        $this->formate_keys();
        return $this;
    }

    public function set_all_values($main_data){
        $this->main_data = $main_data;
        $this->formate_values();
        return $this;
    }

    public function formate_keys(){

        $this->all_keys = array_map(function($v){
            return "[".$v."]";
        }, array_keys($this->main_data) );
    }

    public function formate_values(){

        $this->all_values = array_map(function($value){
            return (is_array($value) ? implode(', ', $value) : $value);
        }, $this->main_data);
    }

}