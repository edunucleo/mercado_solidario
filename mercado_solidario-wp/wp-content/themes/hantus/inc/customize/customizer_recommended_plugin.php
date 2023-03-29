<?php
/* Notifications in customizer */


require get_template_directory() . '/inc/customizer-notify/hantus-customizer-notify.php';
$hantus_config_customizer = array(
	'recommended_plugins'       => array(
		'clever-fox' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>cleverfox</strong> plugin for taking full advantage of all the features this theme has to offer.', 'hantus')),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'hantus' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'hantus' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'hantus' ),
	'activate_button_label'     => esc_html__( 'Activate', 'hantus' ),
	'hantus_deactivate_button_label'   => esc_html__( 'Deactivate', 'hantus' ),
);
Hantus_Customizer_Notify::init( apply_filters( 'hantus_customizer_notify_array', $hantus_config_customizer ) );
?>