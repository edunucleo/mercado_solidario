<?php defined('ABSPATH') || exit; ?>

<div class="attr-modal attr-fade" id="metform_new_form_modal" tabindex="-1" role="dialog" aria-labelledby="metform_new_form_modalLabel" style="display:none;">
    <div class="attr-modal-dialog attr-modal-dialog-centered" id="metform-new-form-modalinput-form" role="document">
        <i class="metform-add-new-form-modal-close-btn" data-dismiss="modal" aria-label="Close Modal"></i>
        <div class="metform-add-new-form-model-header">
            <h2 class="metform-add-new-form-model-title" id="metform_new_form_modalLabel">
                <?php esc_html_e('Create Form', 'metform'); ?>
            </h2>
        </div>
        <div class="metform-add-new-form-model-contents">
            <div class="metform-template-input-con">
                <label for="metform-add-new-form-model__form-name"><?php esc_html_e('Form Name', 'metform'); ?></label>
                <input id="metform-add-new-form-model__form-name" type="text" class="metform-editor-input" placeholder="<?php esc_html_e('Enter a form name', 'metform'); ?>">
            </div>

            <?php
            $form_types = [];
            
            if(!class_exists('\MetForm_Pro\Core\Features\Quiz\Integration')){
                $form_types = [
                    'general-form' => __('General Form', 'metform'),
                ];

            } else {
                $form_types = [
                    'general-form' => __('General Form', 'metform'),
                    'quiz-form' => __('Quiz Form', 'metform'),
                ];
            }
            ?>

            <div class="metform-template-form-type">
                <label for="metform-add-new-form-model__form-type"><?php esc_html_e('Form Type', 'metform'); ?></label>
                <select id="metform-add-new-form-model__form-type" class="metform-editor-input" data-nonce="<?php echo esc_attr(wp_create_nonce('wp_rest'));?>">
                    <?php foreach($form_types as $key => $type){ ?>
                        <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($type); ?></option>
                    <?php } ?>
                </select>
            </div>

            <ul class="metform-templates-list">
                <li>
                    <label>
                        <input class="metform-template-radio" name="metform-editor-template" type="radio" value="0" checked>
                        <div class="metform-template-radio-data">
                            <img src="<?php echo esc_url(\MetForm\Plugin::instance()->plugin_url() . 'templates/blank/preview-thumb.svg'); ?>" alt="<?php esc_html_e('Blank Template', 'metform'); ?>">
                            <div class="metform-template-footer-content">
                                <div class="metform-template-footer-title">
                                    <h2><?php esc_html_e('Blank Template', 'metform'); ?></h2>
                                </div>
                                <div class="metform-template-footer-links">
                                    <?php esc_html_e('Create From Scratch', 'metform'); ?>
                                </div>
                            </div>
                        </div>
                    </label>
                </li>

                <?php foreach(\MetForm\Templates\Base::instance()->get_templates() as $template): ?>
                   <?php include \MetForm\Plugin::instance()->core_dir() . 'forms/views/modal-form-template-item.php'; ?>
                <?php endforeach; ?>
            </ul>
            
        </div>
        <div class="add-new-model__footer-button-group">
            <button resturl="<?php echo esc_url(get_rest_url()) ?>metform/v1/forms/"  class="metform-open-new-form-editor-modal"><span class="eicon-elementor"></span><?php esc_html_e('Edit form', 'metform') ?></button>
        </div>
    </div>
</div>