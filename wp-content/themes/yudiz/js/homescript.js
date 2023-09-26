jQuery(window).load(function() {
    jQuery('#mobile-menu img').each(function() { 
        jQuery(this).attr('src',jQuery(this).attr('data-src'));
    });
});
jQuery(document).ready(function () {
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
}); 
    jQuery(document).ready(function () {
        jQuery(".tabs-nav-box li").click(function () {
            jQuery(".tabs-nav-box ul").toggleClass("expanded-tab");
            var e = jQuery(this).attr("data-tab");
            jQuery(this).addClass("active").siblings().removeClass("active"),
                jQuery("#tab-" + e)
                    .addClass("active")
                    .siblings()
                    .removeClass("active");
        });
        // slick slider active script
        jQuery('.growing-through-slider').on('afterChange', function() {
                var dataId = jQuery('.growing-through-slider .slick-current').attr("data-slick-index");    
                jQuery(".growing-through-dot-list li").removeClass("active");
                jQuery(`.growing-through-dot-list li[data-cntr="${dataId}"]`).addClass("active");
            });
            jQuery(document).on("click",".growing-through-dot-list li", function () {
                jQuery('.growing-through-slider').slick( 'slickGoTo',jQuery(this).attr('data-cntr') );
            });
        // slick slider active script
        jQuery('.growing-through-slider').on('afterChange', function() {
            var dataId = jQuery('.growing-through-slider .slick-current').attr("data-slick-index");    
            jQuery(".growing-through-dot-list li").removeClass("active");
            jQuery(`.growing-through-dot-list li[data-cntr="${dataId}"]`).addClass("active");
        });
        jQuery(document).on("click",".growing-through-dot-list li", function () {
            jQuery('.growing-through-slider').slick( 'slickGoTo',jQuery(this).attr('data-cntr') );
        });
        /// animation script
        var text = jQuery(".newhome-banner-section .we-are-h2").attr("data-animated-text");
        var textArray = text.split("|");
        if( textArray.length > 0 ){
            var dataText = textArray;
            console.log("animating");
            function typeWriter(text, i, fnCallback) {
                // chekc if text isn't finished yet
                if ( text != undefined  && i < (text.length) ) {
                    // add next character to h1
                    document.getElementById("typingText").innerHTML = text.substring(0, i + 1);
                    // wait for a while and call this function again for next character
                    setTimeout(function() {
                        typeWriter(text, i + 1, fnCallback)
                    }, 100);
                }
                // text finished, call callback if there is a callback function
                else if (typeof fnCallback == 'function') {
                    // call callback after timeout
                    setTimeout(fnCallback, 2000);
                }
            }
            // start a typewriter animation for a text in the dataText array
            function StartTextAnimation(i) {
                if (typeof dataText[i] == 'undefined') {
                    setTimeout(function() {
                        StartTextAnimation(0);
                    }, 2000);
                }
                // check if dataText[i] exists
                if (dataText[i] != undefined && i < dataText[i].length ) {
                    // text exists! start typewriter animation
                    typeWriter(dataText[i], 0, function() {
                        // after callback (and whole text has been animated), start next text
                        StartTextAnimation(i + 1);
                    });
                }
            }
            // start the text animation
            StartTextAnimation(0);
        } 
    });