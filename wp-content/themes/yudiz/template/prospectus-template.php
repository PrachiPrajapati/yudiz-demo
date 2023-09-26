<?php
/* Template Name: Prospectus Page */ 
?>
<section class="logo-main d-flex-wrap" style="text-align:center; justify-content:center; padding:25px 0;">
        <div class="primary-logo">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $image = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
            <a href="<?php echo home_url(); ?>"><img width="240" height="61" src="<?php echo $image[0]; ?>" alt="logo"></a>
        </div>
</section>