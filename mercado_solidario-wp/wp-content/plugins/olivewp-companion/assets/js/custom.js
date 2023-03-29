//RLT check function
if (!jQuery.bol_return) {
    jQuery.extend({
        bol_return: function (tmp_vl) {
            if (tmp_vl == 1) {
                return true;
            }
            return false;
        }
    });
}

jQuery(document).ready(function() {
    jQuery("#trending-posts-carousel").owlCarousel({   
        rtl:trending_posts_settings.rtl,     
        navigation : true, // Show next and prev buttons        
        autoplay: true,
        autoplayTimeout: 1500,
        autoplayHoverPause: true,
        smartSpeed: 1300,

        loop:true, // loop is true up to 1199px screen.
        nav:true, // is true across all sizes
        margin:30, // margin 10px till 960 breakpoint
        autoHeight: true,
        responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
        items: 4,
        dots: false,
        navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
        responsive:{    
            200:{ items:1 },
            480:{ items:1 },
            768:{ items:2 },
            1000:{ items:4 }            
        },
        rtl: jQuery.bol_return(trending_posts_settings.rtl)
    });

});

