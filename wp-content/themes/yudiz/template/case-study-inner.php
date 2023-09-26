<?php
/*
Template Name: Case Study Inner
*/
get_header();
$case_study_inner_template = get_field("case_study_inner_template");
$project_overview = $case_study_inner_template["project_overview"];
$client_background_fields = $case_study_inner_template["client_background_fields"];
$business_needs_fields = $case_study_inner_template["business_needs_fields"];
$challenge_box = $case_study_inner_template["challenge_box"];
$solution_fields = $case_study_inner_template["solution_fields"];
$key_outcome_box = $case_study_inner_template["key_outcome_box"];
$loading_img = get_stylesheet_directory_uri() ."/images/loader-new.svg";
?>
<main id="main" class="site-main single-case-study">
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
 </main>
<?php
get_footer();
?>