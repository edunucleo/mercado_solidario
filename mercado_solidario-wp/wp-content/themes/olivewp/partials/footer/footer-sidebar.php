<?php
/**
 * Footer Widget Area
 *
 * @package OliveWP Theme
 */
?>
<div class="spice-row footer-sidebar">
	<?php
        $olivewp_layout = get_theme_mod('footer_widget_layout',3);
        switch ( $olivewp_layout )
        {   
            case 2:
                olivewp_footer_layout('2');
                break;

            case 3:
                olivewp_footer_layout('3');
                break;

            case 4:
                olivewp_footer_layout('4');
                break;
        }
    ?>
</div>