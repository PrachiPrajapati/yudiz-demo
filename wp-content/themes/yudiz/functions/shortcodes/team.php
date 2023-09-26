<?php
/************************ Shortcode for team ****************************/

function yspl_team_shortcode( $atts ){
	ob_start();


	$teamTaxonomies = get_terms( array(
	    'taxonomy' => 'team_categories',
	) );
	
	if ( !empty($teamTaxonomies) ) :
	    foreach( $teamTaxonomies as $teamCategory ) {
	    	$args = array(
	    		'post_type' => "our-team",
	    		'posts_per_page' => -1,
	    		'tax_query' => array(
	    			array(
	    				'taxonomy' => 'team_categories',
	    				'field'    => 'slug',
	    				'terms'    => $teamCategory->slug,
	    			),
	    			array(
	    				'taxonomy' => 'team_categories',
	    				'field'    => 'slug',
	    				'terms'    => 'other-team-members',
	    				'operator' => 'NOT IN',
	    			),
	    		),
	    	);
	    	$the_query = new WP_Query($args);

			if($the_query->have_posts()):?>
				<div class="team-block padding-80">
					<div class="container">
					    <!-- <h5 class="team-title wow fadeIn" data-wow-delay="0.2s"><?php //echo $teamCategory->name;?></h5> -->
					    <div class="row <?php if($teamCategory->slug == 'the-war-lords'){ echo 'top-members'; }else{ echo ''; } ?>">
							<?php while ($the_query->have_posts()) : $the_query->the_post();?>
						        <?php
						        if($teamCategory->slug == "the-war-lords") {
						        	$colClass = "3";
						        } else {
						        	$colClass = "3";
						        }
								$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
								?>
						        <div class="col-sm-<?php echo $colClass;?>">
						            <div class="team-box wow fadeIn" data-wow-delay="0.2s">
						                <figure><img src="<?php echo $image[0];?>" alt="<?php echo get_the_title();?>" /></figure>
						                <div class="member-desc">
						                    <h5><?php echo get_the_title();?></h5>
						                    <h6><?php echo get_field("designation");?></h6>
						                </div>
						            </div>
						        </div>

							<?php
							endwhile; wp_reset_postdata(); ?>
						</div>
					</div>
			    </div>			    	
			<?php
			endif;			
	    }
	    	$args = array(
	    		'post_type' => "our-team",
	    		'posts_per_page' => -1,
	    		'tax_query' => array(
	    			array(
	    				'taxonomy' => 'team_categories',
	    				'field'    => 'slug',
	    				'terms'    => 'other-team-members',
	    			),
	    		),
	    		'orderby'   => 'rand',
	    	);
	    	$the_query = new WP_Query($args);
	    	$term = get_term_by('slug', 'other-team-members', 'team_categories'); $name = $term->name;
			if($the_query->have_posts()):?>
			<div class="team-block padding-80">
				<div class="other-team-block clearfix wow fadeIn" data-wow-delay="0.2s">
					<h5 class="team-title wow fadeIn" data-wow-delay="0.2s"><?php echo $name?></h5>
					<?php while ($the_query->have_posts()) : $the_query->the_post();?>
				        <?php
						$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
						?>
			            <div class="team-blk wow fadeIn" style="background-image: url(<?php echo $image[0];?>);">
			                <div class="member-info"><?php echo get_the_title();?></div>
			            </div>
					<?php
					endwhile; wp_reset_postdata(); ?>
				</div>
			</div>	    	
			<?php
			endif;
	endif;

	return ob_get_clean();

}
add_shortcode( 'team', 'yspl_team_shortcode' );