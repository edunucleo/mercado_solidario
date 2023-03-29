jQuery(document).ready(function($) {
    /* --------------------------------------
        Scroll UP
    -------------------------------------- */

    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    // Search Popup
    $('.searchBtn').on('click', function(e) {
        var $searchbox = $('.search-area');
        if ($searchbox.hasClass('search-open')) {
            $searchbox.removeClass('search-open');
            $(".search-toggle").focus();
        } else {
            $searchbox.addClass('search-open');
            $('.sb-field.search-field').focus();
        }
        e.preventDefault();
        var links,i,len,searchItem=document.querySelector('.search-area'),fieldToggle=document.querySelector('.sb-field.search-field');let focusableElements='button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';let firstFocusableElement=fieldToggle;let focusableContent=searchItem.querySelectorAll(focusableElements);let lastFocusableElement=focusableContent[focusableContent.length-1];if(!searchItem){return!1}
        links=searchItem.getElementsByTagName('button');for(i=0,len=links.length;i<len;i++){links[i].addEventListener('focus',toggleFocus,!0);links[i].addEventListener('blur',toggleFocus,!0)}
        function toggleFocus(){var self=this;while(-1===self.className.indexOf('search-overlay')){if('input'===self.tagName.toLowerCase()){if(-1!==self.className.indexOf('focus')){self.className=self.className.replace('focus','')}else{self.className+=' focus'}}
        self=self.parentElement}}
        document.addEventListener('keydown',function(e){let isTabPressed=e.key==='Tab'||e.keyCode===9;if(!isTabPressed){return}
        if(e.shiftKey){if(document.activeElement===firstFocusableElement){lastFocusableElement.focus();e.preventDefault()}}else{if(document.activeElement===lastFocusableElement){firstFocusableElement.focus();e.preventDefault()}}})
    });

    /*------------------------------------
        Sticky Menu 
    --------------------------------------*/
    var windows = $(window);
    var stick = $(".header-sticky");
    windows.on('scroll', function() {
        var scroll = windows.scrollTop();
        if (scroll < 10) {
            stick.removeClass("sticky");
        } else {
            stick.addClass("sticky");
        }
    });
    /*------------------------------------
        $ MeanMenu 
    --------------------------------------*/
	
	$('.mobile-menu-active').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: '.mobile-menu'
    });
	
	$(document).on('keyup', function(e){
	  if (e.keyCode == 27) {
		$(".mean-bar .mean-nav > ul").css('display', 'none');
		//$(".meanmenu-reveal").removeClass('meanclose').html('<span></span><span></span><span></span>');
	  }
	});
	
	$(document).on('click', 'a.meanmenu-reveal', function(e){
		$(".mean-bar .mean-nav > ul").css('display', 'block');
	});

    /* last  2 li child add class */
    $('ul.menu > li').slice(-2).addClass('last-elements');



    $(window).on('load', function() {
        // Sticky Nav
        $(".sticky-nav").sticky({ topSpacing: 0 });
    });
	
	// Add/Remove .focus class for accessibility
	$('.navbar-area').find( 'a' ).on( 'focus blur', function() {
		$( this ).parents( 'ul, li' ).toggleClass( 'focus' );
	} );

    // Info Active/Hover
    if ($("body").hasClass("theme-startkit")) {
      $('.features-eight').each(function(){
        $(this).hover(function(){
          $(this).parents('.servicesss').find('.features-eight').removeClass('active');
          $(this).addClass('active');
        });
      });
    }

    // Startkitrip Effect Start
    $.fn.startkitrip = function(options){

        var config = $.extend({
            width   : 500,
            height  : 500,
            duration: 2000,
            event   :"click",
            color   :"rgba(203, 237, 137, 0.5)",
        },options);
        

        this.on(config.event, function(event){
            var wave = $('<span></span>');

            wave.css({
                "width"         : "2px",
                "height"        : "2px",
                "position"      : "absolute",
                "background"    : "radial-gradient(transparent 34%, " + config.color + " 56%, transparent 70%)",
                "display"       : "inline-block",
                "border-radius" : "50%",
                "pointer-events": "none"
            });

            var top  = event.offsetY;
            var left = event.offsetX;

            $(this).append(wave);

            wave.css({
                "top"   : top-wave.outerHeight()/2,
                "left"  : left-wave.outerWidth()/2
            });
            wave.animate({
                width: config.width+"px",
                height: config.height+"px",
                top:top-(config.height/2),
                left:left-(config.width/2),
                opacity:0
            },config.duration, function() {
                wave.remove();
            });
        });
    }
    jQuery.widget("water.startkitdrops", {
        options: {
            waveLength: 340,
            canvasWidth: 0,
            canvasHeight: 0,
            color: '#00aeef',
            frequency: 3,
            waveHeight: 100,
            density: 0.02,
            startkitripSpeed:  0.1,
            rightPadding: 20,
            position:'absolute',
            positionBottom:0,
            positionLeft:0
        },
        _create: function () {
            var canvas = window.document.createElement('canvas');
            if (!this.options.canvasHeight) {
                this.options.canvasHeight = this.element.height() / 2;
            }
            if (!this.options.canvasWidth) {
                this.options.canvasWidth = this.element.width();
            }
            this.options.realWidth = this.options.canvasWidth + this.options.rightPadding;
            canvas.height = this.options.canvasHeight;
            canvas.width = this.options.realWidth;

            this.ctx = canvas.getContext('2d');
            this.ctx.fillStyle = this.options.color;
            this.element.append(canvas);
            canvas.parentElement.style.overflow = 'hidden';
            canvas.parentElement.style.position = 'relative';
            canvas.style.position = this.options.position;
            canvas.style.bottom = this.options.positionBottom;
            canvas.style.left = this.options.positionLeft;
            
            this.springs = [];
            for (var i = 0; i < this.options.waveLength; i++)
            {
                this.springs[i] = new this.Spring();
            }

            startkitdropsAnimationTick(this);
        },
        Spring: function ()
        {
            this.p = 0;
            this.v = 0;
            //this.update = function (damp, tens)
            this.update = function (density, startkitripSpeed)
            {
                //this.v += (-tens * this.p - damp * this.v);
                this.v += (-startkitripSpeed * this.p - density * this.v);
                this.p += this.v;
            };
        },
        updateSprings: function (spread) {
            var i;
            for (i = 0; i < this.options.waveLength; i++)
            {
                //this.springs[i].update(0.02, 0.1);
                this.springs[i].update(this.options.density, this.options.startkitripSpeed);
            }

            var leftDeltas = [],
                    rightDeltas = [];

            for (var t = 0; t < 8; t++) {

                for (i = 0; i < this.options.waveLength; i++)
                {
                    if (i > 0)
                    {
                        leftDeltas[i] = spread * (this.springs[i].p - this.springs[i - 1].p);
                        this.springs[i - 1].v += leftDeltas[i];
                    }
                    if (i < this.options.waveLength - 1)
                    {
                        rightDeltas[i] = spread * (this.springs[i].p - this.springs[i + 1].p);
                        this.springs[i + 1].v += rightDeltas[i];
                    }
                }

                for (i = 0; i < this.options.waveLength; i++)
                {
                    if (i > 0)
                        this.springs[i - 1].p += leftDeltas[i];
                    if (i < this.options.waveLength - 1)
                        this.springs[i + 1].p += rightDeltas[i];
                }

            }

        },
        renderWaves: function ()
        {
            var i;
            this.ctx.beginPath();
            this.ctx.moveTo(0, this.options.canvasHeight);
            for (i = 0; i < this.options.waveLength; i++)
            {
                this.ctx.lineTo(i * (this.options.realWidth / this.options.waveLength), (this.options.canvasHeight / 2) + this.springs[i].p);
            }
            this.ctx.lineTo(this.options.realWidth, this.options.canvasHeight);
            this.ctx.fill();
        }
    });
    function startkitdropsAnimationTick(drop) {
        if ((Math.random() * 100) < drop.options.frequency)
            drop.springs[Math.floor(Math.random() * drop.options.waveLength)].p = drop.options.waveHeight;
        drop.ctx.clearRect(0, 0, drop.options.realWidth, drop.options.canvasHeight);
        drop.updateSprings(0.1);
        drop.renderWaves();
        requestAnimationFrame(function () {
            startkitdropsAnimationTick(drop);
        });
    };

    // Ripples Effect
        if ($('body').hasClass('startbiz')) {
             $('.startkitdrops').startkitdrops({color:'rgb(40 40 40 / 95%)',canvasHeight:50});
        } else if ($('body').hasClass('arowana')) {
            $('.startkitdrops').startkitdrops({color:'rgb(237 89 31 / 95%)',canvasHeight:50});
        } else if ($('body').hasClass('envira')) {
            $('.startkitdrops').startkitdrops({color:'rgb(142 204 59 / 95%)',canvasHeight:50});
		} else if ($('body').hasClass('startify')) {
            $('.startkitdrops').startkitdrops({color:'rgb(255 210 0)',canvasHeight:50});	
        } else {
            $('.startkitdrops').startkitdrops({color:'rgb(0 136 204 / 95%)',canvasHeight:50});
        }
        $(".startkitrips").startkitrip({
            width:100,
            height:100,
            duration: 1000,
            color: "#8ecc3b",
            event:"mousemove"
        });
});