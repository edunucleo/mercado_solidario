<?php

use MetForm\Core\Integrations\Onboard\Attr;

$modules_all = Attr::instance()->get_list('optional');
$modules_active = Attr::instance()->get_list('active');
?>
<pre>
<?php $x = Attr::instance()->utils->get_option('module_list', []);
// print_r($modules_active) ;?>
</pre>
<!-- this blank input is for empty form submission -->
<input checked="checked" type="checkbox" value="_null" style="display:none" name="module_list[]" >

<div class="mf-admin-fields-container">
    <span class="mf-admin-fields-container-description"><?php esc_html_e('You can disable the modules you are not using on your site. That will disable all associated assets of those modules to improve your site loading speed.', 'metform'); ?></span>

    <div class="mf-admin-fields-container-fieldset">
        <div class="attr-hidden" id="elementskit-template-admin-menu">
            <li><a href="edit.php?post_type=elementskit_template"><?php esc_html_e('Header Footer', 'metform'); ?></a></li>
        </div>
        <div class="attr-hidden" id="elementskit-template-widget-menu">
            <li><a href="edit.php?post_type=elementskit_widget"><?php esc_html_e('Widget Builder', 'metform'); ?></a></li>
        </div>
        <div class="attr-row">
            <?php foreach($modules_all as $module => $module_config): ?>
            <div class="attr-col-md-6 attr-col-lg-4" <?php echo ($module_config['package'] != 'pro-disabled' ? '' : 'data-attr-toggle="modal" data-target="#elementskit_go_pro_modal"'); ?>>
            <?php
                $this->utils->input([
                    'type' => 'switch',
                    'name' => 'module_list[]',
                    'value' => $module,
                    'class' => 'mf-content-type-' . $module_config['package'],
                    'attr' => ($module_config['package'] != 'pro-disabled' ? [] : ['disabled' => 'disabled' ]),
                    'label' => $module_config['title'],
                    'options' => [
                        'checked' => (isset($modules_active[$module]) ? true : false),
                    ]
                ]);
            ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>