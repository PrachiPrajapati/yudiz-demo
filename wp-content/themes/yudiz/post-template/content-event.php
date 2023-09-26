<section class="event-banner">
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );?>
	<article class="col-sm-12">
		<div class="row">
			<div class="container">
			    <div class="row align-center">
			        <div class="col-sm-12 col-md-8 event-data">
			    		<div class="event-logo">
			            	<figure>
			            		<img src="<?php echo $image[0];?>" alt="event-logo">
			            	</figure>
			            </div>
			            <h2><?php echo get_field('event_meet_title')?></h2>
			            <h3 style="color: <?php echo get_field('color')?>;"><?php echo get_the_title()?></h3>
			            <ul>
							<li><i class="far fa-calendar-alt"></i> <span style="color: <?php echo get_field('color')?>;"><?php echo get_field('date')?></span></li>
							<li><i class="fas fa-map-marker-alt"></i> <?php echo get_field('location')?></li>
						</ul>          
			        </div>
			        <div class="col-sm-11 col-md-4 event-form">
			        	<div class="event-form-inner">
			            	<h6><?php echo get_field('schedule_meeting')?></h6>
			            	<?php echo do_shortcode( get_field('contact_form_shortcode') ); ?>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	    <div class="wpb_single_image center-pattern">
	    	<figure>
	    		<img src="<?php echo get_field('event_right_background')?>" alt="pattern">
	    	</figure>
	    </div>
	    <div class="wpb_single_image left-pattern">
	    	<figure>
	    		<img src="<?php echo get_field('event_left_background')?>" alt="pattern">
	    	</figure>
	    </div>
<!-- 	    <div class="vc_row scroll-image" style="background-image: url(<?php echo get_field('event_bottom_background')?>);"></div> -->
		<div class="vc_row event-scroll-image main-event-scroll-img"></div>
    </article>
</section>
<section class="container data-to-paste">
		<?php the_content(); ?>
</section>
<div id="event-thankyou-popup" class="thank-you-popup" style="display: none;">
    <div class="row row-flex">
        <div class="col-sm-6">
            <figure><img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/event-thank-you.png" alt="image" /></figure>
        </div>
        <div class="col-sm-6">
            <div class="thankyou-data">

                <img src="<?php echo get_template_directory_uri();?>/images/thank-you.svg" alt="thank-you"/>
                <h5 class="green">For Your Interest</h5>
                <h6>Our Team will contact you as soon as possible.</h6>
                <small>Follow us on <a class="twitter" href="https://twitter.com/yudizsolutions?lang=en" target="_blank" rel="noopener">Twitter</a> and like us on <a class="facebook" href="https://www.facebook.com/yudizsolutions/" target="_blank" rel="noopener">Facebook</a> to keep up to date with all our news and announcements.</small>
              
            </div>
        </div>
    </div>
</div>