<?php
namespace MetForm\Core\Entries;

defined('ABSPATH') || exit;

Class Map_El {

    /**
     * @var array
     */
    private $_el = [];
    /**
     * @var mixed
     */
    private $_el_list;

    /**
     * @var mixed
     */
    private static $instance;

    /**
     * @param $data
     * @param $el_list
     */
    public static function data($data, $el_list) {
        self::$instance = new self($data, $el_list);
        return self::$instance;
    }

    /**
     * @param $data
     * @param $el_list
     * @return mixed
     */
    public function __construct($data, $el_list) {
        $this->_el_list = $el_list;
        $this->search_el($data);
        return $this;
    }

    /**
     * @return mixed
     */
    public function get_el() {
        return $this->_el;
    }

    /**
     * @param $data
     * @return null
     */
    private function search_el($data) {
        if (!is_array($data)) {
            return;
        }

        foreach ($data as $k => $v) {
            if (is_array($v->elements) && !empty($v->elements)) {
                $this->search_el($v->elements);
            } else {
                if ($v->elType == 'widget' && in_array(str_replace('[]', '', $v->widgetType), $this->_el_list)) {

                    if (isset($v->settings->mf_input_name)) {
                        $this->_el[$v->settings->mf_input_name]             = $v->settings;
                        $this->_el[$v->settings->mf_input_name]->widgetType = $v->widgetType;
                    } else {
                        $this->_el[$v->widgetType] = (object) [
                            'mf_input_label'                 => (isset($v->settings->mf_input_label) ? $v->settings->mf_input_label : ''),
                            'mf_input_name'                  => (isset($v->widgetType) ? $v->widgetType : ''),
                            'mf_input_placeholder'           => (isset($v->settings->mf_input_placeholder) ? $v->settings->mf_input_placeholder : ''),
                            'mf_input_min_length'            => (isset($v->settings->mf_input_min_length) ? $v->settings->mf_input_min_length : ''),
                            'mf_input_max_length'            => (isset($v->settings->mf_input_max_length) ? $v->settings->mf_input_max_length : ''),
                            'mf_input_length_type'           => (isset($v->settings->mf_input_length_type) ? $v->settings->mf_input_length_type : ''),
                            'mf_input_validation_expression' => (isset($v->settings->mf_input_validation_expression) ? $v->settings->mf_input_validation_expression : ''),
                            'widgetType'                     => (isset($v->widgetType) ? $v->widgetType : '')
                        ];
                    }
                } elseif (!empty($v->widgetType) && $v->widgetType === 'mf-button') {

                    if (!empty($v->settings->mf_hidden_input) && is_array($v->settings->mf_hidden_input)) {

                        foreach ($v->settings->mf_hidden_input as $value) {
                            $this->_el[$value->mf_hidden_input_name] = (object) [
                                'mf_input_label' => (isset($value->mf_hidden_input_name) ? ucwords(str_replace(['-', '_'], ' ', $value->mf_hidden_input_name)) : ''),
                                'mf_input_name'  => (isset($value->mf_hidden_input_name) ? $value->mf_hidden_input_name : ''),
                                'widgetType'     => (isset($v->widgetType) ? $v->widgetType : '')
                            ];
                        }
                    }
                }
            }
        }
    }

}