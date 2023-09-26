<?php
/**
 * The function file for including functionality
 *
 * @package Yudiz
 * @author Amitsinh Thakor, Richa Kalaria, Parthiv Butani, Prachi Prajapati, Nilay Panchal
 * @since Yudiz 1.0
 * It includes 'functions' folder (all files are included in '/functions/main.php') which includes files of all custom posttype         creation, shortcodes and loadmore-filter-search functionality
 */
?>
<?php
require get_template_directory() . '/functions/main.php';
function yudiz_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'yudiz' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'yudiz' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Notification header text', 'yudiz' ),
		'id'            => 'notification-header-text',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => ''
	));
	register_sidebar( array(
		'name'          => esc_html__( 'Overlay Menu Content', 'yudiz' ),
		'id'            => 'overlay-menu-content',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => ''
	));
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Contact text', 'yudiz' ),
		'id'            => 'footer-contact-text',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => ''
	));
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Company Text', 'yudiz' ),
		'id'            => 'footer-company-text',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => ''
	));
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Address List', 'yudiz' ),
		'id'            => 'footer-address-list',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => ''
	));
	register_sidebar( array(
		'name'          => esc_html__( 'Contact Address List', 'yudiz' ),
		'id'            => 'contact-address-list',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => ''
	));
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Review Icon', 'yudiz' ),
		'id'            => 'footer-review-icon',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => ''
	));
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Company Review Icon', 'yudiz' ),
		'id'            => 'footer-company-review-icon',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => ''
	));
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Company Address List', 'yudiz' ),
		'id'            => 'footer-company-address-list',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => ''
	));
}
add_action( 'widgets_init', 'yudiz_widgets_init' );
function yudiz_scripts() {
	// Add Script, used in the main JS.
	//wp_enqueue_script( 'jquery-js', get_template_directory_uri() . '/js/jquery.js', array());
	wp_enqueue_script('jquery');
	// wp_enqueue_script( 'typed', get_template_directory_uri() . '/js/typed.min.js#asyncload', array(), '20190116', true );
	//wp_enqueue_script( 'mmenu-light', get_template_directory_uri() . '/js/mmenu-light.js#defer', array());
	// wp_enqueue_script( 'modernizr.custom', get_template_directory_uri() . '/js/modernizr.custom.js#defer', array());
	// wp_enqueue_script( 'anime', get_template_directory_uri() . '/js/anime.min.js', array(),false, true );
	//wp_enqueue_script( 'bodymovin', get_template_directory_uri() . '/js/bodymovin.js#defer', array());
	// if(is_front_page() || is_404()){
	// 	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.js#defer', array(), '20190116', true );
	// }
	if ( is_page_template( 'template/home_template.php' ) ) {
		wp_enqueue_script( 'rellax', get_template_directory_uri() . '/js/rellax.js#defer', array(), '20190116', true );
		wp_enqueue_script( 'home-script', get_template_directory_uri() . '/js/home-script.js#defer', array(), '20190116', true );
	}
	//if( is_page("get-in-touch") || is_singular( "join-our-team" ) || is_page("join-our-team" ) || is_singular("event") ){
		if ( !is_page_template( 'template/home.php' ) ) {
			wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array(), '20190116', true );
			wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js#defer', array(), '20190116', true );
			wp_enqueue_script( 'mainscript', get_template_directory_uri() . '/js/mainscript.min.js#defer?v='.rand(), array(), rand(), true ); 
		}
		if ( ! is_page_template( array('template/service-template.php','template/home.php' )) ) { 
			wp_enqueue_script( 'jcf-js', get_template_directory_uri() . '/js/jcf.min.js', array(), false , true );
			wp_enqueue_script( 'jcf-select-js', get_template_directory_uri() . '/js/jcf.select.min.js', array(),false, true );
			wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.js', array(),false, true );
		}
	//}	
	if(is_page_template("template/home.php")){ 
		wp_enqueue_script( 'newhomescript', get_template_directory_uri() . '/js/newhomescript.min.js#defer?v='.rand(), array(), rand(), true );
	}
	if(is_page_template("template/service-template.php")){ 
		wp_enqueue_script( 'servicescript', get_template_directory_uri() . '/js/servicescript.min.js#defer?v='.rand(), array(), rand(), true );
	}
	/* if( ! is_singular( 'portfolio' ) || ! is_page_template(  array( 'template/home_new_template.php', 'template/industries-health-care.php','template/game-inner-seo-casino.php','template/service-template.php','template/contact-page-template.php','template/inner-service.php','template/it-consulting-service.php' ) ) ){
		// wp_enqueue_script( 'button-effect', get_template_directory_uri() . '/js/button-effect.js', array(), '20190116', true );
	} */
	// wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js#defer', array(), '20190116', true );
	// wp_enqueue_script( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', array(), '20190116', true ); 
	
	//wp_enqueue_script( 'scroll-animation', get_template_directory_uri() . '/js/scroll-animation.js#defer', array(), '20190116', true );
	//wp_localize_script( 'scroll-animation', 'site_object', array( 'theme_url' => get_template_directory_uri() ) );
	if ( ! is_page_template( array('template/home_new_template.php','template/home.php','template/service-template.php' )) ) { 
		wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.min.js#defer?v='.rand(), array(), rand(), true );
	}
	if ( is_page_template( 'template/home_new_template.php' )) { 
		wp_enqueue_script( 'homescript', get_template_directory_uri() . '/js/homescript.min.js#defer?v='.rand(), array(), rand(), true );
	}
	 wp_enqueue_script( 'waypoint', get_template_directory_uri() . '/js/jquery.waypoints.min.js#defer', array(), '20200108', true );
	//wp_enqueue_script( 'inview', get_template_directory_uri() . '/js/inview.min.js#defer', array(), '20200108', true );
	wp_localize_script( 'script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	if ( is_page( 21857 ) ) {
		wp_enqueue_script( 'menujs', get_template_directory_uri() . '/js/menujs.js', array(), '20220809', true );
	}
}
add_action( 'wp_enqueue_scripts', 'yudiz_scripts' );

add_filter('script_loader_tag', function ($tag, $handle) {

	$defer_js = array(
		'google-recaptcha',
		// 'wp-polyfill',
		// 'regenerator-runtime',
		'wpcf7-recaptcha',
	);

	if ( in_array($handle, $defer_js) ) {
		return str_replace(' src', ' defer src', $tag); // defer the script
	}
	return $tag;
	// return str_replace( ' src', ' async src', $tag ); // OR async the script
	// return str_replace( ' src', ' async defer src', $tag ); // OR do both!

}, 10, 2);

function yudiz_style() {
	// Add Style, used in the main stylesheet.
	//wp_enqueue_style( 'mmmenu-light', get_template_directory_uri() . '/css/mmenu-light.css', array(), '1.0' );
	if( is_page("get-in-touch") ){
		wp_enqueue_style( 'country-code', get_template_directory_uri() . '/css/country-code.css', array(), '1.0' );
	}
	//wp_enqueue_style( 'mobile-style', get_template_directory_uri() . '/css/mobile-style.css', array(), '1.0' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' , array(), '1.0' );
	
	// if( ! is_page_template( 'template/home_new_template.php') ){
	// 	wp_enqueue_style( 'animate', "https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css", array(), '1.0' );
	// }
	
	//wp_enqueue_style( 'overlay-menu', get_template_directory_uri() . '/css/overlay-menu.min.css', array(), '1.0' );
	if(!is_page_template("template/home.php")){
		wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.min.css', array(), '1.0' );
		wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css', array(), '1.0' );
		
	}
	if ( ! is_page_template( array('template/service-template.php','template/home.php' )) ) { 
		wp_enqueue_style( 'jcf', get_template_directory_uri() . '/css/jcf.min.css', array(), '1.0' );
	}
	// wp_enqueue_style( 'fontawesome',  get_template_directory_uri() . '/css/fontawesome.min.css', array(), '1.0' );

	// wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/css/slick-theme.min.css', array(), '1.0' );
	// wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css', array(), '1.0' );
	$is_dev_mode_on = ( isset( $_GET["dev_mode"] ) && $_GET["dev_mode"] === "on" ) ? true : false ;
	if(!is_page_template("template/home.php")){
		if( $is_dev_mode_on ){
			wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.css?v='.rand(), array(), '1.0' );
		}else{
			wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.min.css?v='.rand(), array(), '1.0' );
		}
		wp_enqueue_style( 'main-style-min', get_template_directory_uri() . '/css/style.css', array(), '1.0' );
	}
	//wp_enqueue_style( 'loader-style', get_template_directory_uri() . '/css/style-loader.css', array(), '1.0' );
	if(is_page("news-listing") || is_page("news-detail") || is_page( 'newsroom' ) || is_tax('newsroom') || is_singular('newsroom')  ){
		wp_enqueue_style( 'news-style', get_template_directory_uri() . '/css/news-style.css', array(), '1.0' );
	}
	if(is_page("fansportiz") || is_page("nftiz") || is_page("taash52games")){
		wp_enqueue_style( 'product-style', get_template_directory_uri() . '/css/product-style.css', array(), '1.0' );
	}
	if( is_page_template( 'template/service-template.php' )){
		wp_enqueue_style( 'service-page-style', get_template_directory_uri() . '/css/service-page-style.min.css', array(), '1.0' );
	}
	if( is_page_template( 'template/service-template.php' ) || is_page_template( 'template/inner-service.php' )|| is_page_template( 'template/game-inner-service.php' )|| is_page_template( 'template/virtual-inner-service.php' )|| is_page_template( 'template/design-inner-service.php' ) || is_page_template( 'template/product-trip-page.php' )|| is_page_template( 'template/it-consulting-service.php' )){
		wp_enqueue_style( 'why-work-with-yudiz-style', get_template_directory_uri() . '/css/section-style/why-work-with-yudiz.css', array(), '1.0' );
		wp_enqueue_style( 'start-conversation-cta-style', get_template_directory_uri() . '/css/section-style/start-conversation-cta.css', array(), '1.0' );
	}
	if( is_page_template( 'template/inner-service.php' )){
		wp_enqueue_style( 'mobile-inner-service', get_template_directory_uri() . '/css/mobile-inner-service.css', array(), '1.0' );
	}
	if( is_page_template( 'template/game-inner-seo-casino.php' )){
		wp_enqueue_style( 'game-inner-seo-casino', get_template_directory_uri() . '/css/game-inner-seo-casino.css', array(), '1.0' );
	}
	if( is_page_template( 'template/policy-page.php' )){
		wp_enqueue_style( 'policy-page-inv-style', get_template_directory_uri() . '/css/policy-page-inv-style.css', array(), '1.0' );
	}
	// if( is_page_template( 'template/case-study-inner.php' )){
	// 	wp_enqueue_style( 'case-studyinner-style', get_template_directory_uri() . '/css/case-studyinner-css.css', array(), '1.0' );
	// }
	
	if(is_page_template("template/contact-page-template.php") || is_page_template( 'template/rsvp-form-template.php' )){
		wp_enqueue_style( 'contact-page', get_template_directory_uri() . '/css/contact-page.css', array(), '1.0' );
	}
	if(is_page_template("template/game-inner-service.php")){
		wp_enqueue_style( 'game-inner-service-page', get_template_directory_uri() . '/css/game-inner-service.css', array(), '1.0' );
	}
	if(is_page_template("template/virtual-inner-service.php")){
		wp_enqueue_style( 'virtual-inner-service-page', get_template_directory_uri() . '/css/virtual-inner-service.css', array(), '1.0' );
	}
	if(is_page_template("template/design-inner-service.php")){
		wp_enqueue_style( 'design-inner-service-page', get_template_directory_uri() . '/css/design-inner-service.css', array(), '1.0' );
	}
	if(is_page_template("template/product-trip-page.php")){
		wp_enqueue_style( 'product-trip-page-page', get_template_directory_uri() . '/css/product-trip-page.css', array(), '1.0' );
	}
	if(is_page_template("template/full-cycle-product-dev.php")){
		wp_enqueue_style( 'full-cycle-product-dev-page', get_template_directory_uri() . '/css/full-cycle-product-dev.css', array(), '1.0' );
	}
	if(is_page_template("template/it-consulting-service.php")){
		wp_enqueue_style( 'it-consulting-service-page', get_template_directory_uri() . '/css/it-consulting-service.css', array(), '1.0' );
	}
	if(is_page_template("template/get-snaps.php")){
		wp_enqueue_style( 'get-snaps-page', get_template_directory_uri() . '/css/get-snaps.css', array(), '1.0' );
	}
	if(is_page_template("template/home.php")){
		wp_enqueue_style( 'home-style-page', get_template_directory_uri() . '/css/home-style.min.css', array(), '1.0' );
		wp_enqueue_style( 'header-footer-page', get_template_directory_uri() . '/css/header-footer.min.css', array(), '1.0' );
	}
	if(is_page_template("template/thankyou.php")){
		wp_enqueue_style( 'thankyou-page', get_template_directory_uri() . '/css/thankyou.css', array(), '1.0' );
		wp_enqueue_style( 'header-footer-page', get_template_directory_uri() . '/css/header-footer.min.css', array(), '1.0' );
	}
}
add_action( 'wp_enqueue_scripts', 'yudiz_style', 99999 );
function yudiz_dqu_unused_js_css(){
	if ( is_page_template( array( 'template/home_new_template.php', 'template/industries-health-care.php', 'template/product-page.php','template/game-inner-seo-casino.php','template/service-template.php','template/contact-page-template.php','template/inner-service.php','template/case-study-inner.php','post-template/content-single-case-study.php','template/design-inner-service.php','template/virtual-inner-service.php','template/game-inner-service.php','template/product-trip-page.php','template/full-cycle-product-dev.php','template/it-consulting-service.php','template/home.php' ) )  ) {
		wp_deregister_style('js_composer_front');
        wp_dequeue_style('js_composer_front'); 
		wp_deregister_style('vc_animate-css');
        wp_dequeue_style('vc_animate-css'); 
		wp_deregister_style('js_composer_front');
		wp_dequeue_style('js_composer_front');
		wp_deregister_style('wp-block-library');
		wp_dequeue_style('wp-block-library');
		wp_deregister_script('wpb_composer_front_js');
		wp_dequeue_script('wpb_composer_front_js');
		wp_deregister_script('vc_waypoints');
		wp_dequeue_script('vc_waypoints');
		wp_deregister_style('vc_animate-css');
        wp_dequeue_style('vc_animate-css');
		// wp_deregister_script('wp-polyfill');
		// wp_dequeue_script('wp-polyfill'); 
		// wp_deregister_script('regenerator-runtime');
		// wp_dequeue_script('regenerator-runtime'); 
	}
	//if( is_singular( array('case-study') ) ){
		// wp_deregister_style('animate');
		// wp_dequeue_style('animate');
		// wp_deregister_script('wpb_composer_front_js');
		// wp_dequeue_script('wpb_composer_front_js');
		// wp_deregister_script('vc_waypoints');
		// wp_dequeue_script('vc_waypoints');
		// wp_deregister_style('vc_animate-css');
        // wp_dequeue_style('vc_animate-css');
		// wp_deregister_style('js_composer_front');
		// wp_dequeue_style('js_composer_front');
		// wp_deregister_style('wp-block-library');
		// wp_dequeue_style('wp-block-library');
		// wp_deregister_script('wp-polyfill');
		// wp_dequeue_script('wp-polyfill'); 
		// wp_deregister_script('regenerator-runtime');
		// wp_dequeue_script('regenerator-runtime'); 
	//}
	if( ! is_page("company") ){
        wp_dequeue_style('cff'); 
        wp_dequeue_script('cffscripts'); 	
	    wp_dequeue_style('sbi_styles');
	    wp_deregister_script('sbi_scripts');
	    wp_dequeue_script('sbi_scripts');
	}
}
add_action( 'wp_enqueue_scripts', 'yudiz_dqu_unused_js_css', 99999 );

require get_template_directory() . '/inc/template-tags.php';
function theme_prefix_setup() {
	add_theme_support( 'custom-logo', array(
		'height'      => "",
		'width'       => "",
		'flex-width' => true,
		'flex-height' => true,
	) );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );
/****************** Add Class in body ********************/
add_filter( 'body_class', 'yspl_custom_class' );
function yspl_custom_class( $classes ) {
    $classes[] = 'yswp-loading'; //'site-loading';
    return $classes;
}
/****************** Add Class in body ********************/
/******************* add footer logo ********************/
function footer_logo_customizer_settings($wp_customize) {
	// add a setting for the site logo
	$wp_customize->add_setting('footer_theme_logo');
	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_theme_logo',
	array(
	'label' => 'Upload Footer Logo',
	'section' => 'title_tagline',
	'settings' => 'footer_theme_logo',
	) ) );
}
add_action('customize_register', 'footer_logo_customizer_settings');
/************************ Add Footer Section *****************/
add_action('customize_register', 'theme_footer_customizer');
function theme_footer_customizer($wp_customize){
 //adding section in wordpress customizer   
    $wp_customize->add_section('footer_settings_section', array(
      'title'          => 'Footer'
     ));
    //adding setting for footer text area
    $wp_customize->add_setting('footer_text', array(
     'default'        => '',
     ));
    $wp_customize->add_control('footer_text', array(
     'label'   => '@copy right',
      'section' => 'footer_settings_section',
     'type'    => 'textarea',
    ));
 }
function register_my_menu() {
  register_nav_menu('primary-header-menu',__( 'Primary Header Menu' ));
  register_nav_menu('overlay-header-menu',__( 'Overlay Header Menu' ));
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
  register_nav_menu('copyright-menu',__( 'Copyright Menu' ));
  register_nav_menu('social-menu',__( 'Social Menu' ));
  register_nav_menu('mobile-menu',__( 'Mobile Menu' ));
  register_nav_menu('primary-mega-menu',__( 'Primary Mega Menu' ));
  register_nav_menu('footer-about-menu',__( 'Footer About Menu' ));
  register_nav_menu('footer-service-menu',__( 'Footer Service Menu' ));
  register_nav_menu('footer-industries-menu',__( 'Footer Industries Menu' ));
  register_nav_menu('footer-resources-menu',__( 'Footer Resources Menu' ));
  register_nav_menu('social-icon-menu',__( 'Social Icon Menu' ));
}
add_action( 'init', 'register_my_menu' );
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
add_action( 'personal_options_update', 'crf_update_profile_fields' );
add_action( 'edit_user_profile_update', 'crf_update_profile_fields' );
function crf_update_profile_fields( $user_id ) {
	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}
	if ( ! empty( $_POST['designation'] )) {
		update_user_meta( $user_id, 'designation', $_POST['designation'] );
	}
}
add_action( 'show_user_profile', 'crf_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'crf_show_extra_profile_fields' );
function crf_show_extra_profile_fields( $user ) {
	$year = get_the_author_meta( 'designation', $user->ID );
	?>
	<h3><?php esc_html_e( 'Personal Information', 'yudiz' ); ?></h3>
	<table class="form-table">
		<tr>
			<th><label for="designation"><?php esc_html_e( 'Designation', 'yudiz' ); ?></label></th>
			<td>
				<input type="text"
			       id="designation"
			       name="designation"
			       value="<?php echo esc_attr( $year ); ?>"
			       class="regular-text"
				/>
			</td>
		</tr>
	</table>
	<?php
}
/** Image Radio for CF7 */
function imageradio_handler( $tag ){
	$tag = new WPCF7_FormTag( $tag );
	$atts = array(
	'type' => 'radio',
	'name' => $tag->name,
	'list' => $tag->name . '-options' );
	$input = sprintf(
	'<input %s />',
	wpcf7_format_atts( $atts ) );
	$datalist = '';
	$datalist .= '<div class="imgradio">';
	foreach ( $tag->values as $val ) {
		list($radiovalue,$imagepath) = explode("!", $val);
		$datalist .= sprintf( '<label><input type="radio" name="%s" value="%s" class="hideradio" /><img src="%s">%s</label>', $tag->name, $radiovalue, $imagepath, $radiovalue );
	}
	$datalist .= '</div>';
	return $datalist;
}

// add_action( 'wpcf7_init', 'wpcf7_add_form_tag_imageradio' );
function wpcf7_add_form_tag_mycustomfield() {
    wpcf7_add_form_tag( array( 'imageradio', 'imageradio*'),
        'wpcf7_imageradio_form_tag_handler', array( 'name-attr' => true ) );
}
function wpcf7_imageradio_form_tag_handler( $tag ) {
    $tag = new WPCF7_FormTag( $tag );
    if ( empty( $tag->name ) ) {
        return '';
    }
    $atts = array();
    $class = wpcf7_form_controls_class( $tag->type );
    $atts['class'] = $tag->get_class_option( $class );
    $atts['id'] = $tag->get_id_option();
    $atts['name'] = $tag->name;
    $atts = wpcf7_format_atts( $atts );
    $html = sprintf( '<your-tag %s></your-tag>', $atts );
    return $html;
}
/*** About Us Slider ***/
function yspl_about_us_slider(){
	ob_start();
	$images = get_field('about_gallery');
	$size = 'full'; // (thumbnail, medium, large, full or custom size)
	if( $images ): ?>
	    <div class="about-slider">
	        <?php foreach( $images as $image ): ?>
	            <div class="slide">
	            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
	            </div>
	        <?php endforeach; ?>
	    </div>
	<?php endif; 
	return ob_get_clean();
}
add_shortcode( 'about-us-slider', 'yspl_about_us_slider' );
/*	Add Css to custom content 	*/
function postcontentcss($content){
    $shortcodes_custom_css = visual_composer()->parseShortcodesCustomCss( $content );
    if ( ! empty( $shortcodes_custom_css ) ) {
        $shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
        $output .= '<style type="text/css" data-type="vc_shortcodes-custom-css">';
        $output .= $shortcodes_custom_css;
        $output .= '</style>';
        echo $output;
    }
}
 // Remove WP Version From Styles   
 add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
 // Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );
 // Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
function yspl_career_custom_menu_page() {
	add_submenu_page(
		'edit.php?post_type=join-our-team',
		'Career Contact Details',
		'Career Contact Details',
		'manage_options',
		'yspl_career_contact_details',
		'yspl_career_contact_details'
	);
}
add_action( 'admin_menu', 'yspl_career_custom_menu_page' );
function yspl_career_contact_details() {
    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }
    // variables for the field and option names 
    $career_email = 'yspl_career_email';
    $career_phone = 'yspl_career_phone';
    $career_title = 'yspl_career_title';
    $career_tag_line = 'yspl_career_tag_line';
    $career_glass_door_url = 'career_glass_door_url';
    $career_instagram_url = 'career_instagram_url';
    $hidden_field_name = 'yspl_submit_hidden';
    $career_title_name = 'yspl_career_title';
    $career_tag_line_name = 'yspl_career_tag_line';
    $career_email_name = 'yspl_career_email';
    $career_phone_name = 'yspl_career_phone';
    $career_glass_door_url_name = 'career_glass_door_url';
    $career_instagram_url_name = 'career_instagram_url';
    // Read in existing option value from database
    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $career_email_val = $_POST[ $career_email_name ];
        $career_phone_val = $_POST[ $career_phone_name ];
        $career_glass_door_url_val = $_POST[ $career_glass_door_url_name ];
        $career_instagram_url_val = $_POST[ $career_instagram_url_name ];
        $career_title_val = $_POST[ $career_title_name ];
        $career_tag_line_val = $_POST[ $career_tag_line_name ];
        // Save the posted value in the database
        update_option( $career_email, $career_email_val );
        update_option( $career_title, $career_title_val );
        update_option( $career_tag_line, $career_tag_line_val );
        update_option( $career_phone_name, $career_phone_val );
        update_option( $career_glass_door_url, $career_glass_door_url_val );
        update_option( $career_instagram_url, $career_instagram_url_val );
        $career_follow_us_logo = $_POST['career_follow_us_logo'];
    	update_option( 'career_follow_us_logo', $career_follow_us_logo );
    	$career_instagram_logo = $_POST['career_instagram_logo'];
    	update_option( 'career_instagram_logo', $career_instagram_logo );
        // Put a "settings saved" message on the screen
		?>
		<div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>
		<?php
    }
    $career_email_val = get_option( $career_email );
    $career_title_val = get_option( $career_title );
    $career_tag_line_val = get_option( $career_tag_line );
    $career_phone_val = get_option( $career_phone );
    $career_glass_door_url_val = get_option( $career_glass_door_url );
    $career_instagram_url_val = get_option( $career_instagram_url );
    $career_follow_us_logo = get_option( "career_follow_us_logo" );
    $career_instagram_logo = get_option( "career_instagram_logo" );
    // Now display the settings editing screen
    echo '<div class="wrap">';
    // header
    echo "<h2>" . __( 'Career Contact Details Settings', 'menu-test' ) . "</h2>";
    // settings form
    ?>
	<form name="form1" method="post" action="">
		<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
		<p><?php _e("Career Title:", 'menu-test' ); ?> 
			<input type="text" name="<?php echo $career_title_name; ?>" value="<?php echo $career_title_val; ?>">
		</p><hr />
		<p><?php _e("Career Tag Line:", 'menu-test' ); ?> 
			<input type="text" name="<?php echo $career_tag_line_name; ?>" value="<?php echo $career_tag_line_val; ?>">
		</p><hr />
		<p><?php _e("Career Email:", 'menu-test' ); ?> 
			<input type="text" name="<?php echo $career_email_name; ?>" value="<?php echo $career_email_val; ?>" size="20">
		</p><hr />
		<p><?php _e("Career Phone:", 'menu-test' ); ?> 
			<input type="text" name="<?php echo $career_phone_name; ?>" value="<?php echo $career_phone_val; ?>" size="20">
		</p><hr />
		<p><?php _e("Glass Door Url:", 'menu-test' ); ?> 
			<input type="text" name="<?php echo $career_glass_door_url_name; ?>" value="<?php echo $career_glass_door_url_val; ?>" size="20">
		</p><hr />
		<p>
	        <label for="career_follow_us_logo"><?php _e( 'Store Logo', 'yspl-google-map' ); ?></label>
	        <img src="<?php echo $career_follow_us_logo; ?>" class="brand-logo-src" name="career_follow_us_logo" width="200px" />
	        <input type="hidden" id="career_follow_us_logo" name="career_follow_us_logo" value="<?php echo $career_follow_us_logo; ?>">
	        <input id="str_upload_logo_btn" class="button" type="button" value="Upload Career Follow us Logo" />
	    </p><hr />
	    <p><?php _e("Instagram Url:", 'menu-test' ); ?> 
			<input type="text" name="<?php echo $career_instagram_url_name; ?>" value="<?php echo $career_instagram_url_val; ?>" size="20">
		</p><hr />
		<p>
	        <label for="career_instagram_logo"><?php _e( 'Instagram Logo', 'yspl-google-map' ); ?></label>
	        <img src="<?php echo $career_instagram_logo; ?>" class="insta-logo-src" name="career_instagram_logo" width="200px" />
	        <input type="hidden" id="career_instagram_logo" name="career_instagram_logo" value="<?php echo $career_instagram_logo; ?>">
	        <input id="insta_upload_logo_btn" class="button" type="button" value="Upload Career Instagram Logo" />
	    </p>
		<p class="submit">
			<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
		</p>
	</form>
	</div>
	<?php
}
add_action ( 'admin_enqueue_scripts', function () {
    wp_enqueue_script('yspl-admin-career-js', get_template_directory_uri().'/admin/js/custom.js#defer');
    if (is_admin ())
        wp_enqueue_media ();
} );
function custom_views_post_title() {
    wpcf7_add_shortcode( 'post_title', 'custom_views_post_title_shortcode_handler' );
    wpcf7_add_shortcode( 'telephone_no', 'custom_telephone_no_shortcode_handler' );
	wpcf7_add_shortcode( 'imageradio*', 'imageradio_handler', true );
	wpcf7_add_form_tag( 'country_name', 'custom_countryname_shortcode_handler' );
	// wpcf7_add_form_tag( 'telephonenumber', 'custom_countrycode_shortcode_handler' );
}


add_action('wpcf7_init', 'yspl_cf7_add_form_tag');
function yspl_cf7_add_form_tag()
{
    wpcf7_add_form_tag(
        array('telephonenumber', 'telephonenumber*',),
        'custom_countrycode_shortcode_handler',
        array('name-attr' => true)
    );
}


function custom_views_post_title_shortcode_handler( $tag ) {
    $id = get_the_ID();
    $title = get_the_title($id);
    if($id){
        $output = '<input type="hidden" name="post_title" value="'. strip_tags($title).'" >';
    }
    else{
        $output = '<input type="hidden" name="post_title" value="General Enquiry" >';
    
    }
    return $output;
}
add_action( 'wpcf7_init', 'custom_views_post_title' );

function custom_telephone_no_shortcode_handler( $tag ) {
    $output = '<input type="hidden" name="telephone_no" class="telephone_no" value="" >';
    return $output; 
 
}

function register_session(){
    // if( !session_id() ) {
        session_start();
    // }
}
add_action('init','register_session');
function contentLimit( $title = "", $content = "" ) {
	$contentTotal = "";
	$titleCount = strlen($title);
	$contentCount = strlen($content);
	if ( $titleCount < 38 ) {
		$dot = "";
		if ( $contentCount > 200 ) {
			$dot = "...";
		}
		$contentTotal = substr($content, 0, 200).$dot;
	} elseif( $titleCount < 63 ) {
		$dot = "";
		if ( $contentCount > 100 ) {
			$dot = "...";
		}
		$contentTotal = substr($content, 0, 100).$dot;
	} elseif( $titleCount < 113 ) {
		$dot = "";
		if ( $contentCount > 60 ) {
			$dot = "...";
		}
		$contentTotal = substr($content, 0, 60).$dot;
	} elseif( $titleCount > 133 ) {
		$contentTotal = "";
	}
	return $contentTotal;

}

/* Change the admin login logo */
function login_logo() {
    ?>
<style type="text/css">
	body.login 	{ background: #fff; position: relative; }
	body.login:before { content: ""; background: url('<?php echo get_stylesheet_directory_uri();?>/images/login-bg-ptrn.png') repeat-x bottom left / auto 420px; opacity: 0.5; position: absolute; bottom: 0; left: 0; width: 100%; height: 100%; z-index: -1; }
	body.login div#login { width: 400px; }
    body.login div#login h1 a { background-image: url(<?php echo site_url();?>/wp-content/uploads/2019/10/yudiz-logo.png) !important; background-size: contain; width: 250px; }
    body.login form { box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.1); -moz-box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.1); -webkit-box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.1); }
    body.login label { font-size: 15px; line-height: 18px; font-weight: 500; color: #2D4152; opacity: 0.72; }
    body.login form .input, body.login input[type=text] { margin-top: 8px; padding: 10px; }
    body.login form .input, body.login form input[type=checkbox], body.login input[type=text] { background-color: #F5F8FC; border-radius: 4px; border: none; outline: none; box-shadow: none; -moz-box-shadow: none; -webkit-box-shadow: none; }
    body.login form .forgetmenot { float: none; }
    body.login #login form p.submit { margin-top: 20px; text-align: center; }
    .login.wp-core-ui .button.button-large { padding: 10px 30px 12px; font-size: 15px; line-height: 18px; font-weight: 500; text-shadow: none; background-color: #0487FF; color: #fff; border: 2px solid transparent; border-radius: 32px; height: auto; box-shadow: none; -webkit-box-shadow: none; -moz-box-shadow: none; }
    .login.wp-core-ui .button.button-large:hover,
    .login.wp-core-ui .button.button-large:focus { outline: none; text-decoration: none; background-color: transparent; color: #0487FF; border-color: #0487FF; }
    body.login .button-primary { float: none; }
</style>
<?php
}
add_action( 'login_enqueue_scripts', 'login_logo' );

function rgb2hex2rgb($color){ 
   if(!$color) return false; 
   $color = trim($color); 
   $result = false; 
  if(preg_match("/^[0-9ABCDEFabcdef\#]+$/i", $color)){
      $hex = str_replace('#','', $color);
      if(!$hex) return false;
      if(strlen($hex) == 3):
         $result['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
         $result['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
         $result['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
      else:
         $result['r'] = hexdec(substr($hex,0,2));
         $result['g'] = hexdec(substr($hex,2,2));
         $result['b'] = hexdec(substr($hex,4,2));
      endif;       
   }elseif (preg_match("/^[0-9]+(,| |.)+[0-9]+(,| |.)+[0-9]+$/i", $color)){ 
      $rgbstr = str_replace(array(',',' ','.'), ':', $color); 
      $rgbarr = explode(":", $rgbstr);
      $result = '#';
      $result .= str_pad(dechex($rgbarr[0]), 2, "0", STR_PAD_LEFT);
      $result .= str_pad(dechex($rgbarr[1]), 2, "0", STR_PAD_LEFT);
      $result .= str_pad(dechex($rgbarr[2]), 2, "0", STR_PAD_LEFT);
      $result = strtoupper($result); 
   }else{
      $result = false;
   }
          
   return $result; 
}

//Display categories in Blog inner page
function display_catgeory_blog_single(){
	ob_start();

	$args = array(
       'number' => 10
    );
    $blog_categories = get_categories( $args );
    ?>
    <ul class="widget_categories">
    	<?php
    	foreach ($blog_categories as $value) {
    		?>
    		<li><a href="<?php echo get_category_link( $value->term_id ); ?>"><?php echo $value->name; ?></a></li>
    		<?php
    	}
    	?>
    </ul>
    <?php

	$cat_blog = ob_get_clean();
	return $cat_blog;
}
add_shortcode( 'category-blog', 'display_catgeory_blog_single' );

/*= = = = Remove Wordpress Version = = = = */
function remove_wordpress_version() {
return '';
}
add_filter('the_generator', 'remove_wordpress_version');

/*= = = = Removing WordPress version number from Scripts and CSS = = = = */
function remove_version_from_style_js( $src ) {
if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
$src = remove_query_arg( 'ver', $src );
return $src;
}
add_filter( 'style_loader_src', 'remove_version_from_style_js');
add_filter( 'script_loader_src', 'remove_version_from_style_js');

function get_my_menu($get) {
    // Replace your menu name, slug or ID carefully
    return wp_nav_menu(array("theme_location" =>	$get['location'], "echo" => false));
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'wp/v2', 'menu', array(
        'methods' => 'GET',
        'callback' => 'get_my_menu',
    ) );
} );

function wpse_20160421_get_author_meta($object, $field_name, $request) {

    $user_data = get_userdata($object['author']); // get user data from author ID.

    $array_data = (array)($user_data->data); // object to array conversion.

    $array_data['first_name'] = get_user_meta($object['author'], 'first_name', true);
    $array_data['last_name']  = get_user_meta($object['author'], 'last_name', true);

    // prevent user enumeration.
    unset($array_data['user_login']);
    unset($array_data['user_pass']);
    unset($array_data['user_activation_key']);

    return array_filter($array_data);

}

function wpse_20160421_register_author_meta_rest_field() {

    register_rest_field('post', 'author_meta', array(
        'get_callback'    => 'wpse_20160421_get_author_meta',
        'update_callback' => null,
        'schema'          => null,
    ));

}
add_action('rest_api_init', 'wpse_20160421_register_author_meta_rest_field');

add_filter('nav_menu_css_class' , 'add_active_current_menu' , 10 , 3);
function add_active_current_menu ($classes, $item, $args) {
    if (in_array('current-menu-parent', $classes) || is_tax('case-study-categories') && $item->title == "Case Studies" || is_singular('case-study') && $item->title == "Case Studies" || is_singular('join-our-team') && $item->title == "Career" || is_singular('portfolio') && $item->title == "Projects" ){
        $classes[] = 'current-menu-item ';
    }
    return $classes;
}
add_theme_support( 'service_worker', true );
function title_filter( $where, &$wp_query )
{
	global $wpdb;
	if ( $search_term = $wp_query->get( 'search_prod_title' ) ) {
		$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( like_escape( $search_term ) ) . '%\'';
	}
	return $where;
}

add_action( 'wp_head', 'social_image' );

function social_image() {
    if ( is_post_type_archive( 'portfolio' ) ) {    	
    	echo '<meta property="og:image" content="https://www.yudiz.com/wp-content/uploads/2019/12/projects-social.jpg" />';
		echo '<meta name="description" content="Our detailed portfolio section covers insightful information about the projects we have worked on and the amazing clients we have served." />';
    }
    elseif ( is_post_type_archive( 'join-our-team' ) ) {
		echo '<meta name="description" content="Yudiz solutions Ltd. providing strong career opportunities as well as a modern working environment for freshers and experienced personals." />';
    	echo '<meta property="og:image" content="https://www.yudiz.com/wp-content/uploads/2019/12/career-social.jpg" />';
    }

}
// remove p tags
add_filter('the_content', 'remove_empty_p', 20, 1);
function remove_empty_p($content){
    $content = force_balance_tags($content);
    return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}
add_filter( 'wpcf7_autop_or_not', '__return_false' );

// allow span
function override_mce_options($initArray) 
{
  $opts = '*[*]';
  $initArray['valid_elements'] = $opts;
  $initArray['extended_valid_elements'] = $opts;
  return $initArray;
 }
 add_filter('tiny_mce_before_init', 'override_mce_options'); 




function array_remove_by_value($array, $value)
{
    return array_values(array_diff($array, array($value)));
}
// custom mm menu for mobile device
function clean_custom_menus() {
	$menu_name = 'mobile-menu'; // specify custom menu slug
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name]) && wp_is_mobile()) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); 
		?>
		<div id="page"> 
			<div>
				<nav id="mobile-menu">
					<div class="mobile-nav-block">
						<a href="<?php echo home_url();?>"><figure><img data-src="<?php echo get_template_directory_uri();?>/images/mn-home.svg" alt="yudiz menu icon" /></figure></a>
						<a href="<?php echo home_url();?>"><figure><img data-src="<?php echo $image[0]; ?>" alt="yudiz menu logo" /></figure></a>
						<a href="#" class="close-menu"><figure><img data-src="<?php echo get_template_directory_uri();?>/images/mn-close.svg" alt="yudiz menu icon" /></figure></a>
					</div>
					<ul>
						<?php
						global $wp_query;
						$obj = get_post_type_object( $wp_query->query_vars['post_type'] );
						
						$obj = get_queried_object();
						$id = get_queried_object_id();
						$parentValActive = array_remove_by_value(array_column($menu_items, 'menu_item_parent'), $id);
						$parentVal = array_unique(array_remove_by_value(array_column($menu_items, 'menu_item_parent'), 0));
						$parentValCount = array_count_values(array_remove_by_value(array_column($menu_items, 'menu_item_parent'), 0));
						
						$c = 0;
						foreach ((array) $menu_items as $key => $menu_item) {
							$image = wp_get_attachment_image_src( $menu_item->thumbnail_id, 'full' );
							$title = $menu_item->title;
							$url = $menu_item->url;
							$active = "";
							$pId = "";
							// echo get_queried_object_id() .'=='. get_the_ID() .'=='. $menu_item->object_id;
							if ($id == $menu_item->object_id) {
								$active = "selected-menu";
							} elseif ($menu_item->object == $obj->name) {
								$active = "selected-menu";
							}  elseif ($menu_item->post_name == $obj->post_name) {
								$active = "selected-menu $menu_item->object == $obj->name";
							} 
							if (in_array($menu_item->ID, $parentVal) ) {

								?>
								<li class="sub-items <?php echo $active; ?> <?php echo $menu_item->ID; ?>">
									<span><?php echo $title;?></span>
									<ul>
										<?php 
							} elseif ( $menu_item->menu_item_parent != 0 ) {
								?>

								<li class=" <?php echo $active; ?>"><a href="<?php echo $url;?>"><?php echo $title;?></a></li>
								<?php
								if ($parentValCount[$menu_item->menu_item_parent] == ++$c) {
									$c = 0;
										?>
										</ul>
									</li>
									<?php
								}
							}
							else {
								?>
								<li class=" <?php echo $active; ?>"><a href="<?php echo $url;?>"><?php echo $title;?></a></li>
								<?php	
							}
							// $menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'">'. $title .'</a></li>' ."\n";
						}
						?>
					</ul>
					<div class="mobile-nav-contact-button"><a href="<?php echo home_url();?>/get-in-touch/">Get in touch</a></div>
				</nav>
			</div>
		</div>
		<?php
		?>
		<script>
			var menu = new MmenuLight(
				document.querySelector( '#mobile-menu' )
			);
		</script>
		<?php
	} else {
		// $menu_list = '<!-- no list defined -->';
	}
	echo ob_get_clean();
}
//remove type attr
add_action('wp_loaded', 'prefix_output_buffer_start');
function prefix_output_buffer_start() { 
    ob_start("prefix_output_callback"); 
}

add_action('shutdown', 'prefix_output_buffer_end');
function prefix_output_buffer_end() { 
    ob_end_flush(); 
}

function prefix_output_callback($buffer) {
    return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
}
  
function custom_countryname_shortcode_handler( $tag ) {
    $output = '<span class="wpcf7-form-control-wrap '.sanitize_html_class( $tag->name ).'">
    	<select class="country-select f32" name="country_name">
      		<option value="United States" class="flag-us" data-code="us" data-country-code="+1">United States</option>
      		<option value="United Kingdom" class="flag-gb preferred" data-code="gb" data-country-code="+44">United Kingdom</option>
      		<option value="Afghanistan" class="flag-af" data-country-code="+93" data-code="af">Afghanistan</option>
      		<option value="Åland Islands" class="flag-ax" data-country-code="+358" data-code="ax">Åland Islands</option>
      		<option value="Albania" class="flag-al" data-country-code="+355" data-code="al">Albania</option>
      		<option value="Algeria" class="flag-dz" data-country-code="+213" data-code="dz">Algeria</option>
      		<option value="American Samoa" class="flag-as" data-country-code="+684" data-code="as">American Samoa</option>
      		<option value="Andorra" class="flag-ad" data-country-code="+376" data-code="ad">Andorra</option>
      		<option value="Angola" class="flag-ao" data-country-code="+244" data-code="ao">Angola</option>
      		<option value="Anguilla" class="flag-ai" data-country-code="+1264" data-code="ai">Anguilla</option>
      		<option value="Antigua and Barbuda" class="flag-ag" data-country-code="+1268" data-code="ag">Antigua and Barbuda</option>
      		<option value="Argentina" class="flag-ar" data-country-code="+54" data-code="ar">Argentina</option>
      		<option value="Armenia" class="flag-am" data-country-code="+374" data-code="am">Armenia</option>
      		<option value="Aruba" class="flag-aw" data-country-code="+297" data-code="aw">Aruba</option>
      		<option value="Australia" class="flag-au" data-country-code="+61" data-code="au">Australia</option>
      		<option value="Austria" class="flag-at" data-country-code="+43" data-code="at">Austria</option>
      		<option value="Azerbaijan" class="flag-az" data-country-code="+994" data-code="az">Azerbaijan</option>
      		<option value="Bahamas" class="flag-bs" data-country-code="+1242" data-code="bs">Bahamas</option>
      		<option value="Bahrain" class="flag-bh" data-country-code="+973" data-code="bh">Bahrain</option>
      		<option value="Bangladesh" class="flag-bd" data-country-code="+880" data-code="bd">Bangladesh</option>
      		<option value="Barbados" class="flag-bb" data-country-code="+1246" data-code="bb">Barbados</option>
      		<option value="Belarus" class="flag-by" data-country-code="+375" data-code="by">Belarus</option>
      		<option value="Belgium" class="flag-be" data-country-code="+32" data-code="be">Belgium</option>
      		<option value="Belize" class="flag-bz" data-country-code="+501" data-code="bz">Belize</option>
      		<option value="Benin" class="flag-bj" data-country-code="+229" data-code="bj">Benin</option>
      		<option value="Bermuda" class="flag-bm" data-country-code="+1441" data-code="bm">Bermuda</option>
      		<option value="Bhutan" class="flag-bt" data-country-code="+975" data-code="bt">Bhutan</option>
      		<option value="Bolivia" class="flag-bo" data-country-code="+591" data-code="bo">Bolivia</option>
      		<option value="Bosnia and Herzegovina" data-country-code="+387" class="flag-ba" data-code="ba">Bosnia and Herzegovina</option>
      		<option value="Botswana" class="flag-bw" data-country-code="+267" data-code="bw">Botswana</option>
      		<option value="Brazil" class="flag-br" data-country-code="+55" data-code="br">Brazil</option>
      		<option value="British Indian Ocean Territory" data-country-code="+246" class="flag-io" data-code="io">British Indian Ocean Territory</option>
      		<option value="British Virgin Islands" class="flag-vg" data-country-code="+1284" data-code="vg">British Virgin Islands</option>
      		<option value="Brunei" class="flag-bn" data-country-code="+673" data-code="bn">Brunei</option>
      		<option value="Bulgaria" class="flag-bg" data-country-code="+359" data-code="bg">Bulgaria</option>
      		<option value="Burkina Faso" class="flag-bf active" data-country-code="+226" data-code="bf">Burkina Faso</option>
      		<option value="Burundi" class="flag-bi" data-country-code="+257" data-code="bi">Burundi</option>
      		<option value="Cambodia" class="flag-kh" data-country-code="+855" data-code="kh">Cambodia</option>
      		<option value="Cameroon" class="flag-cm" data-country-code="+237" data-code="cm">Cameroon</option>
      		<option value="Canada" class="flag-ca" data-country-code="+1" data-code="ca">Canada</option>
      		<option value="Cape Verde" class="flag-cv" data-country-code="+238" data-code="cv">Cape Verde</option>
      		<option value="Caribbean Netherlands" class="flag-bq" data-country-code="+599" data-code="bq">Caribbean Netherlands</option>
      		<option value="Cayman Islands" class="flag-ky" data-country-code="+1345" data-code="ky">Cayman Islands</option>
      		<option value="Central African Republic" class="flag-cf" data-country-code="+236" data-code="cf">Central African Republic</option>
      		<option value="Chad" class="flag-td" data-country-code="+235" data-code="td">Chad</option>
      		<option value="Chile" class="flag-cl" data-country-code="+56" data-code="cl">Chile</option>
      		<option value="China" class="flag-cn" data-country-code="+86" data-code="cn">China</option>
      		<option value="Christmas Island" class="flag-cx" data-country-code="+61" data-code="cx">Christmas Island</option>
      		<option value="Cocos Islands" class="flag-cc" data-country-code="+61" data-code="cc">Cocos Islands</option>
      		<option value="Colombia" class="flag-co" data-country-code="+57" data-code="co">Colombia</option>
      		<option value="Comoros" class="flag-km" data-country-code="+269" data-code="km">Comoros</option>
      		<option value="Congo" class="flag-cd" data-country-code="+243" data-code="cd">Congo</option>
      		<option value="Congo" class="flag-cg" data-country-code="+242" data-code="cg">Congo</option>
      		<option value="Cook Islands" class="flag-ck" data-country-code="+682" data-code="ck">Cook Islands</option>
      		<option value="Costa Rica" class="flag-cr" data-country-code="+506" data-code="cr">Costa Rica</option>
      		<option value="Côte d’Ivoire" class="flag-ci" data-country-code="+225" data-code="ci">Côte d’Ivoire</option>
      		<option value="Croatia" class="flag-hr" data-country-code="+385" data-code="hr">Croatia</option>
      		<option value="Cuba" class="flag-cu" data-country-code="+53" data-code="cu">Cuba</option>
      		<option value="Curaçao" class="flag-cw" data-country-code="+599" data-code="cw">Curaçao</option>
      		<option value="Cyprus" class="flag-cy" data-country-code="+357" data-code="cy">Cyprus</option>
      		<option value="Czech Republic" class="flag-cz" data-country-code="+420" data-code="cz">Czech Republic</option>
      		<option value="Denmark" class="flag-dk" data-country-code="+45" data-code="dk">Denmark</option>
      		<option value="Djibouti" class="flag-dj" data-country-code="+253" data-code="dj">Djibouti</option>
      		<option value="Dominica" class="flag-dm" data-country-code="+1767" data-code="dm">Dominica</option>
      		<option value="Dominican Republic" class="flag-do" data-country-code="+1809" data-code="do">Dominican Republic</option>
      		<option value="Ecuador" class="flag-ec" data-country-code="+593" data-code="ec">Ecuador</option>
      		<option value="Egypt" class="flag-eg" data-country-code="+20" data-code="eg">Egypt</option>
      		<option value="El Salvador" class="flag-sv" data-country-code="+503" data-code="sv">El Salvador</option>
      		<option value="Equatorial Guinea" class="flag-gq" data-country-code="+240" data-code="gq">Equatorial Guinea</option>
      		<option value="Eritrea" class="flag-er" data-country-code="+291" data-code="er">Eritrea</option>
      		<option value="Estonia" class="flag-ee" data-country-code="+372" data-code="ee">Estonia</option>
      		<option value="Ethiopia" class="flag-et" data-country-code="+251" data-code="et">Ethiopia</option>
      		<option value="Falkland Islands" class="flag-fk" data-country-code="+500" data-code="fk">Falkland Islands</option>
      		<option value="Faroe Islands" class="flag-fo" data-country-code="+298" data-code="fo">Faroe Islands</option>
      		<option value="Fiji" class="flag-fj" data-country-code="+679" data-code="fj">Fiji</option>
      		<option value="Finland" class="flag-fi" data-country-code="+358" data-code="fi">Finland</option>
      		<option value="France" class="flag-fr" data-country-code="+33" data-code="fr">France</option>
      		<option value="French Guiana" class="flag-gf" data-country-code="+594" data-code="gf">French Guiana</option>
      		<option value="French Polynesia" class="flag-pf" data-country-code="+689" data-code="pf">French Polynesia</option>
      		<option value="Gabon" class="flag-ga" data-country-code="+241" data-code="ga">Gabon</option>
      		<option value="Gambia" class="flag-gm" data-country-code="+220" data-code="gm">Gambia</option>
      		<option value="Georgia" class="flag-ge" data-country-code="+995" data-code="ge">Georgia</option>
      		<option value="Germany" class="flag-de" data-country-code="+49" data-code="de">Germany</option>
      		<option value="Ghana" class="flag-gh" data-country-code="+233" data-code="gh">Ghana</option>
      		<option value="Gibraltar" class="flag-gi" data-country-code="+350" data-code="gi">Gibraltar</option>
      		<option value="Greece" class="flag-gr" data-country-code="+30" data-code="gr">Greece</option>
      		<option value="Greenland" class="flag-gl" data-country-code="+299" data-code="gl">Greenland</option>
      		<option value="Grenada" class="flag-gd" data-country-code="+1473" data-code="gd">Grenada</option>
      		<option value="Guadeloupe" class="flag-gp" data-country-code="+590" data-code="gp">Guadeloupe</option>
      		<option value="Guam" class="flag-gu" data-country-code="+1671" data-code="gu">Guam</option>
      		<option value="Guatemala" class="flag-gt" data-country-code="+502" data-code="gt">Guatemala</option>
      		<option value="Guernsey" class="flag-gg" data-country-code="+44" data-code="gg">Guernsey</option>
      		<option value="Guinea" class="flag-gn" data-country-code="+224" data-code="gn">Guinea</option>
      		<option value="Guinea-Bissau" class="flag-gw" data-country-code="+245" data-code="gw">Guinea-Bissau</option>
      		<option value="Guyana" class="flag-gy" data-country-code="+592" data-code="gy">Guyana</option>
      		<option value="Haiti" class="flag-ht" data-country-code="+509" data-code="ht">Haiti</option>
      		<option value="Honduras" class="flag-hn" data-country-code="+504" data-code="hn">Honduras</option>
      		<option value="Hong Kong" class="flag-hk" data-country-code="+852" data-code="hk">Hong Kong</option>
      		<option value="Hungary" class="flag-hu" data-country-code="+36" data-code="hu">Hungary</option>
      		<option value="Iceland" class="flag-is" data-country-code="+354" data-code="is">Iceland</option>
      		<option value="India" class="flag-in" data-country-code="+91" data-code="in">India</option>
      		<option value="Indonesia" class="flag-id" data-country-code="+62" data-code="id">Indonesia</option>
      		<option value="Iran" class="flag-ir" data-country-code="+98" data-code="ir">Iran</option>
      		<option value="Iraq" class="flag-iq" data-country-code="+964" data-code="iq">Iraq</option>
      		<option value="Ireland" class="flag-ie" data-country-code="+353" data-code="ie">Ireland</option>
      		<option value="Isle of Man" class="flag-im" data-country-code="+44" data-code="im">Isle of Man</option>
      		<option value="Israel" class="flag-il" data-country-code="+972" data-code="il">Israel</option>
      		<option value="Italy" class="flag-it" data-country-code="+39" data-code="it">Italy</option>
      		<option value="Jamaica" class="flag-jm" data-country-code="+1876" data-code="jm">Jamaica</option>
      		<option value="Japan" class="flag-jp" data-country-code="+81" data-code="jp">Japan</option>
      		<option value="Jersey" class="flag-je" data-country-code="+44" data-code="je">Jersey</option>
      		<option value="Jordan" class="flag-jo" data-country-code="+962" data-code="jo">Jordan</option>
      		<option value="Kazakhstan" class="flag-kz" data-country-code="+7" data-code="kz">Kazakhstan</option>
      		<option value="Kenya" class="flag-ke" data-country-code="+254" data-code="ke">Kenya</option>
      		<option value="Kiribati" class="flag-ki" data-country-code="+686" data-code="ki">Kiribati</option>
      		<option value="Kosovo" class="flag-xk" data-country-code="+383" data-code="xk">Kosovo</option>
      		<option value="Kuwait" class="flag-kw" data-country-code="+965" data-code="kw">Kuwait</option>
      		<option value="Kyrgyzstan" class="flag-kg" data-country-code="+996" data-code="kg">Kyrgyzstan</option>
      		<option value="Laos" class="flag-la" data-country-code="+856" data-code="la">Laos</option>
      		<option value="Latvia" class="flag-lv" data-country-code="+371" data-code="lv">Latvia</option>
      		<option value="Lebanon" class="flag-lb" data-country-code="+961" data-code="lb">Lebanon</option>
      		<option value="Lesotho" class="flag-ls" data-country-code="+266" data-code="ls">Lesotho</option>
      		<option value="Liberia" class="flag-lr" data-country-code="+231" data-code="lr">Liberia</option>
      		<option value="Libya" class="flag-ly" data-country-code="+218" data-code="ly">Libya</option>
      		<option value="Liechtenstein" class="flag-li" data-country-code="+423" data-code="li">Liechtenstein</option>
      		<option value="Lithuania" class="flag-lt" data-country-code="+370" data-code="lt">Lithuania</option>
      		<option value="Luxembourg" class="flag-lu" data-country-code="+352" data-code="lu">Luxembourg</option>
      		<option value="Macau" class="flag-mo" data-country-code="+853" data-code="mo">Macau</option>
      		<option value="Macedonia" class="flag-mk" data-country-code="+389" data-code="mk">Macedonia</option>
      		<option value="Madagascar" class="flag-mg" data-country-code="+261" data-code="mg">Madagascar</option>
      		<option value="Malawi" class="flag-mw" data-country-code="+265" data-code="mw">Malawi</option>
      		<option value="Malaysia" class="flag-my" data-country-code="+60" data-code="my">Malaysia</option>
      		<option value="Maldives" class="flag-mv" data-country-code="+960" data-code="mv">Maldives</option>
      		<option value="Mali" class="flag-ml" data-country-code="+223" data-code="ml">Mali</option>
      		<option value="Malta" class="flag-mt" data-country-code="+356" data-code="mt">Malta</option>
      		<option value="Marshall Islands" class="flag-mh" data-country-code="+692" data-code="mh">Marshall Islands</option>
      		<option value="Martinique" class="flag-mq" data-country-code="+596" data-code="mq">Martinique</option>
      		<option value="Mauritania" class="flag-mr" data-country-code="+222" data-code="mr">Mauritania</option>
      		<option value="Mauritius" class="flag-mu" data-country-code="+230" data-code="mu">Mauritius</option>
      		<option value="Mayotte" class="flag-yt" data-country-code="+262" data-code="yt">Mayotte</option>
      		<option value="Mexico" class="flag-mx" data-country-code="+52" data-code="mx">Mexico</option>
      		<option value="Micronesia" class="flag-fm" data-country-code="+691" data-code="fm">Micronesia</option>
      		<option value="Moldova" class="flag-md" data-country-code="+373" data-code="md">Moldova</option>
      		<option value="Monaco" class="flag-mc" data-country-code="+377" data-code="mc">Monaco</option>
      		<option value="Mongolia" class="flag-mn" data-country-code="+976" data-code="mn">Mongolia</option>
      		<option value="Montenegro" class="flag-me" data-country-code="+382" data-code="me">Montenegro</option>
      		<option value="Montserrat" class="flag-ms" data-country-code="+1" data-code="ms">Montserrat</option>
      		<option value="Morocco" class="flag-ma" data-country-code="+212" data-code="ma">Morocco</option>
      		<option value="Mozambique" class="flag-mz" data-country-code="+258" data-code="mz">Mozambique</option>
      		<option value="Myanmar" class="flag-mm" data-country-code="+95" data-code="mm">Myanmar</option>
      		<option value="Namibia" class="flag-na" data-country-code="+264" data-code="na">Namibia</option>
      		<option value="Nauru" class="flag-nr" data-country-code="+674" data-code="nr">Nauru</option>
      		<option value="Nepal" class="flag-np" data-country-code="+977" data-code="np">Nepal</option>
      		<option value="Netherlands" class="flag-nl" data-country-code="+31" data-code="nl">Netherlands</option>
      		<option value="New Caledonia" class="flag-nc" data-country-code="+687" data-code="nc">New Caledonia</option>
      		<option value="New Zealand" class="flag-nz" data-country-code="+64" data-code="nz">New Zealand</option>
      		<option value="Nicaragua" class="flag-ni" data-country-code="+505" data-code="ni">Nicaragua</option>
      		<option value="Niger" class="flag-ne" data-country-code="+227" data-code="ne">Niger</option>
      		<option value="Nigeria" class="flag-ng" data-country-code="+234" data-code="ng">Nigeria</option>
      		<option value="Niue" class="flag-nu" data-country-code="+683" data-code="nu">Niue</option>
      		<option value="Norfolk Island" class="flag-nf" data-country-code="+672" data-code="nf">Norfolk Island</option>
      		<option value="North Korea" class="flag-kp" data-country-code="+850" data-code="kp">North Korea</option>
      		<option value="Northern Mariana Islands" data-country-code="+1670" class="flag-mp" data-code="mp">Northern Mariana Islands</option>
      		<option value="Norway" class="flag-no" data-country-code="+47" data-code="no">Norway</option>
      		<option value="Oman" class="flag-om" data-country-code="+968" data-code="om">Oman</option>
      		<option value="Pakistan" class="flag-pk" data-country-code="+92" data-code="pk">Pakistan</option>
      		<option value="Palau" class="flag-pw" data-country-code="+680" data-code="pw">Palau</option>
      		<option value="Palestine" class="flag-ps" data-country-code="+970" data-code="ps">Palestine</option>
      		<option value="Panama" class="flag-pa" data-country-code="+507" data-code="pa">Panama</option>
      		<option value="Papua New Guinea" class="flag-pg" data-country-code="+675" data-code="pg">Papua New Guinea</option>
      		<option value="Paraguay" class="flag-py" data-country-code="+595" data-code="py">Paraguay</option>
      		<option value="Peru" class="flag-pe" data-country-code="+51" data-code="pe">Peru</option>
      		<option value="Philippines" class="flag-ph" data-country-code="+63" data-code="ph">Philippines</option>
      		<option value="Pitcairn Islands" class="flag-pn" data-country-code="+870" data-code="pn">Pitcairn Islands</option>
      		<option value="Poland" class="flag-pl" data-country-code="+48" data-code="pl">Poland</option>
      		<option value="Portugal" class="flag-pt" data-country-code="+351" data-code="pt">Portugal</option>
      		<option value="Puerto Rico" class="flag-pr" data-country-code="+1787" data-code="pr">Puerto Rico</option>
      		<option value="Qatar" class="flag-qa" data-country-code="+974" data-code="qa">Qatar</option>
      		<option value="Réunion" class="flag-re" data-country-code="+262" data-code="re">Réunion</option>
      		<option value="Romania" class="flag-ro" data-country-code="+40" data-code="ro">Romania</option>
      		<option value="Russia" class="flag-ru" data-country-code="+7" data-code="ru">Russia</option>
      		<option value="Rwanda" class="flag-rw" data-country-code="+250" data-code="rw">Rwanda</option>
      		<option value="Saint Barthélemy" class="flag-bl" data-country-code="+590" data-code="bl">Saint Barthélemy</option>
      		<option value="Saint Helena" class="flag-sh" data-country-code="+290" data-code="sh">Saint Helena</option>
      		<option value="Saint Kitts and Nevis" class="flag-kn" data-country-code="+1869" data-code="kn">Saint Kitts and Nevis</option>
      		<option value="Saint Lucia" class="flag-lc" data-country-code="+1758" data-code="lc">Saint Lucia</option>
      		<option value="Saint Martin" class="flag-mf" data-country-code="+590" data-code="mf">Saint Martin</option>
      		<option value="Saint Pierre and Miquelon" class="flag-pm" data-country-code="+508" data-code="pm">Saint Pierre and Miquelon</option>
      		<option value="Saint Vincent and the Grenadines" class="flag-vc" data-country-code="+1784" data-code="vc">Saint Vincent and the Grenadines</option>
      		<option value="Samoa" class="flag-ws" data-country-code="+685" data-code="ws">Samoa</option>
      		<option value="San Marino" class="flag-sm" data-country-code="+378" data-code="sm">San Marino</option>
      		<option value="São Tomé and Príncipe" data-country-code="+239" class="flag-st" data-code="st">São Tomé and Príncipe</option>
      		<option value="Saudi Arabia" class="flag-sa" data-country-code="+966" data-code="sa">Saudi Arabia</option>
      		<option value="Senegal" class="flag-sn" data-country-code="+221" data-code="sn">Senegal</option>
      		<option value="Serbia" class="flag-rs" data-country-code="+381" data-code="rs">Serbia</option>
      		<option value="Seychelles" class="flag-sc" data-country-code="+248" data-code="sc">Seychelles</option>
      		<option value="Sierra Leone" class="flag-sl" data-country-code="+232" data-code="sl">Sierra Leone</option>
      		<option value="Singapore" class="flag-sg" data-country-code="+65" data-code="sg">Singapore</option>
      		<option value="Sint Maarten" class="flag-sx" data-country-code="+1721" data-code="sx">Sint Maarten</option>
      		<option value="Slovakia" class="flag-sk" data-country-code="+421" data-code="sk">Slovakia</option>
      		<option value="Slovenia" class="flag-si" data-country-code="+386" data-code="si">Slovenia</option>
      		<option value="Solomon Islands" class="flag-sb" data-country-code="+677" data-code="sb">Solomon Islands</option>
      		<option value="Somalia" class="flag-so" data-country-code="+252" data-code="so">Somalia</option>
      		<option value="South Africa" class="flag-za" data-country-code="+27" data-code="za">South Africa</option>
      		<option value="South Georgia &amp; South Sandwich Islands" class="flag-gs" data-country-code="" data-code="gs">South Georgia &amp; South Sandwich Islands</option>
      		<option value="South Korea" class="flag-kr" data-country-code="+82" data-code="kr">South Korea</option>
      		<option value="South Sudan" class="flag-ss" data-country-code="+211" data-code="ss">South Sudan</option>
      		<option value="Spain" class="flag-es" data-country-code="+34" data-code="es">Spain</option>
      		<option value="Sri Lanka" class="flag-lk" data-country-code="+94" data-code="lk">Sri Lanka</option>
      		<option value="Sudan" class="flag-sd" data-country-code="+249" data-code="sd">Sudan</option>
      		<option value="Suriname" class="flag-sr" data-country-code="+597" data-code="sr">Suriname</option>
      		<option value="Svalbard and Jan Mayen" class="flag-sj" data-country-code="+47" data-code="sj">Svalbard and Jan Mayen</option>
      		<option value="Swaziland" class="flag-sz" data-country-code="+268" data-code="sz">Swaziland</option>
      		<option value="Sweden" class="flag-se" data-country-code="+46" data-code="se">Sweden</option>
      		<option value="Switzerland" class="flag-ch" data-country-code="+41" data-code="ch">Switzerland</option>
      		<option value="Syria" class="flag-sy" data-country-code="+963" data-code="sy">Syria</option>
      		<option value="Taiwan" class="flag-tw" data-country-code="+886" data-code="tw">Taiwan</option>
      		<option value="Tajikistan" class="flag-tj" data-country-code="+992" data-code="tj">Tajikistan</option>
      		<option value="Tanzania" class="flag-tz" data-country-code="+255" data-code="tz">Tanzania</option>
      		<option value="Thailand" class="flag-th" data-country-code="+66" data-code="th">Thailand</option>
      		<option value="Timor-Leste" class="flag-tl" data-country-code="+670" data-code="tl">Timor-Leste</option>
      		<option value="Togo" class="flag-tg" data-country-code="+228" data-code="tg">Togo</option>
      		<option value="Tokelau" class="flag-tk" data-country-code="+690" data-code="tk">Tokelau</option>
      		<option value="Tonga" class="flag-to" data-country-code="+676" data-code="to">Tonga</option>
      		<option value="Trinidad and Tobago" country-code="+1868" class="flag-tt" data-code="tt">Trinidad and Tobago</option>
      		<option value="Tunisia" class="flag-tn" data-country-code="+216" data-code="tn">Tunisia</option>
      		<option value="Turkey" class="flag-tr" data-country-code="+90" data-code="tr">Turkey</option>
      		<option value="Turkmenistan" class="flag-tm" data-country-code="+993" data-code="tm">Turkmenistan</option>
      		<option value="Turks and Caicos Islands" country-code="+1649" class="flag-tc" data-code="tc">Turks and Caicos Islands</option>
      		<option value="Tuvalu" class="flag-tv" data-country-code="+688" data-code="tv">Tuvalu</option>
      		<option value="Uganda" class="flag-ug" data-country-code="+256" data-code="ug">Uganda</option>
      		<option value="Ukraine" class="flag-ua" data-country-code="+380" data-code="ua">Ukraine</option>
      		<option value="United Arab Emirates" class="flag-ae" data-country-code="+971" data-code="ae">United Arab Emirates</option>
      		<option value="United Kingdom" class="flag-gb" data-country-code="+44" data-code="gb">United Kingdom</option>
      		<option value="United States" class="flag-us" data-country-code="+1" data-code="us">United States</option>
      		<option value="U.S. Minor Outlying Islands" class="flag-um" data-country-code="" data-code="um">U.S. Minor Outlying Islands</option>
      		<option value="U.S. Virgin Islands" class="flag-vi" data-country-code="+1340" data-code="vi">U.S. Virgin Islands</option>
      		<option value="Uruguay" class="flag-uy" data-country-code="+598" data-code="uy">Uruguay</option>
      		<option value="Uzbekistan" class="flag-uz" data-country-code="+998" data-code="uz">Uzbekistan</option>
      		<option value="Vanuatu" class="flag-vu" data-country-code="+678" data-code="vu">Vanuatu</option>
      		<option value="Vatican City" class="flag-va" data-country-code="+379" data-code="va">Vatican City</option>
      		<option value="Venezuela" class="flag-ve" data-country-code="+58" data-code="ve">Venezuela</option>
      		<option value="Vietnam" class="flag-vn" data-country-code="+84" data-code="vn">Vietnam</option>
      		<option value="Wallis and Futuna" class="flag-wf" data-country-code="+681" data-code="wf">Wallis and Futuna</option>
      		<option value="Western Sahara" class="flag-eh" data-country-code="+212" data-code="eh">Western Sahara</option>
      		<option value="Yemen" class="flag-ye" data-country-code="+967" data-code="ye">Yemen</option>
      		<option value="Zambia" class="flag-zm" data-country-code="+260" data-code="zm">Zambia</option>
      		<option value="Zimbabwe" class="flag-zw" data-country-code="+263" data-code="zw">Zimbabwe</option>
	    </select></span>';
    return $output; 
 
}
  
function custom_countrycode_shortcode_handler( $tag ) {
	$output = '<span class="wpcf7-form-control-wrap  telephonenumber">
					<input type="text" name="telephonenumber" value="" minlength="10" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-phonetext numeric wpcf7-validates-as-required" >
				</span>';
	return $output; 
}

add_action( 'wp_footer', 'mycustom_wp_footer' );
function mycustom_wp_footer() {
?>
<script type="text/javascript">
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-34963243-1', 'auto');
document.addEventListener( 'wpcf7mailsent', function( event ) {
    if ( '158' == event.detail.contactFormId ) {
        ga( 'send', 'event', 'Contact Form', 'submit' );
    }
}, false );

</script>
<?php
}
function add_async_forscript($url)
{
    if (strpos($url, '#asyncload')===false)
        return $url;
    else if (strpos($url, '#defer')===false)
        return str_replace('#defer', '', $url)."' async='defer"; 
    // else
        // return str_replace('#asyncload', '', $url)."' async='async"; 
}
function wpYudizPreGetPostFunction( $query ) {
    if ( is_post_type_archive( 'join-our-team' ) && 'join-our-team' === $query->query['post_type'] ) {
         $query->set( 'posts_per_page', -1 );
    }
}
add_action( 'pre_get_posts', 'wpYudizPreGetPostFunction' );

// add_filter('clean_url', 'add_async_forscript', 11, 1);

// add_filter( 'wpcf7_form_elements', 'imp_wpcf7_form_elements' );
// function imp_wpcf7_form_elements( $content ) {
//     $str_pos = strpos( $content, 'name="textarea-81"' );
// 	$content = substr_replace( $content, ' autocomplete="both" autocomplete="off" ', $str_pos, 0 );
	
//     $str_pos = strpos( $content, 'name="textarea-10"' );
//     $content = substr_replace( $content, ' autocomplete="both" autocomplete="off" ', $str_pos, 0 );

//     return $content;
// }

add_action('wp_print_scripts', function () {
	global $post;
	if ( is_a( $post, 'WP_Post' ) && !has_shortcode( $post->post_content, 'contact-form-7') ) {
		//wp_dequeue_script( 'google-recaptcha' ); wp_dequeue_script( 'wpcf7-recaptcha' );
	}
});

add_filter( 'wpseo_opengraph_title', 'prefix_filter_og_image', 10, 1 );
function prefix_filter_og_image( $img ) {
    if( is_post_type_archive( 'join-our-team' ) )
	    $title = 'Career';
    return $title;
}
add_filter( 'wpcf7_use_really_simple_captcha', '__return_true' );



/* =-=-=-=-=-=-=-=-=- 25-1-2022 -=-=-=-=-=-=-=-=-== */

function custom_phone_validation($result,$tag){
	// $type = $tag['type'];
	// print_r($result);
	$name = $tag->name;
	if('tel-884' == $tag->name){
	$phoneNumber = isset( $_POST['tel-884'] ) ? trim( $_POST['tel-884'] ) : '';
	if(strlen($phoneNumber) < 10){
		$result->invalidate( $tag, "Please enter 10 Digit Number." );
		$result->invalidate($tag, wpcf7_get_message('invalid_phone'));
	}
   }
   return $result;
   }
 add_filter('wpcf7_validate_tel','custom_phone_validation', 10, 2);
 add_filter('wpcf7_validate_tel*', 'custom_phone_validation', 10, 2);
//  add_filter('wpcf7_validate_text','custom_phone_validation', 20, 2);
//  add_filter('wpcf7_validate_text*', 'custom_phone_validation', 20, 2);

 add_filter( 'wpcf7_messages', 'wpcf7_telephone_messages' );
 
function wpcf7_telephone_messages( $messages ) {
	return array_merge( $messages, array(
		'invalid_phone' => array(
			'description' => __( "Text field contain number", 'wpcs-plugin' ),
			'default' => __( "Please enter 10 Digit Number.", 'wpcs-plugin' )
		)
	) );
    return $messages;
}

add_action( 'template_redirect', 'wpse_128636_redirect_post' );

function wpse_128636_redirect_post() {
  if ( is_singular( 'post' ) ) {
    wp_redirect( home_url(), 301 );
    exit;
  }
}

/* =-=-=-=-=-=-=-=-=- 26-7-2022 -=-=-=-=-=-=-=-=-== */
/* Financial Reports */
function financial_reports(){
	ob_start();
	?>
	<ul class="financial-reports-list">
		<?php
		// Check rows exists.
		if( have_rows('financials') ):

			// Loop through rows.
			while( have_rows('financials') ) : the_row();

				// Load sub field value.
				$title = get_sub_field('financial_title');
				$link = get_sub_field('financial_link');
				// Do something...
				?>
				<li>
					<i class="fas fa-file-pdf"></i>
					<a href="<?php echo $link; ?>" target="_blank"><?php echo $title; ?></a>
				</li>
				<?php

			// End loop.
			endwhile;

		// No value.
		else :
			?>
			<h5>No records found</h5>
			<?php
		endif;
		return ob_get_clean();
		?>
	</ul>
	<?php
}
add_shortcode( 'financial_reports', 'financial_reports' );
function richedit_wp_cloudfront () {
	if( current_user_can('administrator') ) add_filter('user_can_richedit','__return_true');
}
add_action( 'init', 'richedit_wp_cloudfront', 9 );


// add_filter('wp_headers', function (array $headers) {
//     $headers['Cache-Control'] = 'public, max-age=31536000';
//     return $headers;
// });

add_action('wp_ajax_my_repeater_show_more', 'crown_my_repeater_show_more');    
add_action('wp_ajax_nopriv_my_repeater_show_more', 'crown_my_repeater_show_more');
function crown_my_repeater_show_more(){
	// object buffers make the code easier to work with
	ob_start();
	// validate the nonce
	if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'my_repeater_field_nonce')) {
		exit;
	}
	// make sure we have the other values
	if (!isset($_POST['post_id']) || !isset($_POST['offset'])) {
		return;
	}
	$show = 6; // how many more to show
	$start = intval($_POST['offset']);
	$end = $start+$show;
	$post_id = $_POST['post_id'];
	// use an object buffer to capture the html output
	// alternately you could create a varaible like $html
	// and add the content to this string, but I find
	$loading_img = get_stylesheet_directory_uri() ."/images/loader-img.svg";
	$product_trip_setting = get_field("product_trip_setting",$post_id);
	$product_fields = $product_trip_setting["product_fields_"];
	$total = count($product_fields['product_box']); $count = 0; $number = 5;
        foreach( $product_fields['product_box'] as $single_product ):   
			if ($count < $start) {
				$count++;
				continue;
			}
			?>
			<div class="col-md-4 col-sm-6 product-trip-col">
				<div class="product-trip-box">
					<div class="product-detail-img">
						<img src="<?php echo $single_product['image']['url']; ?>" alt="<?php echo $single_product['image']['alt']; ?>" /> 
					</div>
					<div class="prod-desc-box">
						<h5><?php echo $single_product['title']; ?></h5>
						<h6><?php echo $single_product['category']; ?></h6>
						<?php echo $single_product['description']; ?>
						<ul>
							<?php foreach( $single_product['keypoints'] as $single_key ): ?>
								<li><?php echo $single_key['title']; ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		<?php 
		$count++;
		if ($count == $end) {
			// we have shown the number, break out of loop
			break;
		}
		endforeach; 
$content = ob_get_clean();
// check to see if we have shown the last item
$more = false;
$total = $total + 1;
// if ($total == $count) {
// 	$more = true;
// }
// output our 3 values as a json encoded array
echo json_encode(array('content' => $content, 'more' => $count + 1, 'offset' => $end, 'total' => $total));
exit;
}

if (!function_exists('mysite_client_cache')) :
	function mysite_client_cache($headers)
	{
		global $wp;

		$current_request_path = $wp->requet;

		if ('' !== $current_request_path) {
			$current_request_path = trim($current_request_path, '/');

			if ('wp-admin' !== $current_request_path) {
				$headers['Cache-Control'] = 'public, max-age=604800';
			}
		}

		return $headers;
	}
endif;

add_filter('wp_headers', 'mysite_client_cache', 100, 1);
