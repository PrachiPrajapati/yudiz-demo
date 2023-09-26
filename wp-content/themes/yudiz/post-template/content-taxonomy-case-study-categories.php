<section class="common-section">
    <div class="container">
    	<div class="row casestudy-title">
	    	<div class="col-sm-7 col-lg-8">
	    		<?php $queried_object = get_queried_object(); ?>
				<h1 class="medium"><?php echo $queried_object->name; ?></h1>
				<div class="sub-heading">
					<p>Case Studies</p>
				</div>
	    	</div>
	    	<div class="col-sm-3 col-lg-2 col-sm-offset-2"><img src="<?php echo get_field('case_study_category_image', "case-study-categories_".$queried_object->term_id); ?>" alt="yudiz case study" /></div>
    	</div>
    </div>
</section>
<div class="common-section casestudy-sector-list">
	<div class="container">
		<div class="row">
			<?php
			$args = array(
				'post_type' => 'case-study',
				'posts_per_page' => 3,
				'tax_query' => array(
					array(
						'taxonomy' => 'case-study-categories',
						'field' => 'slug',
						'terms' => $queried_object->slug
					),
				),
			);
			$loop = new WP_Query($args);
			if( $loop->have_posts() ) :
				?>
				<ul class="col-md-10 col-md-offset-1 case-study-lst">
					<?php while( $loop->have_posts() ) : $loop->the_post(); 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
						?>
						<li class="row sector-block">
							<div class="col-md-6 sector-thumb" style="background: #f4f4f4 url(<?php echo $image[0]; ?>) no-repeat center center /cover;"></div>
							<div class="col-md-6 sector-desc">
								<h5><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
								<small><?php echo strip_tags(get_the_term_list(get_the_ID(), 'case-study-categories' , '',', ')); ?></small>
								<?php if(get_field('short_description')){ ?><p><?php echo get_field('short_description'); ?></p><?php } ?>
								<a class="hide-content-text" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
							</div>
						</li>
					<?php endwhile; wp_reset_postdata(); ?>
				</ul>
				<?php
			endif;
			?>
		</div>
		<?php if($loop->max_num_pages > 1){ ?>
			<div class="text-center">
				<form id="load-more-case-study" class="load-more-form">
					<div>
						<input type="submit" class="load-more load-more-blog-btn loadmore-casestudy-btn" name="load-more" value="Load More">
						<input type="hidden" name="page_no" class="page-no" value="2">
						<input type="hidden" name="total_pages" class="total-pages" value="<?php echo $loop->max_num_pages; ?>">
						<input type="hidden" name="category" value="<?php echo $queried_object->slug; ?>">
						<input type="hidden" name="action" value="load_more_casestudy">
					</div>
				</form>
			</div>
		<?php } ?>
	</div>
</div>