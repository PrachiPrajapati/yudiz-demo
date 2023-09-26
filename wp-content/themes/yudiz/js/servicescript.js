var allPanels = jQuery('.accordion > dd').hide();
jQuery('.accordion > dd.active').show();
jQuery('.accordion > dt a').click(function() {
    $this = jQuery(this);
    jQuery('.accordion > dt').removeClass('current');
    $this.parent().parent().addClass('current');
    $target = $this.parent().parent().next();
    if (!$target.hasClass('active')) {
        allPanels.removeClass('active').slideUp();
        $target.addClass('active').slideDown();
    }
    return false;
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
    jQuery("a").on("click",function(){
        jQuery(".title-desc").slideUp();
        jQuery(this).parent().find(".title-desc").slideToggle(); 
        jQuery('.acc-listbox').removeClass('current');
        jQuery(this).parent().addClass('current');
    });
});