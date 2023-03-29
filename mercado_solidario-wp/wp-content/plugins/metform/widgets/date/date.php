<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Date extends Widget_Base{
	use \MetForm\Traits\Common_Controls;
	use \MetForm\Traits\Conditional_Controls;
	use \MetForm\Widgets\Widget_Notice;
	
	public function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );
		$this->add_style_depends('flatpickr');

		foreach ($this->get_locales() as $key => $value) {
			wp_register_script( 'flatpickr-'.$key, plugin_dir_url(__FILE__) . '../../public/assets/js/lang/'. $key .'.js', false, null, true );
		}
	}

    public function get_name() {
		return 'mf-date';
    }
    
	public function get_title() {
		return esc_html__( 'Date', 'metform' );
	}

	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}

	public function get_keywords() {
        return ['metform', 'input', 'date', 'calendar'];
	}
	
	public function get_locales() {
		return [
			'sq'	=> esc_html__( 'Albanian', 'metform' ),
			'ar'	=> esc_html__( 'Arabic', 'metform' ),
			'at'	=> esc_html__( 'Austria', 'metform' ),
			'az'	=> esc_html__( 'Azerbaijan', 'metform' ),
			'bn'	=> esc_html__( 'Bangla', 'metform' ),
			'be'	=> esc_html__( 'Belarusian', 'metform' ),
			'bs'	=> esc_html__( 'Bosnian', 'metform' ),
			'bg'	=> esc_html__( 'Bulgarian', 'metform' ),
			'my'	=> esc_html__( 'Burmese', 'metform' ),
			'cat'	=> esc_html__( 'Catalan', 'metform' ),
			'hr'	=> esc_html__( 'Croatian', 'metform' ),
			'cs'	=> esc_html__( 'Czech', 'metform' ),
			'da'	=> esc_html__( 'Danish', 'metform' ),
			'nl'	=> esc_html__( 'Dutch', 'metform' ),
			''		=> esc_html__( 'English', 'metform' ),
			'eo'	=> esc_html__( 'Esperanto', 'metform' ),
			'et'	=> esc_html__( 'Estonian', 'metform' ),
			'fo'	=> esc_html__( 'Faroese', 'metform' ),
			'fi'	=> esc_html__( 'Finnish', 'metform' ),
			'fr'	=> esc_html__( 'French', 'metform' ),
			'ka'	=> esc_html__( 'Georgian', 'metform' ),
			'de'	=> esc_html__( 'German', 'metform' ),
			'gr'	=> esc_html__( 'Greek', 'metform' ),
			'he'	=> esc_html__( 'Hebrew', 'metform' ),
			'hi'	=> esc_html__( 'Hindi', 'metform' ),
			'hu'	=> esc_html__( 'Hungarian', 'metform' ),
			'is'	=> esc_html__( 'Icelandic', 'metform' ),
			'id'	=> esc_html__( 'Indonesian', 'metform' ),
			'it'	=> esc_html__( 'Italian', 'metform' ),
			'ja'	=> esc_html__( 'Japanese', 'metform' ),
			'kz'	=> esc_html__( 'Kazakh', 'metform' ),
			'km'	=> esc_html__( 'Khmer', 'metform' ),
			'ko'	=> esc_html__( 'Korean', 'metform' ),
			'lv'	=> esc_html__( 'Latvian', 'metform' ),
			'lt'	=> esc_html__( 'Lithuanian', 'metform' ),
			'mk'	=> esc_html__( 'Macedonian', 'metform' ),
			'ms'	=> esc_html__( 'Malaysian', 'metform' ),
			'zh'	=> esc_html__( 'Mandarin', 'metform' ),
			'zh-tw'	=> esc_html__( 'MandarinTraditional', 'metform' ),
			'mn'	=> esc_html__( 'Mongolian', 'metform' ),
			'no'	=> esc_html__( 'Norwegian', 'metform' ),
			'fa'	=> esc_html__( 'Persian', 'metform' ),
			'pl'	=> esc_html__( 'Polish', 'metform' ),
			'pt'	=> esc_html__( 'Portuguese', 'metform' ),
			'pa'	=> esc_html__( 'Punjabi', 'metform' ),
			'ro'	=> esc_html__( 'Romanian', 'metform' ),
			'ru'	=> esc_html__( 'Russian', 'metform' ),
			'sr'	=> esc_html__( 'Serbian', 'metform' ),
			'sr-cyr'	=> esc_html__( 'SerbianCyrillic', 'metform' ),
			'si'	=> esc_html__( 'Sinhala', 'metform' ),
			'sk'	=> esc_html__( 'Slovak', 'metform' ),
			'sl'	=> esc_html__( 'Slovenian', 'metform' ),
			'es'	=> esc_html__( 'Spanish', 'metform' ),
			'sv'	=> esc_html__( 'Swedish', 'metform' ),
			'th'	=> esc_html__( 'Thai', 'metform' ),
			'tr'	=> esc_html__( 'Turkish', 'metform' ),
			'uk'	=> esc_html__( 'Ukrainian', 'metform' ),
			'vn'	=> esc_html__( 'Vietnamese', 'metform' ),
			'cy'	=> esc_html__( 'Welsh', 'metform' ),
		];
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
			'mf_input_min_date_today',
			[
				'label' => esc_html__( 'Set current date as minimum date', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'metform' ),
				'label_off' => esc_html__( 'No', 'metform' ),
				'return_value' => 'today',
				'default' => '',
			]
		);

		$this->add_control(
			'mf_input_min_date',
			[
				'label' => esc_html__( 'Set minimum date manually', 'metform' ),
				'type' => Controls_Manager::DATE_TIME,
				'picker_options' => [
					'enableTime' => false,
				],

				'condition' => [
					'mf_input_min_date_today' => ''
				]
			]
		);

		$this->add_control(
			'mf_input_max_date',
			[
				'label' => esc_html__( 'Set maximum date manually', 'metform' ),
				'type' => Controls_Manager::DATE_TIME,
				'picker_options' => [
					'enableTime' => false,
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'mf_input_disable_date',
			[
				'label' => esc_html__( 'Disable date : ', 'metform' ),
				'type' => Controls_Manager::DATE_TIME,
				'picker_options' => [
					'enableTime' => false,
				],
			]
		);

		$this->add_control(
			'mf_input_disable_date_list',
			[
				'label' => esc_html__( 'Disable date List', 'metform' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ mf_input_disable_date }}}',
			]
		);


		$this->add_control(
			'mf_input_range_date',
			[
				'label' => esc_html__( 'Range date input ?', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'metform' ),
				'label_off' => esc_html__( 'No', 'metform' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'mf_input_year_select',
			[
				'label' => esc_html__( 'Year input ?', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'yes' => esc_html__( 'Yes', 'metform' ),
				'no' => esc_html__( 'No', 'metform' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'mf_input_month_select',
			[
				'label' => esc_html__( 'Month input ?', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'yes' => esc_html__( 'Yes', 'metform' ),
				'no' => esc_html__( 'No', 'metform' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'mf_input_date_select',
			[
				'label' => esc_html__( 'Date input ?', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'yes' => esc_html__( 'Yes', 'metform' ),
				'no' => esc_html__( 'No', 'metform' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'mf_input_date_format_all',
			[
				'label' => esc_html__( 'Date format : ', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'm-d-Y',
				'options' => [
					'Y-m-d'  => esc_html__( 'YYYY-MM-DD', 'metform' ),
					'd-m-Y'  => esc_html__( 'DD-MM-YYYY', 'metform' ),
					'm-d-Y'  => esc_html__( 'MM-DD-YYYY', 'metform' ),
					'Y.m.d'  => esc_html__( 'YYYY.MM.DD', 'metform' ),
					'd.m.Y'  => esc_html__( 'DD.MM.YYYY', 'metform' ),
					'm.d.Y'  => esc_html__( 'MM.DD.YYYY', 'metform' ),
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'mf_input_date_select',
							'operator' => '=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_month_select',
							'operator' => '=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_year_select',
							'operator' => '=',
							'value' => 'yes',
						],
					]
				],
			]
		);

		$this->add_control(
			'locale',
			[
				'label'			=> esc_html__( 'Localization', 'metform' ),
				'description'	=> esc_html__( 'Language change will be shown on preview.', 'metform' ),
				'type'			=> Controls_Manager::SELECT,
				'options'		=> $this->get_locales(),
				'default'		=> '',
			]
		);

		$this->add_control(
			'mf_input_date_format_dm',
			[
				'label' => esc_html__( 'Date format : ', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'm-d',
				'options' => [
					'm-d'  => esc_html__( 'MM-DD', 'metform' ),
					'd-m'  => esc_html__( 'DD-MM', 'metform' ),
					'm.d'  => esc_html__( 'MM.DD', 'metform' ),
					'd.m'  => esc_html__( 'DD.MM', 'metform' ),
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'mf_input_date_select',
							'operator' => '=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_month_select',
							'operator' => '=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_year_select',
							'operator' => '!=',
							'value' => 'yes',
						],
					]
				],
			]
		);

		$this->add_control(
			'mf_input_date_format_ym',
			[
				'label' => esc_html__( 'Date format : ', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'm-Y',
				'options' => [
					'm-Y'  => esc_html__( 'MM-YY', 'metform' ),
					'Y-m'  => esc_html__( 'YY-MM', 'metform' ),
					'm.Y'  => esc_html__( 'MM.YY', 'metform' ),
					'Y.m'  => esc_html__( 'YY.MM', 'metform' ),
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'mf_input_date_select',
							'operator' => '!=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_month_select',
							'operator' => '=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_year_select',
							'operator' => '=',
							'value' => 'yes',
						],
					]
				],
			]
		);

		$this->add_control(
			'mf_input_date_format_yd',
			[
				'label' => esc_html__( 'Date format : ', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'd-Y',
				'options' => [
					'd-Y'  => esc_html__( 'DD-YY', 'metform' ),
					'Y-d'  => esc_html__( 'YY-DD', 'metform' ),
					'd.Y'  => esc_html__( 'DD.YY', 'metform' ),
					'Y.d'  => esc_html__( 'YY.DD', 'metform' ),
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'mf_input_date_select',
							'operator' => '=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_month_select',
							'operator' => '!=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_year_select',
							'operator' => '=',
							'value' => 'yes',
						],
					]
				],
			]
		);

		$this->add_control(
			'mf_input_date_with_time',
			[
				'label' => esc_html__( 'Want to input time with it ?', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'yes' => esc_html__( 'Yes', 'metform' ),
				'' => esc_html__( 'No', 'metform' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_control(
			'mf_input_time_24h',
			[
				'label' => esc_html__( 'Enable time 24hr?', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'yes' => esc_html__( 'Yes', 'metform' ),
				'' => esc_html__( 'No', 'metform' ),
				'return_value' => 'yes',
				'default' => '',
				'condition'	=> [
					'mf_input_date_with_time' => 'yes'
				]
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

		$this->input_controls();
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mf_date_calender_typography',
				'label' => esc_html__( 'Calendar Typography', 'metform' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mf-input-wrapper .flatpickr-calendar',
				'exclude' => [ 'font_size', 'text_decoration', 'line_height', 'letter_spacing' ],
			]
		);

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

	public function format_date($format, $array){
		$response = [];
		foreach($array as $date){
			$response[] = date($format, strtotime($date));
		}
		return $response;
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

		if(is_array($mf_input_disable_date_list)){
			$disable_dates = [];
			foreach($mf_input_disable_date_list as $key => $value){
				$disable_dates[] = $value['mf_input_disable_date'];
			}
		}

		$date_format = (isset($mf_input_date_format_all) ? $mf_input_date_format_all : 
							(isset($mf_input_date_format_dm) ? $mf_input_date_format_dm :
								(isset($mf_input_date_format_yd) ? $mf_input_date_format_yd :
									(isset($mf_input_date_format_ym) ? $mf_input_date_format_ym :
										(($mf_input_year_select == 'yes') ? 'Y' :
											(($mf_input_month_select == 'yes') ? 'm' :
												(($mf_input_date_select == 'yes') ? 'd' : 'd-m-Y')))))));

		if( esc_attr($mf_input_date_with_time) && !empty($mf_input_date_with_time) ){
			$date_format .= " H:i";
		}
		$class = (isset($settings['mf_conditional_logic_form_list']) ? 'mf-conditional-input' : '');
		
		$configData = [
			'message' 		=> $errorMessage 	= isset($mf_input_validation_warning_message) ? !empty($mf_input_validation_warning_message) ? $mf_input_validation_warning_message : esc_html__('This field is required.', 'metform') : esc_html__('This field is required.', 'metform'),
			'required'		=> isset($mf_input_required) && $mf_input_required == 'yes' ? true : false,
		];

		$is_date_disabled = isset ( $disable_dates ) ? $this->format_date($date_format, $disable_dates) : [];
		$current_date_mode = $mf_input_range_date && $mf_input_range_date == 'yes' ? 'range' : 'single';

		if ( 'yes' === $mf_input_date_with_time ) $mf_input_date_with_time = true;

		$minDate = '';
		if( !empty( $mf_input_min_date_today ) ) {
			$minDate = $mf_input_min_date_today;
		} else {
			$minDate = $mf_input_min_date;
		}
		
		$dateConfig = [
			'minDate'		=> $minDate,
			'maxDate'		=> $mf_input_max_date,
			'dateFormat' 	=> $date_format,
			'enableTime'	=> $mf_input_date_with_time,
			'disable'		=> $is_date_disabled,
			'mode'			=> $current_date_mode,
			'static'		=> true,
			'disableMobile'	=> true,
			'time_24hr'		=> (isset($mf_input_time_24h) && !empty($mf_input_time_24h)) ? true : false
		];

		if ( $locale ):
			wp_enqueue_script( 'flatpickr-' . $locale );
		endif;
		?>
		<?php \MetForm\Utils\Util::metform_content_renderer($inputWrapStart); ?>

		<div className="mf-input-wrapper">
			<?php if ( 'yes' == $mf_input_label_status ): ?>
				<label className="mf-input-label" htmlFor="mf-input-date-<?php echo esc_attr( $this->get_id() ); ?>">
					<?php echo esc_html(\MetForm\Utils\Util::react_entity_support($mf_input_label, $render_on_editor )); ?>
					<span className="mf-input-required-indicator"><?php echo esc_html( ($mf_input_required === 'yes') ? '*' : '' );?></span>
				</label>
			<?php endif; ?>

			<${props.Flatpickr}
					name="<?php echo esc_attr( $mf_input_name ); ?>"
					className="mf-input mf-date-input mf-left-parent <?php echo esc_attr( $class ); ?>"
					placeholder="<?php echo esc_attr(\MetForm\Utils\Util::react_entity_support($mf_input_placeholder, $render_on_editor )); ?>"
					options=${<?php echo json_encode( $dateConfig ); ?>}
					value=${parent.getValue('<?php echo esc_attr( $mf_input_name ); ?>')}
					onInput=${parent.handleDateTime}
					aria-invalid=${validation.errors['<?php echo esc_attr( $mf_input_name ); ?>'] ? 'true' : 'false'}
					ref=${el => props.DateWidget(
							el, 
							'<?php echo esc_attr( $locale ) ?>', 
							<?php echo json_encode($configData); ?>,  
							register, 
							parent 
						)}
					/>

			<?php if ( !$is_edit_mode ) : ?>
				<${validation.ErrorMessage}
					errors=${validation.errors}
					name="<?php echo esc_attr( $mf_input_name ); ?>"
					as=${html`<span className="mf-error-message"></span>`}
					/>
			<?php endif; ?>
			<?php echo ('' !== trim($mf_input_help_text) ? sprintf('<span className="mf-input-help"> %s </span>', esc_html(  \MetForm\Utils\Util::react_entity_support(trim($mf_input_help_text), $render_on_editor))) : ''); ?>
		</div>

		<?php \MetForm\Utils\Util::metform_content_renderer($inputWrapEnd); ?>

		<?php
    }

}
