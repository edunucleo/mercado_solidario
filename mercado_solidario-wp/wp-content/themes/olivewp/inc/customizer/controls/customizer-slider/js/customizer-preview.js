jQuery( document ).ready(function($) {

	// Change the width of logo
	wp.customize('olivewp_logo_length', function(control) {

		control.bind(function( controlValue ) {
			$('.custom-logo').css('max-width', '500px');
			$('.custom-logo').css('width', controlValue + 'px');
			$('.custom-logo').css('height', 'auto');
		});

	});

	// Change after menu button border radius
	wp.customize('after_menu_btn_border', function(control) {

		control.bind(function( borderRadius ) {
			$('.btn-style-one').css('border-radius', borderRadius + 'px');	
		});

	});

	// Change container width
	wp.customize('container_width', function(control) {
		
		control.bind(function( containerWidth ) {
			$('.page-section-space .spice-container:not(.page-section-space.stretched .spice-container), .section-space .spice-container:not(.page-section-space.stretched .spice-container)').css('width', containerWidth + 'px');
		});

	});

	// Change content width
	wp.customize('content_width', function(control) {
		
		control.bind(function( contentWidth ) {
			$('body .page-section-space .spice-row .spice-col-2').css('width', contentWidth + '%');
		});

	});

	// Change content width
	wp.customize('sidebar_width', function(control) {
		
		control.bind(function( sidebarWidth ) {
			$('body .page-section-space .spice-row .spice-col-4').css('width', sidebarWidth + '%');
		});

	});

});