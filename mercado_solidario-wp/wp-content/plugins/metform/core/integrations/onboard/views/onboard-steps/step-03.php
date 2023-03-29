<div class="mf-onboard-main-header">
    <h1 class="mf-onboard-main-header--title"><strong><?php

echo esc_html__('Take your website to the next level', 'metform'); ?></strong></h1>
    <p class="mf-onboard-main-header--description"><?php echo esc_html__('We have some plugins you can install to get most from Wordpress.', 'metform'); ?></p>
    <p class="mf-onboard-main-header--description"><?php echo esc_html__('These are absolute FREE to use.', 'metform'); ?></p>
</div>

<div class="mf-onboard-plugin-list">
    <div class="attr-row">
        <?php
        $pluginStatus =  \MetForm\Core\Integrations\Onboard\Classes\Plugin_Status::instance();
        $plugins = \MetForm\Core\Integrations\Onboard\Attr::instance()->utils->get_option('settings', []);
        ?>
        <div class="attr-col-lg-8">
            <div class="mf-onboard-single-plugin badge--featured">
				<img class="badge--featured" src="<?php echo esc_url(self::get_url()); ?>assets/images/products/featured.svg">
                <label>
                    <img class="mf-onboard-single-plugin--logo" src="<?php echo esc_url(self::get_url()); ?>assets/images/products/getgenie-logo.svg" alt="<?php echo esc_html__('Fundraising', 'metform');?>">
                    <p class="mf-onboard-single-plugin--description"><span><?php echo esc_html__( 'Get FREE 1500 AI words, SEO Keyword, and Competitor Analysis credits', 'metform' )?> </span><?php echo esc_html__('on your personal AI assistant for Content & SEO right inside WordPress!', 'metform' ); ?></p>
                    <?php $plugin = $pluginStatus->get_status('getgenie/getgenie.php'); ?>
                    <a data-plugin_status="<?php echo esc_attr($plugin['status']); ?>" data-activation_url="<?php echo esc_url($plugin['activation_url']); ?>" href="<?php echo esc_url($plugin['installation_url']); ?>" class="mf-pro-btn mf-onboard-single-plugin--install_plugin <?php echo $plugin['status'] == 'activated' ? 'activated' : ''; ?>"><?php echo esc_html($plugin['title'], 'metform'); ?></a>
                </label>
            </div>
        </div>
        <div class="attr-col-lg-4">
            <div class="mf-onboard-single-plugin">
                <label>
                    <img class="mf-onboard-single-plugin--logo" src="<?php echo esc_url(self::get_url()); ?>assets/images/products/shopengine-logo.svg" alt="ShopEngine">
                    <p class="mf-onboard-single-plugin--description"><?php echo esc_html__('Completely customize your  WooCommerce WordPress', 'metform'); ?></p>
                    <?php $plugin = $pluginStatus->get_status('shopengine/shopengine.php'); ?>
                    <a data-plugin_status="<?php echo esc_attr($plugin['status']); ?>" data-activation_url="<?php echo esc_url($plugin['activation_url']); ?>" href="<?php echo esc_url($plugin['installation_url']); ?>" class="mf-pro-btn mf-onboard-single-plugin--install_plugin <?php echo $plugin['status'] == 'activated' ? 'activated' : ''; ?>"><?php echo esc_html($plugin['title'] , 'metform'); ?></a>
                </label>
            </div>
        </div>
        <div class="attr-col-lg-4">
            <div class="mf-onboard-single-plugin">
                <label>
                    <img class="mf-onboard-single-plugin--logo" src="<?php echo esc_url(self::get_url()); ?>assets/images/products/elementskit-logo.svg" alt="Metform">
                    <p class="mf-onboard-single-plugin--description"><?php echo esc_html__('All-in-One Addons for Elementor', 'metform'); ?></p>
                    <?php $plugin = $pluginStatus->get_status('elementskit-lite/elementskit-lite.php'); ?>
                    <a data-plugin_status="<?php echo esc_attr($plugin['status']); ?>" data-activation_url="<?php echo esc_url($plugin['activation_url']); ?>" href="<?php echo esc_url($plugin['installation_url']); ?>" class="mf-pro-btn mf-onboard-single-plugin--install_plugin <?php echo $plugin['status'] == 'activated' ? 'activated' : ''; ?>"><?php echo esc_html($plugin['title'], 'metform'); ?></a>
                </label>
            </div>
        </div>
        <div class="attr-col-lg-4">
            <div class="mf-onboard-single-plugin">
                <label>
                    <img class="mf-onboard-single-plugin--logo" src="<?php echo esc_url(self::get_url()); ?>assets/images/products/wp-social-logo.svg" alt="WpSocial">
                    <p class="mf-onboard-single-plugin--description"><?php echo esc_html__('Integrate all your social media to your website', 'metform'); ?></p>
                    <?php $plugin = $pluginStatus->get_status('wp-social/wp-social.php'); ?>
                    <a data-plugin_status="<?php echo esc_attr($plugin['status']); ?>" data-activation_url="<?php echo esc_url($plugin['activation_url']); ?>" href="<?php echo esc_url($plugin['installation_url']); ?>" class="mf-pro-btn mf-onboard-single-plugin--install_plugin <?php echo $plugin['status'] == 'activated' ? 'activated' : ''; ?>"><?php echo esc_html($plugin['title'], 'metform'); ?></a>
                </label>
            </div>
        </div>
        <div class="attr-col-lg-4">
            <div class="mf-onboard-single-plugin">
                <label>
                    <img class="mf-onboard-single-plugin--logo" src="<?php echo esc_url(self::get_url()); ?>assets/images/products/ultimate-review-logo.svg" alt="UltimateReview">
                    <p class="mf-onboard-single-plugin--description"><?php echo esc_html__('Integrate various styled review system in your website', 'metform'); ?></p>
                    <?php $plugin = $pluginStatus->get_status('wp-ultimate-review/wp-ultimate-review.php'); ?>
                    <a data-plugin_status="<?php echo esc_attr($plugin['status']); ?>" data-activation_url="<?php echo esc_url($plugin['activation_url']); ?>" href="<?php echo esc_url($plugin['installation_url']); ?>" class="mf-pro-btn mf-onboard-single-plugin--install_plugin <?php echo $plugin['status'] == 'activated' ? 'activated' : ''; ?>"><?php echo esc_html($plugin['title'], 'metform'); ?></a>
                </label>
            </div>
        </div>
    </div>
</div>
<div class="mf-onboard-pagination">
    <a class="mf-onboard-btn mf-onboard-pagi-btn prev" data-plugin_status="<?php echo esc_attr($plugin['status']); ?>" data-activation_url="<?php echo esc_url($plugin['activation_url']) ?>" href="#"><i class="xs-onboard-arrow-left"></i><?php echo esc_html__('Back', 'metform'); ?></a>
    <a class="mf-onboard-btn mf-onboard-pagi-btn next" data-plugin_status="<?php echo esc_attr($plugin['status']); ?>" data-activation_url="<?php echo esc_url($plugin['activation_url']) ?>" href="#"><?php echo esc_html__('Next Step', 'metform'); ?></a>
</div>
<div class="mf-onboard-shapes">
    <img src="<?php echo esc_url(self::get_url()); ?>assets/images/shape-06.png" alt="" class="shape-06">
    <img src="<?php echo esc_url(self::get_url()); ?>assets/images/shape-10.png" alt="" class="shape-10">
    <img src="<?php echo esc_url(self::get_url()); ?>assets/images/shape-11.png" alt="" class="shape-11">
    <img src="<?php echo esc_url(self::get_url()); ?>assets/images/shape-12.png" alt="" class="shape-12">
    <img src="<?php echo esc_url(self::get_url()); ?>assets/images/shape-13.png" alt="" class="shape-13">
</div>