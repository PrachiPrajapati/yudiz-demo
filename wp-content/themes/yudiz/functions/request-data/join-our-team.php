<?php
function yspl_join_our_team_data($page_no = 1){
	ob_start();
	$paged = ( $page_no ) ? $page_no : 1;
	$args = array(
		'post_type' => 'join-our-team',
		'posts_per_page' => -1,
		// 'posts_per_page' => 7,
// 		'paged' => $paged,
		'post_status' => 'publish',
	);
	global $joinOurTeamQuery;
	$joinOurTeamQuery = new WP_Query($args);
	if( $joinOurTeamQuery->have_posts() ) :
		$i = 1;
		while ( $joinOurTeamQuery->have_posts() ) : $joinOurTeamQuery->the_post(); 
			$jtmloadmore = "";
			if ($i++ == 7) {
				$jtmloadmore = "main-lists";
			} 
			?>
		    <div class="col-sm-6 col-md-4 col-lg-3 post-list <?php echo $jtmloadmore;?>">
	            <div class="career-box wow fadeIn" style="background-image: url('<?php if( get_field('select_what_we_do') == 'Select Service' ){ echo get_field("icon",get_field("select_service")); }else{ echo get_field('other_service_icon'); } ?>');">
	                <div>
	                    <?php 
	                        if( get_field('select_what_we_do') == 'Select Service' ):  ?>
	                            <small><?php echo get_the_title(get_field("select_service"));?></small>
	                            <?php
	                        else:
	                            ?>
	                            <small><?php echo get_field("other_service");?></small>
	                        <?php
	                        endif; 
	                    ?>
	                    <h6><?php echo get_the_title();?></h6>    
	                </div>
	                <p><?php echo get_field("require_experience"); ?></p>
	                <a class="hide-content-text" href="<?php echo get_the_permalink();?>">Services</a>
	            </div>
	        </div>
			<?php
		endwhile;
		wp_reset_postdata();
	endif; 
	if ($paged == 1) { 
	?>
		<div class="col-sm-6 col-md-4 col-lg-3 post-list">
	        <div class="career-box wow fadeIn other-career-box">
	            <div>
	                <small>Not Listed Here?</small>
	                <h6>Apply For Other</h6>    
	            </div>
	            <a class="hide-content-text" href="<?php echo site_url(); ?>/get-in-touch/#1557982197619-528eee27-be96">Services</a>
	        </div>
	    </div>
	<?php
	}
	return $load_join_team = ob_get_clean();
}