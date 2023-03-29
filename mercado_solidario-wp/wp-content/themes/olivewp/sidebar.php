<?php
/**
 * The sidebar containing the main widget area
 * 
 * @package OliveWP Theme
*/

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

if (is_active_sidebar('sidebar-1')) : ?>

    <div class="spice-col-4">
        <div class="sidebar">
            <div class="right-sidebar">
    	       <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div>
        </div>
    </div>

<?php endif;