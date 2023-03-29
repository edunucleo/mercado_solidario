<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

class Widget_Met_Form_Basic extends Widget_Base {

	public function get_name() {
		return 'metform-basic';
    }
    
	public function get_title() {
		return esc_html__( 'MetForm Basic', 'metform' );
	}

	public function show_in_panel() {
        return 'metform-form' != get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}

	public function get_keywords() {
        return ['metform', 'form'];
	}

	public function get_all_forms(){
		$form_list = [];
		$args = array(
			'posts_per_page'   => -1,
			'post_type'   => 'metform-form',
			'post_status' => 'publish',
		);
		   
		$forms = get_posts( $args );

		foreach($forms as $form){
			$form_list[$form->ID] = $form->post_title;
		}

		return $form_list;
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
			'mf_form_id',
			[
				'label' => esc_html__( 'Select Form : ', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => $this->get_all_forms(),
			]
		);

        $this->end_controls_section();
	}

	protected function render( $instance = [] ) {
		$settings = $this->get_settings_for_display();
		\MetForm\Utils\Util::metform_content_renderer(\MetForm\Utils\Util::render_form_content($settings['mf_form_id'], $this->get_id()));
	}
}
