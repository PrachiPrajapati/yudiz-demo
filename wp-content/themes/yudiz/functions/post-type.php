<?php
function yudiz_custom_posttype() {
require get_template_directory() . '/functions/post-type/our-work.php';
require get_template_directory() . '/functions/post-type/slider.php';
require get_template_directory() . '/functions/post-type/team.php';
require get_template_directory() . '/functions/post-type/career.php';
require get_template_directory() . '/functions/post-type/services.php';
require get_template_directory() . '/functions/post-type/projects.php';
require get_template_directory() . '/functions/post-type/clients-partners.php';
require get_template_directory() . '/functions/post-type/case-study.php';
require get_template_directory() . '/functions/post-type/events.php';
require get_template_directory() . '/functions/post-type/testimonial.php';
require get_template_directory() . '/functions/post-type/awards.php';
require get_template_directory() . '/functions/post-type/we-offer.php';
require get_template_directory() . '/functions/post-type/other-events.php';
require get_template_directory() . '/functions/post-type/news.php';
require get_template_directory() . '/functions/post-type/yspl-amp-hire.php';

}
add_action('init','yudiz_custom_posttype');