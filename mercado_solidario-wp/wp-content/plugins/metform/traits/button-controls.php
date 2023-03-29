<?php
namespace MetForm\Traits;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Core\Schemes\Color;
use \Elementor\Repeater;
use \Elementor\Group_Control_Text_Shadow;

defined( 'ABSPATH' ) || exit;

trait Button_Controls{

    protected function button_content_control(){
        $this->add_control(
			'mf_btn_text',
			[
				'label' =>esc_html__( 'Label', 'metform' ),
				'type' => Controls_Manager::TEXT,
				'default' => $this->get_title(),
				'placeholder' => $this->get_title(),
				'dynamic' => [
                    'active' => true,
                ],
			]
		);

        $this->add_control(
            'mf_btn_section_settings',
            [
                'label' => esc_html__( 'Settings', 'metform' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
		);
		
		$this->add_responsive_control(
			'mf_btn_align',
			[
				'label' =>esc_html__( 'Button alignment', 'metform' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'metform' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'metform' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'metform' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'metform' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'mf-btn-%s-',
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .mf-btn-wraper' => 'text-align: {{VALUE}};',
				],
			]
        );

		$this->add_control(
			'mf_btn_icon',
			[
				'label' =>esc_html__( 'Icon', 'metform' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
			]
		);
		
        $this->add_control(
            'mf_btn_icon_align',
            [
                'label' =>esc_html__( 'Icon Position', 'metform' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' =>esc_html__( 'Before', 'metform' ),
                    'right' =>esc_html__( 'After', 'metform' ),
                ],
                'condition' => [
                    'mf_btn_icon!' => '',
                ],
            ]
        );
        
	    $this->add_control(
		    'mf_btn_class',
		    [
			    'label' => esc_html__( 'Class', 'metform' ),
			    'type' => Controls_Manager::TEXT,
			    'placeholder' => esc_html__( 'Class Name', 'metform' ),
		    ]
	    );

	    $this->add_control(
		    'mf_btn_id',
		    [
			    'label' => esc_html__( 'id', 'metform' ),
			    'type' => Controls_Manager::TEXT,
			    'placeholder' => esc_html__( 'ID', 'metform' ),
		    ]
	    );
	}
	
	protected function hidden_input_content_control(){

		$hidden_input = new Repeater();

		$hidden_input->add_control(
			'mf_hidden_input_name', [
				'label' => esc_html__( 'Input Name : ', 'metform' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'mf-hidden-input-name',
			]
		);

		$hidden_input->add_control(
			'mf_hidden_input_value', [
				'label' => esc_html__( 'Input Value', 'metform' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'mf_hidden_input_value',
			]
		);

		$hidden_input->add_control(
			'mf_hidden_input_class',
			[
				'label' => esc_html__( 'Input Class', 'metform' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'mf_hidden_input_class',
			]
		);

		$this->add_control(
			'mf_hidden_input',
			[
				'label' => esc_html__( 'Input List', 'metform' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $hidden_input->get_controls(),
				'title_field' => '{{{ mf_hidden_input_name }}}',
			]
		);
	}

    protected function button_style_control(){
        $this->add_responsive_control(
			'mf_btn_text_padding',
			[
				'label' =>esc_html__( 'Padding', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => 	[
					'top' => '15',
					'right' => '20',
					'bottom' => '15',
					'left' => '20',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .metform-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mf_btn_typography',
				'label' =>esc_html__( 'Typography', 'metform' ),
				'selector' => '{{WRAPPER}} .metform-btn',
			]
		);

        $this->add_group_control(
        	Group_Control_Text_Shadow::get_type(),
        	[
        		'name' => 'mf_btn_shadow',
        		'selector' => '{{WRAPPER}} .metform-btn',
        	]
        );

		$this->start_controls_tabs( 'mf_btn_tabs_style' );

		$this->start_controls_tab(
			'mf_btn_tabnormal',
			[
				'label' =>esc_html__( 'Normal', 'metform' ),
			]
		);

		$this->add_responsive_control(
			'mf_btn_text_color',
			[
				'label' =>esc_html__( 'Text Color', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .metform-btn' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Background::get_type(),
            array(
				'name'     => 'mf_btn_bg_color',
                'selector' => '{{WRAPPER}} .metform-btn',
            )
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'mf_btn_tab_button_hover',
			[
				'label' =>esc_html__( 'Hover', 'metform' ),
			]
		);

		$this->add_responsive_control(
			'mf_btn_hover_color',
			[
				'label' =>esc_html__( 'Text Color', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#FFFFFF',
				'selectors' => [
					'{{WRAPPER}} .metform-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);

	    $this->add_group_control(
		    Group_Control_Background::get_type(),
		    array(
			    'name'     => 'mf_btn_bg_hover_color',
			    'default' => '#337ab7',
			    'selector' => '{{WRAPPER}} .metform-btn:hover',
		    )
	    );

		$this->end_controls_tab();
        $this->end_controls_tabs();
    }

    protected function button_border_control(){
        $this->add_responsive_control(
			'mf_btn_border_style',
			[
				'label' => esc_html_x( 'Border Type', 'Border Control', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__( 'None', 'metform' ),
					'solid' => esc_html_x( 'Solid', 'Border Control', 'metform' ),
					'double' => esc_html_x( 'Double', 'Border Control', 'metform' ),
					'dotted' => esc_html_x( 'Dotted', 'Border Control', 'metform' ),
					'dashed' => esc_html_x( 'Dashed', 'Border Control', 'metform' ),
					'groove' => esc_html_x( 'Groove', 'Border Control', 'metform' ),
				],
				'default'	=> 'none',
				'selectors' => [
					'{{WRAPPER}} .metform-btn' => 'border-style: {{VALUE}};',
				],
			]
        );
        
		$this->add_responsive_control(
			'mf_btn_border_dimensions',
			[
				'label' => esc_html_x( 'Width', 'Border Control', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
				'condition'	=> [
					'mf_btn_border_style!'	=> 'none'
				],
				'selectors' => [
					'{{WRAPPER}} .metform-btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
        
        $this->start_controls_tabs( 'xs_tabs_button_border_style' );
        
		$this->start_controls_tab(
			'mf_btn_tab_border_normal',
			[
				'label' =>esc_html__( 'Normal', 'metform' ),
				'condition'	=> [
					'mf_btn_border_style!'	=> 'none'
				],
			]
		);

		$this->add_responsive_control(
			'mf_btn_border_color',
			[
				'label' => esc_html_x( 'Color', 'Border Control', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .metform-btn' => 'border-color: {{VALUE}};',
				],
			]
        );
        
		$this->end_controls_tab();

		$this->start_controls_tab(
			'mf_btn_tab_button_border_hover',
			[
				'label' =>esc_html__( 'Hover', 'metform' ),
				'condition'	=> [
					'mf_btn_border_style!'	=> 'none'
				],
			]
		);
		$this->add_responsive_control(
			'mf_btn_hover_border_color',
			[
				'label' => esc_html_x( 'Color', 'Border Control', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition'	=> [
					'mf_btn_border_style!'	=> 'none'
				],
				'selectors' => [
					'{{WRAPPER}} .metform-btn:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'mf_btn_border_radius',
			[
				'label' =>esc_html__( 'Border Radius', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'default' => [
					'top' => '5',
					'right' => '5',
					'bottom' => '5' ,
					'left' => '5',
				],
				'selectors' => [
					'{{WRAPPER}} .metform-btn' =>  'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
    }

    protected function button_shadow_control(){
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
			  'name' => 'mf_btn_box_shadow_group',
			  'selector' => '{{WRAPPER}} .metform-btn',
			]
		);
    }

    protected function button_icon_control(){
		
		$this->add_control(
			'mf_btn_normal_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#FFFFFF',
				'selectors' => [
					'{{WRAPPER}} .mf-btn-wraper i' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
			'mf_btn_normal_icon_font_size',
			array(
				'label'      => esc_html__( 'Font Size', 'metform' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'em', 'rem',
				),
				'range'      => array(
					'px' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .mf-btn-wraper i' => 'font-size: {{SIZE}}{{UNIT}}',
				),
			)
        );
        
		$this->add_responsive_control(
			'mf_btn_normal_icon_padding_left',
			[
				'label' => esc_html__( 'Padding Right', 'metform' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .metform-btn > i' => 'padding-right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'mf_btn_icon_align' => 'left'
				]
			]
        );
        
		$this->add_responsive_control(
			'mf_btn_normal_icon_padding_right',
			[
				'label' => esc_html__( 'Padding Left', 'metform' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' =>1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .metform-btn > i' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'mf_btn_icon_align' => 'right'
				]
			]
		);

        $this->add_responsive_control(
            'mf_btn_normal_icon_vertical_align',
            array(
                'label'      => esc_html__( 'Vertical Align', 'metform' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array(
                    'px', 'em', 'rem',
                ),
                'range'      => array(
                    'px' => array(
                        'min' => -20,
                        'max' => 20,
                    ),
                    'em' => array(
                        'min' => -5,
                        'max' => 5,
                    ),
                    'rem' => array(
                        'min' => -5,
                        'max' => 5,
                    ),
                ),
                'selectors'  => array(
                    '{{WRAPPER}} .metform-btn i' => ' -webkit-transform: translateY({{SIZE}}{{UNIT}}); -ms-transform: translateY({{SIZE}}{{UNIT}}); transform: translateY({{SIZE}}{{UNIT}})',
                ),
            )
        );
    }
}
