/***************************************************************************************************************
||||||||||||||||||||||||||||         CUSTOM SCRIPT FOR KINDNESS            ||||||||||||||||||||||||||||||||||||
****************************************************************************************************************
||||||||||||||||||||||||||||              TABLE OF CONTENT                  ||||||||||||||||||||||||||||||||||||
****************************************************************************************************************
****************************************************************************************************************
1. RevolutionSliderActiver
2. CounterNumberChanger
3. Single gallery slider
4. Accordion Box
5. testimonialCarosule
6. Jquery Tabs Box
7. Main menu
9. Update Scroll to Top
10. Scroll to a Specific 
11. Update Scroll to Top
12. Contact Form Validation   

****************************************************************************************************************
||||||||||||||||||||||||||||            End TABLE OF CONTENT                ||||||||||||||||||||||||||||||||||||
****************************************************************************************************************/
"use strict";

//Main Slider
	if($('.main-slider').length){

		jQuery('.tp-banner').show().revolution({
		  delay:7500,
		  startwidth:1200,
		  startheight:733,
		  hideThumbs:600,
	
		  thumbWidth:80,
		  thumbHeight:50,
		  thumbAmount:5,
	
		  navigationType:"bullet",
		  navigationArrows:"0",
		  navigationStyle:"preview1",
	
		  touchenabled:"on",
		  onHoverStop:"off",
	
		  swipe_velocity: 0.7,
		  swipe_min_touches: 1,
		  swipe_max_touches: 1,
		  drag_block_vertical: false,
	
		  parallax:"mouse",
		  parallaxBgFreeze:"on",
		  parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
	
		  keyboardNavigation:"on",
	
		  navigationHAlign:"center",
		  navigationVAlign:"bottom",
		  navigationHOffset:0,
		  navigationVOffset:20,
	
		  soloArrowLeftHalign:"left",
		  soloArrowLeftValign:"center",
		  soloArrowLeftHOffset:20,
		  soloArrowLeftVOffset:0,
	
		  soloArrowRightHalign:"right",
		  soloArrowRightValign:"center",
		  soloArrowRightHOffset:20,
		  soloArrowRightVOffset:0,
	
		  shadow:0,
		  fullWidth:"on",
		  fullScreen:"off",
	
		  spinner:"spinner4",
	
		  stopLoop:"off",
		  stopAfterLoops:-1,
		  stopAtSlide:-1,
	
		  shuffle:"off",
	
		  autoHeight:"off",
		  forceFullWidth:"on",
	
		  hideThumbsOnMobile:"on",
		  hideNavDelayOnMobile:1500,
		  hideBulletsOnMobile:"on",
		  hideArrowsOnMobile:"on",
		  hideThumbsUnderResolution:0,
	
		  hideSliderAtLimit:0,
		  hideCaptionAtLimit:0,
		  hideAllCaptionAtLilmit:0,
		  startWithSlide:0,
		  videoJsPath:"",
		  fullScreenOffsetContainer: ".main-slider"
	  });

		
	}

// 2. CounterNumberChanger
function CounterNumberChanger() {
    var sFcounter = $('.sF-counter');
    if (sFcounter.length) {
        sFcounter.appear(function () {
            sFcounter.countTo();

        });
    };

}
// 3. Jquery Knob animation 
	if($('.dial').length){
		$('.dial').appear(function(){
          var elm = $(this);
          var color = elm.attr('data-fgColor');  
          var perc = elm.attr('value');  
 
          elm.knob({ 
               'value': 0, 
                'min':0,
                'max':100,
                'skin':'tron',
                'readOnly':true,
                'thickness':0.15,
				'dynamicDraw': true,
				'displayInput':false
          });

          $({value: 0}).animate({ value: perc }, {
			  duration: 1000,
              easing: 'swing',
              progress: function () { elm.val(Math.ceil(this.value)).trigger('change');
              }
          });

          //circular progress bar color
          $(this).append(function() {
              elm.parent().parent().find('.circular-bar-content').css('color',color);
              elm.parent().parent().find('.circular-bar-content label').text(perc+'%');
          });

          },{accY: 20});
    }
//4. TeamCarosule
function teamCarosule() {
    if ($('.teamcarosule').length) {
        $('.teamcarosule').owlCarousel({
            loop: true,
            margin:30,
            nav: true,
            navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
            dots: false,
            items: 1,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });
    }
}
//4. ClientCarosule
function clientCarosule() {
    if ($('.clientcarosule').length) {
        $('.clientcarosule').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
            dots: false,
            items: 3,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        });
    }
}
//5. Footercarosule
function footercarosule() {
    if ($('.footercarosule').length) {
        $('.footercarosule').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            items: 1,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    }
}
// 6. Sortable Masonary with Filters
function enableMasonry() {
    if ($('.sortable-masonry').length) {

        var winDow = $(window);
        // Needed variables
        var $container = $('.sortable-masonry .items-container');
        var $filter = $('.filter-btns');

        $container.isotope({
            filter: '*',
            masonry: {
                columnWidth: 0
            },
            animationOptions: {
                duration: 500,
                easing: 'linear'
            }
        });


        // Isotope Filter 
        $filter.find('li').on('click', function () {
            var selector = $(this).attr('data-filter');

            try {
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 500,
                        easing: 'linear',
                        queue: false
                    }
                });
            } catch (err) {

            }
            return false;
        });


        winDow.bind('resize', function () {
            var selector = $filter.find('li.active').attr('data-filter');

            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 500,
                    easing: 'linear',
                    queue: false
                }
            });
        });


        var filterItemA = $('.filter-btns li');

        filterItemA.on('click', function () {
            var $this = $(this);
            if (!$this.hasClass('active')) {
                filterItemA.removeClass('active');
                $this.addClass('active');
            }
        });
    }
}

enableMasonry();
//7. Countdown Timer
if ($('#countdown-timer').length) {
    $('#countdown-timer').countdown('2018/2/13', function (event) {
        var $this = $(this).html(event.strftime('' + '<div class="counter-column">Days<br><span class="count">%D</span></div> ' + '<div class="counter-column">Hour<br><span class="count">%H</span><span class="colon"></span></div>  ' + '<div class="counter-column">Mins<br><span class="count">%M</span><span class="colon"></span></div>  ' + '<div class="counter-column">Sec<br><span class="count">%S</span><span class="colon"></span></div>'));
    });
}

//08. progressBarConfig
function progressBarConfig() {
    var progressBar = $('.progress');
    if (progressBar.length) {
        progressBar.each(function () {
            var Self = $(this);
            Self.appear(function () {
                var progressValue = Self.data('value');

                Self.find('.progress-bar').animate({
                    width: progressValue + '%'
                }, 100);

                Self.find('.value').countTo({
                    from: 0,
                    to: progressValue,
                    speed: 100
                });
            });
        })
    }

}
// 9. ====Main menu===
function mainmenu() {

    var navcollapse = $('.main-menu .navigation li');
        navcollapse.hover(function() {
            $(this).children('ul').stop(true, false, true).slideToggle(300);
        });
	//Submenu Dropdown Toggle
	if($('.main-menu .mobile-menu li.dropdown ul').length){
		$('.main-menu .mobile-menu li.dropdown').append('<div class="dropdown-btn"></div>');
		
		//Dropdown Button
		$('.main-menu .mobile-menu li.dropdown .dropdown-btn').click(function() {
			$(this).prev('ul').slideToggle(500);
		});
	}

}




//10. Hide Loading Box (Preloader)
function handlePreloader() {
    if ($('.preloader').length) {
        $('.preloader').delay(200).fadeOut(500);
    }
}

//11. Scroll to a Specific Div
if ($('.scroll-to-target').length) {
    $(".scroll-to-target").on('click', function () {
        var target = $(this).attr('data-target');
        // animate
        $('html, body').animate({
            scrollTop: $(target).offset().top
        }, 1000);

    });
}


// 18.Update Scroll to Top
	function headerStyle() {
		if($('.main-header').length){
			var mainHeader = $('.main-header').height();
			var windowpos = $(window).scrollTop();
			if (windowpos >= mainHeader) {
				$('.bounce-in-header').addClass('now-visible');
				$('.scroll-to-top').fadeIn(300);
			} else {
				$('.bounce-in-header').removeClass('now-visible');
				$('.scroll-to-top').fadeOut(300);
			}
		}
	}
	
	headerStyle();

//13. Contact Form Validation
if ($('.contact-form').length) {
    $('.contact-form').validate({
        rules: {
            username: {
                required: true
            },
            lastname: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true
            },
            message: {
                required: true
            },
            date: {
                required: true
            },
            category: {
                required: true
            },
            website: {
                required: true
            }
        }
    });

}

// 15. Elements Animation
if ($('.wow').length) {
    var wow = new WOW({
        boxClass: 'wow', // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 0, // distance to the element when triggering the animation (default is 0)
        mobile: false, // trigger animations on mobile devices (default is true)
        live: true // act on asynchronously loaded content (default is true)
    });
    wow.init();
}
// 16. Jquery Knob animation 
	if($('.dial').length){
		$('.dial').appear(function(){
          var elm = $(this);
          var color = elm.attr('data-fgColor');  
          var perc = elm.attr('value');  
 
          elm.knob({ 
               'value': 0, 
                'min':0,
                'max':100,
                'skin':'tron',
                'readOnly':true,
                'thickness':0.15,
				'dynamicDraw': true,
				'displayInput':false
          });

          $({value: 0}).animate({ value: perc }, {
			  duration: 1000,
              easing: 'swing',
              progress: function () { elm.val(Math.ceil(this.value)).trigger('change');
              }
          });

          //circular progress bar color
          $(this).append(function() {
              elm.parent().parent().find('.circular-bar-content').css('color',color);
              elm.parent().parent().find('.circular-bar-content label').text(perc+'%');
          });

          },{accY: 20});
    }
// Dom Ready Function
jQuery(document).on('ready', function () {
    (function ($) {
        // add your functions
        CounterNumberChanger();
        teamCarosule();
        footercarosule();
        enableMasonry();
        clientCarosule();
        progressBarConfig ();
        mainmenu();
        
    })(jQuery);
});
// instance of fuction while Window Load event
jQuery(window).on('load', function () {
    (function ($) {
        handlePreloader()

    })(jQuery);
});

(function ($) {

    /* ==========================================================================
       When document is Scrollig, do
       ========================================================================== */
    $(window).on('scroll', function () {
        headerStyle();

    });
})(window.jQuery);