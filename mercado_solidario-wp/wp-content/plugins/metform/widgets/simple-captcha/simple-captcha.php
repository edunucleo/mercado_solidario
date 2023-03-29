<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Simple_Captcha extends Widget_Base{
	use \MetForm\Widgets\Widget_Notice;
	use \MetForm\Traits\Common_Controls;
    
    public function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );

		if ( class_exists('\Elementor\Icons_Manager') && method_exists('\Elementor\Icons_Manager', 'enqueue_shim') ) {
			\Elementor\Icons_Manager::enqueue_shim();
		}
	}

    public function get_name() {
		return 'mf-simple-captcha';
    }
    
	public function get_title() {
		return esc_html__( 'Simple Captcha', 'metform' );
    }

	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}
	    
	public function get_keywords() {
        return ['metform', 'input', 'captcha', 'simple captcha'];
	}
	
    protected function register_controls() {
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'metform' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'mf_input_label_status',
			[
				'label' => esc_html__( 'Show Label', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'on' => esc_html__( 'Show', 'metform' ),
				'off' => esc_html__( 'Hide', 'metform' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'description' => esc_html__('for adding label on input turn it on. Don\'t want to use label? turn it off.', 'metform'),
			]
		);

        $this->add_control(
			'mf_input_label_display_property',
			[
				'label' => esc_html__( 'Label Position', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'block' => esc_html__( 'Top', 'metform' ),
					'inline-block' => esc_html__( 'Left', 'metform' ),
				],
				'condition' => [
					'mf_input_label_status' => 'yes',
				],
                'selectors' => [
					'{{WRAPPER}} .mf-input-label' => 'display: {{VALUE}}',
				],
				'description' => esc_html__('Select label position. where you want to see it. top of the input or left of the input.', 'metform'),

			]
		);

		$this->add_control(
			'mf_input_input_captcha_display',
			[
				'label' => esc_html__( 'Input captcha display', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'block' => esc_html__( 'Block', 'metform' ),
					'inline' => esc_html__( 'Inline', 'metform' ),
				],
				'description' => esc_html__('Select input and captcha display property.', 'metform'),

			]
		);

		$this->add_control(
			'mf_input_label',
			[
				'label' => esc_html__( 'Label : ', 'metform' ),
				'type' => Controls_Manager::TEXT,
				'default' => $this->get_title(),
				'title' => esc_html__( 'Enter here label of input', 'metform' ),
				'condition' => [
					'mf_input_label_status' => 'yes',
				],
			]
		);
					
		$this->add_control(
			'mf_input_help_text',
			[
				'label' => esc_html__( 'Help Text : ', 'metform' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'placeholder' => esc_html__( 'Type your help text here', 'metform' ),
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'label_section',
			[
				'label' => esc_html__( 'Label', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'mf_input_label_width',
			[
				'label' => esc_html__( 'Width', 'metform' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					]
				],
				'default' => [
					'unit' => '%',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-input-label' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .mf-input-wrapper div:not(.mf-captcha-input-wrapper) .mf-input' => 'width: calc(100% - {{SIZE}}{{UNIT}} - 7px)',
					'{{WRAPPER}} .mf-input-wrapper .mf-captcha-input-wrapper' => 'max-width: calc(100% - {{SIZE}}{{UNIT}} - 7px); display: inline-block; vertical-align: middle;',
				],
				'condition'    => [
                    'mf_input_label_display_property' => 'inline-block',
                ],
			]
		);

		$this->add_control(
			'mf_input_label_color',
			[
                'label' => esc_html__( 'Color', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-input-label' => 'color: {{VALUE}}',
				],
				'default' => '#000000',
				'condition'    => [
                    'mf_input_label_status' => 'yes',
                ],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mf_input_label_typography',
				'label' => esc_html__( 'Typography', 'metform' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mf-input-label',
				'condition'    => [
                    'mf_input_label_status' => 'yes',
                ],
			]
		);
		$this->add_responsive_control(
			'mf_input_label_padding',
			[
				'label' => esc_html__( 'Padding', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-input-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'    => [
                    'mf_input_label_status' => 'yes',
                ],
			]
		);
		$this->add_responsive_control(
			'mf_input_label_margin',
			[
				'label' => esc_html__( 'Margin', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-input-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'    => [
                    'mf_input_label_status' => 'yes',
                ],
			]
		);

		$this->add_control(
			'mf_input_required_indicator_color',
			[
				'label' => esc_html__( 'Required Indicator Color:', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#f00',
				'selectors' => [
					'{{WRAPPER}} .mf-input-required-indicator' => 'color: {{VALUE}}',
					'{{WRAPPER}} .mf-input-wrapper .mf-input[aria-invalid="true"]' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'mf_input_warning_text_color',
			[
				'label' => esc_html__( 'Warning Text Color:', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#f00',
				'selectors' => [
					'{{WRAPPER}} .mf-error-message' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mf_input_warning_text_typography',
				'label' => esc_html__( 'Warning Text Typography', 'metform' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mf-error-message',
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'captcha_section',
			[
				'label' => esc_html__( 'Refresh Captcha', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'mf_input_refresh_captcha_padding',
			[
				'label' => esc_html__( 'Padding', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-refresh-captcha' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mf_input_refresh_captcha_margin',
			[
				'label' => esc_html__( 'Margin', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-refresh-captcha' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'mf_input_refresh_captcha_color',
			[
				'label' => __( 'Color', 'metform' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .mf-refresh-captcha' => 'color: {{VALUE}}',
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

		$this->start_controls_section(
			'placeholder_section',
			[
				'label' => esc_html__( 'Place Holder', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->input_place_holder_controls();

		$this->end_controls_section();

		$this->insert_pro_message();
	}

    protected function render($instance = []){
		$settings = $this->get_settings_for_display();
		$inputWrapStart = $inputWrapEnd = '';
		extract($settings);

		$render_on_editor = false;
		$is_edit_mode = 'metform-form' === get_post_type() && \Elementor\Plugin::$instance->editor->is_edit_mode();

		/**
		 * Loads the below markup on 'Editor' view, only when 'metform-form' post type
		 */
		if ( $is_edit_mode ):
			$inputWrapStart = '<div class="mf-form-wrapper"></div><script type="text" class="mf-template">return html`';
			$inputWrapEnd = '`</script>';
		endif;
		
		$configData = [
			'message' 		=> $errorMessage 	= isset($mf_input_validation_warning_message) ? !empty($mf_input_validation_warning_message) ? $mf_input_validation_warning_message : __("Captcha didn't matched.", 'metform') : __("Captcha didn't matched.", 'metform'),
			'required'		=> true,
		];

		$path = plugin_dir_url( __FILE__ ) . 'generate-captcha.php?';
		$img_src = !$is_edit_mode ? '${ parent.state.captcha_img || "'. esc_url( $path ) .'" }' : '"'. esc_url( $path ) .'"';
		?>

		<div class="mf-input-wrapper">
			<?php if ( 'yes' == $mf_input_label_status ): ?>
				<label class="mf-input-label" for="mf-input-captcha-<?php echo esc_attr( $this->get_id() ); ?>">
					<?php echo esc_html(\MetForm\Utils\Util::react_entity_support($mf_input_label, $render_on_editor )); ?>
					<span class="mf-input-required-indicator"><?php echo esc_html( '*', 'metform' );?></span>
				</label>
			<?php endif; ?>

			<div class="mf-captcha-input-wrapper <?php echo esc_attr('mf-captcha-'.$mf_input_input_captcha_display); ?>">
				<img
					src=<?php \MetForm\Utils\Util::metform_content_renderer($img_src);?>
					alt="CAPTCHA" height="50px"
					class="mf-input mf-captcha-image"
					/>
				
				
				
				<i  class="mf-refresh-captcha"
					<?php if ( !$is_edit_mode ): ?>
						data-path=${ parent.state.captcha_path = '<?php echo esc_attr( $path ); ?>' }
						onClick=${ parent.refreshCaptcha }
					<?php endif; ?>
					></i>

				<input type="text"
					name="mf-captcha-challenge"
					class="mf-input mf-captcha-input"
					id="mf-input-captcha-<?php echo esc_attr($this->get_id()); ?>"
					placeholder="<?php esc_html_e('Entry captcha from the picture', 'metform')?>"
					<?php if ( !$is_edit_mode ): ?>
						onInput=${ parent.handleChange }
						aria-invalid=${validation.errors['mf-captcha-challenge'] ? 'true' : 'false'}
						ref=${ el => parent.activateValidation(<?php echo json_encode($configData); ?>, el) }
					<?php endif; ?>
					/>
			</div>

			<?php if ( !$is_edit_mode ): ?>
				<${validation.ErrorMessage} errors=${validation.errors} name="mf-captcha-challenge" as=${html`<span className="mf-error-message"></span>`} />
			<?php endif; ?>
			
			<?php echo ('' !== trim($mf_input_help_text) ? sprintf('<span class="mf-input-help"> %s </span>', esc_html( \MetForm\Utils\Util::react_entity_support(trim($mf_input_help_text), $render_on_editor))) : ''); ?>

		</div>

		<?php
    }
}
