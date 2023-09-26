<?php
/************************ Shortcode for Slider ****************************/
function yspl_case_study_shortcode( $atts ) {
	ob_start();
	$terms = get_terms(
		array(
	    	'taxonomy' => 'case-study-categories'
		)
	);
	?>
	<div class="title-bar">
		<div class="row align-center">
			<div class="col-md-9 col-sm-8">
				<h1 class="medium">Case Studies</h1>
			</div>
			<div class="col-md-3 col-sm-4">
				<form method="get" action="<?php echo home_url(); ?>" class="search-form">
					<div class="form-group">					
						<div class="input-group">
					    	<span class="input-group-btn">
					    		<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
					        </span>
					      	<input type="text" class="form-control search1" name="s" id="searchid1" placeholder="Search">
					      	<input type="hidden" name="post" value="case-study">
					    </div>
					</div>
				</form>
			</div>
	    </div>
	</div>
	<div class="case-studies-listing">
	    <ul>
	    	<?php foreach($terms as $value){ ?>
		        <li>
		            <div class="case-studies-block">
		                <a class="hide-content-text" href="<?php echo get_term_link($value->term_id); ?>"><?php echo $value->name; ?></a>
		                <h5><?php echo $value->name; ?></h5>
		                <figure>
		                    <img src="<?php echo get_field('case_study_category_image', 'case-study-categories_'.$value->term_id); ?>" alt="<?php echo $value->name; ?>">
		                </figure>
		            </div>
		        </li>
	    	<?php } ?>
	    </ul>
	</div>
	<?php
	
	$case_study = ob_get_clean();
    return $case_study;
}
add_shortcode( 'case-study', 'yspl_case_study_shortcode' );