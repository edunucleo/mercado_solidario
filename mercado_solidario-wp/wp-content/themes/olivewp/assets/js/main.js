(function($){
    

    $(document).ready(function() {


        /* ---------------------------------------------- /*
         * Initialization General Scripts for all pages
         /* ---------------------------------------------- */

        var homeSection = $('.home-section'),
            navbar      = $('.navbar-custom'),
            navHeight   = navbar.height(),
            worksgrid   = $('#works-grid'),
            width       = Math.max($(window).width(), window.innerWidth),
            mobileTest  = false;

        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            mobileTest = true;
        }

        olivewp_buildHomeSection(homeSection);

        $(window).resize(function() {
            var width = Math.max($(window).width(), window.innerWidth);
            olivewp_buildHomeSection(homeSection);
        });


        /* ---------------------------------------------- /*
         * Home section height
         /* ---------------------------------------------- */

        function olivewp_buildHomeSection(homeSection) {
            if (homeSection.length > 0) {
                if (homeSection.hasClass('home-full-height')) {
                    homeSection.height($(window).height());
                } else {
                    homeSection.height($(window).height() * 0.85);
                }
            }
        }

        /* ---------------------------------------------- /*
         * Scroll Animation
         /* ---------------------------------------------- */

        $('.section-scroll').bind('click', function(e) {
            var anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $(anchor.attr('href')).offset().top - 68
            }, 1000);
            e.preventDefault();
        });
        

    /* ---------------------------------------------- /*
         * Navbar menu sticky
    /* ---------------------------------------------- */
            $(window).bind('scroll', function () {
                 if ($(window).scrollTop() > 100) {
                $('.navbar-overlapped').addClass('stiky-header');
            } else {
                $('.navbar-overlapped').removeClass('stiky-header');
            }
        });

    });
})(jQuery);