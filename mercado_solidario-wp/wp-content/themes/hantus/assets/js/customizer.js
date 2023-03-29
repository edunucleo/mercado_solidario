/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
	
	$(document).ready(function ($) {
        $('input[data-input-type]').on('input change', function () {
            var val = $(this).val();
            $(this).prev('.cs-range-value').html(val);
            $(this).val(val);
        });
    })

	//info_title
	wp.customize(
		'info_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact2 .info-first h4' ).text( newval );
				}
			);
		}
	);
	
	//info_description
	wp.customize(
		'info_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact2 .info-first p' ).text( newval );
				}
			);
		}
	);
	
	//info_title2
	wp.customize(
		'info_title2', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact2 .info-second h4' ).text( newval );
				}
			);
		}
	);
	
	//info_description2
	wp.customize(
		'info_description2', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact2 .info-second p' ).text( newval );
				}
			);
		}
	);
	
	//info_title3
	wp.customize(
		'info_title3', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact2 .info-third h4' ).text( newval );
				}
			);
		}
	);
	
	//info_description3
	wp.customize(
		'info_description3', function( value ) {
			value.bind(
				function( newval ) {
					$( '#contact .info-third p' ).text( newval );
				}
			);
		}
	);
	
	//service_title
	wp.customize(
		'service_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#services .service-section h2' ).text( newval );
				}
			);
		}
	);
	
	//service_description
	wp.customize(
		'service_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#services .service-section p' ).text( newval );
				}
			);
		}
	);
	
	//blog_title
	wp.customize(
		'blog_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#blog-content .section-title h2' ).text( newval );
				}
			);
		}
	);
	//blog_description
	wp.customize(
		'blog_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#blog-content .section-title p' ).text( newval );
				}
			);
		}
	);
	
	//copyright_content
	wp.customize(
		'copyright_content', function( value ) {
			value.bind(
				function( newval ) {
					$( '.copyright-text .copy-content a' ).text( newval );
				}
			);
		}
	);
} )( jQuery );