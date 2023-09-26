<?php
function yspl_productmenuheader_shortcode() {
	ob_start(); ?>
        <div class="our-product-wrapper">
            <div class="product-wrapper-left megamenu-left">
                <ul>
                    <li>
                        <div class="product-detail-box">
                            <div>
                                <div class="img-box"> <img class="yswp_lazy"
                                        src="https://www.yudiz.com/wp-content/themes/yudiz/images/loader-img.svg"
                                        data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/fansportiz-logo.webp"
                                        alt="fansportiz-logo"> </div>
                                <p>Fantasy Sports Gaming App</p>
                            </div>
                            <div class="bg-img-box"> <img class="yswp_lazy"
                                    src="https://www.yudiz.com/wp-content/themes/yudiz/images/loader-img.svg"
                                    data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/fansportiz-head-bg.webp"
                                    alt="fansportiz-bg"> </div>
                        </div>
                        <div class="product-detail-hoverbox"> <a target="_blank" href="https://www.fansportiz.com/"
                                class="visitlink">visit</a> </div>
                    </li>
                    <li>
                        <div class="product-detail-box">
                            <div>
                                <div class="img-box"> <img class="yswp_lazy"
                                        src="https://www.yudiz.com/wp-content/themes/yudiz/images/loader-img.svg"
                                        data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/nftiz-logo.webp"
                                        alt="nftiz-logo"> </div>
                                <p>Build an excillent NFT marketplace</p>
                            </div>
                            <div class="bg-img-box"> <img class="yswp_lazy"
                                    src="https://www.yudiz.com/wp-content/themes/yudiz/images/loader-img.svg"
                                    data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/nft-header-bg.webp"
                                    alt="nftiz-bg"> </div>
                        </div>
                        <div class="product-detail-hoverbox"> <a target="_blank" href="https://nftiz.biz/"
                                class="visitlink">visit</a> </div>
                    </li>
                    <li>
                        <div class="product-detail-box">
                            <div>
                                <div class="img-box"> <img class="yswp_lazy" src=""
                                        data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/taash52games-logo.webp"
                                        alt="taash-logo"> </div>
                                <p>A Platform for Rummy Game</p>
                            </div>
                            <div class="bg-img-box"> <img class="yswp_lazy"
                                    src="https://www.yudiz.com/wp-content/themes/yudiz/images/loader-img.svg"
                                    data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/taash52games-header-bg.webp"
                                    alt="taash52games-bg"> </div>
                        </div>
                        <div class="product-detail-hoverbox"> <a target="_blank" href="https://www.taash52games.com/"
                                class="visitlink">visit</a> </div>
                    </li>
                </ul>
            </div>
            <div class="product-wrapper-right megamenu-right">
                <ul class="hire-dev-box m-0">
                    <li>
                        <div class="hire-desc-box">
                            <h5>Visit Our Product Pages</h5>
                            <p> We aim for helping business to scale with innovative products and solutions through synergized
                                approaches and evolving tech. </p>
                            <p style="margin-top:12px;"> <a href="https://www.yudiz.com/take-a-quick-trip/" class="linebtn">
                                    Take a quick Trip<br> <img class="yswp_lazy"
                                        src="https://www.yudiz.com/wp-content/themes/yudiz/images/loader-img.svg"
                                        data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/08/text-btn-arrow.svg"
                                        alt=""></a> </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
	<?php
	$productmenuheader = ob_get_clean();
    return $productmenuheader;
}
add_shortcode( 'productmenuheader', 'yspl_productmenuheader_shortcode' );