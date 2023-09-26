<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	$tid= get_the_ID();
	$cat = get_the_terms(get_the_ID(),'join-our-team-category');
	?>
	<div class="entry-content">

		<div class="common-section">
		    <div class="container">
		        <div class="row">
		            <div class="col-sm-8 col-lg-7">
		                <div class="jod-title-block">
		                    <p class="wow fadeIn">Posted on <?php echo get_the_date("d M, Y"); ?></p>
		                    <h1 class="wow fadeIn mid-h1"><?php echo get_the_title(); ?></h1>
		                    <h6 class="wow fadeIn"><strong><?php echo get_field("require_experience"); ?></strong></h6>
		                </div>
		                <div class="job-desc-block wow fadeIn">
		                    <?php the_content();  ?>
		                </div>
						<div  class="theme-btn solid-blue wow fadeIn">
		                	<a href="#single-job-form" class="apply-btn">Apply Now</a>
						</div>
		            </div>
		            <?php
		            $args = array(
						'post_type' => "join-our-team",
						'posts_per_page' => 8,
						'post__not_in' => array( $tid )
					);
					$the_query = new WP_Query($args);
					if($the_query->have_posts()):
						?>
			            <div class="col-sm-4 col-lg-offset-1 col-lg-3 job-list-sidebar">
			                <h6 class="wow fadeIn">Other Jobs</h6>
			                <ul>
			                	<?php while ($the_query->have_posts()) : $the_query->the_post();?>
				                    <li class="wow fadeIn">
				                        <a href="<?php the_permalink()?>"><?php echo get_the_title();?><small><?php echo get_field("require_experience"); ?></small></a>
				                    </li>
				                <?php
								endwhile;
								wp_reset_postdata();
								?>
							</ul>
			            </div>
			        <?php endif;?>
		        </div>
		    </div>
		</div>
		<div class="apply-now p-b-100 contact-container">
			<div class="container">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1 career-single-form-box">
						<div class="row">
							<div class="col-sm-10 col-sm-offset-1">
								<?php
								echo do_shortcode('[contact-form-7 id="359" title="Single career contact form"]');
								?>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->


<?php if($cat[0]->slug == "freshers") {?>
<script type="text/javascript">
	jQuery('.apply-now .experience').hide();
</script>
<?php }?>