<?php 
/*
    Template Name: rsvp template
*/ 
get_header();
$loading_img = get_stylesheet_directory_uri() . "/images/loader-new.svg";
$contact_page_info = get_field("contact_page_info"); 
?>
<section class="get-in-touch-pg-box common-padding contact-container" style="background-color:#fff !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-8 col-md-offset-1">
                <h1 class="medium bold-element"><?php echo $contact_page_info['title']; ?></h1>
               
                <!-- <p><?php //echo $contact_page_info['description']; ?></p> -->
                <div class="form-contact-bx mt-64">
                    <!-- <div class="title-form-bx">
                        <div class="inquiry-title-bx">
                            <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $contact_page_info['icon_image']; ?>" alt="img" />
                            <span><?php echo $contact_page_info['icon_title']; ?></span>
                        </div>
                    </div> -->
                    <?php 
					if($contact_page_info['form_shortcode'] != ''){
						echo do_shortcode($contact_page_info['form_shortcode']);	
					}else{
						echo do_shortcode('[contact-form-7 id="158" title="Get In Touch"]');	
					}
					?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
get_footer();
?>