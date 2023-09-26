<section class="common-section">
    <div class="container">
        <div class="row career-list-banner">
            <div class="col-sm-7">
                <?php
                $career_email = 'yspl_career_email';
                $career_phone = 'yspl_career_phone';
                $career_title = 'yspl_career_title';
                $career_tag_line = 'yspl_career_tag_line';
                $career_glass_door_url = 'career_glass_door_url';
                $career_instagram_url = 'career_instagram_url';
                $career_title_val = get_option( $career_title );
                $career_tag_line_val = get_option( $career_tag_line );
                $career_email_val = get_option( $career_email );
                $career_phone_val = get_option( $career_phone );
                $career_glass_door_url = get_option( $career_glass_door_url );
                $career_follow_us_logo = get_option( "career_follow_us_logo" );
                $career_instagram_url = get_option( $career_instagram_url );
                $career_instagram_logo = get_option( "career_instagram_logo" );
                ?>
                <h6><?php echo $career_tag_line_val; ?></h6>
                <h1 class="mid-h1"><?php echo $career_title_val; ?></h1>
                <div class="career-contact">
                    <a href="mailto:<?php echo $career_email_val?>"><?php echo $career_email_val?></a>
                    <a href="tel:<?php echo str_replace(' ', '', $career_phone_val); ?>"><?php echo $career_phone_val?></a>
                </div>
            </div>
            <div class="col-sm-5 glassdoor-link">
                <a href="<?php echo $career_glass_door_url;?>" target="_blank">
                    <figure>
                        <img src="<?php echo $career_follow_us_logo;?>" alt="glassdoor logo" />
                    </figure>    
                </a>
                <a href="<?php echo $career_instagram_url;?>" target="_blank">
                    <figure>
                        <img src="<?php echo $career_instagram_logo;?>" alt="instagram logo" />
                    </figure>    
                </a>
            </div>
        </div>
    </div>
</section>
<section class="common-section career-list-section">
    <div class="container">
        <div class="row">
            <?php #echo yspl_join_our_team_data(); 
			$i = 0; 
			while ( have_posts() ) : the_post(); 
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
	                <a class="hide-content-text" href="<?php echo get_the_permalink();?>">Join Our Team</a>
	            </div>
	        </div>
			<?php
		endwhile; 
			?>
		<div class="col-sm-6 col-md-4 col-lg-3 post-list">
	        <div class="career-box wow fadeIn other-career-box">
	            <div>
	                <small>Not Listed Here?</small>
	                <h6>Apply For Other</h6>    
	            </div>
	            <a class="hide-content-text" href="<?php echo site_url(); ?>/join-our-team/#gotocareer">Join Our Team</a>
	        </div>
	    </div>
        </div>
    </div>
    <?php
    global $joinOurTeamQuery;
    if($joinOurTeamQuery->max_num_pages > 1): 
        ?> 
        <div class="text-center mt-64">
            <form id="load-more-jn-tm-form" class="load-more-form">
                <div>
                    <input class="load-more-jn-tm-btn load-more" type="submit" name="load-more" value="Load More">
                    <input type="hidden" name="page_no" value="2" class="page-no">
                    <input type="hidden" name="action" value="load_more_join_our_team" class="action">
                    <input type="hidden" name="total_pages" value="<?php echo $wp_query->max_num_pages; ?>" class="total-pages">
                </div>
            </form>
        </div>
        <?php
    endif; 
    ?>
</section>
<section>
    <div class="container">
        <?php
        $content = get_post(16941);
        echo do_shortcode(apply_filters("the_content", $content->post_content));
        postcontentcss($content->post_content);
        ?>
    </div>
</section>