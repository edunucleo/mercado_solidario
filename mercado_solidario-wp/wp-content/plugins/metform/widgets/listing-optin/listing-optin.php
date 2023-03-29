<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Listing_Optin extends Widget_Base{

	use \MetForm\Traits\Common_Controls;
	use \MetForm\Traits\Conditional_Controls;
	use \MetForm\Widgets\Widget_Notice;

    public function get_name() {
		return 'mf-listing-optin';
    }
    
	public function get_title() {
		return esc_html__( 'Opt in ( Listing )', 'metform' );
	}
	
	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}

	public function get_keywords() {
        return ['metform', 'input', 'opt in', 'news letter', 'mailchimp', 'zapier', 'slack'];
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


        $this->add_control(
			'mf_listing_optin_option_text_position',
			[
				'label' => esc_html__( 'Option Text Position : ', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'after'  => esc_html__( 'After Checkbox', 'metform' ),
					'before' => esc_html__( 'Before Checkbox', 'metform' ),
                ],
				'default' => 'after',
				'description' => esc_html__('Where do you want to label?', 'metform'),
			]
        );

        $this->add_control(
            'mf_listing_optin_option_text', [
                'label' => esc_html__( 'Checkbox Option Text', 'metform' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Subscribe to ours newsletter.' , 'metform' ),
				'label_block' => true,
				'description' => esc_html__('Select option name that will be show to user.', 'metform'),
            ]
        );
		

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

		$this->input_get_params_controls();

		$this->help_text_control('To set the value, you have to use "on" as value', 'metform');

		$this->end_controls_section();

		if(class_exists('\MetForm_Pro\Base\Package')){
			$this->input_conditional_control();
		}

        $this->start_controls_section(
			'label_section',
			[
				'label' => esc_html__( 'Input Label', 'metform' ),
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

		$this->input_label_controls(['VERTICAL_POSITION']);



        $this->end_controls_section();

        $this->start_controls_section(
            'listing_optinoption_section',
            [
                'label' => esc_html__('Checkbox', 'metform'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
			'mf_listing_optin_option_padding',
			[
				'label' => esc_html__( 'Padding', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-checkbox-option' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'mf_listing_optin_option_margin',
			[
				'label' => esc_html__( 'Margin', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-checkbox-option' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'mf_listing_optin_option_color',
			[
				'label' => esc_html__( 'Text Color', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-checkbox-option' => 'color: {{VALUE}}',
					'{{WRAPPER}} .mf-checkbox-option input[type="checkbox"] + span:before' => 'color: {{VALUE}}',
				],
				'default' => '#000000',
			]
		);

		$this->start_controls_tabs('mf_listing_optin_option_icon_color_control');

		$this->start_controls_tab(
			'mf_listing_optin_option_icon_color_tabnormal',
			[
				'label' => esc_html__( 'Normal', 'metform' ),
			]
		);

		$this->add_control(
			'mf_listing_optin_option_icon_color',
			[
				'label' => esc_html__( 'Checkbox Color', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-checkbox-option input[type="checkbox"] + span:before' => 'color: {{VALUE}}'
				],
				'default' => '#747474',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'mf_listing_optin_option_icon_color_tabchecked',
			[
				'label' => esc_html__( 'Checked', 'metform' ),
			]
		);

		$this->add_control(
			'mf_listing_optin_option_icon_color_checked',
			[
				'label' => esc_html__( 'Checkbox Color', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-checkbox-option input[type="checkbox"]:checked + span:before' => 'color: {{VALUE}}'
				],
				'default' => '#4285F4',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'mf_input_option_icon_horizontal_position',
			[
				'label' => esc_html__( 'Horizontal position of icon', 'metform' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => -50,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
                    'unit' => 'px',
                    'size' => 2,
                ],
				'selectors' => [
					'{{WRAPPER}} .mf-checkbox-option input[type="checkbox"] + span:before' => 'top: {{SIZE}}{{UNIT}}',
				]
			]
		);

		$this->add_control(
			'mf_listing_optin_option_space_after_icon',
			[
				'label' => esc_html__( 'Add space after checkbox', 'metform' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
				'selectors' => [
					'{{WRAPPER}} .mf-checkbox-option input[type="checkbox"] + span:before' => 'width: {{SIZE}}{{UNIT}}',
				]
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mf_listing_optin_typgraphy',
				'label' => esc_html__( 'Typography for icon', 'metform' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'exclude' => [ 'font_family', 'text_transform', 'font_style', 'text_decoration', 'letter_spacing' ],
				'selector' => '{{WRAPPER}} .mf-checkbox, {{WRAPPER}} .mf-checkbox-option input[type="checkbox"] + span:before',
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mf_listing_optin_typgraphy_text',
				'label' => esc_html__( 'Typography for text', 'metform' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mf-checkbox, {{WRAPPER}} .mf-checkbox-option input[type="checkbox"] + span',
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
		?>

		<div class="mf-input-wrapper">
			<?php if ( 'yes' == $mf_input_label_status ): ?>
				<label class="mf-input-label" for="mf-input-optin-<?php echo esc_attr( $this->get_id() ); ?>">
					<?php echo esc_html(\MetForm\Utils\Util::react_entity_support( esc_html($mf_input_label), $render_on_editor )); ?>
					<span class="mf-input-required-indicator"><?php echo esc_html( ($mf_input_required === 'yes') ? '*' : '' );?></span>
				</label>
			<?php endif; ?>

			<div class="mf-checkbox multi-option-input-type" id="mf-input-optin-<?php echo esc_attr($this->get_id()); ?>">
				<div class="mf-checkbox-option">
					<label>
						<?php
							if ( $mf_listing_optin_option_text_position == 'before' ):
								echo wp_kses(str_replace('`', '\`', $mf_listing_optin_option_text), \MetForm\Utils\Util::get_kses_array());
							endif;
						?>
						<input
							type="checkbox"
							class="mf-input mf-checkbox-input <?php echo esc_attr($class); ?>"
							name="<?php echo esc_attr($mf_input_name); ?>" 
							value="1"
							<?php if ( !$is_edit_mode ): ?>
								onInput=${ parent.handleOptin }
								aria-invalid=${validation.errors['<?php echo esc_attr($mf_input_name); ?>'] ? 'true' : 'false'}
								ref=${el => parent.activateValidation(<?php echo json_encode($configData); ?>, el)}
							<?php endif; ?>
							/>
						<span>
							<?php
								if ( $mf_listing_optin_option_text_position == 'after' ):
									echo wp_kses(str_replace('`', '\`', $mf_listing_optin_option_text), \MetForm\Utils\Util::get_kses_array());
								endif;
							?>
						</span>
					</label>
				</div>
			</div>

			<?php if ( !$is_edit_mode ): ?>
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
