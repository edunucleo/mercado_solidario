<?php 
/**
Template Name: Homepage Two
*/
?>
<?php 
get_header();

do_action( 'hantus_sections', false );
get_template_part('template-parts/sections/hantus','blog');

get_footer(); ?>