<?php  
$case_study_inner_template = get_field("case_study_inner_template");
$project_overview = $case_study_inner_template["project_overview"];
$client_background_fields = $case_study_inner_template["client_background_fields"];
$business_needs_fields = $case_study_inner_template["business_needs_fields"];
$challenge_box = $case_study_inner_template["challenge_box"];
$solution_fields = $case_study_inner_template["solution_fields"];
$key_outcome_box = $case_study_inner_template["key_outcome_box"];
$loading_img = get_stylesheet_directory_uri() . "/images/loader-new.svg"; ?>
<div class="casestudy-banner padding-80">
	<div class="container">
		<div class="row">
			<div class=" col-md-offset-1 col-lg-4 col-sm-6 ">
				<h1 class="small"><?php echo get_the_title(); ?></h1>
				&nbsp;
				<?php if(get_field('short_description')){ ?>
					<p><?php echo get_field('short_description'); ?></p>
				&nbsp;
				<?php } if(get_field('sector')){ ?>
					<p>
						<span>Sector</span>
						<br>- <?php echo get_field('sector'); ?>
					</p>
				&nbsp;
				<?php } if(get_field('technology')){ ?>
					<p>
						<span>Technology</span>
						<br>- <?php echo get_field('technology'); ?>
					</p>
				&nbsp;
				<?php } if(get_field('company_background')){ ?>
					<p>
						<span>Company Background</span>
						<br>- <?php echo get_field('company_background'); ?>
					</p>
				<?php } //if(get_field('read_more_link') || get_field('download_case_study_link')){ ?>
					<div class="theme-btn solid-blue">
						<a href="javascript:void(0);" class="down-scroll-btn">
							<svg width="24px" height="15px" viewBox="0 0 24 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							    <!-- Generator: Sketch 58 (84663) - https://sketch.com -->
							    <title>Path 7</title>
							    <desc>Created with Sketch.</desc>
							    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <g id="scroll-icon" transform="translate(-327.000000, -673.000000)" stroke-width="3.33333333">
							            <g id="Group-44" transform="translate(0.000000, 119.000000)">
							                <g id="Group-33" transform="translate(311.000000, 118.000000)">
							                    <g id="Group-3-Copy" transform="translate(0.000000, 415.000000)">
							                        <polyline id="Path-7" transform="translate(28.000000, 28.000000) rotate(90.000000) translate(-28.000000, -28.000000) " points="23 18 33 28 23 38"></polyline>
							                    </g>
							                </g>
							            </g>
							        </g>
							    </g>
							</svg>
						</a>
						<?php //if(get_field('download_case_study_link')){ ?>
						<?php if(false){ ?>
							<a target="_blank"> href="<?php echo get_field('download_case_study_link'); ?>"><?php echo get_field('download_case_study_text'); ?></a>
						<?php } ?>
					</div>
				<?php //} ?>
			</div>
			<?php
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
			?>
			<div class=" col-md-offset-1 col-lg-6 col-sm-6" style="background: #f4f4f4 url(<?php echo $image[0]; ?>) no-repeat center center /cover;">
				<div class="casestudy-banner-thumb" ></div>
			</div>
		</div>
	</div>
</div>
<div id="intro"></div>
<!-- <div class="container data-to-paste">
			<?php //the_content(); ?>
</div> -->
<div class="data-to-paste content-area ">
       <div class="common-section">
            <div class="container">
                <div class="case-study-wrappper row-rev">
                    <div class="row d-flex-wrap" style="justify-content: center;">
                        <div class="col-sm-6">
                            <div class="case-stud-box">
                                <h3><?php echo $project_overview["title"]; ?></h3>
                                <?php echo $project_overview["description"]; ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-center">
                              <img class="yswp_lazy" data-lzy_src="<?php echo $project_overview["project_overview_image"]["url"]; ?>" alt="<?php echo $project_overview["project_overview_image"]["alt"]; ?>" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
       <div class="common-section secondary-bg">
          <div class="container">
            <div class="row d-flex-wrap justify-content-center">
                <div class="col-md-10">
                    <div class="row d-flex-wrap">
                        <div class="col-md-4">
                            <div class="clent-bg">
                                <h3><?php echo $client_background_fields["title"]; ?></h3>
                            </div>
                        </div>
                        <div class="client-bg-desc col-md-8">
                            <div class="bg-bx">
                              <?php echo $client_background_fields["description"]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
       </div>
       <div class="common-section business-needs">
            <div class="container">
                <div class="case-study-wrappper row-rev">
                    <div class="row d-flex-wrap align-center" style="justify-content: center;">
                        <div class="col-sm-6">
                            <div class="case-stud-box">
                              <h3><?php echo $business_needs_fields["title"]; ?></h3>
                                <?php echo $business_needs_fields["description"]; ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-center">
                              <img class="yswp_lazy" data-lzy_src="<?php echo $business_needs_fields["image"]["url"]; ?>" alt="<?php echo $business_needs_fields["image"]["alt"]; ?>" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
       <div class="common-section the-challenge secondary-bg">
            <div class="container">
                <div class="case-study-wrappper">
                    <div class="row d-flex-wrap align-center" style="justify-content: center;">
                        <div class="col-sm-4">
                            <div class="text-center">
                              <img class="yswp_lazy" data-lzy_src="<?php echo $challenge_box["image"]["url"]; ?>" alt="<?php echo $challenge_box["image"]["alt"]; ?>" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="case-stud-box">
                                 <h3><?php echo $challenge_box["title"]; ?></h3>
                                <?php echo $challenge_box["description"]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
       <div class=" common-section our-solution">
         <div class="container">
            <div class="case-study-wrappper row-rev">
               <div class="row d-flex-wrap align-center" style="justify-content: center;">
                     <div class="col-sm-6">
                        <div class="case-stud-box">
                           <h3><?php echo $solution_fields["title"]; ?></h3>
                                <?php echo $solution_fields["description"]; ?>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="text-center">
                        <img class="yswp_lazy" data-lzy_src="<?php echo $solution_fields["image"]["url"]; ?>" alt="<?php echo $solution_fields["image"]["alt"]; ?>" />
                        </div>
                     </div>
               </div>
            </div>
         </div>
      </div>
       <div  class="common-section secondary-bg">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="outcome-bx case-stud-box">
                        <h3><?php echo $key_outcome_box["title"]; ?></h3>
                        <?php echo $key_outcome_box["description"]; ?>
                  </div>
               </div>
            </div>
            </div>
       </div>
    </div>
	<?php
	$terms = get_the_terms( get_the_ID(), 'case-study-categories' );
	$args = array(
		'post_type' => 'case-study',
		'posts_per_page' => -1,
		'post__not_in' => array(get_the_ID()),
		'tax_query' => array(
			array(
				'taxonomy' => 'case-study-categories',
				'field' => 'slug',
				'terms' => $terms[0]->slug
			),
		),
	);
	$loop = new WP_Query($args);
	if( $loop->have_posts() ) :
		?>
		<div class="common-section related-casestudy-section">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1"><h4>Related Case Study</h4></div>
				</div>
				<div class="related-casestudy-slider">
					<?php while( $loop->have_posts() ) : $loop->the_post(); 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
						?>
						<div>
							<div class="col-md-10 col-md-offset-1">
								<div class="row">
									<div class="sector-block">
										<div class="col-md-6 sector-thumb" style="background: #f4f4f4">
											<img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $image[0]; ?>" alt="case-study-banner"/>
										</div>
										<div class="col-md-6 sector-desc">
											<h5><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
											<small><a href="<?php echo get_term_link($terms[0]->term_id, 'case-study-categories'); ?>"><?php echo strip_tags(get_the_term_list(get_the_ID(), 'case-study-categories' , '',', ')); ?></a></small>
											<?php if(get_field('short_description')){ ?>
												<p><?php echo get_field('short_description'); ?></p>
											<?php } ?>
											<a class="hide-content-text" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
		<?php
	endif;
	?>