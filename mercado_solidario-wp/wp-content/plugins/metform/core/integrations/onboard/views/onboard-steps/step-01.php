<div class="mf-onboard-main-header">
    <h1 class="mf-onboard-main-header--title"><strong><?php

echo esc_html__('Check Out the Easy to Understand Video Tutorials to learn the detailed use of MetForm.', 'metform'); ?></strong></h1>
</div>
<div class="mf-onboard-tutorial">
    <div class="mf-onboard-tutorial--btn">
        <a class="mf-onboard-tutorial--link" data-video_id="zg1QIouKO_Q" href="#"><i class="xs-onboard-play"></i></a>
    </div>
    
    <div class="mf-admin-video-tutorial-popup">
            <div class="mf-admin-video-tutorial-iframe"></div>
    </div>
</div>


<div class="mf-onboard-tut-term">
    <label class="mf-onboard-tut-term--label">
        <?php $term = MetForm\Core\Integrations\Onboard\Attr::instance()->utils->get_option('settings', []);
        ?>
        <input <?php if(empty($term['tut_term']) || $term['tut_term'] !== 'user_agreed') : ?>checked="checked"<?php endif; ?> class="mf-onboard-tut-term--input" name="settings[tut_term]" type="checkbox" value="user_agreed">
        <?php echo esc_html__('Share non-sensitive diagnostic data and details about plugin usage.', 'metform'); ?>
    </label>

    <p class="mf-onboard-tut-term--helptext"><?php echo esc_html__("We gather non-sensitive diagnostic data as well as information about plugin use. Your site's URL, WordPress and PHP versions, plugins and themes, as well as your email address, will be used to give you a discount coupon. This information enables us to ensure that this plugin remains consistent with the most common plugins and themes at all times. We pledge not to give you any spam, for sure.", 'metform'); ?></p>
    <p class="mf-onboard-tut-term--help"><?php echo esc_html__('What types of information do we gather?', 'metform'); ?></p>
</div>
<div class="mf-onboard-pagination">
    <a class="mf-onboard-btn mf-onboard-pagi-btn prev" href="#"><i class="xs-onboard-arrow-left"></i><?php echo esc_html__('Back', 'metform'); ?></a>
    <a class="mf-onboard-btn mf-onboard-pagi-btn next" href="#"><?php echo esc_html__('Next Step', 'metform'); ?></a>
</div>
<div class="mf-onboard-shapes">
    <img src="<?php echo esc_url(self::get_url()); ?>assets/images/shape-07.png" alt="" class="shape-07">
    <img src="<?php echo esc_url(self::get_url()); ?>assets/images/shape-14.png" alt="" class="shape-14">
    <img src="<?php echo esc_url(self::get_url()); ?>assets/images/shape-15.png" alt="" class="shape-15">
    <img src="<?php echo esc_url(self::get_url()); ?>assets/images/shape-16.png" alt="" class="shape-16">
    <img src="<?php echo esc_url(self::get_url()); ?>assets/images/shape-17.png" alt="" class="shape-17">
</div>