<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Multi_Select extends Widget_Base{

    use \MetForm\Traits\Common_Controls;
    use \MetForm\Traits\Conditional_Controls;
    use \MetForm\Widgets\Widget_Notice;
    use \MetForm\Traits\Quiz_Control;

    public function get_name() {
		return 'mf-multi-select';
    }
    
	public function get_title() {
		return esc_html__( 'Multi Select', 'metform' );
    }

    public function show_in_panel() {
        return 'metform-form' == get_post_type();
    }
    
    public function get_categories() {
		return [ 'metform' ];
    }
    
	public function get_keywords() {
        return ['metform', 'input', 'select', 'multi select', 'dropdown', 'multiple dropdown'];
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

			$this->quiz_controls(['multi-select']);

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
                'label', [
                    'label' => esc_html__( 'Input Field Text', 'metform' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__( 'Input Text' , 'metform' ),
                    'label_block' => true,
                    'description' => esc_html__('Select list text that will be show to user.', 'metform'),
                ]
            );
            $input_fields->add_control(
                'value', [
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
                'mf_input_list',
                [
                    'label' => esc_html__( 'Multi Select List', 'metform' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $input_fields->get_controls(),
                    'title_field' => '{{{ label }}}',
                    'default' => [
                        [
                            'label' => 'Item 1',
                            'value' => 'value-1',
                            'mf_input_option_status' => '',
                        ],
                        [
                            'label' => 'Item 2',
                            'value' => 'value-2',
                            'mf_input_option_status' => '',
                        ],
                        [
                            'label' => 'Item 3',
                            'value' => 'value-3',
                            'mf_input_option_status' => '',
                        ],
                    ],
                    'description' => esc_html__('You can add/edit here your selector options.', 'metform'),
                'frontend_available' => true,
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
				'label' => esc_html__( 'Input', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->input_controls();

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
        
        $class = (isset($settings['mf_conditional_logic_form_list']) ? 'mf-conditional-input' : '');
        
        $configData = [
            'message' 		=> $errorMessage 	= isset($mf_input_validation_warning_message) ? !empty($mf_input_validation_warning_message) ? $mf_input_validation_warning_message : esc_html__('This field is required.', 'metform') : esc_html__('This field is required.', 'metform'),
            'minLength'		=> isset($mf_input_min_length) ? $mf_input_min_length : 1,
            'maxLength'		=> isset($mf_input_max_length) ? $mf_input_max_length : '',
            'type'			=> isset($mf_input_validation_type) ? $mf_input_validation_type : '',
            'required'		=> isset($mf_input_required) && $mf_input_required == 'yes' ? true : false,
        ];

        $mf_default_input_list = isset($mf_input_list) ? array_values(array_filter($mf_input_list, function($item){
            if(isset($item['mf_input_option_selected']) && !empty($item['mf_input_option_selected'])){
                return $item["value"];
            }

            return false;
        })) : array();

	   $default_value =  count($mf_default_input_list) > 0 ? array_column($mf_default_input_list, 'value') : array();

	   if(!$is_edit_mode && isset($mf_quiz_point) && class_exists('\MetForm_Pro\Base\Package')){
		$answer_list = isset($mf_input_list) ? array_values(array_filter($mf_input_list, function($item){
			if(isset($item['mf_quiz_question_answer']) && !empty($item['mf_quiz_question_answer'])){
				return $item["value"];
			}
			return false;
		})) : array();

		$answers = count($answer_list) > 0 ? array_column($answer_list, 'value') : array();
		$quizData = array("answer" => $answers, "correctPoint" => esc_attr($mf_quiz_point ?? 0), "incorrectPoint" => esc_attr($mf_quiz_negative_point ?? 0));
	 }
	?>

        <?php \MetForm\Utils\Util::metform_content_renderer($inputWrapStart); ?>

		<div className="mf-input-wrapper">
			<?php if ( 'yes' == $mf_input_label_status ): ?>
				<label className="mf-input-label" htmlFor="mf-input-multi-select-<?php echo esc_attr( $this->get_id() ); ?>">
					<?php echo esc_html(\MetForm\Utils\Util::react_entity_support($mf_input_label, $render_on_editor )); ?>
					<span className="mf-input-required-indicator"><?php echo esc_html( ($mf_input_required === 'yes') ? '*' : '' );?></span>
				</label>
			<?php endif; ?>

            <${props.Select}
                isOptionDisabled=${option => option.mf_input_option_status === 'disabled'}
                className=${"mf-input mf-input-multiselect <?php echo esc_attr($class); ?> " + ( validation.errors['<?php echo esc_attr($mf_input_name); ?>'] ? 'mf-invalid' : '' )}
                classNamePrefix="mf_multiselect"
                value=${parent.getValue("<?php echo esc_attr($mf_input_name); ?>") && <?php echo json_encode($mf_input_list); ?>.filter(item => {
                    if(parent.state.formData['<?php echo esc_attr($mf_input_name); ?>'] && parent.state.formData['<?php echo esc_attr($mf_input_name); ?>'].indexOf(item.value) != -1 ){
                        return item;
                    }
                })}
                name='<?php echo esc_attr($mf_input_name); ?>'
                placeholder="<?php echo esc_attr(\MetForm\Utils\Util::react_entity_support( $mf_input_placeholder, $render_on_editor )); ?>"
                options=${<?php echo json_encode($mf_input_list); ?>}
                onChange=${(el) => {
                    setValue("<?php echo esc_attr($mf_input_name); ?>", '');
                    if(el != null){
                        setValue("<?php echo esc_attr($mf_input_name); ?>", el, true);
                    }
                    parent.multiSelectChange(el, '<?php echo esc_attr($mf_input_name); ?>');
                }}
                ref=${() => {
				<?php if ( isset($quizData) && ($quizData['correctPoint'] != 0 || $quizData['incorrectPoint'] != 0) ) { ?>
					!parent.state.answers["<?php echo esc_attr($mf_input_name); ?>"] && (
					parent.state.answers["<?php echo esc_attr($mf_input_name); ?>"] = <?php echo json_encode($quizData); ?>)
				<?php } ?>
                    register({ name: "<?php echo esc_attr($mf_input_name); ?>" }, parent.activateValidation(<?php echo json_encode($configData); ?>));
                    if(parent.state?.submitted !== true){
                        if ( parent.getValue("<?php echo esc_attr($mf_input_name); ?>") === '' && <?php echo (count($mf_default_input_list) > 0) ? 'true' : 'false'; ?> ) {
                            parent.setValue( '<?php echo esc_attr($mf_input_name); ?>', '<?php echo json_encode($default_value); ?>');
                            parent.multiSelectChange('<?php echo json_encode($mf_default_input_list)?>', '<?php echo esc_attr($mf_input_name); ?>');
                        }
                    }
                }}
                isMulti
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
