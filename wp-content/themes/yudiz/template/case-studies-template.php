<?php /* Template Name: Case Studies */ 
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <section class="common-section listing-padding case-studies-page secondary-bg ">
                <div class="container">
                   <div class="row">
                    <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <?php echo do_shortcode('[case-study]') ?>
                        </div>
                    <div class="col-md-1"></div>
                   </div>
                </div>
            </section>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>
