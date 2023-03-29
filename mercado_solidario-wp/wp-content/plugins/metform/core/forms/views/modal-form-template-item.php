<li class="metform-template-item<?php echo isset($template['package']) ? ' metform-template-item--' . esc_attr($template['package']) : ''; ?> <?php echo (isset($template['package']) && $template['file'] === '') ? ' metform-template-item--go_pro' : ''; ?>">
    <label>
        <input class="metform-template-radio" name="metform-editor-template" type="radio" value="<?php echo ($template['file'] != '') ? esc_attr($template['id']) : ''; ?>" <?php echo $template['file'] === '' ? 'disabled=disabled' : '' ?>>
        <div class="metform-template-radio-data">
            <img src="<?php echo esc_url($template['preview-thumb']); ?>" alt="<?php echo esc_attr($template['title']) ?>">

            <?php if(isset($template['package']) && $template['package'] === 'pro') : ?>
                <div class="metform-template-radio-data--tag">
                    <span class="metform-template-radio-data--pro_tag"><?php echo esc_html(ucfirst($template['package'])); ?></span>
                </div>
            <?php endif; ?>

            <div class="metform-template-footer-content">
                <?php if(isset($template['title']) && $template['title'] != '') : ?>
                    <div class="metform-template-footer-title">
                        <h2><?php echo esc_html($template['title']); ?></h2>
                    </div>
                <?php endif; ?>
                
                <div class="metform-template-footer-links">
                    <?php if(isset($template['package']) && $template['package'] === 'pro' && isset($template['file']) && $template['file'] == '') : ?>
                        <a target="_blank" href="https://wpmet.com/metform-pricing/" class="metform-template-footer-links--pro_tag"><i class="metform-template-footer-links--icon fas fa-external-link-square-alt"></i><?php echo esc_html__('Buy Pro', 'metform'); ?></a>
                    <?php endif; ?>

                    <?php if(isset($template['demo-url']) && $template['demo-url'] != '') : ?>
                        <a target="_blank" class="metform-template-footer-links--demo_link" href="<?php echo esc_attr(ucfirst($template['demo-url'])); ?>"><i class="metform-template-footer-links--icon far fa-eye"></i><?php echo esc_html__('Demo', 'metform'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </label>
</li>