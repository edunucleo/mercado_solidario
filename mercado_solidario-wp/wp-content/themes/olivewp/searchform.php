<?php 
/**
 * Create Custom Search 
*/
 ?>
<form class="search-form" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'olivewp' ); ?>" value="" name="s" id="s"/>
    </label>
 	<input type="submit" class="search-submit" value="<?php esc_attr_e('Search', 'olivewp' ); ?>">
</form>