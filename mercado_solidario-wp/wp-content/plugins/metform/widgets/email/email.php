<?php

namespace Elementor;

defined('ABSPATH') || exit;

class MetForm_Input_Email extends widget_base
{

	use \MetForm\Traits\Common_Controls;
	use \MetForm\Traits\Conditional_Controls;
	use \MetForm\Widgets\Widget_Notice;

	public function get_name()
	{
		return 'mf-email';
	}

	public function get_title()
	{
		return esc_html__('Email', 'metform');
	}

	public function show_in_panel()
	{
		return 'metform-form' == get_post_type();
	}

	public function get_categories()
	{
		return ['metform'];
	}

	public function get_keywords()
	{
		return ['metform', 'input', 'email', 'mail'];
	}

	protected function register_controls()
	{

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__('Content', 'metform'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_login_email',
			[
				'label' => __('Show Logged in Email', 'metform'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'metform'),
				'label_off' => __('No', 'metform'),
				'return_value' => 'yes',
				'default' => 'no',
				'description' => 'Set user\'s email as value'
			]
		);


		$this->input_content_controls();

		$this->end_controls_section();

		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__('Settings', 'metform'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->input_setting_controls(['VALIDATION', 'EXCLUDE_WORD_LENGTH']);

		$this->input_get_params_controls();

		$this->end_controls_section();

		if (class_exists('\MetForm_Pro\Base\Package')) {
			$this->input_conditional_control();
		}

		$this->start_controls_section(
			'label_section',
			[
				'label' => esc_html__('Label', 'metform'),
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
				'label' => esc_html__('Input', 'metform'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->input_controls();

		$this->end_controls_section();

		$this->start_controls_section(
			'placeholder_section',
			[
				'label' => esc_html__('Place Holder', 'metform'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->input_place_holder_controls();

		$this->end_controls_section();

		$this->start_controls_section(
			'error_message_section',
			[
				'label' => esc_html__('Error Message', 'metform'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'mf_error_message_color',
			[
                'label' => esc_html__( 'Color', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-error-message' => 'color: {{VALUE}}',
				],
				'default' => '#FF0000'
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mf_error_message_typography',
				'label' => esc_html__( 'Typography', 'metform' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mf-error-message',
			]
		);
		$this->add_responsive_control(
			'mf_error_message_padding',
			[
				'label' => esc_html__( 'Padding', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-error-message' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'mf_error_message_margin',
			[
				'label' => esc_html__( 'Margin', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-error-message' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'help_text_section',
			[
				'label' => esc_html__('Help Text', 'metform'),
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

	protected function render($instance = [])
	{

		$settings = $this->get_settings_for_display();
		extract($settings);

		$render_on_editor = false;
		$is_edit_mode = 'metform-form' === get_post_type() && \Elementor\Plugin::$instance->editor->is_edit_mode();

		$class = (isset($settings['mf_conditional_logic_form_list']) ? 'mf-conditional-input' : '');

		$configData = [
			'message' 		=> $errorMessage 	= isset($mf_input_validation_warning_message) ? !empty($mf_input_validation_warning_message) ? $mf_input_validation_warning_message : esc_html__('This field is required.', 'metform') : esc_html__('This field is required.', 'metform'),
			'emailMessage'	=> esc_html__('Please enter a valid Email address', 'metform'),
			'minLength'		=> isset($mf_input_min_length) ? $mf_input_min_length : 1,
			'maxLength'		=> isset($mf_input_max_length) ? $mf_input_max_length : '',
			'type'			=> isset($mf_input_validation_type) ? $mf_input_validation_type : '',
			'required'		=> isset($mf_input_required) && $mf_input_required == 'yes' ? true : false,
			'expression'	=> isset($mf_input_validation_expression) && !empty(trim($mf_input_validation_expression)) ? trim($mf_input_validation_expression) : 'null'
		];

		$default_value = '';
		if ($settings['show_login_email'] === 'yes') {
			$default_value = is_user_logged_in() ? wp_get_current_user()->user_email : '';
		}

?>

		<div class="mf-input-wrapper">
			<?php if ('yes' == $mf_input_label_status) : ?>
				<label class="mf-input-label" for="mf-input-email-<?php echo esc_attr($this->get_id()); ?>">
					<?php echo esc_html(\MetForm\Utils\Util::react_entity_support($mf_input_label, $render_on_editor)); ?>
					<span class="mf-input-required-indicator"><?php echo esc_html(($mf_input_required === 'yes') ? '*' : ''); ?></span>
				</label>
			<?php endif; ?>

			<input 
				type="email" 
				<?php if ($default_value) echo 'disabled'; ?> 
				defaultValue="<?php echo  esc_attr($default_value); ?>" 
				class="mf-input <?php echo esc_attr($class); ?>" 
				id="mf-input-email-<?php echo esc_attr($this->get_id()); ?>" 
				name="<?php echo esc_attr($mf_input_name); ?>" 
				placeholder="<?php echo esc_attr(\MetForm\Utils\Util::react_entity_support($mf_input_placeholder, $render_on_editor)); ?>" 
				<?php if (!$is_edit_mode) : ?> 
				onBlur=${parent.handleChange} onFocus=${parent.handleChange} aria-invalid=${validation.errors['<?php echo esc_attr($mf_input_name); ?>'] ? 'true' : 'false' } 
				ref=${el=> parent.activateValidation(<?php echo json_encode($configData); ?>, el)}
				<?php endif; ?>
			/>

			<?php if (!$is_edit_mode) : ?>
			<${validation.ErrorMessage} 
				errors=${validation.errors} 
				name="<?php echo esc_attr($mf_input_name); ?>" 
				as=${html`<span className="mf-error-message"></span>`}
			/>
			<?php endif; ?>

			<?php echo ('' !== trim($mf_input_help_text) ? sprintf('<span class="mf-input-help"> %s </span>', esc_html( \MetForm\Utils\Util::react_entity_support(trim($mf_input_help_text), $render_on_editor))) : ''); ?>
		</div>

<?php
	}
}
