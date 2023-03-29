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
	
	//Blog title
	wp.customize(
		'blog_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#recent-blog .section-header h2' ).text( newval );
				}
			);
		}
	);
	
	//blog_subttl
	wp.customize(
		'blog_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '#recent-blog .section-header .subtitle' ).text( newval );
				}
			);
		}
	);
	
	//Blog Description
	wp.customize(
		'blog_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#recent-blog .section-header p' ).text( newval );
				}
			);
		}
	);
	//info_title
	wp.customize(
		'info_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#features-list .first h4' ).text( newval );
				}
			);
		}
	);
	
	//info_description
	wp.customize(
		'info_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#features-list .first p' ).text( newval );
				}
			);
		}
	);
	
	//info_title2
	wp.customize(
		'info_title2', function( value ) {
			value.bind(
				function( newval ) {
					$( '#features-list .second h4' ).text( newval );
				}
			);
		}
	);
	
	//info_description2
	wp.customize(
		'info_description2', function( value ) {
			value.bind(
				function( newval ) {
					$( '#features-list .second p' ).text( newval );
				}
			);
		}
	);
	
	//info_title3
	wp.customize(
		'info_title3', function( value ) {
			value.bind(
				function( newval ) {
					$( '#features-list .third h4' ).text( newval );
				}
			);
		}
	);
	
	//info_description3
	wp.customize(
		'info_description3', function( value ) {
			value.bind(
				function( newval ) {
					$( '#features-list .third p' ).text( newval );
				}
			);
		}
	);
	
	//info_contact_title
	wp.customize(
		'info_contact_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#features-list .fourth h4' ).text( newval );
				}
			);
		}
	);
	
	//info_contact_desc
	wp.customize(
		'info_contact_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '#features-list .fourth h3' ).text( newval );
				}
			);
		}
	);
	
	//service_title
	wp.customize(
		'service_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#services .section-header h2' ).text( newval );
				}
			);
		}
	);
	
	//service_subttl
	wp.customize(
		'service_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '#services .section-header .subtitle' ).text( newval );
				}
			);
		}
	);
	
	
	//service_description
	wp.customize(
		'service_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#services .section-header p' ).text( newval );
				}
			);
		}
	);
	
	//testimonial_title
	wp.customize(
		'testimonial_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#testimonial .section-header h2' ).text( newval );
				}
			);
		}
	);
	
	//testimonial_subttl
	wp.customize(
		'testimonial_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '#testimonial .section-header .subtitle' ).text( newval );
				}
			);
		}
	);
	
	
	//testimonial_description
	wp.customize(
		'testimonial_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#testimonial .section-header p' ).text( newval );
				}
			);
		}
	);
	
} )( jQuery );