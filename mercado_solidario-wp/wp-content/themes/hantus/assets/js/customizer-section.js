( function( api ) {

	// Extends our custom "example-1" section.
	api.sectionConstructor['plugin-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );


function hantusfrontpagesectionsscroll( section_id ){
    var scroll_section_id = "slider";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {
        case 'accordion-section-info_setting':
        scroll_section_id = "contact2";
        break;

        case 'accordion-section-service_setting':
        scroll_section_id = "services";
        break;

        case 'accordion-section-testimonial_setting':
        scroll_section_id = "testimonial";
        break;
		
        case 'accordion-section-blog_setting':
        scroll_section_id = "blog-content";
        break;
    }

    if( $contents.find('#'+scroll_section_id).length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + scroll_section_id ).offset().top
        }, 1000);
    }
}

 jQuery('body').on('click', '#sub-accordion-panel-hantus_frontpage_sections .control-subsection .accordion-section-title', function(event) {
        var section_id = jQuery(this).parent('.control-subsection').attr('id');
        hantusfrontpagesectionsscroll( section_id );
});