<div class="attr-input attr-input-radio mf-admin-input-radio <?php echo esc_attr($class); ?>">
    <div class="mf-admin-input-switch mf-admin-card-shadow attr-card-body">
        <input <?php echo esc_attr($options['checked'] === true ? 'checked' : ''); ?> 
            type="radio" value="<?php echo esc_attr($value); ?>" 
            class="mf-admin-control-input" 
            name="<?php echo esc_attr($name); ?>" 
            id="mf-admin-radio__<?php echo esc_attr(self::strify($name) . $value); ?>"

            <?php 
            if(isset($attr)){
                foreach($attr as $k => $v){
                    echo esc_attr("$k='$v'");
                }
            }
            ?>
        >

        <label class="mf-admin-control-label"  for="mf-admin-radio__<?php echo esc_attr(self::strify($name) . $value); ?>">
            <?php echo esc_html($label); ?>
            <?php if(!empty($description)) : ?>
                <span class="mf-admin-control-desc"><?php echo esc_html($description); ?></span>
            <?php endif; ?>
        </label>
    </div>
</div>