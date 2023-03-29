<?php 
/**
 * Customizer Pro Details
 *
 * @package OliveWP Theme
*/
function olivewp_feature_customizer( $wp_customize ) {
    class Feature_Customize_Control extends WP_Customize_Control {
        public $type = 'new_menu';
        /**
        * Render the control's content.
        */
        public function render_content() {
        ?>
            <div class="olivewp-plus-features-customizer">
                <ul class="olivewp-plus-features">
                    <li>
                        <span class="olivewp-plus-label"><?php esc_html_e( 'PRO','olivewp'  ); ?></span>
                        <?php esc_html_e( 'Advanced Starter Sites','olivewp'); ?>
                    </li>
                    <li>
                        <span class="olivewp-plus-label"><?php esc_html_e( 'PRO','olivewp'  ); ?></span>
                        <?php esc_html_e( 'Header Presets','olivewp'); ?>
                    </li>
                    <li>
                        <span class="olivewp-plus-label"><?php esc_html_e( 'PRO','olivewp'  ); ?></span>
                        <?php esc_html_e( 'Multiple Blog Templates','olivewp'); ?>
                    </li>   
                    <li>
                        <span class="olivewp-plus-label"><?php esc_html_e( 'PRO','olivewp'  ); ?></span>
                        <?php esc_html_e( 'Predefined Color Schemes','olivewp'); ?>
                    </li>
                    <li>
                        <span class="olivewp-plus-label"><?php esc_html_e( 'PRO','olivewp'  ); ?></span>
                        <?php esc_html_e( 'Multiple Preloader Designs','olivewp'); ?>
                    </li>
                    <li>
                        <span class="olivewp-plus-label"><?php esc_html_e( 'PRO','olivewp'  ); ?></span>
                        <?php esc_html_e( 'Multiple Search Effects','olivewp'); ?>
                    </li>
                    <li>
                        <span class="olivewp-plus-label"><?php esc_html_e( 'PRO','olivewp'  ); ?></span>
                        <?php esc_html_e( 'Breadcrumb Settings','olivewp'); ?>
                    </li>
                    <li>
                        <span class="olivewp-plus-label"><?php esc_html_e( 'PRO','olivewp'  ); ?></span>
                        <?php esc_html_e( 'Enhanced Container Width Settings','olivewp'  ); ?>
                    </li>
                    <li>
                        <span class="olivewp-plus-label"><?php esc_html_e( 'PRO','olivewp'  ); ?></span>
                        <?php esc_html_e( 'Post Navigation Styles','olivewp'  ); ?>
                    </li>
                    <li>
                        <span class="olivewp-plus-label"><?php esc_html_e( 'PRO','olivewp'  ); ?></span>
                        <?php esc_html_e( 'Enhanced Footer Widgets Settings','olivewp'  ); ?>
                    </li>
                    <li>
                        <span class="olivewp-plus-label"><?php esc_html_e( 'PRO','olivewp'  ); ?></span>
                        <?php esc_html_e( 'Enhanced Footer Bar Settings','olivewp'  ); ?>
                    </li>
                    <li>
                        <span class="olivewp-plus-label"><?php esc_html_e( 'PRO','olivewp'  ); ?></span>
                        <?php esc_html_e( 'Additional Typography Features','olivewp'  ); ?>
                    </li>
                    <li>
                        <span class="olivewp-plus-label"><?php esc_html_e( 'PRO','olivewp'  ); ?></span>
                        <?php esc_html_e( 'Additional Colors & Background Features','olivewp'  ); ?>
                    </li>
                    <li>
                        <span class="olivewp-plus-label"><?php esc_html_e( 'PRO','olivewp'  ); ?></span>
                        <?php esc_html_e( 'Quality Support','olivewp'  ); ?>
                    </li>
                </ul>
                <a target="_blank" href="<?php echo esc_url('https://olivewp.org');?>" class="olivewp-plus-button button-primary"><?php esc_html_e( 'UPGRADE TO PRO','olivewp'  ); ?></a>
                <hr>
            </div>
        <?php }
    }
    $wp_customize->add_section( 'olivewp_feature_section' , 
        array(
            'title'      =>   esc_html__('View PRO Details', 'olivewp' ),
            'priority'   =>   1
        ) 
    );
    $wp_customize->add_setting('upgrade_pro_feature',
        array(
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'sanitize_text_field'
        )   
    );
    $wp_customize->add_control( new Feature_Customize_Control( $wp_customize, 'upgrade_pro_feature', array(
            'section'     =>  'olivewp_feature_section',
            'setting'     =>  'upgrade_pro_feature'
        ))
    );
    class Document_Customize_Control extends WP_Customize_Control {
        public $type = 'new_menu';
        /**
        * Render the control's content.
        */
        public function render_content() { ?>
       
            <div class="olivewp-plus-content">
                <ul class="olivewp-plus-des">
                    <li> <?php esc_html_e('The theme comes with advanced starter sites having mutiple options.','olivewp' );?></li>
                    <li> <?php esc_html_e('The theme comes with multiple header layouts like center, full-width, etc.','olivewp' );?></li>
                    <li> <?php esc_html_e('The theme comes with multiple blog templates like blog full-width, grid blog, switcher blog, etc.','olivewp' );?></li>
                    <li> <?php esc_html_e('You can use our predefined color schemes or any color of your choice.','olivewp' );?></li>
                    <li> <?php esc_html_e('With the help of multiple preloader designs, you can show any preloader animation on your theme.','olivewp' );?></li>
                    <li> <?php esc_html_e('There are two more search effects: pop-up dark and pop-up light.','olivewp' );?></li>
                    <li> <?php esc_html_e('With the help of additional breadcrumb settings, you can enable/disable the breadcrumb section, change the background image, change the overlay color, etc.','olivewp' );?></li>
                    <li> <?php esc_html_e('You can set the post and page width with the help of the container layout setting.','olivewp' );?></li>
                    <li> <?php esc_html_e('You can use different types of navigation styles like pagination, load more and infinite scroll.','olivewp' );?></li>
                    <li> <?php esc_html_e('With the help of footer widget settings, you can change the background image of the footer, select widget column layout, change the background image overlay color, etc.','olivewp' );?></li>
                    <li> <?php esc_html_e('You can use the column layouts in the footer bar and there are options of content you want to show like copyright text, footer menu and widget.','olivewp' );?></li>
                    <li> <?php esc_html_e('With the help of additional typography settings, you can use the font-weight, font-transform and line-height.','olivewp' );?></li>
                    <li> <?php esc_html_e('The theme comes with additional color settings like you can change the color of the sticky header, post meta, etc.','olivewp' );?></li>
                    <li> <?php esc_html_e('Dedicated support, widget and sidebar management.','olivewp' );?></li>
                </ul>
            </div>
        <?php
        }
    }

    $wp_customize->add_setting('olivewp_feature_des',
        array(
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'sanitize_text_field'
        )   
    );
    $wp_customize->add_control( new Document_Customize_Control( $wp_customize, 'olivewp_feature_des', 
        array(  
            'section' => 'olivewp_feature_section',
            'setting' => 'olivewp_feature_des',
        )
    ));
}
add_action( 'customize_register', 'olivewp_feature_customizer' );
?>