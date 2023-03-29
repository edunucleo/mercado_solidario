<?php
/**
* The sidebar containing the woocommerce widget area
*
* @package OliveWP Theme
*/
?>
<div class="spice-col-4">
    <div class="sidebar">
        <?php if (is_active_sidebar('woocommerce')) : ?>

            <?php dynamic_sidebar('woocommerce'); ?>

        <?php endif; ?>
    </div>
</div>