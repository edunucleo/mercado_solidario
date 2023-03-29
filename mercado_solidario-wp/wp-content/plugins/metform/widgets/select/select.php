<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Select extends Widget_Base{

    use \MetForm\Traits\Common_Controls;
    use \MetForm\Traits\Conditional_Controls;
    use \MetForm\Widgets\Widget_Notice;
    use \MetForm\Traits\Quiz_Control;

    public function get_name() {
		return 'mf-select';
    }
    
	public function get_title() {
		return esc_html__( 'Select', 'metform' );
    }

    public function show_in_panel() {
        return 'metform-form' == get_post_type();
    }
    
    public function get_categories() {
		return [ 'metform' ];
	}
    
	public function get_keywords() {
        return ['metform', 'input', 'select', 'dropdown'];
    }

    protected function register_controls() {

		if ( $this->get_form_type() == 'quiz-form' && class_exists('\MetForm_Pro\Base\Package') ) {
			$this->start_controls_section(
				'quiz_section',
				[
					'tab' => Controls_Manager::TAB_CONTENT,
					'label' => esc_html__( 'Content', 'metform' ),
				]
			);

			$this->quiz_controls(['select']);

		} else {
			$this->start_controls_section(
				'content_section',
				[
					'label' => esc_html__( 'Content', 'metform' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);

			$this->input_content_controls();

			$input_fields = new Repeater();

			$input_fields->add_control(
				'mf_input_option_text', [
					'label' => esc_html__( 'Input Field Text', 'metform' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Input Text' , 'metform' ),
					'label_block' => true,
					'description' => esc_html__('Select list text that will be show to user.', 'metform'),
				]
			);

			$input_fields->add_control(
				'mf_input_option_value', [
					'label' => esc_html__( 'Input Field Value', 'metform' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Input Value' , 'metform' ),
					'label_block' => true,
					'description' => esc_html__('Select list value that will be store/mail to desired person.', 'metform'),
				]
			);

			$input_fields->add_control(
				'mf_input_option_status', [
					'label' => esc_html__( 'Status', 'metform' ),
					'type' => Controls_Manager::SELECT,
					'default' => '',
					'options' => [
						'' => esc_html__( 'Enable', 'metform' ),
						'disabled'  => esc_html__( 'Disable', 'metform' ),
					],
					'description' => esc_html__('Want to make a option? which user can see the option but can\'t select it. make it disable.', 'metform'),
				]
			);

			$input_fields->add_control(
				'mf_input_option_selected', [
					'label' => esc_html__( 'Select it default ? ', 'metform' ),
					'type' => Controls_Manager::SELECT,
					'default' => '',
					'options' => [
						'selected' => esc_html__( 'Yes', 'metform' ),
						''  => esc_html__( 'No', 'metform' ),
					],
					'description' => esc_html__('Make this option default selected', 'metform'),
				]
			);

			$this->add_control(
				'mf_input_data_type',
				[
					'label'     => esc_html__('Data Type', 'metform'),
					'type'      => Controls_Manager::SELECT,
					'options'   => [
						'custom'	=> esc_html__('Custom', 'metform'),
						'csv'		=> esc_html__('CSV File', 'metform')
					],
					'default'   => 'custom'
				]
			);
			
			$this->add_control(
				'mf_input_list',
				[
					'label' => esc_html__( 'Dropdown List', 'metform' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $input_fields->get_controls(),
					'title_field' => '{{{ mf_input_option_text }}}',
					'default' => [
						[
							'mf_input_option_text' => 'Item 1',
							'mf_input_option_value' => 'value-1',
							'mf_input_option_status' => '',
						],
						[
							'mf_input_option_text' => 'Item 2',
							'mf_input_option_value' => 'value-2',
							'mf_input_option_status' => '',
						],
						[
							'mf_input_option_text' => 'Item 3',
							'mf_input_option_value' => 'value-3',
							'mf_input_option_status' => '',
						],
					],
					'description' => esc_html__('You can add/edit here your selector options.', 'metform'),
					'condition' => [
						'mf_input_data_type'   => 'custom',
					],
				'frontend_available' => true
				]
			);

			$this->add_control(
				'mf_input_csv_type',
				[
					'label'     => esc_html__('File Type', 'metform'),
					'type'      => Controls_Manager::SELECT,
					'options'   => [
						'file'		=> esc_html__('Upload File', 'metform'),
						'url'		=> esc_html__('Remote File URL', 'metform'),
					],
					'default'   => 'file',
					'condition' => [
						'mf_input_data_type'   => 'csv',
					],
				]
			);

			$this->add_control(
				'mf_input_upload_csv',
				[
					'label'			=> esc_html__('Upload CSV File', 'metform'),
					'description'	=> esc_html__('CSV file must have format like: Label, Value, true/false(optional)', 'metform'),
					'type'      	=> Controls_Manager::MEDIA,
					'media_type'	=> [],
					'condition'		=> [
						'mf_input_data_type'	=> 'csv',
						'mf_input_csv_type'		=> 'file',
					]
				]
			);

			$this->add_control(
				'mf_input_csv_url',
				[
					'label'         => esc_html__('Enter a CSV File URL', 'metform'),
					'description'	=> esc_html__('CSV file must have format like: Label, Value, true/false(optional)', 'metform'),
					'type'          => Controls_Manager::URL,
					'show_external' => false,
					'label_block'   => true,
					'condition' => [
						'mf_input_data_type'	=> 'csv',
						'mf_input_csv_type'		=> 'url'
					]
				]
			);

		}

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

        $this->end_controls_section();

        if(class_exists('\MetForm_Pro\Base\Package')){
			$this->input_conditional_control();
		}

        if ( $this->get_form_type() == 'quiz-form' && class_exists('\MetForm_Pro\Base\Package') ) {
			$this->start_controls_section(
				'label_section',
				[
					'label' => esc_html__( 'Label', 'metform' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);

		} else {
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
		}

		$this->input_label_controls();

        $this->end_controls_section();

        $this->start_controls_section(
			'input_section',
			[
				'label' => esc_html__( 'Select', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

          $this->input_controls();

        $this->end_controls_section();

        $this->start_controls_section(
			'options_section',
			[
				'label' => esc_html__( 'Options Wrapper', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_responsive_control(
			'mf_select_options_border_radius',
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
					'{{WRAPPER}} .mf-input-select .mf_select__menu' => 'border-radius: {{SIZE}}{{UNIT}}; overflow: auto;',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'mf_select_options_border',
                'label' => esc_html__( 'Border', 'metform' ),
                'selector' => '{{WRAPPER}} .mf-input-select .mf_select__menu',
            ]
        );
        
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mf_select_options_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'metform' ),
                'selector' => '{{WRAPPER}} .mf-input-select .mf_select__menu',
			]
		);

        $this->end_controls_section();

	   $this->start_controls_section(
		'option_section',
		[
			'label' => esc_html__( 'Option', 'metform' ),
			'tab' => Controls_Manager::TAB_STYLE,
		]
		);

		$this->add_responsive_control(
			'mf_option_padding',
			[
				'label' => esc_html__( 'Padding', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-input-select .mf_select__option' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mf_option_margin',
			[
				'label' => esc_html__( 'Margin', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-input-select .mf_select__option' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'mf_select_option_border_radius',
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
					'{{WRAPPER}} .mf-input-select .mf_select__option' => 'border-radius: {{SIZE}}{{UNIT}}; overflow: auto;',
				],
			]
		);

          $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'mf_select_option_border',
                'label' => esc_html__( 'Border', 'metform' ),
                'selector' => '{{WRAPPER}} .mf-input-select .mf_select__option',
            ]
          );

		$this->start_controls_tabs( 'mf_select_option_style' );

		$this->start_controls_tab(
		    'mf_select_option_tabnormal',
		    [
			   'label' =>esc_html__( 'Normal', 'metform' ),
		    ]
		);
  
		$this->add_control(
		    'mf_select_option_colornormal',
		    [
			   'label' => esc_html__( 'Color', 'metform' ),
			   'type' => Controls_Manager::COLOR,
			   'scheme' => [
				  'type' => \Elementor\Core\Schemes\Color::get_type(),
				  'value' => \Elementor\Core\Schemes\Color::COLOR_1,
			   ],
			   'selectors' => [
				  '{{WRAPPER}} .mf-input-select .mf_select__option' => 'color: {{VALUE}}',
			   ],
			   'default' => '#000000',
		    ]
		);
  
		$this->add_group_control(
		    Group_Control_Background::get_type(),
		    [
			   'name' => 'mf_select_option_backgroundnormal',
			   'label' => esc_html__( 'Background', 'metform' ),
			   'types' => [ 'classic', 'gradient' ],
			   'selector' => '{{WRAPPER}} .mf-input-select .mf_select__option',
		    ]
		);
	  
		$this->end_controls_tab();
  
		$this->start_controls_tab(
		    'mf_select_option_tabhover',
		    [
			   'label' =>esc_html__( 'Hover', 'metform' ),
		    ]
		);
  
		$this->add_control(
		    'mf_select_option_colorhover',
		    [
			   'label' => esc_html__( 'Color', 'metform' ),
			   'type' => Controls_Manager::COLOR,
			   'scheme' => [
				  'type' => \Elementor\Core\Schemes\Color::get_type(),
				  'value' => \Elementor\Core\Schemes\Color::COLOR_1,
			   ],
			   'selectors' => [
				  '{{WRAPPER}} .mf-input-select .mf_select__option:hover' => 'color: {{VALUE}}',
			   ],
			   'default' => '#000000',
		    ]
		);
  
		$this->add_group_control(
		    Group_Control_Background::get_type(),
		    [
			   'name' => 'mf_select_option_backgroundhover',
			   'label' => esc_html__( 'Background', 'metform' ),
			   'types' => [ 'classic', 'gradient' ],
			   'selector' => '{{WRAPPER}} .mf-input-select .mf_select__option:hover, {{WRAPPER}} .mf-input-select .mf_select__option.mf_select__option--is-focused',
		    ]
		);
	  
		$this->end_controls_tab();
  
		$this->start_controls_tab(
		    'mf_select_option_tabactive',
		    [
			   'label' =>esc_html__( 'Selected', 'metform' ),
		    ]
		);
  
		$this->add_control(
		    'mf_select_option_coloractive',
		    [
			   'label' => esc_html__( 'Color', 'metform' ),
			   'type' => Controls_Manager::COLOR,
			   'scheme' => [
				  'type' => \Elementor\Core\Schemes\Color::get_type(),
				  'value' => \Elementor\Core\Schemes\Color::COLOR_1,
			   ],
			   'selectors' => [
				  '{{WRAPPER}} .mf-input-select .mf_select__option.mf_select__option--is-selected' => 'color: {{VALUE}}',
			   ],
			   'default' => '#000000',
		    ]
		);
  
		$this->add_group_control(
		    Group_Control_Background::get_type(),
		    [
			   'name' => 'mf_select_option_backgroundactive',
			   'label' => esc_html__( 'Background', 'metform' ),
			   'types' => [ 'classic', 'gradient' ],
			   'selector' => '{{WRAPPER}} .mf-input-select .mf_select__option.mf_select__option--is-selected',
		    ]
		);
	  
		$this->end_controls_tab();
		
		$this->end_controls_tabs();

	   $this->end_controls_section();

        $this->start_controls_section(
			'placeholder_section',
			[
				'label' => esc_html__( 'Place Holder', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->input_place_holder_controls();

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

	protected function mf_parse_csv_to_array($url) {
		$response = wp_remote_get($url);
		if(!is_wp_error($response) && 200 === wp_remote_retrieve_response_code($response)) {
			$body = wp_remote_retrieve_body($response);
			$data = array_map('str_getcsv', explode("\n", $body));
			// check if each array has 0 and 1 index
			foreach($data as $key => $value) {
				if(!isset($value[0]) || !isset($value[1])) {
					unset($data[$key]);
				}
			}
			return $data;
		}
		return false;
	}

    protected function render($instance = []) {
        $settings = $this->get_settings_for_display();
        $inputWrapStart = $inputWrapEnd = '';
        extract($settings);
        
		$render_on_editor = true;
        $is_edit_mode = 'metform-form' === get_post_type() && \Elementor\Plugin::$instance->editor->is_edit_mode();

		/**
		 * Loads the below markup on 'Editor' view, only when 'metform-form' post type
		 */
		if ( $is_edit_mode ):
			$inputWrapStart = '<div class="mf-form-wrapper"></div><script type="text" class="mf-template">return html`';
			$inputWrapEnd = '`</script>';
		endif;

        $class = (isset($settings['mf_conditional_logic_form_list']) ? 'mf-conditional-input' : '');
        
        $configData = [
            'message' 		=> $errorMessage 	= isset($mf_input_validation_warning_message) ? !empty($mf_input_validation_warning_message) ? $mf_input_validation_warning_message : esc_html__('This field is required.', 'metform') : esc_html__('This field is required.', 'metform'),
            'minLength'		=> isset($mf_input_min_length) ? $mf_input_min_length : 1,
            'maxLength'		=> isset($mf_input_max_length) ? $mf_input_max_length : '',
            'type'			=> isset($mf_input_validation_type) ? $mf_input_validation_type : '',
            'required'		=> isset($mf_input_required) && $mf_input_required == 'yes' ? true : false,
        ];

	   if(!$is_edit_mode && isset($mf_quiz_point) && class_exists('\MetForm_Pro\Base\Package')){
		$answer_list = isset($mf_input_list) ? array_values(array_filter($mf_input_list, function($item){
			if(isset($item['mf_quiz_question_answer']) && !empty($item['mf_quiz_question_answer'])){
				return $item["mf_input_option_value"];
			}
			return false;
		})) : array();

		$answers = count($answer_list) > 0 ? array_column($answer_list, 'mf_input_option_value') : array();
		$answer = count($answers) > 0 ? $answers[count($answers) - 1] : "";
		$quizData = array("answer" => $answer, "correctPoint" => esc_attr($mf_quiz_point ?? 0), "incorrectPoint" => esc_attr($mf_quiz_negative_point ?? 0));
	 }


        $mf_default_input_list = array();
        $mf_input_list_array = array();

		// Checking data type
		if($mf_input_data_type === 'custom') {
			foreach ($mf_input_list as $key => $value):
				$mf_input_list_array[$key] = array();
				$mf_input_list_array[$key]['label'] = $value['mf_input_option_text'];
				$mf_input_list_array[$key]['value'] = $value['mf_input_option_value'];
				$mf_input_list_array[$key]['isDisabled'] = $value['mf_input_option_status'] == "disabled" ? true : false ;

				if ( $value['mf_input_option_selected'] ) $mf_default_input_list = $mf_input_list_array[$key];
			endforeach;
            $mf_input_list = $mf_input_list_array;
		} elseif($mf_input_data_type === 'csv') {
			$csv_url = '';
			if(!empty($mf_input_upload_csv['url'])) {
				$csv_url = $mf_input_upload_csv['url'];
			}

			if(!empty($mf_input_csv_url['url'])) {
				$csv_url = $mf_input_csv_url['url'];
			}

			$data = !empty($csv_url) ? $this->mf_parse_csv_to_array($csv_url) : false;
			if(!empty($data)) {
				foreach ($data as $key => $value) {
					$mf_input_list_array[$key] = array();
					$mf_input_list_array[$key]['label'] = trim($value[0]);
					$mf_input_list_array[$key]['value'] = trim($value[1]);
					$mf_input_list_array[$key]['isDisabled'] = !empty($value[2]) && trim($value[2]) == 'true' ? true : false;
				}
				$mf_input_list = $mf_input_list_array;
			}
		}

		// If csv is malformed
		if(empty($mf_input_list_array) && $mf_input_data_type === 'csv') {
			esc_html_e('Your CSV data is not formatted properly. CSV file must have format like: Label, Value, true/false(optional) default true', 'metform');
			return;
		}
		?>

		<?php \MetForm\Utils\Util::metform_content_renderer($inputWrapStart); ?>

		<div className="mf-input-wrapper">
			<?php if ( 'yes' == $mf_input_label_status ): ?>
				<label className="mf-input-label" htmlFor="mf-input-select-<?php echo esc_attr( $this->get_id() ); ?>">
					<?php echo esc_html(\MetForm\Utils\Util::react_entity_support($mf_input_label, $render_on_editor )); ?>
					<span className="mf-input-required-indicator"><?php echo esc_html( ($mf_input_required === 'yes') ? '*' : '' );?></span>
				</label>
            <?php endif; ?>

            <${props.Select}
                className=${"mf-input mf-input-select <?php echo esc_attr($class); ?> " + ( validation.errors['<?php echo esc_attr($mf_input_name); ?>'] ? 'mf-invalid' : '' )}
                classNamePrefix="mf_select"
                name="<?php echo esc_attr($mf_input_name); ?>"
                placeholder="<?php echo esc_attr(\MetForm\Utils\Util::react_entity_support( esc_html($mf_input_placeholder), $render_on_editor )); ?>"
                isSearchable=${false}
                options=${<?php echo json_encode($mf_input_list_array); ?>}
                value=${parent.getValue("<?php echo esc_attr($mf_input_name); ?>") ? <?php echo json_encode($mf_input_list); ?>.filter(item => item.value === parent.getValue("<?php echo esc_attr($mf_input_name); ?>"))[0] : <?php echo json_encode( $mf_default_input_list ); ?>}
                onChange=${(e)=> parent.handleSelect(e, "<?php echo esc_attr( $mf_input_name ); ?>")}
                ref=${() => {
				<?php if ( isset($quizData) && ($quizData['correctPoint'] != 0 || $quizData['incorrectPoint'] != 0) ) { ?>
					!parent.state.answers["<?php echo esc_attr($mf_input_name); ?>"] && (
					parent.state.answers["<?php echo esc_attr($mf_input_name); ?>"] = <?php echo json_encode($quizData); ?>)
				<?php } ?>
                    register({ name: "<?php echo esc_attr($mf_input_name); ?>" }, parent.activateValidation(<?php echo json_encode($configData); ?>));
                    if ( parent.getValue("<?php echo esc_attr($mf_input_name); ?>") === '' && <?php echo (count($mf_default_input_list) > 0) ? 'true' : 'false'; ?> ) {
				    parent.setValue( '<?php echo esc_attr($mf_input_name); ?>', '<?php echo (count($mf_default_input_list) > 0) ? esc_attr( $mf_default_input_list["value"] ) : ''; ?>', true );
                        parent.handleChange({
                            target: {
                                name: '<?php echo esc_attr($mf_input_name); ?>',
                                value: '<?php echo (count($mf_default_input_list) > 0) ? esc_attr( $mf_default_input_list["value"] ) : ''; ?>'
                            }
                        });
                    }
                }}
                />

            <?php if ( !$is_edit_mode ) : ?>
				<${validation.ErrorMessage}
					errors=${validation.errors}
					name="<?php echo esc_attr( $mf_input_name ); ?>"
					as=${html`<span className="mf-error-message"></span>`}
					/>
			<?php endif; ?>
			<?php echo ('' !== trim($mf_input_help_text) ? sprintf('<span className="mf-input-help"> %s </span>', esc_html( \MetForm\Utils\Util::react_entity_support(trim($mf_input_help_text), $render_on_editor))) : ''); ?>
		</div>

		<?php \MetForm\Utils\Util::metform_content_renderer($inputWrapEnd); ?>

		<?php
	}
}
