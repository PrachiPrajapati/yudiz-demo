<?php
function yspl_aboutmenuheader_shortcode() {
	ob_start(); ?>
        <div class="about-submenu common-megamenu d-flex">
            <div class="megamenu-left">
                <div class="mega-sub-menu-wrapper">
                    <ul>
                        <li>
                            <div class="inner-menu-wrapper">
                                <ul class="service-sub-cat">
                                    <li> <a href="https://www.yudiz.com/company/">
                                            <p class="megamenu-item-icon"> <img class="yswp_lazy"
                                                    src="https://www.yudiz.com/wp-content/themes/yudiz/images/loader-img.svg"
                                                    data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/our-team-megamenu.svg"
                                                    alt="yudiz-menu-icon"> </p>
                                            <p class="megamenu-item-desc"> <span>Our Team</span> </p>
                                        </a>
                                    </li>
                                    <li> <a href="https://www.yudiz.com/company-events/">
                                            <p class="megamenu-item-icon"> <img class="yswp_lazy"
                                                    src="https://www.yudiz.com/wp-content/themes/yudiz/images/loader-img.svg"
                                                    data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/events-about-megamenu.svg"
                                                    alt="yudiz-menu-icon"> </p>
                                            <p class="megamenu-item-desc"> <span>Events</span> </p>
                                        </a>
                                    </li>
                                    <li> <a href="https://www.yudiz.com/testimonials/">
                                            <p class="megamenu-item-icon"> <img class="yswp_lazy"
                                                    src="https://www.yudiz.com/wp-content/themes/yudiz/images/loader-img.svg"
                                                    data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/testimonials-about-menu.svg"
                                                    alt="yudiz-menu-icon"> </p>
                                            <p class="megamenu-item-desc"> <span>Testimonials</span> </p>
                                        </a>
                                    </li>
                                    <li> <a href="https://www.yudiz.com/case-studies/">
                                            <p class="megamenu-item-icon"> <img class="yswp_lazy"
                                                    src="https://www.yudiz.com/wp-content/themes/yudiz/images/loader-img.svg"
                                                    data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/06/case-studies.svg"
                                                    alt="yudiz-menu-icon"> </p>
                                            <p class="megamenu-item-desc"> <span>Case Study</span> </p>
                                        </a>
                                    </li>
                                </ul>
                                <p class="quote-text-para"><em>“Advancing with Assured Empirical Enterprise Solutions”</em></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="megamenu-right secondary-bg about-brochure-wrapper">
                <div class="hire-develop-wrapper">
                    <ul class="hire-dev-box">
                        <li>
                            <div class="hire-icons-box"> <img class="yswp_lazy" src="https://www.yudiz.com/wp-content/themes/yudiz/images/loader-img.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/06/Brochure-poster-img-menu.webp" alt="hire-icon"> </div>
                            <div class="hire-desc-box"> <p> We develop the best sustainable solutions with state of the art technology. </p> <p> <a href="https://www.yudiz.com/assets/Yudiz-Brochure.pdf" class="linebtn">Download our E-brochure<br> <img class="yswp_lazy" src="https://www.yudiz.com/wp-content/themes/yudiz/images/loader-img.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/08/text-btn-arrow.svg" alt=""></a> </p> </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
		<?php
	$aboutmenuheader = ob_get_clean();
    return $aboutmenuheader;
}
add_shortcode( 'aboutmenuheader', 'yspl_aboutmenuheader_shortcode' );