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
function init() {
    var imgDefer = jQuery('img').not('.slick-lazy,.yswp_lazy');
    for (var i = 0; i < imgDefer.length; i++) {
        if (imgDefer[i].getAttribute('data-src')) {
            imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-src'));
        }
    }
}
window.onload = init;
jQuery(document).ready(function () {

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


    jQuery('.notification-slider').slick({
    	// lazyLoad: 'ondemand',
        arrows: false,
        fade: true
    });
    
    jQuery('.work-slider').slick({
    	// lazyLoad: 'ondemand',
        dots: true,
        pauseOnHover:false,
        pauseOnFocus: false,
        infinite: false,
        autoplay: true,
        autoplaySpeed: 5000
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

    jQuery(".scroll-image").each(function(){
        var current = 0;
        //Calls the scrolling function repeatedly
        setInterval(function(e){
                current -= 1;
            jQuery(".scroll-image").css("backgroundPosition", current+"px bottom");
        }, 100);
    });
  
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
    if(localStorage.getItem("popup")=='' || localStorage.getItem("popup")=='undefined' || localStorage.getItem("popup")==null) {
        localStorage.setItem("popup", "on");
    }
});
jQuery(document).ready(function($){   
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
});

  jQuery(document).ready(function(){
      // remove loader after 2 sec
      setTimeout(() => {
          jQuery('body').removeClass("yswp-loading");
      }, 100 );
      jQuery('.selected-menu').closest('.sub-items').addClass('selected-menu');
  });
  

  
 

