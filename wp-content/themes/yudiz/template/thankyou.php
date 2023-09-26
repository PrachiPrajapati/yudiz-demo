<?php
/* Template Name: Thank you*/
get_header();

?>
<div class="primary-logo" style="">
    <?php
    $custom_logo_id = get_theme_mod('custom_logo');
    $image = wp_get_attachment_image_src($custom_logo_id, 'full');
    ?>
    <a href="<?php echo get_field('back_to_home_url'); ?>"><img width="100%" height="100%" src="<?php echo $image[0]; ?>" alt="logo"></a>
</div>
<section class="thankyou-page-template common-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-9">
                <div class="row">
                    <div class="col-md-6 col-sm-6 thankyou-banner">
                        <h1>Thank You ! </h1>
                        <h5>We've Received Your Inquiry</h5>
                        <ul>
                            <li>
                                <img src="https://www.yudiz.com/wp-content/uploads/2023/09/email-blue-ic.svg" alt="mail" />
                                <a href="mailto:contact@yudiz.com">contact@yudiz.com</a>
                            </li>
                            <li>
                                <img src="https://www.yudiz.com/wp-content/uploads/2023/09/skype-blue-ic.svg" alt="skype" />
                                <a href="skype:-yudizsolutions-?chat">yudizsolutions</a>
                            </li>
                            <li>
                                <img src="https://www.yudiz.com/wp-content/uploads/2023/09/call-blue-ic.svg" alt="call" />
                                <a href="tel:+919033975375">+91 9033975375</a>
                            </li>
                        </ul>
                        <p>Follow us on Instagram and like us on X to keep up to date with all our news and announcements.</p>
                    </div>
                    <div class="col-md-6 col-sm-6 text-center">
                        <img src="https://www.yudiz.com/wp-content/uploads/2023/09/thankyou-email-img.png" alt="thankyou email page">
                    </div>
                </div>
                <div class="theme-btn solid-blue text-center mt-32">
                    <a href="<?php echo get_field('back_to_home_url'); ?>" >Back to Home</a>
                </div>
            </div>
        </div>
    </div>
    <div class="pattern-img">
        <img class="pattern-right" src="https://www.yudiz.com/wp-content/uploads/2023/09/thankyou-yellow-shape.png" alt="pattern" />
        <img class="pattern-left" src="https://www.yudiz.com/wp-content/uploads/2023/09/thankyou-blue-shape.png" alt="pattern" />
    </div>
</section>
<section class="time-line-what-next-section common-section">
    <div class="container">
        <h2 class="text-center">Here's What Happens Next</h2>
        <div class="custom-saperator"></div>
        <div class="custom-saperator"></div>
        <div class="tl">
            <div class="tl-wrapper">
                <div class="tl-container tl-left">
                    <div class="tl-content">
                        <h5>We'll reach you soon</h5>
                        <p> Our team of business experts will contact you to engage in a thorough discussion, defining project requirements and scope in detail. </p>
                    </div>
                </div>
                <div class="tl-steps-coutner">
                    <h4>01</h4>
                    <img src="https://www.yudiz.com/wp-content/uploads/2023/09/step-1-rocket.svg" alt="rocket" />
                </div>
            </div>
            <div class="tl-wrapper">
                <div class="tl-container tl-right">
                    <div class="tl-content">
                    <h5>Project quotation and proposal</h5>
                    <p> Our analyst will draft a detailed project proposal with cost estimates, a project plan, and a delivery timeline. Once you give the green light, we're geared up to kick-start the project immediately. </p>
                    </div>
                </div>
                <div class="tl-steps-coutner">
                    <h4>02</h4>
                    <img src="https://www.yudiz.com/wp-content/uploads/2023/09/step-2-rocket.svg" alt="rocket" />
                </div>
            </div>
            <div class="tl-wrapper">
                <div class="tl-container tl-left">
                    <div class="tl-content">
                    <h5>Begin Project</h5>
                    <p> Our team of project managers, designers, and developers is all set to commence work on your project. Yudiz follows agile business and developments strategies to deliver the project within the time frame. </p>
                    </div>
                </div>
                <div class="tl-steps-coutner">
                    <h4>03</h4>
                    <img src="https://www.yudiz.com/wp-content/uploads/2023/09/step-3-rocket.svg" alt="rocket" />
                </div>
            </div>
        </div>
    </div>
    <div class="pattern-img">
        <img class="tl-pattern-right" src="https://www.yudiz.com/wp-content/uploads/2023/09/thankyou-line-vec.svg" alt="pattern" />
    </div>
</section>
<?php
get_footer();
?>