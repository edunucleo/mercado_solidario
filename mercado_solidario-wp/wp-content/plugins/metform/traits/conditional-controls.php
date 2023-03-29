<?php
namespace MetForm\Traits;

use \Elementor\Controls_Manager;
use \Elementor\Repeater;

defined( 'ABSPATH' ) || exit;

/*
* This is a global conditional widget control trait. 
* There are some different fucntions for different control section. 
* For registering any conditional widget just use this trait and call control section function which you want to use.
*/

trait Conditional_Controls{

	public function input_conditional_control(){
		if(!class_exists('\MetForm_Pro\Base\Package')){
			return;
		}

		$this->start_controls_section(
			'condition_section',
			[
				'label' => esc_html__( 'Conditional logic', 'metform' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'mf_conditional_logic_form_enable',
			[
				'label' => esc_html__( 'Enable', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'description' => esc_html__( 'This feature only works on the frontend.', 'metform' ),
				'label_on' => 'Yes',
				'label_off' => 'No',
				'return_value' => 'yes',
				'frontend_available' => true
			]
		);

		$this->add_control(
			'mf_conditional_logic_form_and_or_operators',
			[
				'label' => esc_html__( 'Condition match criteria', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'label_block' => true,
				'frontend_available' => true,
				'options' => [
					'and' => esc_html__( 'AND', 'metform' ),
					'or' => esc_html__( 'OR', 'metform' ),
				],
				'default' => 'and',
				'condition' => [
					'mf_conditional_logic_form_enable' => 'yes',
				],
			]
		);

		$this->add_control(
			'mf_conditional_logic_form_action',
			[
				'label' => esc_html__( 'Action', 'metform' ),
				'label_block' => true,
				'frontend_available' => true,
				'type' => Controls_Manager::SELECT,
				'multiple' => true,
				'options' => [
					'show' => 'Show this field',
					'hide' => 'Hide this field',
					
				],
				'default' => 'show',
				'condition' => [
					'mf_conditional_logic_form_enable' => 'yes',
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'mf_conditional_logic_form_if',
			[
				'label' => esc_html__( 'If', 'metform' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Input field name', 'metform' ),
			]
		);

		$repeater->add_control(
			'mf_conditional_logic_form_comparison_operators',
			[
				'label' => esc_html__( 'Match ( comparison )', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'label_block' => true,
				'options' => [
					'not-empty' => esc_html__( 'not empty', 'metform' ),
					'empty' => esc_html__( 'empty', 'metform' ),
					'==' => esc_html__( 'equals', 'metform' ),
					'!=' => esc_html__( 'not equals', 'metform' ),
					'>' => esc_html__( 'greater than', 'metform' ),
					'>=' => esc_html__( 'greater than equal', 'metform' ),
					'<' => esc_html__( 'smaller than', 'metform' ),
					'<=' => esc_html__( 'smaller than equal', 'metform' ),
				],
				'default' => 'not-empty',
			]
		);

		$repeater->add_control(
			'mf_conditional_logic_form_value',
			[
				'label' => esc_html__( 'Match value', 'metform' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( '50', 'metform' ),
				'condition' => [
					'mf_conditional_logic_form_comparison_operators' => ['==','!=','>','>=','<','<=','contains'],
				],
			]
		);

		

		$repeater->add_control(
			'mf_conditional_logic_form_set_value',
			[
				'label' => esc_html__( 'Value for set', 'metform' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter value for set', 'metform' ),
				'description' => esc_html__( 'E.g 100, name, anything', 'metform' ),
				'condition' => [
					'mf_conditional_logic_form_action' => 'set_value',
				],
			]
		);

		$this->add_control(
			'mf_conditional_logic_form_list',
			array(
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'frontend_available' => true,
				'condition' => [
					'mf_conditional_logic_form_enable' => 'yes',
				],
				'title_field' => '{{{ mf_conditional_logic_form_if }}} {{{ mf_conditional_logic_form_comparison_operators }}} {{{ mf_conditional_logic_form_value }}}',
			)
		);
		
		$this->end_controls_section();
	}

}