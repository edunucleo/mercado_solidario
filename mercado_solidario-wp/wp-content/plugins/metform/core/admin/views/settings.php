<?php

defined('ABSPATH') || exit;

$settings = \MetForm\Core\Admin\Base::instance()->get_settings_option();

?>
<div class="wrap mf-settings-dashboard">
    <div class="attr-row">
        <div class="attr-col-lg-3 attr-col-sm-4 mf-setting-sidebar-column">
            <div class="mf-setting-sidebar">
                <div class="mf_setting_logo">
                    <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../images/metform_logo.png'); ?>">
                </div>
                <div class="mf-settings-tab">
                    <ul class="nav-tab-wrapper">
                        <li><a href="#" class="mf-setting-nav-link mf-setting-nav-hidden"></a></li>

                        <li>
                            <a href="#mf-dashboard_options" class="mf-setting-nav-link">
                                <div class="mf-setting-tab-content">
                                    <span class="mf-setting-title"><?php echo esc_html__('Dashboard', 'metform'); ?></span>
                                    <span class="mf-setting-subtitle"><?php echo esc_html__('All dashboard info here', 'metform'); ?></span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#mf-general_options" class="mf-setting-nav-link">
                                <div class="mf-setting-tab-content">
                                    <span class="mf-setting-title"><?php echo esc_html__('General', 'metform'); ?></span>
                                    <span class="mf-setting-subtitle"><?php echo esc_html__('All General info here', 'metform'); ?></span>
                                </div>
                            </a>
                        </li>

                        <?php if (class_exists('\MetForm_Pro\Core\Integrations\Payment\Paypal') || class_exists('\MetForm_Pro\Core\Integrations\Payment\Stripe')) : ?>
                            <li>
                                <a href="#mf-payment_options" class="mf-setting-nav-link">
                                    <div class="mf-setting-tab-content">
                                        <span class="mf-setting-title"><?php echo esc_html__('Payment', 'metform'); ?></span>
                                        <span class="mf-setting-subtitle"><?php echo esc_html__('All payment info here', 'metform'); ?></span>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="#mf-newsletter_integration" class="mf-setting-nav-link">
                                <div class="mf-setting-tab-content">
                                    <span class="mf-setting-title"><?php echo esc_html__('Newsletter Integration', 'metform'); ?></span>
                                    <span class="mf-setting-subtitle"><?php echo esc_html__('All newsletter integration info here', 'metform'); ?></span>
                                </div>
                            </a>
                        </li>
                        <?php if (class_exists('\MetForm_Pro\Core\Integrations\Google_Sheet\WF_Google_Sheet')) :?>
                        <li>
                            <a href="#mf-google_sheet_integration" class="mf-setting-nav-link">
                                <div class="mf-setting-tab-content">
                                    <span class="mf-setting-title"><?php echo esc_html__('Google Sheet Integration', 'metform'); ?></span>
                                    <span class="mf-setting-subtitle"><?php echo esc_html__('All sheets info here', 'metform'); ?></span>
                                </div>
                            </a>
                        </li>
                        <?php endif;?>
                        <?php do_action('metform_settings_tab'); ?>

                        <li><a href="#" class="mf-setting-nav-link mf-setting-nav-hidden"></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="attr-col-lg-9 attr-col-sm-8 mf-setting-main-content-column">
            <div class="metform-admin-container stuffbox">
                <div class="attr-card-body metform-admin-container--body">
                    <form action="" method="post" class="form-group mf-admin-input-text mf-admin-input-text--metform-license-key">

                        <!-- Dashboard Tab -->
                        <div class="mf-settings-section" id="mf-dashboard_options">
                            <div class="mf-settings-single-section">
                                <div class="mf-setting-header">
                                    <h3 class="mf-settings-single-section--title"><span class="mf mf-home"></span><?php esc_html_e('Dashboard', 'metform'); ?></h3>
                                    <button type="submit" name="submit" id="submit" class="mf-admin-setting-btn active"><span class="mf mf-icon-checked-fillpng"></span><?php esc_attr_e('Save Changes', 'metform'); ?></button>
                                </div>

                                <div class="mf-setting-dashboard-banner">
                                    <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../images/dashboard-banner.jpg'); ?>" class="mf-admin-dashboard-banner">
                                </div>

                                <div class="mf-set-dash-section">
                                    <div class="mf-setting-dash-section-heading">
                                        <h2 class="mf-setting-dash-section-heading--title">
                                            <?php esc_html_e('Top Notch', 'metform'); ?>
                                            <strong><?php esc_html_e('Features', 'metform'); ?></strong></h2>
                                        <span class="mf-setting-dash-section-heading--subtitle"><?php esc_html_e('features', 'metform'); ?></span>
                                        <div class="mf-setting-dash-section-heading--content">
                                            <p><?php esc_html_e('Get started by spending some time with the documentation to get familiar with ElementsKit.', 'metform') ?>
                                            </p>
                                        </div>
                                    </div> <!-- ./End Section heading -->

                                    <div class="mf-set-dash-top-notch">
                                        <div class="mf-set-dash-top-notch--item" data-count="01">
                                            <h3 class="mf-set-dash-top-notch--item__title">
                                                <?php esc_html_e('Easy to use', 'metform'); ?></h3>
                                            <p class="mf-set-dash-top-notch--item__desc">
                                                <?php esc_html_e('Get started by spending some time with the documentation to get familiar with MetForm', 'metform'); ?>
                                            </p>
                                        </div>
                                        <div class="mf-set-dash-top-notch--item" data-count="02">
                                            <h3 class="mf-set-dash-top-notch--item__title">
                                                <?php esc_html_e('Moden Typography', 'metform'); ?></h3>
                                            <p class="mf-set-dash-top-notch--item__desc">
                                                <?php esc_html_e('Get started by spending some time with the documentation to get familiar with MetForm', 'metform'); ?>
                                            </p>
                                        </div>
                                        <div class="mf-set-dash-top-notch--item" data-count="03">
                                            <h3 class="mf-set-dash-top-notch--item__title">
                                                <?php esc_html_e('Perfectly Match', 'metform'); ?></h3>
                                            <p class="mf-set-dash-top-notch--item__desc">
                                                <?php esc_html_e('Get started by spending some time with the documentation to get familiar with MetForm', 'metform'); ?>
                                            </p>
                                        </div>
                                        <div class="mf-set-dash-top-notch--item" data-count="04">
                                            <h3 class="mf-set-dash-top-notch--item__title">
                                                <?php esc_html_e('Dynamic Forms', 'metform'); ?></h3>
                                            <p class="mf-set-dash-top-notch--item__desc">
                                                <?php esc_html_e('Get started by spending some time with the documentation to get familiar with MetForm', 'metform'); ?>
                                            </p>
                                        </div>
                                        <div class="mf-set-dash-top-notch--item" data-count="05">
                                            <h3 class="mf-set-dash-top-notch--item__title">
                                                <?php esc_html_e('Create Faster', 'metform'); ?></h3>
                                            <p class="mf-set-dash-top-notch--item__desc">
                                                <?php esc_html_e('Get started by spending some time with the documentation to get familiar with MetForm', 'metform'); ?>
                                            </p>
                                        </div>
                                        <div class="mf-set-dash-top-notch--item" data-count="06">
                                            <h3 class="mf-set-dash-top-notch--item__title">
                                                <?php esc_html_e('Awesome Layout', 'metform'); ?></h3>
                                            <p class="mf-set-dash-top-notch--item__desc">
                                                <?php esc_html_e('Get started by spending some time with the documentation to get familiar with MetForm', 'metform'); ?>
                                            </p>
                                        </div>
                                    </div> <!-- ./End Section heading -->
                                </div> <!-- setting top notch section -->

                                <!-- Dashboard setting free and pro -->
                                <div id="mf-set-dash-free-pro" class="mf-set-dash-section">
                                    <div class="mf-setting-dash-section-heading">
                                        <h2 class="mf-setting-dash-section-heading--title">
                                            <?php esc_html_e('What included with Free &', 'metform'); ?>
                                            <strong><?php esc_html_e('PRO', 'metform'); ?></strong></h2>
                                        <span class="mf-setting-dash-section-heading--subtitle"><?php esc_html_e('features', 'metform'); ?></span>
                                        <div class="mf-setting-dash-section-heading--content">
                                            <p><?php esc_html_e('Get started by spending some time with the documentation to get familiar with ElementsKit.', 'metform') ?>
                                            </p>
                                        </div>
                                    </div> <!-- ./End Section heading -->

                                    <div class="mf-set-dash-free-pro-content">
                                        <ul class="attr-nav attr-nav-tabs" id="myTab" role="tablist">
                                            <li class="attr-nav-item attr-active">
                                                <a class="attr-nav-link" data-toggle="tab" href="#mf-set-feature-1"><span class="mf-icon mf mf-document"></span><?php esc_html_e('Easy to use', 'metform'); ?><span class="mf-set-dash-badge"><?php esc_html_e('Pro', 'metform'); ?></span></a>
                                            </li>
                                            <li class="attr-nav-item">
                                                <a class="attr-nav-link" data-toggle="tab" href="#mf-set-feature-2"><span class="mf-icon mf mf-document"></span><?php esc_html_e('Modern Typography', 'metform'); ?><span class="mf-set-dash-badge"><?php esc_html_e('Pro', 'metform'); ?></span></a>
                                            </li>
                                            <li class="attr-nav-item">
                                                <a class="attr-nav-link" id="contact-tab" data-toggle="tab" href="#mf-set-feature-3"><span class="mf-icon mf mf-document"></span><?php esc_html_e('Perfectly Match', 'metform'); ?><span class="mf-set-dash-badge"><?php esc_html_e('Pro', 'metform'); ?></span></a>
                                            </li>
                                        </ul>

                                        <div class="attr-tab-content" id="myTabContent">
                                            <div class="attr-tab-pane attr-fade attr-active attr-in" id="mf-set-feature-1">
                                                <div class="mf-set-dash-tab-img">
                                                    <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../images/feature-preview.png'); ?>" class="">
                                                </div>
                                                <p><?php esc_html_e('Get started by spending some time with the documentation to get familiar with MetForm Get started by spending some time with the documentation to get notification in real time.', 'metform'); ?>
                                                </p>
                                                <ul>
                                                    <li><?php esc_html_e('Success Message', 'metform'); ?></li>
                                                    <li><?php esc_html_e('Required Login', 'metform'); ?></li>
                                                    <li><?php esc_html_e('Hide Form After Submission', 'metform'); ?>
                                                    </li>
                                                    <li><?php esc_html_e('Store Entries', 'metform'); ?></li>
                                                </ul>

                                                <a href="#" class="mf-admin-setting-btn medium"><span class="mf mf-icon-checked-fillpng"></span><?php esc_html_e('View Details', 'metform'); ?></a>
                                            </div>
                                            <div class="attr-tab-pane attr-fade" id="mf-set-feature-2">
                                                <div class="mf-set-dash-tab-img">
                                                    <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../images/feature-preview.png'); ?>" class="">
                                                </div>
                                                <p><?php esc_html_e('Get started by spending some time with the documentation to get familiar with MetForm Get started by spending some time with the documentation to get notification in real time.', 'metform'); ?>
                                                </p>
                                                <ul>
                                                    <li><?php esc_html_e('Success Message', 'metform'); ?></li>
                                                    <li><?php esc_html_e('Required Login', 'metform'); ?></li>
                                                    <li><?php esc_html_e('Hide Form After Submission', 'metform'); ?>
                                                    </li>
                                                    <li><?php esc_html_e('Store Entries', 'metform'); ?></li>
                                                </ul>
                                            </div>
                                            <div class="attr-tab-pane attr-fade" id="mf-set-feature-3">
                                                <div class="mf-set-dash-tab-img">
                                                    <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../images/feature-preview.png'); ?>" class="">
                                                </div>
                                                <p><?php esc_html_e('Get started by spending some time with the documentation to get familiar with MetForm Get started by spending some time with the documentation to get notification in real time.', 'metform'); ?>
                                                </p>
                                                <ul>
                                                    <li><?php esc_html_e('Success Message', 'metform'); ?></li>
                                                    <li><?php esc_html_e('Required Login', 'metform'); ?></li>
                                                    <li><?php esc_html_e('Hide Form After Submission', 'metform'); ?>
                                                    </li>
                                                    <li><?php esc_html_e('Store Entries', 'metform'); ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Dashboard setting free and pro -->

                                <!-- Dashboard setting faq -->
                                <div id="mf-set-dash-faq" class="mf-set-dash-section">
                                    <div class="mf-setting-dash-section-heading">
                                        <h2 class="mf-setting-dash-section-heading--title">
                                            <?php esc_html_e('General Knowledge Base', 'metform'); ?></h2>
                                        <span class="mf-setting-dash-section-heading--subtitle"><?php esc_html_e('FAQ', 'metform'); ?></span>
                                        <div class="mf-setting-dash-section-heading--content">
                                            <p><?php esc_html_e('Get started by spending some time with the documentation to get familiar with ElementsKit.', 'metform') ?>
                                            </p>
                                        </div>
                                    </div> <!-- ./End Section heading -->

                                    <div class="mf-admin-accordion">
                                        <div class="mf-admin-single-accordion">
                                            <h2 class="mf-admin-single-accordion--heading">
                                                <?php esc_html_e('1. How to create a Invitation Form using MetForm?', 'metform'); ?>
                                            </h2>
                                            <div class="mf-admin-single-accordion--body">
                                                <div class="mf-admin-single-accordion--body__content">
                                                    <p><?php esc_html_e('You will get 20+ complete homepages and total 450+ blocks in our layout library and we’re continuously updating the numbers there.', 'metform') ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mf-admin-single-accordion">
                                            <h2 class="mf-admin-single-accordion--heading">
                                                <?php esc_html_e('2. How to translate language with WPML?', 'metform'); ?>
                                            </h2>
                                            <div class="mf-admin-single-accordion--body">
                                                <div class="mf-admin-single-accordion--body__content">
                                                    <p><?php esc_html_e('You will get 20+ complete homepages and total 450+ blocks in our layout library and we’re continuously updating the numbers there.', 'metform') ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mf-admin-single-accordion">
                                            <h2 class="mf-admin-single-accordion--heading">
                                                <?php esc_html_e('3. How to add custom css in specific section shortcode?', 'metform'); ?>
                                            </h2>
                                            <div class="mf-admin-single-accordion--body">
                                                <div class="mf-admin-single-accordion--body__content">
                                                    <p><?php esc_html_e('You will get 20+ complete homepages and total 450+ blocks in our layout library and we’re continuously updating the numbers there.', 'metform') ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" class="mf-admin-setting-btn fatty active"><span class="mf mf-question"></span><?php esc_html_e('View all faq’s', 'metform'); ?></a>
                                </div> <!-- Dashboard setting faq -->

                                <!-- Dashboard setting rate now -->
                                <div id="mf-set-dash-rate-now" class="mf-set-dash-section">
                                    <div class="mf-admin-right-content">

                                        <div class="mf-setting-dash-section-heading">
                                            <h2 class="mf-setting-dash-section-heading--title">
                                                <strong><?php esc_html_e('Satisfied!', 'metform'); ?></strong><br><?php esc_html_e('Don’t forget to rate our item.', 'metform'); ?>
                                            </h2>
                                            <span class="mf-setting-dash-section-heading--subtitle"><?php esc_html_e('review', 'metform'); ?></span>
                                            <div class="mf-setting-dash-section-heading--content">
                                                <p></p>
                                            </div>
                                        </div> <!-- ./End Section heading -->
                                        <div class="mf-admin-right-content--button">
                                            <a target="_blank" href="https://wordpress.org/support/plugin/metform/reviews/?rate=5#new-post" class="mf-admin-setting-btn fatty"><span class="mf mf-star-1"></span><?php esc_html_e('Rate it now', 'metform'); ?></a>
                                        </div>
                                    </div>

                                    <div class="mf-admin-left-thumb">
                                        <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../images/rate-now-thumb.png'); ?>" alt="<?php esc_attr_e('Rate Now Thumb', 'metform'); ?>">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- General Tab -->
                        <div class="mf-settings-section" id="mf-general_options">
                            <div class="mf-settings-single-section">
                                <div class="mf-setting-header">
                                    <h3 class="mf-settings-single-section--title"><span class="mf mf-settings"></span><?php esc_html_e('General', 'metform'); ?></h3>
                                    <button type="submit" name="submit" id="submit" class="mf-admin-setting-btn active"><span class="mf mf-icon-checked-fillpng"></span><?php esc_attr_e('Save Changes', 'metform'); ?></button>
                                </div>
                                <div class="attr-form-group">
                                    <div class="mf-setting-tab-nav">
                                        <ul class="attr-nav attr-nav-tabs" id="nav-tab" role="attr-tablist">
                                            <li class="attr-active attr-in">
                                                <a class="attr-nav-item attr-nav-link" data-toggle="tab" href="#mf-recaptcha-tab" role="tab"><?php esc_attr_e('reCaptcha', 'metform'); ?></a>
                                            </li>

                                            <?php if (class_exists('\MetForm_Pro\Base\Package')) : ?>
                                                <li>
                                                    <a class="attr-nav-item attr-nav-link" data-toggle="tab" href="#mf-map-tab" role="tab" aria-controls="nav-profile" aria-selected="false"><?php esc_html_e('Map', 'metform'); ?></a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if (class_exists('\MetForm_Pro\Base\Package')) : ?>
                                                <li>
                                                    <a class="attr-nav-item attr-nav-link" data-toggle="tab" href="#mf-other-tab" role="tab" aria-controls="nav-profile" aria-selected="false"><?php esc_html_e('Others', 'metform'); ?></a>
                                                </li>
                                            <?php endif; ?>

                                            
                                        </ul>
                                    </div>

                                    <div class="attr-tab-content" id="nav-tabContent">
                                        <div class="attr-tab-pane attr-fade attr-active attr-in" id="mf-recaptcha-tab" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="attr-row">
                                                <div class="attr-col-lg-6">
                                                    <div class="mf-setting-input-group">
                                                        <label class="mf-setting-label" for="captcha-method"><?php esc_html_e('Select version:', 'metform'); ?></label>
                                                        <div class="mf-setting-select-container">
                                                            <select name="mf_recaptcha_version" class="mf-setting-input attr-form-control mf-recaptcha-version" id="captcha-method">
                                                                <option <?php echo esc_attr((isset($settings['mf_recaptcha_version']) && ($settings['mf_recaptcha_version'] == 'recaptcha-v2')) ? 'Selected' : ''); ?> value="recaptcha-v2">
                                                                    <?php esc_html_e('reCAPTCHA V2', 'metform'); ?>
                                                                </option>
                                                                <option <?php echo esc_attr((isset($settings['mf_recaptcha_version']) && ($settings['mf_recaptcha_version'] == 'recaptcha-v3')) ? 'Selected' : ''); ?> value="recaptcha-v3">
                                                                    <?php esc_html_e('reCAPTCHA V3', 'metform'); ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <p class="description">
                                                            <?php esc_html_e('Select google reCaptcha version which one want to use.', 'metform'); ?>
                                                        </p>
                                                    </div>

                                                    <div class="mf-recaptcha-settings-wrapper">
                                                        <div class="mf-recaptcha-settings" id="mf-recaptcha-v2">
                                                            <div class="mf-setting-input-group">
                                                                <label class="mf-setting-label"><?php esc_html_e('Site key:', 'metform'); ?>
                                                                </label>
                                                                <input type="text" name="mf_recaptcha_site_key" value="<?php echo esc_attr((isset($settings['mf_recaptcha_site_key'])) ? $settings['mf_recaptcha_site_key'] : ''); ?>" class="mf-setting-input attr-form-control mf-recaptcha-site-key" placeholder="<?php esc_html_e('Insert site key', 'metform'); ?>">
                                                                <p class="description">
                                                                    <?php esc_html_e('Create google reCaptcha site key from reCaptcha admin panel. ', 'metform'); ?><a target="__blank" class="mf-setting-btn-link" href="<?php echo esc_url('https://www.google.com/recaptcha/admin/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform'); ?></a>
                                                                </p>
                                                            </div>
                                                            <div class="mf-setting-input-group">
                                                                <label class="mf-setting-label"><?php esc_html_e('Secret key:', 'metform'); ?>
                                                                </label>
                                                                <input type="text" name="mf_recaptcha_secret_key" value="<?php echo esc_attr((isset($settings['mf_recaptcha_secret_key'])) ? $settings['mf_recaptcha_secret_key'] : ''); ?>" class="mf-setting-input attr-form-control mf-recaptcha-secret-key" placeholder="<?php esc_html_e('Insert secret key', 'metform'); ?>">
                                                                <p class="description">
                                                                    <?php esc_html_e('Create google reCaptcha secret key from reCaptcha admin panel. ', 'metform'); ?><a target="__blank" class="mf-setting-btn-link" href="<?php echo esc_url('https://www.google.com/recaptcha/admin/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform'); ?></a>
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="mf-recaptcha-settings" id="mf-recaptcha-v3">
                                                            <div class="mf-setting-input-group">
                                                                <label class="mf-setting-label"><?php esc_html_e('Site key:', 'metform'); ?>
                                                                </label>
                                                                <input type="text" name="mf_recaptcha_site_key_v3" value="<?php echo esc_attr((isset($settings['mf_recaptcha_site_key_v3'])) ? $settings['mf_recaptcha_site_key_v3'] : ''); ?>" class="mf-setting-input attr-form-control mf-recaptcha-site-key" placeholder="<?php esc_html_e('Insert site key', 'metform'); ?>">
                                                                <p class="description">
                                                                    <?php esc_html_e('Create google reCaptcha site key from reCaptcha admin panel. ', 'metform'); ?><a target="__blank" class="mf-setting-btn-link" href="<?php echo esc_url('https://www.google.com/recaptcha/admin/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform'); ?></a>
                                                                </p>
                                                            </div>
                                                            <div class="mf-setting-input-group">
                                                                <label class="mf-setting-label"><?php esc_html_e('Secret key:', 'metform'); ?>
                                                                </label>
                                                                <input type="text" name="mf_recaptcha_secret_key_v3" value="<?php echo esc_attr((isset($settings['mf_recaptcha_secret_key_v3'])) ? $settings['mf_recaptcha_secret_key_v3'] : ''); ?>" class="mf-setting-input attr-form-control mf-recaptcha-secret-key" placeholder="<?php esc_html_e('Insert secret key', 'metform'); ?>">
                                                                <p class="description">
                                                                    <?php esc_html_e('Create google reCaptcha secret key from reCaptcha admin panel. ', 'metform'); ?><a target="__blank" class="mf-setting-btn-link" href="<?php echo esc_url('https://www.google.com/recaptcha/admin/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform'); ?></a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if (class_exists('\MetForm_Pro\Base\Package')) : ?>
                                            <div class="attr-tab-pane attr-fade" id="mf-map-tab" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <div class="attr-row">
                                                    <div class="attr-col-lg-6">
                                                        <div class="mf-setting-input-group">
                                                            <label class="mf-setting-label"><?php esc_html_e('API:', 'metform'); ?>
                                                            </label>
                                                            <input type="text" name="mf_google_map_api_key" value="<?php echo esc_attr((isset($settings['mf_google_map_api_key'])) ? $settings['mf_google_map_api_key'] : ''); ?>" class="mf-setting-input attr-form-control mf-google-map-api-key" placeholder="<?php esc_html_e('Insert map API key', 'metform'); ?>">
                                                            <p class="description">
                                                                <?php esc_html_e('Create google map API key from google developer console. ', 'metform'); ?><a target="__blank" class="mf-setting-btn-link" href="<?php echo esc_url('https://console.cloud.google.com/google/maps-apis/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform'); ?></a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (class_exists('\MetForm_Pro\Base\Package')) : ?>
                                            <div class="attr-tab-pane attr-fade mf-other-tab" id="mf-other-tab" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <div class="attr-row">
                                                    <div class="attr-col-lg-4">
                                                        <div class="mf-setting-input-group">
												 <label class="mf-setting-label mf-setting-switch">
													<input type="checkbox" name="mf_save_progress" value="1" class="attr-form-control" <?php echo esc_attr((isset($settings['mf_save_progress'])) ? 'Checked' : ''); ?>   />
													<span><?php esc_html_e('Save Form Progress ?', 'metform'); ?></span>
												 </label>
                                                        </div>
                                                    </div>
                                                </div>
									   <p class="description">
											<?php esc_html_e('Turn this feature on if you want partial submissions to be saved for a form so that the user can complete the form submission later. ', 'metform'); ?> <br>
											<span class="description-highlight"><?php esc_html_e('Please note ', 'metform') ?></span><?php esc_html_e('that the submissions will be saved for 2 hours, after which the form submissions will be reset. ', 'metform'); ?>
										</p>
                                            </div>
                                        <?php endif; ?>

                                        
                                  
                                  
                                  
                                  
                                        </div>
                                </div>
                            </div>

                        </div>
                        <!-- ./End General Tab -->

                        <!-- Payment Tab -->
                        <?php if (class_exists('\MetForm_Pro\Core\Integrations\Payment\Paypal')) : ?>
                        <div class="mf-settings-section" id="mf-payment_options">
                            <div class="mf-settings-single-section">
                                
                                    <div class="mf-setting-header">
                                        <h3 class="mf-settings-single-section--title"><span class="mf mf-settings"></span><?php esc_html_e('Payment', 'metform'); ?></h3>
                                        <button type="submit" name="submit" id="submit" class="mf-admin-setting-btn active"><span class="mf mf-icon-checked-fillpng"></span><?php esc_attr_e('Save Changes', 'metform'); ?></button>
                                    </div>

                                    <div class="mf-setting-tab-nav">
                                        <ul class="attr-nav attr-nav-tabs" id="nav-tab" role="attr-tablist">
                                            <li class="attr-active attr-in">
                                                <a class="attr-nav-item attr-nav-link" id="mf-paypal-tab-label" data-toggle="tab" href="#mf-paypal-tab" role="tab"><?php esc_attr_e('Paypal', 'metform'); ?></a>
                                            </li>

                                            <?php if (class_exists('\MetForm_Pro\Core\Integrations\Payment\Stripe')) : ?>
                                                <li>
                                                    <a class="attr-nav-item attr-nav-link" id="mf-stripe-tab-label" data-toggle="tab" href="#attr-stripe-tab" role="tab" aria-controls="nav-profile" aria-selected="false"><?php esc_html_e('Stripe', 'metform'); ?></a>
                                                </li>
                                            <?php endif; ?>

                                            <li>
                                                <a class="attr-nav-item attr-nav-link" id="mf-thankyou-tab-label" data-toggle="tab" href="#mf-thankyou-tab" role="tab"><?php esc_attr_e('Thank You Page', 'metform'); ?></a>
                                            </li>
                                            <li>
                                                <a class="attr-nav-item attr-nav-link" id="mf-cancel-tab-label" data-toggle="tab" href="#mf-cancel-tab" role="tab"><?php esc_attr_e('Cancel Page', 'metform'); ?></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="attr-form-group">
                                        <div class="attr-tab-content" id="nav-tabContent">
                                            <div class="attr-tab-pane attr-fade attr-active attr-in" id="mf-paypal-tab" role="tabpanel" aria-labelledby="mf-paypal-tab-label">
                                                <div class="attr-row">
                                                    <div class="attr-col-lg-6">
                                                        <div class="mf-setting-input-group">
                                                            <label class="mf-setting-label"><?php esc_html_e('Paypal email:', 'metform'); ?></label>
                                                            <input type="email" name="mf_paypal_email" value="<?php echo esc_attr((isset($settings['mf_paypal_email'])) ? $settings['mf_paypal_email'] : ''); ?>" class="mf-setting-input mf-paypal-email attr-form-control" placeholder="<?php esc_html_e('Paypal email', 'metform'); ?>">
                                                            <p class="description">
                                                                <?php esc_html_e('Enter here your paypal email. ', 'metform'); ?><a class="mf-setting-btn-link" target="__blank" href="<?php echo esc_url('https://www.paypal.com/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform'); ?></a>
                                                            </p>
                                                        </div>

                                                        <div class="mf-setting-input-group">
                                                            <label class="mf-setting-label"><?php esc_html_e('Paypal token:', 'metform'); ?></label>
                                                            <input type="text" name="mf_paypal_token" value="<?php echo esc_attr((isset($settings['mf_paypal_token'])) ? $settings['mf_paypal_token'] : ''); ?>" class="mf-setting-input mf-paypal-token attr-form-control" placeholder="<?php esc_html_e('Paypal token', 'metform'); ?>">
                                                            <p class="description">
                                                                <?php esc_html_e('Enter here your paypal token. This is optional. ', 'metform'); ?><a class="mf-setting-btn-link" target="__blank" href="<?php echo esc_url('https://www.paypal.com/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform'); ?></a>
                                                            </p>
                                                        </div>

                                                        <div class="mf-setting-input-group">
                                                            <label class="mf-setting-label"><?php esc_html_e('Enable sandbox mode:', 'metform'); ?>
                                                                <input type="checkbox" value="1" name="mf_paypal_sandbox" <?php echo esc_attr((isset($settings['mf_paypal_sandbox'])) ? 'Checked' : ''); ?> class="mf-admin-control-input mf-form-modalinput-paypal_sandbox">
                                                                <p class="description">
                                                                    <?php esc_html_e('Enable this for testing payment method. ', 'metform'); ?>
                                                                </p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if (class_exists('\MetForm_Pro\Core\Integrations\Payment\Stripe')) : ?>
                                                <div class="attr-tab-pane attr-fade" id="attr-stripe-tab" role="tabpanel" aria-labelledby="mf-stripe-tab-label">
                                                    <div class="attr-row">
                                                        <div class="attr-col-lg-6">
                                                            <div class="mf-setting-input-group">
                                                                <label for="attr-input-label" class="mf-setting-label attr-input-label"><?php esc_html_e('Image url:', 'metform'); ?></label>
                                                                <input type="text" name="mf_stripe_image_url" value="<?php echo esc_attr((isset($settings['mf_stripe_image_url'])) ? $settings['mf_stripe_image_url'] : ''); ?>" class="mf-setting-input mf-stripe-image-url attr-form-control" placeholder="<?php esc_html_e('Stripe image url', 'metform'); ?>">
                                                                <p class="description">
                                                                    <?php esc_html_e('Enter here your stripe image url. This image will show on stripe payment pop up modal. ', 'metform'); ?>
                                                                </p>
                                                            </div>

                                                            <div class="mf-setting-input-group">
                                                                <label for="attr-input-label" class="mf-setting-label attr-input-label"><?php esc_html_e('Live publishiable key:', 'metform'); ?></label>
                                                                <input type="text" name="mf_stripe_live_publishiable_key" value="<?php echo esc_attr((isset($settings['mf_stripe_live_publishiable_key'])) ? $settings['mf_stripe_live_publishiable_key'] : ''); ?>" class="mf-setting-input mf-stripe-live-publishiable-key attr-form-control" placeholder="<?php esc_html_e('Stripe live publishiable key', 'metform'); ?>">
                                                                <p class="description">
                                                                    <?php esc_html_e('Enter here your stripe live publishiable key. ', 'metform'); ?><a class="mf-setting-btn-link" target="__blank" href="<?php echo esc_url('https://stripe.com/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform'); ?></a>
                                                                </p>
                                                            </div>

                                                            <div class="mf-setting-input-group">
                                                                <label for="attr-input-label" class="mf-setting-label attr-input-label"><?php esc_html_e('Live secret key:', 'metform'); ?></label>
                                                                <input type="text" name="mf_stripe_live_secret_key" value="<?php echo esc_attr((isset($settings['mf_stripe_live_secret_key'])) ? $settings['mf_stripe_live_secret_key'] : ''); ?>" class="mf-setting-input mf-stripe-live-secret-key attr-form-control" placeholder="<?php esc_html_e('Stripe live secret key', 'metform'); ?>">
                                                                <p class="description">
                                                                    <?php esc_html_e('Enter here your stripe live secret key. ', 'metform'); ?><a target="__blank" class="mf-setting-btn-link" href="<?php echo esc_url('https://stripe.com/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform'); ?></a>
                                                                </p>
                                                            </div>

                                                            <div class="mf-setting-input-group">
                                                                <label class="mf-setting-label attr-input-label">
                                                                    <?php esc_html_e('Enable sandbox mode:', 'metform'); ?>
                                                                    <input type="checkbox" value="1" name="mf_stripe_sandbox" <?php echo esc_attr((isset($settings['mf_stripe_sandbox'])) ? 'Checked' : ''); ?> class="mf-admin-control-input mf-form-modalinput-stripe_sandbox">
                                                                    <p class="description">
                                                                        <?php esc_html_e('Enable this for testing your payment system. ', 'metform'); ?>
                                                                    </p>
                                                                </label>
                                                            </div>

                                                            <div class="mf-form-modalinput-stripe_sandbox_keys">
                                                                <div class="mf-setting-input-group">
                                                                    <label for="attr-input-label" class="mf-setting-label attr-input-label"><?php esc_html_e('Test publishiable key:', 'metform'); ?></label>
                                                                    <input type="text" name="mf_stripe_test_publishiable_key" value="<?php echo esc_attr((isset($settings['mf_stripe_test_publishiable_key'])) ? $settings['mf_stripe_test_publishiable_key'] : ''); ?>" class="mf-setting-input mf-stripe-test-publishiable-key attr-form-control" placeholder="<?php esc_html_e('Stripe test publishiable key', 'metform'); ?>">
                                                                    <p class="description">
                                                                        <?php esc_html_e('Enter here your test publishiable key. ', 'metform'); ?><a class="mf-setting-btn-link" target="__blank" href="<?php echo esc_url('https://stripe.com/', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform'); ?></a>
                                                                    </p>
                                                                </div>
                                                                <div class="mf-setting-input-group">
                                                                    <label for="attr-input-label" class="mf-setting-label attr-input-label"><?php esc_html_e('Test secret key:', 'metform'); ?></label>
                                                                    <input type="text" name="mf_stripe_test_secret_key" value="<?php echo esc_attr((isset($settings['mf_stripe_test_secret_key'])) ? $settings['mf_stripe_test_secret_key'] : ''); ?>" class="mf-setting-input mf-stripe-test-secret-key attr-form-control" placeholder="<?php esc_html_e('Stripe test secret key', 'metform'); ?>">
                                                                    <p class="description">
                                                                        <?php esc_html_e('Enter here your test secret key. ', 'metform'); ?><a target="__blank" class="mf-setting-btn-link" href="<?php echo esc_url('https://stripe.com/'); ?>"><?php esc_html_e('Create from here', 'metform'); ?></a>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                                <!-- Thank you page section -->
                                                <div class="attr-tab-pane attr-fade" id="mf-thankyou-tab" role="tabpanel" aria-labelledby="mf-thankyou-tab-label">
                                                    <div class="attr-row">
                                                        <div class="attr-col-lg-6">
                                                            <div class="mf-setting-input-group">
                                                            <h3><?php esc_html_e('Select Thank You Page :', 'metform'); ?></h3>
                                                                <?php $page_ids = get_all_page_ids(); ?>
                                                                <select name="mf_thank_you_page" class="mf-setting-input attr-form-control">
                                                                        <option value=""><?php esc_html_e('Select a page', 'metform'); ?></option>
                                                                    <?php foreach ($page_ids as $page) : ?>
                                                                        <option <?php 
                                                                        if(isset($settings['mf_thank_you_page'])){
                                                                            if ($settings['mf_thank_you_page'] == $page) {
                                                                                echo 'selected';
                                                                            } 
                                                                        }
                                                                        ?> value="<?php echo esc_attr($page); ?>"> <?php echo esc_html(get_the_title($page)); ?>
                                                                        <?php endforeach; ?>
                                                                </select>
                                                                <br><br>
                                                                <p><?php echo wp_kses_post(__('Handle successfull payment redirection page. Learn more about Thank you page', 'metform') . '<a href="https://help.wpmet.com/docs/thank-you-page/" target="_blank">'. __('Here', 'metform') .'</a>'); ?></p>
                                                                <a class="mf-setting-btn-link" href="<?php echo esc_url(get_admin_url() . 'post-new.php?post_type=page'); ?>"><?php esc_html_e('Create Thank You Page', 'metform'); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Thank you page section -->
                                                <div class="attr-tab-pane attr-fade" id="mf-cancel-tab" role="tabpanel" aria-labelledby="mf-cancel-tab-label">
                                                    <div class="attr-row">
                                                        <div class="attr-col-lg-6">
                                                            <div class="mf-setting-input-group">
                                                            <h3><?php esc_html_e('Select Cancel Page :', 'metform'); ?></h3>
                                                                <?php $page_ids = get_all_page_ids(); ?>
                                                                <select name="mf_cancel_page" class="mf-setting-input attr-form-control">
                                                                    <option value=""><?php esc_html_e('Select a page', 'metform'); ?></option>
                                                                    <?php foreach ($page_ids as $page) : 
                                                                        ?>
                                                                        <option <?php 
                                                                        if(isset($settings['mf_cancel_page'])){
                                                                            if ($settings['mf_cancel_page'] == $page) {
                                                                                echo 'selected';
                                                                            } 
                                                                        }
                                                                        ?> value="<?php echo esc_attr($page); ?>"> <?php echo esc_html(get_the_title($page)); ?>
                                                                        <?php endforeach; ?>
                                                                </select>
                                                                <br><br>
                                                                <p><?php esc_html_e('Handle canceled payment redirection page. Learn more about cancel page.', 'metform'); ?></p>
                                                                <a class="mf-setting-btn-link" href="<?php echo esc_url(get_admin_url() . 'post-new.php?post_type=page'); ?>"><?php esc_html_e('Create Cancel Page', 'metform'); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                            <?php endif; ?>
                       
                        <!-- ./End Payment Tab -->

                        <!-- newsletter Integration Tab -->
                        <div class="mf-settings-section" id="mf-newsletter_integration">
                            <div class="mf-settings-single-section">
                                <?php if (class_exists('\MetForm\Core\Integrations\Mail_Chimp')) : ?>
                                    <div class="mf-setting-header">
                                        <h3 class="mf-settings-single-section--title"><span class="mf mf-settings"></span><?php esc_html_e('Newsletter Integration', 'metform'); ?>
                                        </h3>
                                        <button type="submit" name="submit" id="submit" class="mf-admin-setting-btn active"><span class="mf mf-icon-checked-fillpng"></span><?php esc_attr_e('Save Changes', 'metform'); ?></button>
                                    </div>


                                    <div class="mf-setting-tab-nav">
                                        <ul class="attr-nav attr-nav-tabs" id="nav-tab" role="attr-tablist">
                                            <li class="attr-active attr-in">
                                                <a class="attr-nav-item attr-nav-link" data-toggle="tab" href="#mf-mailchimp-tab" role="tab"><?php esc_attr_e('Mailchimp', 'metform'); ?></a>
                                            </li>

                                            <?php if (did_action('xpd_metform_pro/plugin_loaded')) : ?>
                                                <li>
                                                    <a class="attr-nav-item attr-nav-link" data-toggle="tab" href="#attr-aweber-tab" role="tab" aria-controls="nav-profile" aria-selected="false"><?php esc_html_e('AWeber', 'metform'); ?></a>
                                                </li>

                                                <li>
                                                    <a class="attr-nav-item attr-nav-link" data-toggle="tab" href="#attr-activeCampaign-tab" role="tab" aria-controls="nav-contact" aria-selected="false"><?php esc_html_e('ActiveCampaign', 'metform'); ?></a>
                                                </li>

                                                <li>
                                                    <a class="attr-nav-item attr-nav-link" data-toggle="tab" href="#attr-getresponse-tab" role="tab" aria-controls="nav-contact" aria-selected="false"><?php esc_html_e('Get Response', 'metform'); ?></a>
                                                </li>

                                                <li>
                                                    <a class="attr-nav-item attr-nav-link" data-toggle="tab" href="#attr-ckit-tab" role="tab" aria-controls="nav-profile" aria-selected="false"><?php esc_html_e('ConvertKit', 'metform'); ?></a>
                                                </li>

	                                            <?php   do_action( 'get_pro_settings_tab_for_newsletter_integration' ); ?>

                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <div class="attr-form-group">
                                        <div class="attr-tab-content" id="nav-tabContent">
                                            <div class="attr-tab-pane attr-fade attr-active attr-in" id="mf-mailchimp-tab" role="tabpanel" aria-labelledby="nav-home-tab">

                                                <div class="attr-row">
                                                    <div class="attr-col-lg-6">
                                                        <div class="mf-setting-input-group">
                                                            <label for="attr-input-label" class="mf-setting-label mf-setting-label attr-input-label"><?php esc_html_e('API Key:', 'metform'); ?></label>
                                                            <input type="text" name="mf_mailchimp_api_key" value="<?php echo esc_attr((isset($settings['mf_mailchimp_api_key'])) ? $settings['mf_mailchimp_api_key'] : ''); ?>" class="mf-setting-input mf-mailchimp-api-key attr-form-control" placeholder="<?php esc_html_e('Mailchimp API key', 'metform'); ?>">
                                                            <p class="description">
                                                                <?php esc_html_e('Enter here your Mailchimp API key. ', 'metform'); ?><a target="__blank" class="mf-setting-btn-link" href="<?php echo esc_url('https://admin.mailchimp.com/'); ?>"><?php esc_html_e('Get API.', 'metform'); ?></a>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="attr-col-lg-6">
                                                        <div class="mf-setting-input-desc">
                                                            <div class="mf-setting-input-desc-data">
                                                                <h2 class="mf-setting-input-desc--title">
                                                                    <?php esc_html_e('How To', 'metform') ?></h2>
                                                                <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'metform') ?>
                                                                </p>
                                                                <ol>
                                                                    <li><?php esc_html_e('Item 1', 'metform') ?></li>
                                                                    <li><?php esc_html_e('Item 2', 'metform') ?></li>
                                                                    <li><?php esc_html_e('Item 3', 'metform') ?></li>
                                                                </ol>
                                                            </div>
                                                            <a href="https://help.wpmet.com/docs-cat/metform/" class="mf-setting-btn-link" target="_blank"><?php esc_html_e('View Documentation', 'metform'); ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if (did_action('xpd_metform_pro/plugin_loaded')) : ?>

                                                <div class="attr-tab-pane attr-fade" id="attr-aweber-tab" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                    <div class="attr-row">
                                                        <div class="attr-col-lg-6">

                                                            <div class="mf-setting-input-group">
                                                                <label for="attr-input-label" class="mf-setting-label mf-setting-label attr-input-label"><?php esc_html_e('Developer App ID:', 'metform'); ?></label>
                                                                <input type="text" <?php echo esc_attr($disabledAttr); ?> name="mf_aweber_dev_api_key" id="mf_aweber_dev_api_key" value="<?php echo esc_attr((isset($settings['mf_aweber_dev_api_key'])) ? $settings['mf_aweber_dev_api_key'] : ''); ?>" class="mf-setting-input mf-mailchimp-api-key attr-form-control" placeholder="<?php esc_html_e('AWeber developer client Id key', 'metform'); ?>">
                                                                <p class="description">
                                                                    <?php esc_html_e('Enter here your Aweber developer app key. ', 'metform'); ?><a target="__blank" class="mf-setting-btn-link" href="<?php echo esc_url('https://labs.aweber.com/apps/'); ?>"><?php esc_html_e('Get API.', 'metform'); ?></a>
                                                                </p>
                                                            </div>

                                                            <div class="mf-setting-input-group">
                                                                <label for="attr-input-label" class="mf-setting-label mf-setting-label attr-input-label"><?php esc_html_e('Developer App Secret:', 'metform');  ?> </label>
                                                                <input type="text" <?php echo esc_attr($disabledAttr); ?> id="mf_aweber_dev_api_sec" name="mf_aweber_dev_api_sec" value="<?php echo esc_attr((isset($settings['mf_aweber_dev_api_sec'])) ? $settings['mf_aweber_dev_api_sec'] : ''); ?>" class="mf-setting-input mf-mailchimp-api-key attr-form-control" placeholder="<?php esc_html_e('AWeber developer secret key', 'metform'); ?>">
                                                                <p class="description">
                                                                    <?php esc_html_e('Enter here your Aweber developer secret key. ', 'metform'); ?><a target="__blank" class="mf-setting-btn-link" href="<?php echo esc_url('https://labs.aweber.com/apps/'); ?>"><?php esc_html_e('Get API.', 'metform'); ?></a>
                                                                </p>
                                                            </div>

                                                            <div class="mf-setting-input-group">
                                                                <label for="attr-input-label" class="mf-setting-label mf-setting-label attr-input-label"><?php esc_html_e('Redirect url:', 'metform'); ?></label>
                                                                <p class="description">
			                                                        <?php echo esc_url(get_admin_url() . 'admin.php?page=metform-menu-settings'); ?>
                                                                </p>
                                                            </div>

                                                            <?php if (!empty($code)) : ?>
                                                                <div class="mf-setting-input-group">
                                                                    <p class="description">
                                                                        <a id="met_pro_aweber_propmpt_re_auth" class="button-primary mf-setting-btn"> Re Authorize </a>
                                                                    </p>
                                                                </div>
                                                            <?php else : ?>
                                                                <div class="mf-setting-input-group">

                                                                    <p class="description">
                                                                        <button class="mf-setting-btn-link" id="met_pro_aweber_authorize"> Get Authorization URL
                                                                        </button>
                                                                    </p>
                                                                </div>
                                                            <?php endif; ?>

                                                        </div>
                                                        <div class="attr-col-lg-6">
                                                            <div class="mf-setting-input-desc">
                                                                <div class="mf-setting-input-desc-data">
                                                                    <h2 class="mf-setting-input-desc--title">
                                                                        <?php esc_html_e('How To', 'metform') ?></h2>
                                                                    <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'metform') ?>
                                                                    </p>
                                                                    <ol>
                                                                        <li><?php esc_html_e('Item 1', 'metform') ?></li>
                                                                        <li><?php esc_html_e('Item 2', 'metform') ?></li>
                                                                        <li><?php esc_html_e('Item 3', 'metform') ?></li>
                                                                    </ol>
                                                                </div>
                                                                <a href="https://help.wpmet.com/docs-cat/metform/" class="mf-setting-btn-link" target="_blank"><?php esc_html_e('View Documentation', 'metform'); ?></a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="attr-tab-pane attr-fade" id="attr-ckit-tab" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                    <div class="attr-row">
                                                        <div class="attr-col-lg-6">
                                                            <div class="mf-setting-input-group">
                                                                <label for="attr-input-label" class="mf-setting-label mf-setting-label attr-input-label"><?php esc_html_e('API Key:', 'metform'); ?></label>
                                                                <input type="text" name="mf_ckit_api_key" value="<?php echo esc_attr((isset($settings['mf_ckit_api_key'])) ? $settings['mf_ckit_api_key'] : ''); ?>" class="mf-setting-input mf-mailchimp-api-key attr-form-control" placeholder="<?php esc_html_e('ConvertKit API key', 'metform'); ?>">
                                                                <p class="description">
                                                                    <?php esc_html_e('Enter here your ConvertKit API key. ', 'metform'); ?><a target="__blank" class="mf-setting-btn-link" href="<?php echo esc_url('https://app.convertkit.com/users/login'); ?>"><?php esc_html_e('Get API.', 'metform'); ?></a>
                                                                </p>
                                                            </div>


                                                            <div class="mf-setting-input-group">
                                                                <label for="attr-input-label" class="mf-setting-label mf-setting-label attr-input-label"><?php esc_html_e('Secret Key:', 'metform'); ?></label>
                                                                <input type="text" name="mf_ckit_sec_key" value="<?php echo esc_attr((isset($settings['mf_ckit_sec_key'])) ? $settings['mf_ckit_sec_key'] : ''); ?>" class="mf-setting-input mf-mailchimp-api-key attr-form-control" placeholder="<?php esc_html_e('ConvertKit API key', 'metform'); ?>">
                                                                <p class="description">
                                                                    <?php esc_html_e('Enter here your ConvertKit API key. ', 'metform'); ?><a target="__blank" class="mf-setting-btn-link" href="<?php echo esc_url('https://app.convertkit.com/users/login'); ?>"><?php esc_html_e('Get API.', 'metform'); ?></a>
                                                                </p>
                                                            </div>


                                                        </div>
                                                        <div class="attr-col-lg-6">
                                                            <div class="mf-setting-input-desc">
                                                                <div class="mf-setting-input-desc-data">
                                                                    <h2 class="mf-setting-input-desc--title">
                                                                        <?php esc_html_e('How To', 'metform') ?></h2>
                                                                    <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'metform') ?>
                                                                    </p>
                                                                    <ol>
                                                                        <li><?php esc_html_e('Item 1', 'metform') ?></li>
                                                                        <li><?php esc_html_e('Item 2', 'metform') ?></li>
                                                                        <li><?php esc_html_e('Item 3', 'metform') ?></li>
                                                                    </ol>
                                                                </div>
                                                                <a href="https://help.wpmet.com/docs-cat/metform/" class="mf-setting-btn-link" target="_blank"><?php esc_html_e('View Documentation', 'metform'); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

	                                            <?php   do_action( 'get_pro_settings_tab_content_for_newsletter_integration', $settings ); ?>

                                            <?php endif; ?>

                                            <div class="attr-tab-pane  attr-fade" id="attr-activeCampaign-tab" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                <div class="attr-row">
                                                    <?php if (class_exists('\MetForm_Pro\Core\Integrations\Email\Activecampaign\Active_Campaign')) : ?>
                                                        <div class="attr-col-lg-6">
                                                        <div class="mf-setting-input-group">
                                                                <label for="attr-input-label" class="mf-setting-label mf-setting-label attr-input-label"><?php esc_html_e('API URL:', 'metform'); ?></label>
                                                                <input type="text" name="mf_active_campaign_url" value="<?php echo esc_attr((isset($settings['mf_active_campaign_url'])) ? $settings['mf_active_campaign_url'] : ''); ?>" class="mf-setting-input mf-mailchimp-api-key attr-form-control" placeholder="<?php esc_html_e('ActiveCampaign API URL', 'metform'); ?>">
                                                                <p class="description">
                                                                    <?php esc_html_e('Enter here your ActiveCampaign API key. ', 'metform'); ?><a target="__blank" class="mf-setting-btn-link" href="<?php echo esc_url('https://www.activecampaign.com/'); ?>"><?php esc_html_e('Get API.', 'metform'); ?></a>
                                                                </p>
                                                            </div>

                                                            <div class="mf-setting-input-group">
                                                                <label for="attr-input-label" class="mf-setting-label mf-setting-label attr-input-label"><?php esc_html_e('API Key:', 'metform'); ?></label>
                                                                <input type="text" name="mf_active_campaign_api_key" value="<?php echo esc_attr((isset($settings['mf_active_campaign_api_key'])) ? $settings['mf_active_campaign_api_key'] : ''); ?>" class="mf-setting-input mf-mailchimp-api-key attr-form-control" placeholder="<?php esc_html_e('ActiveCampaign API key', 'metform'); ?>">
                                                                <p class="description">
                                                                    <?php esc_html_e('Enter here your ActiveCampaign API key. ', 'metform'); ?><a target="__blank" class="mf-setting-btn-link" href="<?php echo esc_url('https://www.activecampaign.com/'); ?>"><?php esc_html_e('Get API.', 'metform'); ?></a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="attr-col-lg-6">
                                                            <div class="mf-setting-input-desc">
                                                                <div class="mf-setting-input-desc-data">
                                                                    <h2 class="mf-setting-input-desc--title">
                                                                        <?php esc_html_e('How To', 'metform') ?></h2>
                                                                    <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'metform') ?>
                                                                    </p>
                                                                    <ol>
                                                                        <li><?php esc_html_e('Item 1', 'metform') ?></li>
                                                                        <li><?php esc_html_e('Item 2', 'metform') ?></li>
                                                                        <li><?php esc_html_e('Item 3', 'metform') ?></li>
                                                                    </ol>
                                                                </div>
                                                                <a href="https://help.wpmet.com/docs-cat/metform/" class="mf-setting-btn-link" target="_blank"><?php esc_html_e('View Documentation', 'metform'); ?></a>
                                                            </div>
                                                        </div>

                                                    <?php else : ?>
                                                        <div class="attr-col-lg-6">
                                                            <div class="mf-setting-input-group">
                                                                <label for="attr-input-label" class="mf-setting-label mf-setting-label attr-input-label"><?php esc_html_e('API Key:', 'metform'); ?></label>
                                                                <input type="text" disabled name="mf_activecampaign_api_key_field" value="" class="mf-setting-input mf-mailchimp-api-key attr-form-control" placeholder="<?php esc_html_e('ActiveCampaign API key', 'metform'); ?>">
                                                                <p class="description">
                                                                    <?php esc_html_e('Enter here your ActiveCampaign API key. ', 'metform'); ?><a target="__blank" class="mf-setting-btn-link" href="<?php echo esc_url('https://admin.mailchimp.com/'); ?>"><?php esc_html_e('Get API.', 'metform'); ?></a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="attr-col-lg-6">
                                                            <div class="mf-setting-input-desc">
                                                                <div class="mf-setting-input-desc-data">
                                                                    <h2 class="mf-setting-input-desc--title">
                                                                        <?php esc_html_e('How To', 'metform') ?></h2>
                                                                    <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'metform') ?>
                                                                    </p>
                                                                    <ol>
                                                                        <li><?php esc_html_e('Item 1', 'metform') ?></li>
                                                                        <li><?php esc_html_e('Item 2', 'metform') ?></li>
                                                                        <li><?php esc_html_e('Item 3', 'metform') ?></li>
                                                                    </ol>
                                                                </div>
                                                                <a href="https://help.wpmet.com/docs-cat/metform/" class="mf-setting-btn-link" target="_blank"><?php esc_html_e('View Documentation', 'metform'); ?></a>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="attr-tab-pane attr-fade" id="attr-getresponse-tab" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                <div class="attr-row">

                                                    <?php if (class_exists('\MetForm_Pro\Core\Integrations\Email\Getresponse\Get_Response')) : ?>
                                                        <div class="attr-col-lg-6">
                                                            <div class="mf-setting-input-group">
                                                                <div class="attr-form-group">
                                                                    <label for="attr-input-label" class="mf-setting-label mf-setting-label attr-input-label"><?php esc_html_e('GetResponse API Key:', 'metform'); ?></label>
                                                                    <input type="text" name="mf_get_reponse_api_key" value="<?php echo esc_attr((isset($settings['mf_get_reponse_api_key'])) ? $settings['mf_get_reponse_api_key'] : ''); ?>" class="mf-setting-input mf-mailchimp-api-key attr-form-control" placeholder="<?php esc_html_e('GetResponse API key', 'metform'); ?>">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="attr-col-lg-6">
                                                            <div class="mf-setting-input-desc">
                                                                <div class="mf-setting-input-desc-data">
                                                                    <h2 class="mf-setting-input-desc--title">
                                                                        <?php esc_html_e('How To', 'metform') ?></h2>
                                                                    <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'metform') ?>
                                                                    </p>
                                                                    <ol>
                                                                        <li><?php esc_html_e('Item 1', 'metform') ?></li>
                                                                        <li><?php esc_html_e('Item 2', 'metform') ?></li>
                                                                        <li><?php esc_html_e('Item 3', 'metform') ?></li>
                                                                    </ol>
                                                                </div>
                                                                <a href="https://help.wpmet.com/docs-cat/metform/" class="mf-setting-btn-link" target="_blank"><?php esc_html_e('View Documentation', 'metform'); ?></a>
                                                            </div>
                                                        </div>

                                                    <?php else : ?>
                                                        <div class="attr-col-lg-6">
                                                            <div class="mf-setting-input-group">
                                                                <div class="attr-form-group">
                                                                    <label for="attr-input-label" class="mf-setting-label mf-setting-label attr-input-label"><?php esc_html_e('GetResponse API Key:', 'metform'); ?></label>
                                                                    <input type="text" name="mf_getreponse_api_key_field" value="" disabled class="mf-setting-input mf-mailchimp-api-key attr-form-control" placeholder="<?php esc_html_e('GetResponse API key', 'metform'); ?>">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="attr-col-lg-6">
                                                            <div class="mf-setting-input-desc">
                                                                <div class="mf-setting-input-desc-data">
                                                                    <h2 class="mf-setting-input-desc--title">
                                                                        <?php esc_html_e('How To', 'metform') ?></h2>
                                                                    <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'metform') ?>
                                                                    </p>
                                                                    <ol>
                                                                        <li><?php esc_html_e('Item 1', 'metform') ?></li>
                                                                        <li><?php esc_html_e('Item 2', 'metform') ?></li>
                                                                        <li><?php esc_html_e('Item 3', 'metform') ?></li>
                                                                    </ol>
                                                                </div>
                                                                <a href="https://help.wpmet.com/docs-cat/metform/" class="mf-setting-btn-link" target="_blank"><?php esc_html_e('View Documentation', 'metform'); ?></a>
                                                            </div>
                                                        </div>

                                                    <?php endif; ?>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <!-- <hr class="mf-setting-separator"> -->
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- ./End Mail Integration Tab -->
                        <?php if (class_exists('\MetForm_Pro\Core\Integrations\Google_Sheet\WF_Google_Sheet')) :?>
                        <!-- google sheet Integration Tab -->
                        <div class="mf-settings-section" id="mf-google_sheet_integration">
                            <div class="mf-settings-single-section">
                                <div class="mf-setting-header">
                                    <h3 class="mf-settings-single-section--title"><span class="mf mf-settings"></span><?php esc_html_e('Google Sheet Integration', 'metform'); ?>
                                    </h3>
                                    <button type="submit" name="submit" id="submit" class="mf-admin-setting-btn active"><span class="mf mf-icon-checked-fillpng"></span><?php esc_attr_e('Save Changes', 'metform'); ?></button>
                                </div>
                                <div class="mf-setting-tab-nav">
                                        <ul class="attr-nav attr-nav-tabs" id="nav-tab" role="attr-tablist">
                                            <li class="attr-active attr-in">
                                                <a class="attr-nav-item attr-nav-link" data-toggle="tab" href="#mf-google-sheet-tab" role="tab"><?php esc_attr_e('Google Sheet', 'metform'); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="attr-form-group">
                                        <div class="attr-tab-content" id="nav-tabContent">
                                            <div class="attr-tab-pane attr-fade attr-active attr-in" id="mf-google-sheet-tab" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="attr-row">

                                                <div class="attr-col-lg-6">
                                                    <div class="mf-setting-input-group">
                                                        <label for="attr-input-label" class="mf-setting-label mf-setting-label attr-input-label"><?php esc_html_e('Google Client Id:', 'metform'); ?></label>
                                                        <input type="text" name="mf_google_sheet_client_id" value="<?php echo esc_attr(isset($settings['mf_google_sheet_client_id']) ? $settings['mf_google_sheet_client_id'] : ''); ?>" class="mf-setting-input mf-google-sheet-api-key attr-form-control" placeholder="<?php esc_html_e('Google OAuth Client Id', 'metform'); ?>">
                                                        <p class="description">
                                                            <?php esc_html_e('Enter here your google client id. ', 'metform'); ?><a class="mf-setting-btn-link" target="__blank" href="<?php echo esc_url('https://console.cloud.google.com', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform'); ?></a>
                                                        </p>
                                                    </div>
                                                    <div class="mf-setting-input-group">
                                                        <label for="attr-input-label" class="mf-setting-label mf-setting-label attr-input-label"><?php esc_html_e('Google Client Secret:', 'metform'); ?></label>
                                                        <input type="text" name="mf_google_sheet_client_secret" value="<?php echo esc_attr(isset($settings['mf_google_sheet_client_secret']) ? $settings['mf_google_sheet_client_secret'] : ''); ?>" class="mf-setting-input mf-google-sheet-api-key attr-form-control" placeholder="<?php esc_html_e('Google OAuth Client Secret', 'metform'); ?>">
                                                        <p class="description">
                                                            <?php esc_html_e('Enter here your google secret id. ', 'metform'); ?><a class="mf-setting-btn-link" target="__blank" href="<?php echo esc_url('https://console.cloud.google.com', 'metform'); ?>"><?php esc_html_e('Create from here', 'metform'); ?></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $google = new \MetForm_Pro\Core\Integrations\Google_Sheet\Google_Access_Token;?>
                                            <ol class="xs_social_ol">
                                                <li><?php echo esc_html__('Check how to create App/Project On Google developer account', 'metform')?> - <a href="https://help.wpmet.com/docs/google-sheet-integration" target="_blank">https://help.wpmet.com/docs/google-sheet-integration</a></li>
                                                <li><?php echo esc_html__('Must add the following URL to the "Valid OAuth redirect URIs" field:', 'metform')?> <strong style="font-weight:700;"><?php echo esc_url(admin_url('admin.php?page=metform-menu-settings'))?></strong></li>
                                                <li><?php echo esc_html__('After getting the App ID & App Secret, put those information', 'metform')?></li>
                                                <li><?php echo esc_html__('Click on "Save Changes"', 'metform')?></li>
                                                <li><?php echo esc_html__('Click on "Generate Access Token"', 'metform')?></li>
                                            </ol>
                                            <a class="mf-setting-btn-link achor-style" href="<?php echo esc_url($google->get_code());?>"><?php esc_attr_e('Generate Access Token', 'metform'); ?></a>
                                        </div>
                                        <p class="mf-set-dash-top-notch--item__desc">
                                            <?php esc_html_e("Note:- After 200 days your token will be expired, before the expiration of your token, generate a new token.", 'metform'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>
                        <!-- Integrations settings action -->

                        <?php do_action('metform_settings_content'); ?>

                        <!-- Integrations settings action end -->

                        <input type="hidden" name="mf_settings_page_action" value="save">
                        <?php wp_nonce_field('metform-settings-page', 'metform-settings-page'); ?>
                        <input type="hidden" id="mf_wp_rest_nonce" value="<?php echo esc_attr(wp_create_nonce('wp_rest')); ?>">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
