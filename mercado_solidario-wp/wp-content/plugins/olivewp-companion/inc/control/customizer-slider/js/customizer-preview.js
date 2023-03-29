jQuery( document ).ready(function($) {	

	// Change content width
	wp.customize('trending_post_container_spacing', function(control) {
		
		control.bind(function( containerPadding ) {
			$('body .page-section-space.trending-post').css('padding-top', containerPadding + 'px');
			$('body .page-section-space.trending-post').css('padding-bottom', containerPadding + 'px');
		});

	});

});