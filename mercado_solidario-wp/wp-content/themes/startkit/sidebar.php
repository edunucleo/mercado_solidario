<?php if ( ! is_active_sidebar( 'sidebar-primary' ) ) {	return; } ?>
<div class="col-lg-3 col-md-12">
	<section class="sidebar">
		<?php dynamic_sidebar('sidebar-primary'); ?>
	</section>
</div>