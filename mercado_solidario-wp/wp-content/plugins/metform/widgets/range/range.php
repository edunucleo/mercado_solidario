<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Range extends Widget_Base{

	use \MetForm\Traits\Common_Controls;
	use \MetForm\Traits\Conditional_Controls;
	use \MetForm\Widgets\Widget_Notice;

    public function get_name() {
		return 'mf-range';
    }
    
	public function get_title() {
		return esc_html__( 'Range Slider', 'metform' );
	}
	
	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}
	
	public function get_keywords() {
        return ['metform', 'input', 'slider', 'range'];
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
			'mf_input_min_length_range',
			[
				'label' => esc_html__( 'Min Length', 'metform' ),
				'type' => Controls_Manager::NUMBER,
				'step' => 1,
				'default' => 0,
				'frontend_available' => true,
			]
		);
		$this->add_control(
			'mf_input_max_length_range',
			[
				'label' => esc_html__( 'Max Length', 'metform' ),
				'type' => Controls_Manager::NUMBER,
				'step' => 1,
				'default' => 100,
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'mf_input_steps_control',
			[
				'label' => esc_html__( 'Steps', 'metform' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 1,
			]
		);

		$this->add_control(
		'mf_input_range_control',
			[
				'label' => __( 'Dual range input:', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'true' => __( 'Yes', 'metform' ),
				'false' => __( 'No', 'metform' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control(
			'mf_input_range_important_note',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => __( '<strong>Important Note : </strong> For taking dual range input, You have to enter dual default value in the field Value (Exactly bottom of this notice field. ). Example: Min:10, Max:20', 'metform' ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
				'condition' => [
					'mf_input_range_control' => 'true'
				]
			]
		);

		$this->add_control(
			'mf_input_range_default_value',
			[
				'label' => esc_html__( 'Value', 'metform' ),
				'type' => Controls_Manager::TEXT,
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
				'label' => esc_html__( 'Range', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->input_controls(['NO_BACKGROUND','NO_BORDER']);

		$this->end_controls_section();

		$this->start_controls_section(
			'mf_range_input_counter',
			[
				'label' => esc_html__( 'Counter', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'mf_range_input_counter_width',
			[
				'label' => esc_html__( 'Width', 'metform' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
                    'unit' => 'px',
                    'size' => 36	,
                ],
				'selectors' => [
					'{{WRAPPER}} .mf-input-wrapper .input-range__label-container' => 'width: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'mf_range_input_counter_height',
			[
				'label' => esc_html__( 'Height', 'metform' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
				'selectors' => [
					'{{WRAPPER}} .mf-input-wrapper .input-range__label-container' => 'height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}',
				]
			]
		);


		$this->add_control(
            'mf_range_input_counter_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'metform' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .mf-input-wrapper .input-range__label-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		$configData = [
			'message' 		=> $errorMessage 	= isset($mf_input_validation_warning_message) ? !empty($mf_input_validation_warning_message) ? $mf_input_validation_warning_message : esc_html__('This field is required.', 'metform') : esc_html__('This field is required.', 'metform'),
			'type'			=> isset($mf_input_validation_type) ? $mf_input_validation_type : '',
			'required'		=> isset($mf_input_required) && $mf_input_required == 'yes' ? true : false,
			'expression'	=> isset($mf_input_validation_expression) && !empty(trim($mf_input_validation_expression)) ? trim($mf_input_validation_expression) : 'null'
		];
		/**
		 * Loads the below markup on 'Editor' view, only when 'metform-form' post type
		 */
		if ( $is_edit_mode ):
			$inputWrapStart = '<div class="mf-form-wrapper"></div><script type="text" class="mf-template">return html`';
			$inputWrapEnd = '`</script>';
		endif;
		
		$class = (isset($settings['mf_conditional_logic_form_list']) ? 'mf-conditional-input' : '');

		?>
			
		<?php \MetForm\Utils\Util::metform_content_renderer($inputWrapStart); ?>

		<div className="mf-input-wrapper">
			<?php if ( 'yes' == $mf_input_label_status ): ?>
				<label className="mf-input-label" htmlFor="mf-input-range-<?php echo esc_attr( $this->get_id() ); ?>">
					<?php echo esc_html(\MetForm\Utils\Util::react_entity_support($mf_input_label, $render_on_editor )); ?>
					<span className="mf-input-required-indicator"><?php echo esc_html( ($mf_input_required === 'yes') ? '*' : '' );?></span>
				</label>
			<?php endif; ?>

			<div className="range-slider">
			<?php
				$default_value = '';
				if(!empty($mf_input_range_default_value)){
					if(is_numeric($mf_input_range_default_value)){
						$default_value = $mf_input_range_default_value;
					} elseif (is_string($mf_input_range_default_value)) {
						$split_text = explode(',', $mf_input_range_default_value);
						if(is_numeric(trim($split_text[0])) && is_numeric(trim($split_text[1]))){
							$default_value = trim($split_text[0]) . ',' . trim($split_text[1]);
						}
					}
				}

				$minAttr = $mf_input_min_length_range === '' ? '' : 'min="'. esc_attr( $mf_input_min_length_range ) .'"';
				$multipile_value = explode(",",$default_value);

				if ($mf_input_range_control == 'true') {
			?>
				<${props.InputRange}
					maxValue=${<?php echo esc_attr(($mf_input_max_length_range != '') ? $mf_input_max_length_range : 100); ?>}
					minValue=${<?php echo esc_attr(($mf_input_min_length_range != '') ? $mf_input_min_length_range : 0); ?>}
					step=${<?php echo esc_attr($mf_input_steps_control);?>}
					onChange=${(el) => {
						parent.handleMultipileRangeChange(el, '<?php echo esc_attr($mf_input_name); ?>')
					}}
					value=${
						parent.state.formData['<?php echo esc_attr($mf_input_name); ?>'] ? {min: parent.state.formData['<?php echo esc_attr($mf_input_name); ?>']['0'], max: parent.state.formData['<?php echo esc_attr($mf_input_name); ?>']['1']} : {min: 
						<?php if(esc_attr($default_value)) { ?>
							<?php echo esc_attr($multipile_value[1] ? ($mf_input_min_length_range <= $multipile_value[0] ? $multipile_value[0] : $mf_input_min_length_range) : $multipile_value[0]) ?>
							<?php } else { echo esc_attr(($mf_input_min_length_range != '') ? $mf_input_min_length_range : 0); } ?>, max: 
								<?php if(esc_attr($default_value)) { ?>
							<?php echo esc_attr($multipile_value[1] ? ($mf_input_max_length_range <= $multipile_value[1] ? $mf_input_max_length_range : $multipile_value[1]) : 100) ?>
						<?php } else { echo esc_attr(($mf_input_max_length_range != '') ? $mf_input_max_length_range : 100); } ?>
						}
					}
					ref=${input => {
						register({ name: "<?php echo esc_attr($mf_input_name); ?>" }, parent.activateValidation(<?php echo json_encode($configData); ?>));
						!parent.state.formData['<?php echo esc_attr($mf_input_name); ?>'] ? parent.state.formData['<?php echo esc_attr($mf_input_name); ?>'] = <?php echo json_encode($multipile_value); ?> : ''
					}}
					name="<?php echo esc_attr($mf_input_name); ?>"
					/>
				<?php } else { ?>
					<${props.InputRange}
						maxValue=${<?php echo esc_attr(($mf_input_max_length_range != '') ? $mf_input_max_length_range : 100); ?>}
						minValue=${<?php echo esc_attr(($mf_input_min_length_range != '') ? $mf_input_min_length_range : 0); ?>}
						step=${<?php echo esc_attr($mf_input_steps_control ? $mf_input_steps_control : 1 );?>}
						onChange=${(el) => {
							parent.handleRangeChange(el, '<?php echo esc_attr($mf_input_name); ?>')
						}}
						value=${<?php 
							if(esc_attr($default_value)) { ?>
								Number(parent.state.formData['<?php echo esc_attr($mf_input_name); ?>']) || <?php if ($mf_input_min_length_range <= $multipile_value[0]) {
									echo $multipile_value[0] >= $mf_input_max_length_range ? esc_attr($mf_input_max_length_range) : esc_attr($multipile_value[0]);
								} else {
									echo esc_attr($mf_input_min_length_range);
								} ?>
							<?php } else { ?>
								Number(parent.state.formData['<?php echo esc_attr($mf_input_name); ?>']) || <?php echo esc_attr($mf_input_min_length_range); ?>
							<?php }
						?>}
						ref=${ input => {
							register({ name: "<?php echo esc_attr($mf_input_name); ?>" }, parent.activateValidation(<?php echo json_encode($configData); ?>));
							if ( parent.getValue("<?php echo esc_attr($mf_input_name); ?>") === '' && <?php echo !empty($default_value) ? 'true' : 'false'; ?> ) {
								parent.handleChange({
									target: {
										name: '<?php echo esc_attr($mf_input_name); ?>',
										value: '<?php echo !empty($default_value) ? esc_attr($default_value) : ''; ?>'
									}
								});
								parent.setValue( '<?php echo esc_attr($mf_input_name); ?>', '<?php echo !empty($default_value) ?esc_attr($default_value) : ''; ?>', true );
							}
						} }
						name="<?php echo esc_attr($mf_input_name); ?>" 
						/>
				<?php } ?>
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
