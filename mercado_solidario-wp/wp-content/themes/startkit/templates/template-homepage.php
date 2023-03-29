<?php 
/**
Template Name: Default homepage
*/
?>
<?php 
	get_header();
	do_action( 'startkit_sections', false );
	get_template_part('sections/startkit','blog');
	get_footer();
?>