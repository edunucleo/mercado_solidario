<?php
$widgets_all = \ElementsKit_Lite\Config\Widget_List::instance()->get_list();
$widgets_active = \ElementsKit_Lite\Config\Widget_List::instance()->get_list('active');
$widgets_categorized = [];
foreach ($widgets_all as $key => $row) {
    $widgets_categorized[($row['widget-category'] ?? 'general')][$key] = $row;
}
//phpcs:disable WordPress.Security.NonceVerification -- Did't fiend any connection with this file and plugin
?>
<!-- this blank input is for empty form submission -->
<input checked="checked" type="checkbox" value="_null" style="display:none" name="widget_list[]" >

<div class="mf-admin-fields-container <?php echo isset($_GET['met-onboard-steps']) && $_GET['met-onboard-steps'] == 'loaded' ? 'mf-admin-widgets-container' : 'mf-admin-widget-list';  ?>">
    <span class="mf-admin-fields-container-description"><?php esc_html_e('You can disable the elements you are not using on your site. That will disable all associated assets of those widgets to improve your site loading speed.', 'metform'); ?></span>

    <div class="mf-admin-fields-container-fieldset">
        <?php foreach($widgets_categorized as $widget_category => $widgets): ?>
            <h2 class="mf-widget-group-title"><?php echo esc_html(ucwords(str_replace('-', ' ', $widget_category))); ?></h2>
            <div class="attr-row">
                <?php foreach($widgets as $widget => $widget_config): ?>
                <div class="attr-col-md-6 attr-col-lg-3"  <?php echo ($widget_config['package'] != 'pro-disabled' ? '' : 'data-attr-toggle="modal" data-target="#elementskit_go_pro_modal"'); ?>>
                    <?php
                        $this->utils->input([
                            'type' => 'switch',
                            'name' => 'widget_list[]',
                            'label' => esc_html($widget_config['title']),
                            'value' => $widget,
                            'attr' => ($widget_config['package'] != 'pro-disabled' ? [] : ['disabled' => 'disabled' ]),
                            'class' => 'mf-content-type-' . esc_attr($widget_config['package']),
                            'options' => [
                                'checked' => (isset($widgets_active[$widget]) ? true : false),
                            ]
                        ]);
                    ?>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

