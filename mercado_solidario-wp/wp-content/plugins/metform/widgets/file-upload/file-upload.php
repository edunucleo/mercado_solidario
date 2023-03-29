<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_File_Upload extends Widget_base{

	use \MetForm\Traits\Common_Controls;
	use \MetForm\Traits\Conditional_Controls;
	use \MetForm\Widgets\Widget_Notice;

    public function get_name() {
		return 'mf-file-upload';
    }
    
	public function get_title() {
		return esc_html__( 'File Upload', 'metform' );
    }

    public function show_in_panel() {
        return 'metform-form' == get_post_type();
    }
    
    public function get_categories() {
		return [ 'metform' ];
	}

		
	public function get_keywords() {
        return ['metform', 'input', 'file', 'upload'];
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
			'mf_input_choose_file',
			[
				'label' =>esc_html__( 'Choose file Text', 'metform' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Choose a file',
			]
		);
		$this->add_control(
			'mf_input_no_file',
			[
				'label' =>esc_html__( 'No file chosen Text', 'metform' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'No file chosen.',
			]
		);

		$this->add_control(
			'mf_input_file_upload_icon',
			[
				'label' =>esc_html__( 'File Upload Icon:', 'metform' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
			]
		);

		$this->add_control(
            'mf_input_file_upload_icon_postion',
            [
                'label' =>esc_html__( 'File Upload Icon Position', 'metform' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'row-reverse',
                'options' => [
                    'row-reverse' =>	esc_html__( 'Before', 'metform' ),
					'row' =>	esc_html__( 'After', 'metform' ),
					'column-reverse'	=> esc_html__( 'Top', 'metform' ),
				],
				'selectors'	=> [
					'{{WRAPPER}} .mf-input-file-upload-label'	=> 'flex-direction: {{VALUE}};'
				],
                'condition'	=> [
					'mf_input_file_upload_icon[value]!'	=> ''
				]
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

		$this->add_control( 
            'mf_input_multiple_file', 
            [
                'label'        => esc_html__( 'Enable Multiple File Upload : ', 'metform' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_off'    => 'Off',
                'label_on'     => 'On',
                'return_value' => 'multiple',
            ] 
        );
        
        $this->add_control( 
            'mf_input_file_size_status', 
            [
                'label'        => esc_html__( 'File Size Limit : ', 'metform' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_off'    => 'Off',
                'label_on'     => 'On',
                'return_value' => 'on',
            ] 
        );

       $this->add_control(
            'mf_input_file_size_limit',
            [
                'label' => esc_html__( 'Maximum File Size (KB) : ', 'metform' ),
                'type' => Controls_Manager::NUMBER,
                'default' => esc_html__( '128', 'metform' ),
                'condition'    => [
                    'mf_input_file_size_status' => 'on',
                ],
            ]
        );

        $this->add_control(
			'mf_input_file_types',
			[
				'label' => esc_html__( 'File Types : ', 'metform' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => [
					'.jpg'  => esc_html__( '.jpg', 'metform' ),
					'.jpeg'  => esc_html__( '.jpeg', 'metform' ),
					'.gif'  => esc_html__( '.gif', 'metform' ),
					'.png'  => esc_html__( '.png', 'metform' ),
					'.ico'  => esc_html__( '.ico', 'metform' ),
					'.pdf'  => esc_html__( '.pdf', 'metform' ),
					'.doc'  => esc_html__( '.doc', 'metform' ),
					'.docx'  => esc_html__( '.docx', 'metform' ),
					'.ppt'  => esc_html__( '.ppt', 'metform' ),
					'.pptx'  => esc_html__( '.pptx', 'metform' ),
					'.pps'  => esc_html__( '.pps', 'metform' ),
					'.ppsx'  => esc_html__( '.ppsx', 'metform' ),
					'.odt'  => esc_html__( '.odt', 'metform' ),
					'.xls'  => esc_html__( '.xls', 'metform' ),
					'.xlsx'  => esc_html__( '.xlsx', 'metform' ),
					'.psd'  => esc_html__( '.psd', 'metform' ),
					'.mp3'  => esc_html__( '.mp3', 'metform' ),
					'.m4a'  => esc_html__( '.m4a', 'metform' ),
					'.ogg'  => esc_html__( '.ogg', 'metform' ),
					'.wav'  => esc_html__( '.wav', 'metform' ),
					'.mp4'  => esc_html__( '.mp4', 'metform' ),
					'.m4v'  => esc_html__( '.m4v', 'metform' ),
					'.mov'  => esc_html__( '.mov', 'metform' ),
					'.wmv'  => esc_html__( '.wmv', 'metform' ),
					'.avi'  => esc_html__( '.avi', 'metform' ),
					'.mpg'  => esc_html__( '.mpg', 'metform' ),
					'.ogv'  => esc_html__( '.ogv', 'metform' ),
					'.3gp'  => esc_html__( '.3gp', 'metform' ),
					'.3g2'  => esc_html__( '.3g2', 'metform' ),
					'.zip'  => esc_html__( '.zip', 'metform' ),
					'.csv'  => esc_html__( '.csv', 'metform' ),
					'.stp'  => esc_html__( '.stp', 'metform' ),
					'.stl'  => esc_html__( '.stl', 'metform' ),
				],
                'default' => [ '.jpg', '.jpeg', '.gif', '.png' ],
			]
		);

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

		$this->input_label_controls( ['FILE_SIZE_WARNING'] );

        $this->end_controls_section();

        $this->start_controls_section(
			'input_section',
			[
				'label' => esc_html__( 'Input', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

		$this->input_controls();

		$this->add_responsive_control(
            'mf_input_icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'metform' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .mf-input-file-upload-label i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .mf-input-file-upload-label svg' => 'max-width: {{SIZE}}{{UNIT}}; height: auto',
				],
				'condition'	=> [
					'mf_input_file_upload_icon[value]!'	=> ''
				],
                'separator' => 'before',
            ]
		);
		
		$this->add_control(
            'mf_input_icon_spacing',
            [
                'label' => esc_html__( 'Icon Spacing', 'metform' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .mf-input-file-upload-label i, {{WRAPPER}} .mf-input-file-upload-label svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'	=> [
					'mf_input_file_upload_icon[value]!'	=> ''
				],
            ]
        );
		
		$this->add_control(
            'mf_file_upload_file_name',
            [
                'label' => esc_html__( 'File Name:', 'metform' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
		);

		$this->add_control(
            'mf_file_upload_file_postion',
            [
                'label' => esc_html__( 'Position', 'metform' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'inline-block',
                'options' => [
                    'inline-block'  => esc_html__( 'Right', 'metform' ),
                    'block' => esc_html__( 'Bottom', 'metform' ),
				],
				'selectors'	=> [
					'{{WRAPPER}} .mf-file-name'	=> 'display: {{VALUE}};',
				],
            ]
		);
		
		$this->start_controls_tabs('mf_file_upload_color_tabs');
			$this->start_controls_tab(
				'mf_file_upload_color_normal_tab',
				[
					'label'	=> esc_html__('Normal', 'metform')
				]
			);

			$this->add_responsive_control(
				'mf_file_upload_file_name_color',
				[
					'label' => esc_html__( 'Color', 'metform' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#333333',
					'selectors' => [
						'{{WRAPPER}} .mf-file-name span' => 'color: {{VALUE}};',
					],
				]
			);
	
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'mf_file_upload_file_name_bg',
					'label' => esc_html__( 'Background', 'metform' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .mf-file-name span',
				]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'mf_file_upload_color_hover_tab',
				[
					'label'	=> esc_html__('Hover', 'metform')
				]
			);

			$this->add_responsive_control(
				'mf_file_upload_file_name_hover_color',
				[
					'label' => esc_html__( 'Color', 'metform' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#333333',
					'selectors' => [
						'{{WRAPPER}} .mf-file-name:hover span' => 'color: {{VALUE}};',
					],
				]
			);
	
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'mf_file_upload_file_name_hover_bg',
					'label' => esc_html__( 'Background', 'metform' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .mf-file-name:hover span',
				]
			);

			$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mf_file_upload_file_name_typography',
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mf-file-name span',
			]
		);

		$this->add_responsive_control(
		    'mf_file_upload_file_name_padding',
		    [
		        'label' => esc_html__( 'Padding', 'metform' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%', 'em' ],
		        'selectors' => [
		            '{{WRAPPER}} .mf-file-name span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_responsive_control(
		    'mf_file_upload_file_name_margin',
		    [
		        'label' => esc_html__( 'Margin', 'metform' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%', 'em' ],
		        'selectors' => [
		            '{{WRAPPER}} .mf-file-name span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'mf_file_upload_file_name_border',
		        'label' => esc_html__( 'Border', 'metform' ),
		        'selector' => '{{WRAPPER}} .mf-file-name span',
		    ]
		);

		$this->add_responsive_control(
		    'mf_file_upload_file_name_border_radius',
		    [
		        'label' => esc_html__( 'Border Radius', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
		        'selectors' => [
		            '{{WRAPPER}} .mf-file-name span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
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

        $accept = (is_array($mf_input_file_types)) ? implode(', ', $mf_input_file_types) : '.jpg, .jpeg, .gif, .ico';

		$class = (isset($settings['mf_conditional_logic_form_list']) ? 'mf-conditional-input' : '');

		$configData = [
			'message' 		=> $errorMessage 	= isset($mf_input_validation_warning_message) ? !empty($mf_input_validation_warning_message) ? $mf_input_validation_warning_message : esc_html__('This field is required.', 'metform') : esc_html__('This field is required.', 'metform'),
			'required'		=> isset($mf_input_required) && $mf_input_required == 'yes' ? true : false,
			'file_types'	=> isset($mf_input_file_types) ? $mf_input_file_types : [],
			'type_message'	=> esc_html__('Invalid file extension', 'metform'),
			'size_limit'	=> isset($mf_input_file_size_limit) ? $mf_input_file_size_limit : -1,
			'limit_message'	=> isset($mf_input_file_size_limit) ? esc_html__('File size cannot exceed ' . $mf_input_file_size_limit . 'kb', 'metform') : $errorMessage,
		];
		?>
		
		<?php \MetForm\Utils\Util::metform_content_renderer($inputWrapStart); ?>

		<div className="mf-input-wrapper">
			<?php if ( 'yes' == $mf_input_label_status ): ?>
				<label className="mf-input-label" htmlFor="mf-input-file-upload-<?php echo esc_attr( $this->get_id() ); ?>">
					<?php echo esc_html(\MetForm\Utils\Util::react_entity_support($mf_input_label, $render_on_editor )); ?>
					<span className="mf-input-required-indicator"><?php echo esc_html( ($mf_input_required === 'yes') ? '*' : '' );?></span>
				</label>
			<?php endif; ?>

			<div className="mf-file-upload-container multi-option-input-type">
				<input
					type="file"
					className="mf-input mf-input-file-upload <?php echo esc_attr($class); ?>"
					id="mf-input-file-upload-<?php echo esc_attr($this->get_id()); ?>" 
					name="<?php echo esc_attr($mf_input_name); ?>" 
					<?php echo esc_attr($mf_input_multiple_file) ?>
					accept="<?php echo esc_attr($accept != null ? $accept : '');?>"
					onInput=${ parent.handleFileUpload }
					aria-invalid=${validation.errors['<?php echo esc_attr($mf_input_name); ?>'] ? 'true' : 'false'}
					ref=${ el => parent.activateValidation(<?php echo json_encode($configData); ?>, el) }
					/>
				<label htmlFor="mf-input-file-upload-<?php echo esc_attr($this->get_id()); ?>" className="mf-input-file-upload-label metform-btn">
					<?php 
						echo wp_kses('<span>'. \MetForm\Utils\Util::react_entity_support( esc_html($mf_input_choose_file), $render_on_editor ) .'</span>', \MetForm\Utils\Util::get_kses_array());

						Icons_Manager::render_icon( $settings['mf_input_file_upload_icon'], [ 'aria-hidden' => 'true' ] );
					?>
				</label>
				<div className="mf-file-name">
					<span>${parent.getFileLabel( '<?php echo esc_attr($mf_input_name); ?>', '<?php esc_html_e($mf_input_no_file, 'metform'); ?>' )}</span>
				</div>
				
			</div>

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
