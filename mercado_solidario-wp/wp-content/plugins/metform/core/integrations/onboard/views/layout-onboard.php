<!-- onboard_steps nav begins -->
<?php

$onboard_steps = [
    'step-01' => [
        'title'     => esc_html__('Tutorial', 'metform'),
        'sub-title' => esc_html__('Tutorial info', 'metform'),
        'icon'      => esc_attr('xs-onboard-youtube')

    ],
    'step-02' => [
        'title'     => esc_html__('Sign Up', 'metform'),
        'sub-title' => esc_html__('Sign Up info', 'metform'),
        'icon'      => esc_attr('xs-onboard-user')
    ],
    'step-03' => [
        'title'     => esc_html__('Website Powerup', 'metform'),
        'sub-title' => esc_html__('Website Powerup info', 'metform'),
        'icon'      => esc_attr('xs-onboard-layout')
    ],
    'step-05' => [
        'title'     => esc_html__('Surprise', 'metform'),
        'sub-title' => esc_html__('Surprise info', 'metform'),
        'icon'      => esc_attr('xs-onboard-gift')
    ],
    'step-06' => [
        'title'     => esc_html__('Finalizing', 'metform'),
        'sub-title' => esc_html__('Finalizing info', 'metform'),
        'icon'      => esc_attr('xs-onboard-smile')
    ]
];

if(\MetForm\Plugin::instance()->package_type() != 'free'){
    unset($onboard_steps['step-05']);
}

$onboard_steps = apply_filters('elementskit/admin/onboard_steps/list', $onboard_steps);

echo '<ul class="mf-onboard-nav"><div class="mf-onboard-progressbar"></div>';
$count     = 1;
foreach ( $onboard_steps as $step_key => $step ):
	$icon = ! empty( $step['icon'] ) ? $step['icon'] : '';
	$title = ! empty( $step['title'] ) ? $step['title'] : '';
	?>
    <li data-step_key="<?php echo esc_attr( $step_key ); ?>"
        class="mf-onboard-nav-item <?php echo $count === 1 ? 'active' : '';
	    echo $count === count( $onboard_steps ) ? 'last' : ''; ?>">
		<?php if ( ! empty( $icon ) ) : ?>
            <i class="mf-onboard-nav-icon <?php echo esc_attr( $icon ); ?>"></i>
		<?php endif; ?>
		<?php if ( ! empty( $title ) ) : ?>
            <span class="mf-onboard-nav-text"><?php echo esc_html( $title ); ?></span>
		<?php endif; ?>
    </li>
	<?php $count ++; endforeach;
echo '</ul>';
?>
<!-- onboard_steps nav ends -->

<!-- onboard_steps content begins -->
<?php foreach ( $onboard_steps as $step_key => $step ): ?>

    <!-- includes view file for this step -->
	<?php
	$path = isset( $step['view_path'] )
		? $step['view_path']
		: self::get_dir() . 'views/onboard-steps/' . $step_key . '.php';

	if ( file_exists( $path ) ) {
		echo '<div class="mf-onboard-step-wrapper mf-onboard-' . esc_attr( $step_key ) . '">';
		include( $path );
		echo '</div>';
	} ?>

<?php endforeach; ?>
<!-- onboard_steps content ends -->