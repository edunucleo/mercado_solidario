<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package OliveWP Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post content-none'); ?>>
	<div class="post-content">
		<header class="entry-header">
			<h3 class="entry-title"><?php esc_html_e('Nothing found', 'olivewp' ); ?></a></h3>
			<p><?php esc_html_e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.','olivewp' ); ?></p>
		</header>
	</div>
</article>