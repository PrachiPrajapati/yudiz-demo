// const jQuery = require("jquery");

var isInViewport = function (elem) {
    var bounding = elem.getBoundingClientRect();
    return (
        bounding.top >= 0 &&
        bounding.left >= 0 &&
        bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
};
var imgData = jQuery('img').not('.slick-lazy,.yswp_lazy');
for (var i = 0; i < imgData.length; i++) {
    if (imgData[i].getAttribute('src')) {
        if (!isInViewport(imgData[i])) {
            imgData[i].setAttribute('data-src', imgData[i].getAttribute('src'));
            imgData[i].setAttribute('src', '');
        }
    }
}
// jQuery("body").on("inview", "img[data-src]", function () {
//     var $this = jQuery(this);
//     $this.attr("src", $this.attr("data-src"));
//     $this.removeAttr("data-src");
// });
function init() {
    var imgDefer = jQuery('img').not('.slick-lazy,.yswp_lazy');
    for (var i = 0; i < imgDefer.length; i++) {
        if (imgDefer[i].getAttribute('data-src')) {
            imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-src'));
        }
    }
}

window.onload = init;

// function init() {
//     var imgDefer = document.getElementsByTagName('img');
//     for (var i = 0; i < imgDefer.length; i++) {
//         if (imgDefer[i].getAttribute('data-src')) {
//             imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-src'));
//         }
//     }
// }

// window.onload = init;
// Overlay Menu Top
/* if (jQuery(document).width() >= 992) {
    (function() {    
        var triggerBttn = document.getElementById( 'trigger-overlay' );
        function toggleOverlay() {
        var overlay = document.querySelector( 'div.overlay' );
            body = document.querySelector( 'body' );
            transEndEventNames = {
                'WebkitTransition': 'webkitTransitionEnd',
                'MozTransition': 'transitionend',
                'OTransition': 'oTransitionEnd',
                'msTransition': 'MSTransitionEnd',
                'transition': 'transitionend'
            },
            transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
            support = { transitions : Modernizr.csstransitions };
            if( classie.has( overlay, 'open' ) ) {
                classie.remove( overlay, 'open' );
                classie.remove( body, 'open-menu' );
                classie.add( overlay, 'close' );
                var onEndTransitionFn = function( ev ) {
                    if( support.transitions ) {
                        // if( ev.propertyName !== 'visibility' ) return;
                        // this.removeEventListener( transEndEventName, onEndTransitionFn );
                    }
                    classie.remove( overlay, 'close' );
                };
                if( support.transitions ) {
                    overlay.addEventListener( transEndEventName, onEndTransitionFn );
                    classie.remove( overlay, 'close' );
                }
                else {
                    onEndTransitionFn();
                }
            }
            else if( !classie.has( overlay, 'close' ) ) {
                classie.add( overlay, 'open' );
                classie.add( body, 'open-menu' );
            }
        }
        triggerBttn.addEventListener( 'click', toggleOverlay );

        // Typescript
        // var triggerBttn = document.getElementById('trigger-overlay');
        // var typed2 = new Typed('#typed2', {
        //     stringsElement: '#menu-strings',
        //     typeSpeed: 60,
        //     backSpeed: 60,
        //     startDelay: 1000,
        //     backDelay: 3000,
        //     fadeOut: true,
        //     loop: true,
        //     onReset: function(self) { prettyLog('onReset ' + self) },
        // });
        // triggerBttn.addEventListener( 'click',function() {
        //     typed2.reset();
        // });
        // function prettyLog(str) {
        // console.log('%c ' + str, 'color: green; font-weight: bold;');
        // }
    })();
} else { */
   /*  var menu = new MmenuLight(
        document.querySelector( '#mobile-menu' )
    );
    var navigator = menu.navigation({
        selectedClass: 'Selected-menu',
        // slidingSubmenus: true,
        theme: 'dark',
        title: '',
    });
    var drawer = menu.offcanvas({
        position: 'right'
    });
    //  Open the menu.
    document.querySelector( '.mobile-menu-icon' )
        .addEventListener( 'click', evnt => {
            evnt.preventDefault();
            drawer.open();
        });
    //  Close the menu.
    document.querySelector( '.close-menu' )
        .addEventListener( 'click', evnt => {
            evnt.preventDefault();
            drawer.close();
        }); */
/* } */

// Typescript
// document.addEventListener('DOMContentLoaded', function() {
//     if(jQuery('#typed').hasClass('typed')) {
//       var typed = new Typed('#typed', {
//         stringsElement: '#typed-strings',
//         typeSpeed: 60,
//         backSpeed: 60,
//         startDelay: 1000,
//         backDelay: 1500,
//         loop: true,
//         loopCount: Infinity,
//       });         
//     }
// });
function random(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    var rndNum = Math.floor(Math.random() * (max - min + 1)) + min;
    // if(notIn == rndNum) {
    //     rndNum = rndNum+1;
    // }
    return rndNum; //The maximum is inclusive and the minimum is inclusive 
}
jQuery(window).load(function() {
    // jQuery('.loader').addClass("active-load");
    countryCode();
    // setTimeout( function() {
        jQuery('.scroll-anim').attr('id',jQuery('.scroll-anim').attr('data-id'));
        // setTimeout( function() {
            if (jQuery('#we-are-animation').hasClass('scroll-anim')) {
                var animation = bodymovin.loadAnimation({
                    container: document.getElementById('we-are-animation'), // Required
                    path: 'wp-content/themes/yudiz/animation-data/we-are-animation/data.json', // Required
                    renderer: 'svg', // Required
                    loop: true, // Optional
                    autoplay: false, // Optional
                    name: "We Are Animation", // Name for future reference. Optional.
                });
            }
            jQuery(window).on('scroll', function() {
              jQuery(".scroll-anim").each(function() {
                if (isScrolledIntoView(jQuery(this))) {
                  jQuery(this).addClass("here");
                  if(jQuery('#we-are-animation').hasClass('here')){
                    animation.play();
                  }
                }
              });
            });
            // animation.play();
        // },500);
    // }, 300);

    jQuery('.main-banner .obj img').each(function() { 
        jQuery(this).attr('src',jQuery(this).attr('data-src'));
    });
    jQuery('#mobile-menu img').each(function() { 
        jQuery(this).attr('src',jQuery(this).attr('data-src'));
    });
});

jQuery(document).ready(function () {
    // Wow for Animation on Scroll
    wow = new WOW(
      {
        animateClass: 'animated',
        offset: 100
      }
    );
    wow.init();

    
    // Event Popup Redirection
    jQuery('#event-popup .theme-btn a').click(function (e) {
        location.href = this.href;
    });

    //Check to see if the window is top if not then display button
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 150) {
          jQuery('.scroll-to-top').css({'opacity':1, 'pointer-events': 'auto'});
          jQuery('#masthead').addClass('sticky-menu');
        } else {
          jQuery('.scroll-to-top').css({'opacity':0, 'pointer-events': 'none'});
          jQuery('#masthead').removeClass('sticky-menu');
        }
    });

    //Click event to scroll to top
     jQuery('.scroll-to-top').click(function () {
        jQuery('html, body').animate({scrollTop: 0}, 800);
        return false
     });

    // Go to Top Button Animation
    var buttons7Click = Array.prototype.slice.call( document.querySelectorAll( '#btn-click div' ) ),
        totalButtons7Click = buttons7Click.length;

    buttons7Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );
    function activate() {
        var self = this, activatedClass = 'btn-activated';

        if( !classie.has( this, activatedClass ) ) {
            classie.add( this, activatedClass );
            setTimeout( function() { classie.remove( self, activatedClass ) }, 1000 );
        }
    }

    // Slick Slider
    jQuery('.menu-typed-slider').slick({
        // lazyLoad: 'ondemand',
        fade: true,
        arrows: false,
        dots: false,
        pauseOnHover:false,
        pauseOnFocus: false,
        autoplay: true,
        autoplaySpeed: 2000
    });
    jQuery('.about-typed-slider').slick({
        // lazyLoad: 'ondemand',
        fade: true,
        arrows: false,
        dots: false,
        pauseOnHover:false,
        pauseOnFocus: false,
        autoplay: true,
        autoplaySpeed: 2000
    });
    // jQuery('.hero-main-slider').slick({
    // 	// lazyLoad: 'ondemand',
    //     fade: true,
    //     arrows: false,
    //     dots: true,
    //     pauseOnHover:false,
    //     pauseOnFocus: false,
    //     autoplay: true,
    //     autoplaySpeed: 5000
    // });

    jQuery('.game-portfolio-section').slick({
    	// lazyLoad: 'ondemand',
        arrows: false,
        dots: true,
        pauseOnHover:false,
        pauseOnFocus: false,
        autoplay: true,
        autoplaySpeed: 5000
    });

    jQuery('.notification-slider').slick({
    	// lazyLoad: 'ondemand',
        arrows: false,
        fade: true
    });
    // jQuery('.home-slider').slick({              
    	lazyLoad: 'ondemand',
    //     arrows: false,
    //     dots: false,
    //     fade: true,
    //     pauseOnHover:false,
    //     autoplay: true,
    //     autoplaySpeed: 5000
    // });
    jQuery('.work-slider').slick({
    	// lazyLoad: 'ondemand',
        dots: true,
        pauseOnHover:false,
        pauseOnFocus: false,
        infinite: false,
        autoplay: true,
        autoplaySpeed: 5000
    });
    // .on('lazyLoaded', function (event, slick, $img) {
    //     $img
    //         // Find the parent <picture> tag of img
    //         .closest('picture')
    //         // Find <source> tags with data-lazy-srcset attribute
    //         .find('source[data-lazy-srcset]')
    //         // Copy data-lazy-srcset to srcset
    //         .each(function (i, source) {
    //             $source = jQuery(source);
    //             $source.attr('srcset', $source.data('lazy-srcset'));
    //         });

    // });
    jQuery('.blog-slider').slick({
    	// lazyLoad: 'ondemand',
        fade: true,
        pauseOnHover:false,
        pauseOnFocus: false
    }); 
    jQuery('.solution-product-slider').slick({
    	// lazyLoad: 'ondemand',
        fade: true,
        pauseOnHover:false,
        pauseOnFocus: false,
        autoplay:true,
    }); 
    jQuery('.growing-through-slider').slick({
        // lazyLoad: 'ondemand',
        fade: true,
        pauseOnHover:false,
        pauseOnFocus: false,
    }); 


    
    jQuery('.we-offer').slick({
    	// lazyLoad: 'ondemand',
        arrows: false,
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        pauseOnFocus: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    // our clients
    jQuery('.logos-slider').slick({
    	// lazyLoad: 'ondemand',
        arrows: true,
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        pauseOnFocus: false,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    })


    // our clients
    jQuery('.game-client-logo-slider').slick({
    	// lazyLoad: 'ondemand',
        arrows: false,
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnFocus: false,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1,
                    arrows: true
                }
            }
        ]
    })


    jQuery('.awards-slider').slick({
    	// lazyLoad: 'ondemand',
        dots: false,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: false,
        pauseOnFocus: false,
        responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 520,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
    jQuery('.filter-slider').slick({
        dots: false,
        arrows: true,
        appendArrows: jQuery(".custom-navigation"),
        slidesToShow: 5,
        slidesToScroll: 3,
        variableWidth: true,
        infinite: false,
        responsive: [
        {
          breakpoint: 1600,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1               
          }
        }
        ]               
    });
    // jQuery('.about-slider').slick({
    // 	// lazyLoad: 'ondemand',
    //     dots: false,
    //     arrows: true,
    //     infinite: true,
    //     centerMode: true,
    //     autoplay: true,
    //     autoplaySpeed: 3000,
    //     slidesToShow: 4,
    //     slidesToScroll: 1,
    //     pauseOnFocus: false,
    //     responsive: [
    //     {
    //       breakpoint: 1600,
    //       settings: {
    //         slidesToShow: 3
    //       }
    //     },
    //     {
    //       breakpoint: 1200,
    //       settings: {
    //         slidesToShow: 2
    //       }
    //     },
    //     {
    //       breakpoint: 767,
    //       settings: {
    //         slidesToShow: 1                 
    //       }
    //     }
    //   ]
    // });
   
    jQuery('.client-comm-logo').slick({
    	// lazyLoad: 'ondemand',
        dots: false,
        arrows: false,
        infinite: true,
        centerMode: true,
        autoplay: true,
        autoplaySpeed: 3000,
        centerPadding:'12%',
        slidesToShow: 4,
        slidesToScroll: 1,
        pauseOnFocus: false,
        responsive: [
        {
          breakpoint: 1600,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1                 
          }
        }
      ]
    });
    jQuery('.game-dev-testimonail-slider').slick({
        // lazyLoad: 'ondemand',
        arrows: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        pauseOnFocus: false
    });

    // Related Casestudy Slider
    jQuery('.related-casestudy-slider').slick({
    	// lazyLoad: 'ondemand',
        dots: false,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    jQuery('.gitext-testimonial-slider').slick({
        // lazyLoad: 'ondemand',
        fade: false,
        pauseOnHover:false,
        pauseOnFocus: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    
    }); 
   

    // Search Form Animation
    jQuery('.search-form input').focusin(function(){
        jQuery(this).parent('.input-group').addClass('focus');
    });
    jQuery('.search-form input').focusout(function(){
        jQuery(this).parent('.input-group').removeClass('focus');        
    });  

    // Contact Form Animation
    jQuery('.wpcf7-form-control').focusin(function(){
        jQuery(this).parents('.wpcf7-form-control-wrap').addClass('focus');
    });
    jQuery('.wpcf7-form-control').focusout(function(){
        jQuery(this).parents('.wpcf7-form-control-wrap').removeClass('focus');
    });       
//gravity form animation 
// Contact Form Animation
jQuery('.ginput_container').focusin(function(){
    jQuery(this).addClass('focus');
});
jQuery('.ginput_container').focusout(function(){
    jQuery(this).removeClass('focus');
});      
    // Custom Select using JCF
    var customSelect = jQuery('.wpcf7 select,.filter-select select ,.ginput_container_select select');
        // Options for custom Select
    jcf.setOptions('Select', {
        wrapNative: false,
        wrapNativeOnMobile: false,
        fakeDropInBody: false
    });
    jcf.replace(customSelect);
    jcf.refresh();
    //
    jQuery(document).on('gform_post_render', function(){
 
        var customSelect = jQuery('.ginput_container_select select');
        // Options for custom Select
    jcf.setOptions('Select', {
        wrapNative: false,
        wrapNativeOnMobile: false,
        fakeDropInBody: false
    });
    jcf.replace(customSelect);
    jcf.refresh();
 
    });
    //radio for contact page
    jQuery('.hideradio').change(function(){
        if(jQuery('.hideradio').is(':checked')){
            jQuery('.hideradio').parent().removeClass('checked');
            jQuery(this).parent().addClass('checked');
        }
    });
    //Custom fileupload
    jQuery('input[type=file]').change(function(e){
        jQuery(".file-before").hide();
        jQuery(".file-after").fadeIn(500);
        var fileName = e.target.files[0]. name;
        jQuery(".file-after span").text(fileName);
    });
    jQuery('.file-after a').click(function(){
        jQuery(this).parents('.file-upload').find('.wpcf7-file').val('');
        jQuery(".file-after span").text("");
        jQuery(".file-after").hide();
        jQuery(".file-before").fadeIn(500);
    });
    if (jQuery('body').hasClass('page-id-157') || jQuery('body').hasClass('single-join-our-team')){
        var wpcf7Elm = document.querySelector('.wpcf7');
        wpcf7Elm.addEventListener('wpcf7submit', function (event) {
            jQuery('.wpcf7 .file-after a').trigger('click');
        }, false);
    }
    var obj = jQuery(".file-upload");
    obj.on('dragstart',function(e){
        e.stopPropagation();
        e.originalEvent.dataTransfer.effectAllowed = "copyMove";
    })
    obj.on('dragenter',function(e){
        e.stopPropagation();
        e.originalEvent.dataTransfer.dropEffect = "copy";
    })
    obj.on('dragover', function (e) 
    {
        e.stopPropagation();
        e.preventDefault();
        e.originalEvent.dataTransfer.dropEffect = "copy";
        jQuery('body').addClass('file-being-added');
    });
    obj.on('dragleave', function (e) 
    {
        e.preventDefault();
        jQuery('body').removeClass('file-being-added');
    });
    obj.on('dragexit', function (e) 
    {
        e.preventDefault();
        jQuery('body').removeClass('file-being-added');
    });
    obj.on('drop', function (e) 
    {
        jQuery('body').removeClass('file-being-added');
    });

    // Menu icon animation
    jQuery('.hamburger').click(function(){
        if(!jQuery(this).hasClass("active") && jQuery('.overlay').hasClass('open')){
            jQuery(this).addClass("active");
            jQuery(this).addClass("open");
            jQuery(this).removeClass("closed");
            jQuery('body').addClass("open-menu");   
        }else{
            jQuery(this).removeClass("active");
            jQuery(this).removeClass("open");
            jQuery(this).addClass("closed");
            jQuery('body').removeClass("open-menu");
        }               
    });
    
    // career single
    jQuery('a.apply-btn').click(function(){
        jQuery('.apply-now').show();
        jQuery('html, body'). animate({
        scrollTop: jQuery(".apply-now").offset().top -90
        }, 1000)
    });
    jQuery('a.down-scroll-btn, a.down-scroll-btn-text, a.up-scroll').click(function(){
        jQuery('html, body'). animate({
        scrollTop: jQuery("#intro").offset().top -70
        }, 1000)
    })

    jQuery(".scroll-image").each(function(){
        var current = 0;
        //Calls the scrolling function repeatedly
        setInterval(function(e){
                current -= 1;
            jQuery(".scroll-image").css("backgroundPosition", current+"px bottom");
        }, 100);
    });

    jQuery('.service-side-list .filter-select select option').each(function(){
        var url = jQuery(location).attr("href");
        var val = jQuery(this).val();
        if(val == url){
            jQuery(this).attr("selected","selected");
            jcf.replace(customSelect);
            jcf.refresh();
        }

    });
    jQuery('.service-side-list .filter-select select').change(function(){
        var val = jQuery(this).val();
        window.location.href = val;     
    });
    jQuery(window).resize(function() {
        contactDropdown();
        menu_class();
    });
    
    function contactDropdown() {
        if (jQuery(window).width() < 768) { 
            
            jQuery(".nav-tabs-dropdown").remove();
            jQuery(".vc_tta-tabs-container").prepend('<a href="#" class="nav-tabs-dropdown">Tabs</a>');

            jQuery('.nav-tabs-dropdown').each(function(i, elm) {                     
                jQuery(elm).text(jQuery(elm).next('ul').find('li.vc_active a').text());                     
            });
              
            jQuery('.nav-tabs-dropdown').on('click', function(e) {
                e.preventDefault();                     
                jQuery(e.target).toggleClass('open').next('ul').slideToggle();                      
            });

            jQuery('.vc_tta-tabs-list .vc_tta-tab').on('click', function(e) {
                e.preventDefault();                     
                jQuery(e.target).closest('ul').hide().prev('a').removeClass('open').text(jQuery(this).text());                        
            });
        }
    }
    function menu_class(){
        if (jQuery(window).width() < 992) {
            jQuery(document).on('click', 'body', function(e) {
                if (jQuery('.hamburger').hasClass('active')) {
                    if(jQuery(e.target).closest('#responsive-menu-container').length || jQuery(e.target).closest('#responsive-menu-button').length) {
                        return;
                    }                           
                    jQuery('.hamburger').removeClass("active");
                    jQuery('.hamburger').removeClass("open");
                    jQuery('body').removeClass("open-menu");
                }
            });
        }
    }
    var lazyImages = [].slice.call(document.querySelectorAll("img.yswp_lazy"));
    if ("IntersectionObserver" in window) {
      let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            let lazyImage = entry.target;
            lazyImage.src = lazyImage.dataset.lzy_src;
            lazyImage.classList.remove("yswp_lazy");
            lazyImageObserver.unobserve(lazyImage);
          }
        });
      });
  
      lazyImages.forEach(function(lazyImage) {
        lazyImageObserver.observe(lazyImage);
      });
    } else {
      console.log("lazy load not avilable update browser!");
    }
    contactDropdown();
    menu_class();
    jQuery(window).on('resize scroll', function() {
        var elementTop = jQuery('footer').offset().top;
        var elementBottom = elementTop + jQuery('footer').outerHeight();
        var viewportTop = jQuery(window).scrollTop();
        var viewportBottom = viewportTop + jQuery(window).height();
        if (elementBottom > viewportTop && elementTop < viewportBottom) {
            jQuery('.scroll-to-top').addClass('sticky');
        } else {
            jQuery('.scroll-to-top').removeClass('sticky');
        }
    });
    jQuery(".theme-btn a").each(function(){
        var btnsrc = jQuery(this).attr("href");
        jQuery(this).attr({"data-href": btnsrc }).removeAttr("href");                           
    });
    jQuery('#event-popup .theme-btn a').attr('href',jQuery('#event-popup .theme-btn a').attr('data-href'));
    jQuery(".theme-btn a").on('click',function(){
        var clickAddr = jQuery(this).attr("data-href");
        setTimeout(function(){
            jQuery(location).attr("href", clickAddr);
        },600);
    }); 

}); 


if(localStorage.getItem("popup")=='' || localStorage.getItem("popup")=='undefined' || localStorage.getItem("popup")==null) {
    localStorage.setItem("popup", "on");
}

jQuery(document).ready(function($){   
    //counter
    // function inviewExample() {
    //     var $example = $('#home-counter');
    //     var inview;
    //     if ($example.length) {
    //         inview = new Waypoint.Inview({
    //             element: $('#home-counter')[0],
    //             entered: function (direction) {
    //                 $('.timer').each(function () {
    //                     var $this = $(this);
    //                     var val = $(this).data('count');
    //                     jQuery({ Counter: 0 }).animate({ Counter: val }, {
    //                         duration: 2500,
    //                         easing: 'swing',
    //                         step: function () {
    //                             $this.text(Math.ceil(this.Counter));
    //                         }
    //                     });
    //                 });
    //             }
    //         })
    //     }
    // }
    // $(window).on('load', function () {
    //     inviewExample();
    // });
    function bodypadding(){
        var headerHeight = $('#masthead').outerHeight();
        $('body').css('padding-top',headerHeight);
    }
    bodypadding();
    $('.notification-slider').on('init', function(event, slick){
        bodypadding();
    });

    $(window).on('resize scroll',function() {
        bodypadding();
    });
    

    if(localStorage.getItem("popup")=='on' ){
       
        $("#event-popup").fancybox().trigger('click');
        localStorage.setItem("popup", "off");
        
    }

    $("body").on('click', '.thank-you-popup a', function(e){
    	e.preventDefault();
    	e.stopPropagation();
    	window.open(this.href, '_blank');
    });

    document.addEventListener( 'wpcf7submit', function( event ) {
        jQuery('.wpcf7-form').removeClass('loading');
    }, false );
    
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        console.log(event.detail.contactFormId+' THIS CALLED');
        jQuery('.wpcf7-form').removeClass('loading');
        if ( '492' == event.detail.contactFormId ) {
            $("#event-thankyou-popup").fancybox().trigger('click');
        }
        else if ( '366' == event.detail.contactFormId ) {
            $("#thank-you-popup").fancybox().trigger('click');
        }
        else if ( '359' == event.detail.contactFormId ) {
            $("#thank-you-popup").fancybox().trigger('click');
        }
        else if ( '158' == event.detail.contactFormId  ) {
            $("#inquiry-thank-you-popup").fancybox().trigger('click');
        }
        else if ( '19006' == event.detail.contactFormId ) {
            $("#inquiry-thank-you-popup").fancybox().trigger('click');
        } else {
            //$("#inquiry-thank-you-popup").fancybox().trigger('click');
        }
    }, false );

    jQuery(document).on("click", ".wpcf7-submit", function(e) {
        jQuery(this).parents('form').addClass('loading');
    });

   	$('.home-slider-section-off').mousemove(function(e){
     	var rXP = (e.pageX - this.offsetLeft-$(this).width()/2);
     	var rYP = (e.pageY - this.offsetTop-$(this).height()/2);
     	$('.watermark-text span').css('text-shadow', +rYP/20+'px '+rXP/10+'px rgba(71,235,198,1), '+rYP/-20+'px '+rXP/-10+'px rgba(0,0,0,1), '+rXP/20+'px '+rYP/10+'px rgba(255,255,255,0.7)');
   	});

   	//Load More Join Our Team
    var paged = true;
    $(window).scroll(function(e){
        if( $(window).scrollTop() >= ($(document).height() - $(window).height() - $("#colophon").height() - $("#get-in-touch-scroll").height())){
            if ($("form").hasClass('load-more-form')) {
                return false;
                // e.preventDefault();
                if (paged) {
                    $('body').addClass("loading");
                    var page = parseInt($('.page-no').val());
                    var total_pages = parseInt($('.total-pages').val());
                    $.ajax({
                        type : 'POST',
                        // async: false,
                        url : ajax_object.ajax_url,
                        data : $('.load-more-form').serialize(),
                        success : function(data){
                            $('body').removeClass("loading");
                            $('.main-lists').append(data);
                            if(page >= total_pages){
                                paged = false;
                                $('.load-more-jn-tm-btn').hide();
                            }
                            $('.page-no').val(parseInt(page) + 1);
                        }
                    });
                }
            }
        }
    });
	$('body').on('submit', '#load-more-jn-tm-form', function(e){
        e.preventDefault();
        $('body').addClass("loading");
        var page = parseInt($('.page-no').val());
        var total_pages = parseInt($('.total-pages').val());
        $.ajax({
            type : 'POST',
            // async: false,
            url : ajax_object.ajax_url,
            data : $('#load-more-jn-tm-form').serialize(),
            success : function(data){
            	$('body').removeClass("loading");
                jQuery(data).insertAfter('.main-lists');
            	
                if(page >= total_pages){
                    $('.load-more-jn-tm-btn').hide();
                }
                $('.page-no').val(parseInt(page) + 1);
            }
        });
    });

    //Load More Portfolio
    $('body').on('submit', '#load-more-portfolio', function(e){
        e.preventDefault();
        $('body').addClass("loading");
        var page = parseInt($('.page-no').val());
        var total_pages = parseInt($('.total-pages').val());
        $('.load-more-portfolio-btn').attr("disabled", true);
        $.ajax({
            type : 'POST',
            // async: false,
            url : ajax_object.ajax_url,
            data : $('#load-more-portfolio').serialize(),
            success : function(data){
                $('body').removeClass("loading");
                $('.main-lists').append(data);
                if(page >= total_pages){
                    $('.load-more-portfolio-btn').hide();
                }
                $('.page-no').val(parseInt(page) + 1);
                $('.load-more-portfolio-btn').attr("disabled", false);
            }
        });
    });

    //Filter Portfolio
    $('body').on('click', 'ul.filter li.portfolio-category', function(e){
        e.preventDefault();
        var filterVal = $(this).attr("data-val");
        var searchVal = $('.searchVal').val();
        $('ul.filter li.portfolio-category').removeClass("active");
        $(this).addClass("active");
        var action = 'filter_portfolio';
        $('body').addClass("filter-loading");
        $('.main-lists').html('');
        $('.load-more-main').hide();
        $('.load-more-portfolio-btn').attr("disabled", true);
        $.ajax({
            type : 'POST',
            // async: false,
            url : ajax_object.ajax_url,
            data : {'filterVal' : filterVal, 'action' : action, 'searchVal' : searchVal},
            success : function(data){
                $('body').removeClass("filter-loading");
                $('#load-more-portfolio .filterVal').val(filterVal);
                $('.main-lists').html(data);
                $('.load-more-main').show();
                var page = 2;
                var total_pages = parseInt($('.total-pages').val());
                $('.total-pages').val(total_pages);
                $('.page-no').val(page);
                if(total_pages < page){
                    $('.load-more-portfolio-btn').hide();
                } else {
                    $('.load-more-portfolio-btn').show();
                }
                $('.load-more-portfolio-btn').attr("disabled", false);
            }
        });
    });

    //Filter Portfolio Mobile
    $('body').on('change', '.filter-portfolio-cat', function(e){
        e.preventDefault();
        var filterVal = $(this).val();
        var searchVal = $('.searchVal').val();
        $('ul.filter li.portfolio-category').removeClass("active");
        $(this).addClass("active");
        var action = 'filter_portfolio';
        $('body').addClass("filter-loading");
        $('.main-lists').html('');
        $('.load-more-main').hide();
        $('.load-more-portfolio-btn').attr("disabled", true);
        $.ajax({
            type : 'POST',
            // async: false,
            url : ajax_object.ajax_url,
            data : {'filterVal' : filterVal, 'action' : action, 'searchVal' : searchVal},
            success : function(data){
                $('body').removeClass("filter-loading");
                $('#load-more-portfolio .filterVal').val(filterVal);
                $('.main-lists').html(data);
                $('.load-more-main').show();
                var page = 2;
                var total_pages = parseInt($('.total-pages').val());
                $('.total-pages').val(total_pages);
                $('.page-no').val(page);
                if(total_pages < page){
                    $('.load-more-portfolio-btn').hide();
                } else {
                    $('.load-more-portfolio-btn').show();
                }
                $('.load-more-portfolio-btn').attr("disabled", false);
            }
        });
    });

    //Load More Blog
    $('body').on('submit', '#load-more-blog', function(e){
        e.preventDefault();
        $('body').addClass("loading");
        var page = parseInt($('.page-no').val());
        var total_pages = parseInt($('.total-pages').val());
        $.ajax({
            type : 'POST',
            // async: false,
            url : ajax_object.ajax_url,
            data : $('#load-more-blog').serialize(),
            success : function(data){
                $('.total-pages').remove("input");
                $('body').removeClass("loading");
                $('.main-lists').append(data);
                if(page >= total_pages){
                    $('.load-more-blog-btn').hide();
                }
                $('.page-no').val(parseInt(page) + 1);
            }
        });
    });

    //Filter Blog
    $('body').on('click', 'ul.filter li.blog-category', function(e){
        e.preventDefault();
        var filterVal = $(this).attr("data-val");
        var searchVal = $('.searchVal').val();
        $('ul.filter li.blog-category').removeClass("active");
        $(this).addClass("active");
        var action = 'filter_blog';
        $('body').addClass("filter-loading");
        $('.main-lists').html('');
        $('.load-more-main').hide();
        $.ajax({
            type : 'POST',
            // async: false,
            url : ajax_object.ajax_url,
            data : {'filterVal' : filterVal, 'action' : action, 'searchVal' : searchVal},
            success : function(data){
                $('body').removeClass("filter-loading");
                $('#load-more-blog .filterVal').val(filterVal);
                $('.main-lists').html(data);
                $('.load-more-main').show();
                var page = 2;
                var total_pages = parseInt($('.total-pages').val());
                $('.total-pages').val(total_pages);
                $('.page-no').val(page);
                if(total_pages < page){
                    $('.load-more-blog-btn').hide();
                } else {
                    $('.load-more-blog-btn').show();
                }
            }
        });
    });

    //Filter Blog Mobile
    $('body').on('change', '.filter-blog-cat', function(e){
        e.preventDefault();
        var filterVal = $(this).val();
        var searchVal = $('.searchVal').val();
        $('ul.filter li.blog-category').removeClass("active");
        $(this).addClass("active");
        var action = 'filter_blog';
        $('body').addClass("filter-loading");
        $('.main-lists').html('');
        $('.load-more-main').hide();
        $.ajax({
            type : 'POST',
            // async: false,
            url : ajax_object.ajax_url,
            data : {'filterVal' : filterVal, 'action' : action, 'searchVal' : searchVal},
            success : function(data){
                $('body').removeClass("filter-loading");
                $('#load-more-blog .filterVal').val(filterVal);
                $('.main-lists').html(data);
                $('.load-more-main').show();
                var page = 2;
                var total_pages = parseInt($('.total-pages').val());
                $('.total-pages').val(total_pages);
                $('.page-no').val(page);
                if(total_pages < page){
                    $('.load-more-blog-btn').hide();
                } else {
                    $('.load-more-blog-btn').show();
                }
            }
        });
    });

    //Load More Case Study
    $('body').on('submit', '#load-more-case-study', function(e){
        e.preventDefault();
        $('body').addClass("loading");
        var page = parseInt($('.page-no').val());
        var total_pages = parseInt($('.total-pages').val());
        $.ajax({
            type : 'POST',
            // async: false,
            url : ajax_object.ajax_url,
            data : $('#load-more-case-study').serialize(),
            success : function(data){
                $('body').removeClass("loading");
                $('.case-study-lst').append(data);
                if(page >= total_pages){
                    $('.loadmore-casestudy-btn').hide();
                }
                $('.page-no').val(parseInt(page) + 1);
            }
        });
    });

});

jQuery(function($){
    $(".search").keyup(function(e)
    {
        // don't want keyup to fire if we are scrolling
        //e.which == 13 ||
        if( e.which == 38 || e.which == 40) {
             return false;
        }
        var searchid = $(this).val();
        var dataString = 'search='+ searchid+'&action=searchPortfolio';

        if(searchid!='')
        {
            $.ajax({
                type: "POST",
                async: false,
                url : ajax_object.ajax_url,
                // dataType: "json",
                data: dataString,
                // cache: false,
                success: function(html)
                {
                    $("#result").html(html).show();
                }
            });
        }return false;
    }).keydown(function(e) {
        // check if result div is visible
        var visible = $('#result').is(':visible');

        var key = e.which;

        // Enter Key
        if(key == 13) {
            return true;
            // e.preventDefault();
            // e.stopPropagation()
            var action = 'search_portfolio';
            var searchid = $('.search').val();
            var filterVal = $(".filterVal").val();
            $.ajax({
                type : 'POST',
                // async: false,
                url : ajax_object.ajax_url,
                data : 'searchVal='+ searchid+'&action='+action+'&filterVal='+filterVal,
                success : function(data){
                    $('.searchVal').val(searchid);
                    // $('.main-lists').html(data);
                    $('#load-more-portfolio .filterVal').val(filterVal);
                    var page = 2;
                    var total_pages = parseInt($('.total-pages').val());
                    $('.total-pages').val(total_pages);
                    $('.page-no').val(page);
                    if(total_pages < page){
                        $('.load-more-portfolio-btn').hide();
                    } else {
                        $('.load-more-portfolio-btn').show();
                    }
                }
            });
            // return false;
        }
        
        // down arrow
        if(key == 40) {
            if(visible) {
                if($('#result div.selected-hint').length == 0) {
                    var child = $('#result div:nth-child(1)');
                    child.addClass('selected-hint');
                    var name = child.html();
                    if (typeof name === "undefined") {
                    } else {
                        $('#searchid').val($.trim(name));
                    }
                }
                else {

                    if($('#result div.selected-hint').next('div').length) {

                        $('#result div.selected-hint').removeClass('selected-hint').next('div').addClass('selected-hint');
                        var name = $('#result div.selected-hint').html();
                        if (typeof name === "undefined") {
                        } else {
                            $('#searchid').val($.trim(name));
                        }
                    }
                    else {

                        $('#result div.selected-hint').removeClass('selected-hint');

                    }
                }

            }
        }
        // up arrow
        if(key == 38) {
            if(visible) {

                if($('#result div.selected-hint').prev('div').length) {

                    $('#result div.selected-hint').removeClass('selected-hint').prev('div').addClass('selected-hint');
                    var name = $('#result div.selected-hint').html();
                    if (typeof name === "undefined") {
                    } else {
                        $('#searchid').val($.trim(name));
                    }
                }
                else {

                    $('#result div.selected-hint').removeClass('selected-hint');

                }
            }
        }
    });

    jQuery("#result").on("click",function(e){
        var $clicked = $(e.target);
        var $name = $clicked.html();
        var decoded = $("<div/>").html($name).text();
        $('#searchid').val($.trim(decoded));
        // var yourLinkHref= $(this).attr('href');
        //window.location = "mainpage.php?TopicName=" + $name;
    });
    jQuery(document).on("click", function(e) {
        var $clicked = $(e.target);
        if (! $clicked.hasClass("search")){
            jQuery("#result").fadeOut();
        }
    });
    $('#searchid').click(function(){
        jQuery("#result").fadeIn();
    });
    // $('#result div').click(function(e) 
    // { 
    //     $('#searchid').val($(this).text());
    // });    

    jQuery(function() {
        jQuery('a[href*="#"]:not([href="#"])').click(function() {
            if(!jQuery(this).attr('data-vc-container')){
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                    var target = jQuery(this.hash);
                    target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
                    if (target.length) {
                    jQuery('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                    }
                }
            }
        });
      });
});

/* SVG Animation on Scroll */
function isScrolledIntoView(elem) {
  var docViewTop = jQuery(window).scrollTop();
  var docViewBottom = docViewTop + jQuery(window).height();
  var elemTop = jQuery(elem).offset().top + 50;
  var elemBottom = elemTop + jQuery(elem).height();
  return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}
// jQuery(window).on('scroll', function() {
//   jQuery(".scroll-anim").each(function() {
//     if (isScrolledIntoView(jQuery(this))) {
//       jQuery(this).addClass("here");
//       if(jQuery('#we-are-animation').hasClass('here')){
//         animation.play();
//       }
//     }
//   });
// });
function countryCode( code ) {
    // jQuery('.flag-container .country-list').remove();
    var dataCountryCode = jQuery('.country.active').attr('data-country-code');
    if(code == undefined){
        code = dataCountryCode;
    }else{
        code = code;
    }
    var dataCountryName = jQuery('.country.active').find('.country-name').html();

    // jQuery('.intl-tel-input .selected-flag').attr('title',dataCountryName).html('<div class="iti-flag '+dataCountryCode+'"></div><div class="iti-arrow"></div>');
    jQuery('.intl-tel-input .selected-flag').attr('title',dataCountryName).html('<div class="iti-flag"></div>');
    var dataDialCode;
    jQuery.each( jQuery('.intl-tel-input .country-list .country'), function( i, val ) {
        if(jQuery(this).attr('data-country-code') == code) {
            dataDialCode = jQuery(this).find('.dial-code').html();
        }
    });
    jQuery('.wpcf7-phonetext').val('');
    jQuery('.intl-tel-input .iti-flag').html(dataDialCode);
    jQuery('.telephone_no').val(dataDialCode);
}
jQuery(document).ready(function ($) {
    // team random
    var team_img = jQuery(".team-blk");
    for (var i = 0; i < team_img.length; i++) {
        var target = Math.floor(Math.random() * team_img.length - 1) + 1;
        var target2 = Math.floor(Math.random() * team_img.length - 1) + 1;
        team_img.eq(target).before(team_img.eq(target2));
    }
    
    jQuery('.numeric').on('input', function (event) { 
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    /*document.addEventListener( 'wpcf7submit', function( event ) {
        //359
        var val = 'false';
        var regExp = /^[0-9]{10}$/;
        if ( '366' == event.detail.contactFormId ) {
            // var fileInput2 = jQuery('input[name="file-5"]').val();
            // if (fileInput2 == '') {
            //     jQuery('.file-5').parents('.file-upload').addClass('required');
            //     val = 'true';
            // }
            // var phoneNumber_career = jQuery('input[name="phonenumber-career"]').val();
            // if (!regExp.test(phoneNumber_career)) {
            //     jQuery('.phonenumber-career .wpcf7-not-valid-tip').remove();
            //     jQuery('.phonenumber-career').append('<span role="alert" class="wpcf7-not-valid-tip">Phone number must be 10 numbers only</span>');
            //     val = 'true';
            // }
        } else if ( '158' == event.detail.contactFormId ) {
            // var inputs = event.detail.inputs;
            // for ( var i = 0; i < inputs.length; i++ ) {
            //    if ( 'phonenumber' == inputs[i].name ) {
            //         if(inputs[i].value == ''){
            //             jQuery('.telephone_no').val('');
            //             console.log(jQuery('.telephone_no'));
            //         }
            //         break;
            //     }
            // }
        } else {
            // var fileInput1 = jQuery('input[name="file-170"]').val();
            // if (fileInput1 == '') {
            //     jQuery('.file-170').parents('.file-upload').addClass('required');
            //     val = 'true';
            // }
            // var phoneNumber = jQuery('input[name="phonenumber"]').val();
            //  if (!regExp.test(phoneNumber)) {
            //     jQuery('.phonenumber .wpcf7-not-valid-tip').remove();
            //     jQuery('.phonenumber').append('<span role="alert" class="wpcf7-not-valid-tip">Phone number must be 10 numbers only</span>');
            //     val = 'true';
            // }
            
        }
        if (val == "true") {
            return false;
        }
        // return true;

    }, false );*/

    setTimeout(function() {
        countryCode();

    },2000);
    jQuery('body').on('click', '.country', function(e) {
        e.stopPropagation();
        e.preventDefault();
        var code = jQuery(this).attr('data-country-code');
        countryCode(code);
    });

    jQuery('input[name="country"]').on('change', function(e) {
        e.stopPropagation();
        e.preventDefault();
        countryCode();
    });

    if(jQuery('.sub-menu-wrapper .service-menu-item').hasClass('current-menu-item')) {
        jQuery('#menu-item-763').addClass('current-menu-item');
    }
    
    document.addEventListener( 'wpcf7invalid', function( event ) {
        setTimeout(function () {
        var $inputs = jQuery('.wpcf7-form :input');
        $inputs.each(function() {
            if(jQuery(this).hasClass('wpcf7-not-valid')){
                jQuery(this).parent().addClass('error-tag');
                jQuery(this).parents('.file-upload').addClass('error');
            }else{
                jQuery(this).parent().removeClass('error-tag');
                jQuery(this).parents('.file-upload').removeClass('error');
            }
        });
        }, 500);
    }, false );

    jQuery('.wpcf7-validates-as-required').on('change',function(){
        jQuery(this).parent().removeClass('error-tag');
        jQuery(this).siblings('.wpcf7-not-valid-tip').hide();
    });

    jQuery('.experience-list').on('change', function(e) {
        if(jQuery(this).val() == "Trainee" || jQuery(this).val() == "Fresher") {
            jQuery('.work').hide();
        } else {
            jQuery('.work').show();
        }
    });

    //other events
    jQuery('.awards-slider [data-fancybox]').fancybox({
        thumbs: {
            autoStart : true,
            axis: "x"
        },
        toolbar: true,
        buttons: [
            "slideShow",
            "fullScreen",
            "thumbs",
            "close"
          ]
    });

    /* Custom Country code JQuery */
    var customSelect = jQuery('.country-select');
    jcf.setOptions('Select', {
        wrapNative: false,
        wrapNativeOnMobile: false,
        fakeDropInBody: false
    });
    jcf.replace(customSelect);
    jcf.refresh();
    jQuery('.country-select').on('change', function(e) {
        e.stopPropagation();
        e.preventDefault();
        var option = jQuery('option:selected', jQuery(this)).attr('data-country-code');
        jQuery('.iti-flag').html(option);
        jQuery('.telephone_no').val(option);
        var name = jQuery(this).val();
        jQuery('.selected-flag').attr('title', name);
    });
});

if( /Android/i.test(navigator.userAgent) ) {
    jQuery('body').addClass('android');
}

if( /iPhone|iPad|iPod/i.test(navigator.userAgent) ) {
    jQuery('body').addClass('iphone');
}
jQuery(document).ready(function(){
    // remove loader after 2 sec
    setTimeout(() => {
        jQuery('body').removeClass("yswp-loading");
    }, 1000 );
    jQuery('.selected-menu').closest('.sub-items').addClass('selected-menu');
});

/* Home Page Custom Sldier */
jQuery(document).ready(function () {
    var sldiers = '{"slide":[' +
        '{"id":"1","name":"Mobile App Development","icon":"https://www.yudiz.com/wp-content/uploads/2019/11/sl_mobile_app_development.svg", "text":"Yudiz is a one-stop mobile development arena that delivers the future vision!", "readmore_text":"Explore More", "readmore_url":"https://www.yudiz.com/services/app-development/" },' +
        '{"id":"2","name":"Blockchain Development","icon":"https://www.yudiz.com/wp-content/uploads/2019/11/sl_blockchain_development.svg", "text":"Secure your transactions robustly leveraging our Blockchain apps and solutions.", "readmore_text":"Explore More", "readmore_url":"https://www.yudiz.com/services/blockchain/" },' +
        '{"id":"0","name":"Game Development","icon":"https://www.yudiz.com/wp-content/uploads/2019/11/sl_game_development.svg", "text":"Realize interactive and exciting games in 2D and 3D in full glory with our Unity game development expertise!", "readmore_text":"Explore More", "readmore_url":"https://www.yudiz.com/services/game-development/" },' +
        '{"id":"3","name":"Web Development","icon":"https://www.yudiz.com/wp-content/uploads/2019/11/sl_web_development.svg", "text":"Yudiz helps you with intuitive website solutions to become the digital face in the industry and hunt down the global market!", "readmore_text":"Explore More", "readmore_url":"https://www.yudiz.com/services/web-development/" }]}';

    const obj = JSON.parse(sldiers);
    var i = 0;
    setInterval(function () {
        jQuery('.slide-thumb, .slide-box').fadeIn();
        jQuery('.hero-main-slider > div').addClass('slick-current');
        // jQuery('.hero-main-slider .slide-box > div > *').css('transform', 'translateY(0)');
        jQuery('.slide-thumb img').attr('src', obj.slide[i].icon);
        jQuery('.slide-box .main-title h2').html(obj.slide[i].name);
        jQuery('.slide-box .main-content h6').html(obj.slide[i].text);
        jQuery('.slide-box .readmore-link a').html(obj.slide[i].readmore_text);
        jQuery('.slide-box .readmore-link a').attr('href', obj.slide[i++].readmore_url);
        // jQuery('.hero-main-slider .slide-box > div > *').css('transform', 'translateY(100%)');
        setTimeout(function() {
            jQuery('.slide-thumb, .slide-box').fadeOut();
            jQuery('.hero-main-slider > div').removeClass('slick-current');
            // jQuery('.hero-main-slider .slide-box > div > *').css('transform', 'translateY(100%)');
        }, 4500);
        if (i == 4) {
            i = 0;
        }

    }, 5000);
    setTimeout(function() {
        jQuery('.slide-thumb, .slide-box').fadeOut();
        jQuery('.hero-main-slider > div').removeClass('slick-current');
        // jQuery('.hero-main-slider .slide-box > div > *').css('transform', 'translateY(100%)');
    }, 4500);
});
// 
// jQuery(document).ready(function () {
//     jQuery('.tabs-nav-box li').click( function() {
//         var parent = jQuery(this).parent();
//         console.log(parent);
//         var tabID = jQuery(this).attr('data-tab');
//         jQuery(this).addClass('active').siblings().removeClass('active');
//         jQuery('#tab-'+tabID).addClass('active').siblings().removeClass('active');
//     });
// });

jQuery('.solution-gitex-event-slider').slick({
    // lazyLoad: 'ondemand',
    fade: true,
    pauseOnHover:false,
    pauseOnFocus: false,
    autoplay:true,
    dots:true,
    dotsClass: 'custom-dots-count',
    customPaging: function (sliders, i) {
        //FYI just have a look at the object to find available information
        //press f12 to access the console in most browsers
        //you could also debug or look in the source
        console.log(sliders);
        return  (i + 1) + '<span class="seperator-dot-count">|</span>' + '<span class="slider-total-count">' + sliders.slideCount + '</span>';
    }
}); 

// New tab to dropdown code 
// $(document).on('click', '.tabs-container li', function(){
//     $('.tabs-container li').removeClass('active');
//     $('ul').toggleClass('expanded');
//     $(this).addClass('active');
//     var tab_id = $(this).attr('data-tab');
//     $('.tab-content').removeClass('current');
//     $(this).addClass('current');
//     $('#tab-'+tab_id).addClass('current');
//   });
jQuery(document).ready(function(){
jQuery('.about-slider').slick({
    // lazyLoad: 'ondemand',
    dots: false,
    arrows: true,
    infinite: true,
    centerMode: true,
    autoplay: true,
    autoplaySpeed: 3000,
    slidesToShow: 4,
    slidesToScroll: 1,
    pauseOnFocus: false,
    responsive: [
    {
      breakpoint: 1600,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1                 
      }
    }
  ]
});
});