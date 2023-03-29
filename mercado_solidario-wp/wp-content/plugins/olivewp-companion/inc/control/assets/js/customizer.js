jQuery( document ).ready(function($) {
	"use strict";

	/**
	 * Image Checkbox Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */

	$('.multi-image-checkbox').on('click', function () {
		 if (this.checked) {
          this.setAttribute("checked", "checked");
      } else {
          this.removeAttribute("checked");
      }
	  olivewp_companion_get_all_image_checkboxes($(this).parent().parent());
	});

	// Get the values from the checkboxes and add to our hidden field
	function olivewp_companion_get_all_image_checkboxes($element) {
	  var inputValues = $element.find('.multi-image-checkbox').map(function() {
	    if( $(this).is(':checked') ) {
	      return $(this).val();
	    }
	  }).toArray();
	  // Important! Make sure to trigger change event so Customizer knows it has to save the field
	  $('.customize-control-multi-image-checkbox').val(inputValues).trigger('change');
	}	

	/**
	 * Dropdown Select2 Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */

	$('.customize-control-dropdown-select2').each(function(){
		$('.customize-control-select2').select2({
			allowClear: true
		});
	});

	$(".customize-control-select2").on("change", function() {
		var select2Val = $(this).val();
		$(this).parent().find('.customize-control-dropdown-select2').val(select2Val).trigger('change');
	});	

});


(function($) {
    $( function() {
    	if($("#_customize-input-customizer_trending_post_type").val()=='post'){
    		if($("#_customize-input-customizer_trending_post_source").val()=='taxonomies'){
	    		$("#customize-control-customizer_trending_post_category").show();
	    		$("#customize-control-customizer_trending_post_taxonomy").hide();
	    	}else if($("#_customize-input-customizer_trending_post_source").val()=='custom_query'){
	    		$("#customize-control-customizer_trending_post_id").show();
	    		$("#customize-control-customizer_trending_post_category").hide();
	    		$("#customize-control-customizer_trending_post_taxonomy").hide();
	    	}
    	}
    	else if($("#_customize-input-customizer_trending_post_type").val()=='product'){
    		if($("#_customize-input-customizer_trending_post_source").val()=='taxonomies'){
	    		 $("#customize-control-customizer_trending_post_taxonomy").show();
	             $("#customize-control-customizer_trending_post_category").hide();
	        }else if($("#_customize-input-customizer_trending_post_source").val()=='custom_query'){
	        	$("#customize-control-customizer_trending_post_id").show();
	    		$("#customize-control-customizer_trending_post_category").hide();
	    		$("#customize-control-customizer_trending_post_taxonomy").hide();
	    	}
    	}
    	
        wp.customize('customizer_trending_post_type', function(control) {
            control.bind(function( owc_post_type ) {            	
                if(owc_post_type=='post')
                {	
                	if($("#_customize-input-customizer_trending_post_source").val()=='taxonomies'){
	                    $("#customize-control-customizer_trending_post_category").show();
	                    $("#customize-control-customizer_trending_post_taxonomy").hide();
	                }
	                else if($("#_customize-input-customizer_trending_post_source").val()=='custom_query'){
	                	$("#customize-control-customizer_trending_post_category").hide();
	                    $("#customize-control-customizer_trending_post_taxonomy").hide();
	                }
                }
                else if(owc_post_type=='product')
                {
                	if($("#_customize-input-customizer_trending_post_source").val()=='taxonomies'){
	                    $("#customize-control-customizer_trending_post_taxonomy").show();
	                    $("#customize-control-customizer_trending_post_category").hide();
	                }
	                else if($("#_customize-input-customizer_trending_post_source").val()=='custom_query'){
	                	$("#customize-control-customizer_trending_post_category").hide();
	                    $("#customize-control-customizer_trending_post_taxonomy").hide();
	                }
                    
                } 
            });
        });

        wp.customize('customizer_trending_post_source', function(control) {
            control.bind(function( owc_source ) {            	
                if(owc_source=='taxonomies')
                {
                    $("#customize-control-customizer_trending_post_id").hide();
                    if($("#_customize-input-customizer_trending_post_type").val()=='post'){
                    	$("#customize-control-customizer_trending_post_category").show();
                    }else{
                    	$("#customize-control-customizer_trending_post_taxonomy").show();	
                    }

                }
                else if(owc_source=='custom_query')
                {
                    $("#customize-control-customizer_trending_post_id").show();
                    $("#customize-control-customizer_trending_post_category").hide();
                    $("#customize-control-customizer_trending_post_taxonomy").hide();
                    
                } 
            });
        });

    });
})(jQuery)
