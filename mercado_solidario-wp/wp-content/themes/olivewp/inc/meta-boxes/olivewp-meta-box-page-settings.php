<?php
$olivewp_site_layout = get_post_meta( get_the_ID(), 'olivewp_site_layout', true );
$olivewp_page_sidebar = get_post_meta( get_the_ID(), 'olivewp_page_sidebar', true );

	$olivewp_sidebar_layout_choices = apply_filters(
								'olivewp_layout_choices',
								array(
									'olivewp_site_layout_left' => array(
										'label' => '',
										'url'   => OLIVEWP_TEMPLATE_DIR_URI . '/inc/customizer/assets/img/left.jpg',
									),
									'olivewp_site_layout_right' => array(
										'label' => '',
										'url'   => OLIVEWP_TEMPLATE_DIR_URI . '/inc/customizer/assets/img/right.jpg',
									),
									'olivewp_site_layout_without_sidebar' => array(
										'label' => '',
										'url'   => OLIVEWP_TEMPLATE_DIR_URI . '/inc/customizer/assets/img/full.jpg',
									),
									'olivewp_site_layout_stretched' => array(
										'label' => '',
										'url'   => OLIVEWP_TEMPLATE_DIR_URI . '/inc/customizer/assets/img/stretched.jpg',
									),
								)
							);

	$olivewp_sidebar_layout_choices = array(
								'' => array(
									'label' => '',
									'url'   => OLIVEWP_TEMPLATE_DIR_URI . '/inc/meta-boxes/customizer.png',
								),
							) + $olivewp_sidebar_layout_choices; ?>


<table class="form-table">
	<tbody>
		<tr>
			<th><label for="olivewp_site_layout"><?php echo esc_html__('Layout','olivewp'); ?></label></th>
			<td><?php foreach ( $olivewp_sidebar_layout_choices as $layout_id => $value ) : ?>
			<label class="tg-label">
				<input type="radio" class="olivewp_site_layout" name="olivewp_site_layout" value="<?php echo esc_attr( $layout_id ); ?>" <?php checked( $olivewp_site_layout, $layout_id ); ?> />
				<img src="<?php echo esc_url( $value['url'] ); ?>"/>
			</label>
			<?php endforeach; ?>
			</td>	
		</tr>
		<tr>
			<th><label for="seo_tobots"><?php echo esc_html__('Sidebar','olivewp'); ?></label></th>
			<td>
				<select id="olivewp_page_sidebar" name="olivewp_page_sidebar">
					<option value="sidebar-1" <?php selected( 'sidebar-1', $olivewp_page_sidebar ); ?>><?php echo esc_html__('Primary','olivewp'); ?></option>
					<option value="footer-sidebar-1" <?php selected( 'footer-sidebar-1', $olivewp_page_sidebar ); ?> ><?php echo esc_html__('Footer 1','olivewp'); ?></option>
					<option value="footer-sidebar-2" <?php selected( 'footer-sidebar-2', $olivewp_page_sidebar ); ?> ><?php echo esc_html__('Footer 2','olivewp'); ?></option>
					<option value="footer-sidebar-3" <?php selected( 'footer-sidebar-3', $olivewp_page_sidebar ); ?> ><?php echo esc_html__('Footer 3','olivewp'); ?></option>
					<option value="footer-sidebar-4" <?php selected( 'footer-sidebar-4', $olivewp_page_sidebar ); ?> ><?php echo esc_html__('Footer 4','olivewp'); ?></option>
					<option value="woocommerce" <?php selected( 'woocommerce', $olivewp_page_sidebar ); ?> ><?php echo esc_html__('WooCommerce sidebar','olivewp'); ?></option>
					</select>
				</td>
			</tr>
		</tbody>
	</table>
<?php