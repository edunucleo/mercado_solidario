<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Rating extends Widget_Base{

    use \MetForm\Traits\Common_Controls;
    use \MetForm\Traits\Conditional_Controls;
    use \MetForm\Widgets\Widget_Notice;

    public function get_name() {
		return 'mf-rating';
    }
    
	public function get_title() {
		return esc_html__( 'Rating', 'metform' );
	}
	
	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
    }
    
	public function get_keywords() {
        return ['metform', 'input', 'rating', 'feedback', 'rate'];
    }

    protected function register_controls() {
        
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'metform' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->input_content_controls(['NO_PLACEHOLDER']);

        $this->end_controls_section();

        $this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Settings', 'metform' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->input_setting_controls();

        $this->add_control(
            'mf_input_validation_type',
            [
                'label' => __( 'Validation Type', 'metform' ),
                'type' => \Elementor\Controls_Manager::HIDDEN,
                'default' => 'none',
            ]
        );
        
        $this->add_control(
            'mf_input_rating_number',
            [
                'label' => esc_html__( 'Number of rating star : ', 'metform' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 2,
                'max' => 10,
                'step' => 1,
                'default' => 5,
			 'frontend_available' => true,
            ]
        );

        $this->input_get_params_controls();

        $this->end_controls_section();

        if(class_exists('\MetForm_Pro\Base\Package')){
			$this->input_conditional_control();
		}
		
        $this->start_controls_section(
			'label_section',
			[
				'label' => esc_html__( 'Label', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'mf_input_label_status',
							'operator' => '===',
							'value' => 'yes',
						],
						[
							'name' => 'mf_input_required',
							'operator' => '===',
							'value' => 'yes',
						],
					],
                ],
			]
        );

		$this->input_label_controls();

        $this->end_controls_section();

        $this->start_controls_section(
			'input_section',
			[
				'label' => esc_html__( 'Input', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_responsive_control(
			'mf_input_padding',
			[
				'label' => esc_html__( 'Padding', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-ratings > label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
				],
			]
        );
        
		$this->add_responsive_control(
			'mf_input_margin',
			[
				'label' => esc_html__( 'Margin', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-ratings > label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
            'hr_1',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        
        $this->start_controls_tabs( 'mf_input_tabs_style' );

        $this->start_controls_tab(
            'mf_input_tabnormal',
            [
                'label' =>esc_html__( 'Normal', 'metform' ),
            ]
        );

        $this->add_control(
            'mf_input_color',
            [
                'label' => esc_html__( 'Input Color', 'metform' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mf-ratings:not(.is-selected), {{WRAPPER}} .mf-ratings.is-selected:not(:hover) > input:checked + label ~ label, {{WRAPPER}} .mf-ratings.is-selected > label:hover ~ label, {{WRAPPER}} .mf-ratings:not(.is-selected) > label:hover ~ label' => 'color: {{VALUE}}',
                ],
                'default' => '#ccc',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'mf_input_border',
                'label' => esc_html__( 'Border', 'metform' ),
                'selector' => '{{WRAPPER}} .mf-ratings:not(.is-selected) > label, {{WRAPPER}} .mf-ratings.is-selected:not(:hover) > input:checked + label ~ label, {{WRAPPER}} .mf-ratings.is-selected > label:hover ~ label, {{WRAPPER}} .mf-ratings:not(.is-selected) > label:hover ~ label',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'mf_input_tabfocus',
            [
                'label' =>esc_html__( 'Active', 'metform' ),
            ]
        );

        $this->add_control(
            'mf_input_color_focus',
            [
                'label' => esc_html__( 'Input Color', 'metform' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mf-ratings.is-selected > label, {{WRAPPER}} .mf-ratings:not(.is-selected):hover > label' => 'color: {{VALUE}}',
                ],
                'default' => '#ffdb72',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'mf_input_border_focus',
                'label' => esc_html__( 'Border', 'metform' ),
                'selector' => '{{WRAPPER}} .mf-ratings.is-selected > label, {{WRAPPER}} .mf-ratings:not(.is-selected):hover > label',
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();
		
		$this->add_responsive_control(
			'mf_input_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'metform' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px','%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-ratings > label' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'condition'    => [
                    'mf_input_border_border!' => '',
                ],
			]
        );
        
        $this->add_control(
            'hr_2',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'mf_input_typgraphy',
                'label' => esc_html__( 'Typography', 'metform' ),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .mf-ratings > label:before',
                'exclude' => [ 'font_family', 'font_weight', 'text_transform', 'text_decoration' ],
            ]
        );

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mf_input_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'metform' ),
				'selector' => '{{WRAPPER}} .mf-ratings',
			]
		);

        $this->end_controls_section();
		
        $this->start_controls_section(
			'help_text_section',
			[
				'label' => esc_html__( 'Help Text', 'metform' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
					'mf_input_help_text!' => ''
				]
			]
		);
		
		$this->input_help_text_controls();

        $this->end_controls_section();

        $this->insert_pro_message();
	}

    protected function render($instance = []){
		$settings = $this->get_settings_for_display();
		extract($settings);
        
		$render_on_editor = false;
        $is_edit_mode = 'metform-form' === get_post_type() && \Elementor\Plugin::$instance->editor->is_edit_mode();
		
        $class = (isset($settings['mf_conditional_logic_form_list']) ? 'mf-conditional-input' : '');

        $configData = [
            'message' 		=> $errorMessage 	= isset($mf_input_validation_warning_message) ? !empty($mf_input_validation_warning_message) ? $mf_input_validation_warning_message : esc_html__('This field is required.', 'metform') : esc_html__('This field is required.', 'metform'),
            'required'		=> isset($mf_input_required) && $mf_input_required == 'yes' ? true : false,
        ];

        $isSelected = !$is_edit_mode ? '${ parent.getValue("'. $mf_input_name .'") ? "is-selected" : "" }' : '';

        ?>

		<div class="mf-input-wrapper">
			<?php if ( 'yes' == $mf_input_label_status ): ?>
				<label class="mf-input-label" for="mf-input-rating-<?php echo esc_attr( $this->get_id() ); ?>">
					<?php echo esc_html(\MetForm\Utils\Util::react_entity_support( esc_html($mf_input_label), $render_on_editor )); ?>
					<span class="mf-input-required-indicator"><?php echo esc_html( ($mf_input_required === 'yes') ? '*' : '' );?></span>
				</label>
			<?php endif; ?>
            <div class="mf-ratings <?php \MetForm\Utils\Util::metform_content_renderer($isSelected); ?>">
                <?php
                    for( $i = 1; $i <= $mf_input_rating_number; $i++ ):
                        $input_id = 'mf-rating-' . $this->get_id() .'-'. $i;
                    ?>
                        <input
                            type="radio"
                            name="<?php echo esc_attr( $mf_input_name ); ?>"
                            value="<?php echo esc_attr( $i ); ?>"
                            id="<?php echo esc_attr( $input_id ); ?>"
                            class="mf-input"
                            <?php if ( !$is_edit_mode ): ?>
                                onChange=${parent.handleChange}
                                aria-invalid=${validation.errors['<?php echo esc_attr($mf_input_name); ?>'] ? 'true' : 'false'}
                                ref=${ el => parent.activateValidation(<?php echo json_encode($configData); ?>, el) }
                                checked=${<?php echo esc_attr( $i ); ?> == parent.getValue('<?php echo esc_attr( $mf_input_name ); ?>')}
                            <?php endif; ?>
                            />
                        <label for="<?php echo esc_attr( $input_id ); ?>"
                            class="fa fa-star"></label>
                    <?php
                    endfor;
                ?>
            </div>

            <?php if ( !$is_edit_mode ) : ?>
				<${validation.ErrorMessage}
					errors=${validation.errors}
					name="<?php echo esc_attr( $mf_input_name ); ?>"
					as=${html`<span className="mf-error-message"></span>`}
					/>
            <?php endif; ?>

			<?php echo ('' !== trim($mf_input_help_text) ? sprintf('<span class="mf-input-help"> %s </span>', esc_html( \MetForm\Utils\Util::react_entity_support(trim($mf_input_help_text), $render_on_editor))) : ''); ?>
        </div>

		<?php
    }
}
