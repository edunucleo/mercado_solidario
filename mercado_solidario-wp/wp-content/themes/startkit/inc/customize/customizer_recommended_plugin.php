<?php
/* Notifications in customizer */


require get_template_directory() . '/inc/customizer-notify/startkit-customizer-notify.php';
$startkit_config_customizer = array(
	'recommended_plugins'       => array(
		'clever-fox' => array(
			'recommended' => true,
			'description' => sprintf('Install and activate <strong>Clever Fox</strong> plugin for taking full advantage of all the features this theme has to offer %s.', 'startkit'),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'startkit' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'startkit' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'startkit' ),
	'activate_button_label'     => esc_html__( 'Activate', 'startkit' ),
	'startkit_deactivate_button_label'   => esc_html__( 'Deactivate', 'startkit' ),
);
Startkit_Customizer_Notify::init( apply_filters( 'startkit_customizer_notify_array', $startkit_config_customizer ) );
?>