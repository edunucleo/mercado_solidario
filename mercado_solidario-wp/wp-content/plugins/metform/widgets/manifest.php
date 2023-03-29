<?php
namespace MetForm\Widgets;
defined( 'ABSPATH' ) || exit;

Class Manifest{
	use \MetForm\Traits\Singleton;
	
	public function init() {

		add_action( 'elementor/elements/categories_registered', [ $this, 'add_metform_widget_categories' ]);

		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
	}

	public function get_input_widgets(){
		
		$widget_list = [
			'mf-text',
			'mf-email',
			'mf-number',
			'mf-telephone',
			'mf-date',
			'mf-time',
			'mf-select',
			'mf-multi-select',
			'mf-textarea',
			'mf-checkbox',
			'mf-radio',
			'mf-switch',
			'mf-range',
			'mf-url',
			'mf-password',
			'mf-listing-fname',
			'mf-listing-lname',
			'mf-listing-optin',
			'mf-gdpr-consent',
			'mf-recaptcha',
			'mf-simple-captcha',
			'mf-rating',
			'mf-file-upload',
		];

		return apply_filters( 'metform/onload/input_widgets', $widget_list );
	}

	public function includes() {

		require_once plugin_dir_path(__FILE__) . 'form.php';
		require_once plugin_dir_path(__FILE__) . 'text/text.php';
		require_once plugin_dir_path(__FILE__) . 'email/email.php';
		require_once plugin_dir_path(__FILE__) . 'number/number.php';
		require_once plugin_dir_path(__FILE__) . 'telephone/telephone.php';
		require_once plugin_dir_path(__FILE__) . 'date/date.php';
		require_once plugin_dir_path(__FILE__) . 'time/time.php';
		require_once plugin_dir_path(__FILE__) . 'select/select.php';
		require_once plugin_dir_path(__FILE__) . 'multi-select/multi-select.php';
		require_once plugin_dir_path(__FILE__) . 'button/button.php';
		require_once plugin_dir_path(__FILE__) . 'textarea/textarea.php';
		require_once plugin_dir_path(__FILE__) . 'checkbox/checkbox.php';
		require_once plugin_dir_path(__FILE__) . 'radio/radio.php';
		require_once plugin_dir_path(__FILE__) . 'switch/switch.php';
		require_once plugin_dir_path(__FILE__) . 'range/range.php';
		require_once plugin_dir_path(__FILE__) . 'url/url.php';
		require_once plugin_dir_path(__FILE__) . 'password/password.php';
		require_once plugin_dir_path(__FILE__) . 'listing-fname/listing-fname.php';
		require_once plugin_dir_path(__FILE__) . 'listing-lname/listing-lname.php';
		require_once plugin_dir_path(__FILE__) . 'listing-optin/listing-optin.php';
		require_once plugin_dir_path(__FILE__) . 'gdpr-consent/gdpr-consent.php';
		require_once plugin_dir_path(__FILE__) . 'recaptcha/recaptcha.php';
		require_once plugin_dir_path(__FILE__) . 'simple-captcha/simple-captcha.php';
		require_once plugin_dir_path(__FILE__) . 'rating/rating.php';
		require_once plugin_dir_path(__FILE__) . 'file-upload/file-upload.php';
		require_once plugin_dir_path(__FILE__) . 'summary/summary.php';
	}

	public function register_widgets() {

        $this->includes();

		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_Met_Form() );
		
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Text() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Email() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Number() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Telephone() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Date() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Time() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Select() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Multi_Select() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Textarea() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Checkbox() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Radio() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Switch() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Range() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Url() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Password() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Listing_Fname() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Listing_Lname() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Listing_Optin() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Gdpr_Consent() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Recaptcha() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Simple_Captcha() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Rating() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_File_Upload() );		
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\MetForm_Input_Summary() );			
	}

	public function add_metform_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'metform',
			[
				'title' => esc_html__( 'Metform', 'metform' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

}

