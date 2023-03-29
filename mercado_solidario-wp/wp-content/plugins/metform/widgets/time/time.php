<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Time extends Widget_Base{
	use \MetForm\Traits\Common_Controls;
	use \MetForm\Traits\Conditional_Controls;
	use \MetForm\Widgets\Widget_Notice;
	
	public function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );
		$this->add_style_depends('flatpickr');
	}

    public function get_name() {
		return 'mf-time';
    }
    
	public function get_title() {
		return esc_html__( 'Time', 'metform' );
	}
	
	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}
	    
	public function get_keywords() {
        return ['metform', 'input', 'time', 'clock'];
    }
	
    protected function register_controls() {
        
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'metform' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->input_content_controls();

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
			'mf_input_time_24h',
			[
				'label' => esc_html__( 'Use time 24H', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'metform' ),
				'label_off' => esc_html__( 'No', 'metform' ),
				'return_value' => 'yes',
				'default' => 'no',
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
			'required'		=> isset($mf_input_required) && $mf_input_required == 'yes' ? true : false,
		];
		
		$timeConfig = [
			'enableTime' 	=> true,
			'dateFormat'	=> 'h:i K',
			'noCalendar' 	=>  true,
			'time_24hr'		=> false,
			'static'		=> true
		];
		
		if(isset($mf_input_time_24h) && $mf_input_time_24h === 'yes'){
			$timeConfig['time_24hr']	= true;
			$timeConfig['dateFormat']	= 'H:i';
		}
		
		?>
		
		<?php \MetForm\Utils\Util::metform_content_renderer($inputWrapStart); ?>

		<div className="mf-input-wrapper">
			<?php if ( 'yes' == $mf_input_label_status ): ?>
				<label className="mf-input-label" htmlFor="mf-input-time-<?php echo esc_attr( $this->get_id() ); ?>">
					<?php echo esc_html(\MetForm\Utils\Util::react_entity_support( $mf_input_label, $render_on_editor )); ?>
					<span className="mf-input-required-indicator"><?php echo esc_html( ($mf_input_required === 'yes') ? '*' : '' );?></span>
				</label>
			<?php endif; ?>
			
			<${props.Flatpickr}
					name="<?php echo esc_attr( $mf_input_name ); ?>"
					className="mf-input mf-date-input mf-time-input mf-left-parent <?php echo esc_attr( $class ); ?>"
					placeholder="<?php echo esc_attr(\MetForm\Utils\Util::react_entity_support( $mf_input_placeholder, $render_on_editor )); ?>"
					options=${<?php echo json_encode( $timeConfig ); ?>}
					value=${parent.getValue('<?php echo esc_attr( $mf_input_name ); ?>')}
					onInput=${parent.handleDateTime}
					aria-invalid=${validation.errors['<?php echo esc_attr( $mf_input_name ); ?>'] ? 'true' : 'false'}
					ref=${
						el => {
							if( el && el.node.nextSibling ) {
								if( el.props.value.trim().length ) {
									el.node.nextSibling.classList.add('value-found');
								}else {
									el.node.nextSibling.classList.remove('value-found');
								}
							}
							register({ name: "<?php echo esc_attr($mf_input_name); ?>" }, parent.activateValidation(<?php echo json_encode($configData); ?>))
						}
					}
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
