<?php
function yspl_blog_data($page_no = 1, $filterVal = '', $searchVal = "", $authorVal = ""){
	ob_start();
	
	$paged = ( $page_no ) ? $page_no : 1;
	$tax_query = "";
	if ($filterVal != "") {
		$tax_query = array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => $filterVal
		);
	}
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 6,
		'search_prod_title' => $searchVal,
		'paged' => $paged,
		'tax_query' =>  array($tax_query),
		'author_name'	=>	$authorVal,
		'post_status' => 'publish',
	);
	add_filter( 'posts_where', 'title_filter', 10, 2 );
	$loop = new WP_Query($args);
	remove_filter( 'posts_where', 'title_filter', 10, 2 );
	if( $loop->have_posts() ) :
		while ( $loop->have_posts() ) : $loop->the_post(); 
			?>
			<?php
			$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
			?>
		    <div class="col-sm-6 col-md-4">
		    	<div class="blog-item-box wow fadeIn">
		    		<span style="background: <?php echo get_field('color') ?>;"></span>
		    		<div class="blog-box-desc">
		    			<div class="blog-box-author">
							<small><a class="blog-author-thumb" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );  ?>" style="background: url('<?php echo get_avatar_url(get_the_author_meta('ID')); ?>') no-repeat center center / cover;"></a> By, <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );  ?>"><?php the_author();?></a></small>
		    			</div>
		    			<div class="blog-box-info">
		    				<h4>
		    					<a href="<?php the_permalink(); ?>">
			    					<?php 
			    					if( strlen(get_the_title()) > 100 ) {
										echo substr(get_the_title(), 0, 85).'...';
									} else {
										echo get_the_title();
									}
			    					?>
			    						
		    					</a>
		    				</h4>
		    				<small><?php echo contentLimit(get_the_title(), get_the_excerpt())?></small>
		    				<a href="<?php the_permalink(); ?>">
		    					<img src="<?php echo $image[0];?>" alt="<?php echo get_the_title(); ?>"/>
		    				</a>
		    			</div>
		    		</div>
		    		<div class="blog-box-footer">
		    			<small class="blog-box-category">
		    				<?php
		    				$blog_category = get_the_category(); $i = 1;
		    				foreach ($blog_category as $key => $value){
		    					if($i == 3){
		    					?>
			    				<span>+<?php echo count($blog_category) - 2; ?>
				    				<ul>
		    						<?php 
		    						}
		    						?>
		    						<?php if($i <= 2){ ?>
			    						<?php if($i > 1){ echo ','; }else{ echo ''; } ?>
			    						<a href="<?php echo get_category_link($value->term_id); ?>"><?php echo $value->name; ?></a><?php
			    					}elseif($i > 2){ ?>
    									<li> 
				    						<a href="<?php echo get_category_link($value->term_id); ?>"><?php echo $value->name; ?></a>
			    						</li>
		    							<?php 
		    						} 
		    						if($i == count($blog_category)){ ?>
				    				</ul>
			    				</span>
		    					<?php }
		    					$i++;
		    				}
		    				?>
		    			</small>
		    			<small class="blog-box-date"><?php echo get_the_date("jS M Y")?></small>
		    		</div>
		    	</div>
		    </div>

			<?php
		endwhile;
		wp_reset_postdata();
	else:
		?>
		<div class="col-sm-12">
			<h5>It looks like you are lost into the space!!</h5>
			<p>We couldn't find any content related to your search.</p>
		</div>
		<?php
	endif;
	?>
	<?php //echo "######". $loop->max_num_pages;?>
	<input type="hidden" name="total_pages" value="<?php echo $loop->max_num_pages; ?>" class="total-pages">
	<?php

	return $load_join_team = ob_get_clean();
}