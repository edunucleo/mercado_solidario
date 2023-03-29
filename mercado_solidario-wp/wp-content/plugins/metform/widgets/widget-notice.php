<?php 
namespace MetForm\Widgets;
defined( 'ABSPATH' ) || exit;

trait Widget_Notice{
    /**
     * Adding Go Pro message to all widgets
     */
    public function insert_pro_message()
    {

        return;
        
        if(!class_exists('\MetForm_Pro\Plugin')){
            $this->start_controls_section(
                'ekit_section_pro',
                [
                    'label' => __('Go Pro for More Features', 'metform'),
                ]
            );

            $this->add_control(
                'ekit_control_get_pro',
                [
                    'label' => __('Unlock more possibilities', 'metform'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        '1' => [
                            'title' => '',
                            'icon' => 'fa fa-unlock-alt',
                        ],
                    ],
                    'default' => '1',
                    'description' => '<span class="ekit-widget-pro-feature"> Get the  <a href="https://wpmet.com/metform-pricing" target="_blank">Pro version</a> for more awesome elements and powerful modules.</span>',
                ]
            );

            $this->end_controls_section();
        }
    }
}