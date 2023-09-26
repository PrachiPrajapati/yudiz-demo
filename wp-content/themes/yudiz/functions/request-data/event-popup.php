<?php
function ysplEvent(){
	ob_start();
	if ($_SESSION['event_popup'] == "") {
    	$_SESSION['event_popup'] = "set";
    }
	if ($_SESSION['event_popup'] == "set") {
	// if (true) {
		$_SESSION['event_popup'] = "unset";
		$args = array(
			'post_type' => 'event',
			'posts_per_page' => 1,
		);
		$loop = new WP_Query($args);
		if( $loop->have_posts() ) :
			while ( $loop->have_posts() ) : $loop->the_post(); 
				?>
				<?php $image = get_the_post_thumbnail_url(get_the_ID(), 'full' );?>
				<a href="#" class="event-popup-btn" data-fancybox="" data-src="#event-popup" style="display: none;">Event</a>
			    <div style="display: none; background-image: url(<?php echo get_field('event_left_background');?>), url(<?php echo get_field('event_right_background');?>)" id="event-popup">
			    	<div class="row row-flex reverse">
			    		<div class="col-sm-8">
	                        <div class="event-data">
				    			<h2><?php echo get_field('event_meet_title');?></h2>
				    			<h3 style="color: <?php echo get_field('color')?>;"><?php echo get_the_title()?></h3>
				    			<ul>
									<li><i class="far fa-calendar-alt"></i> <span style="color: <?php echo get_field('color')?>;"><?php echo get_field('date')?></span></li>
									<li><i class="fas fa-map-marker-alt"></i> <?php echo get_field('location')?></li>
								</ul>  
				    			<div class="theme-btn bordered-black"><a href="<?php echo get_the_permalink();?>"><?php echo get_field('schedule_meeting');?></a></div>
			                </div>
			    		</div>
			    		<div class="col-sm-4">
			    			<img src="<?php echo $image;?>" alt="event-logo" class="img-responsive">
			    		</div>
			    	</div>
			    	<!-- <div class="vc_row event-scroll-image" style="background-image: url(<?php echo get_field('event_bottom_background');?>)"></div> -->
					<div class="vc_row event-scroll-image"></div>
			    </div>

				<?php
			endwhile;
			wp_reset_postdata();
		endif;
	}
	echo $event = ob_get_clean();
}