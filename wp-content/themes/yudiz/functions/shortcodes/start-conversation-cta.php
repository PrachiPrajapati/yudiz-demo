<?php
function yspl_startconversationcta_shortcode() {
	ob_start(); ?>
    <div id="get-in-touch-scroll" class="common-section">
        <div class="get-project-section text-center">
            <h6>Let’s create something Amazing</h6>
            <h2>Start a Conversation</h2>
            <div class="custom-saperator"> </div>
            <div class="theme-btn bordered-black">
                <a class="talk-btn" data-href="https://www.yudiz.com/get-in-touch/">Talk with us</a>
            </div>
        </div>
    </div>
	<?php
	$startconversationcta = ob_get_clean();
    return $startconversationcta;
}
add_shortcode( 'startconversationcta', 'yspl_startconversationcta_shortcode' );