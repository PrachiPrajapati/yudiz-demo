<?php /* Template Name: Investor Policy Page */ 
get_header(); ?>
<section class="common-section general-pattern-section secondary-bg investor-relations-container custom-temp-investor-page">
    <div class="container">
        <h1 style="text-align: left" class="mid-h1">Policies</h1>
        <div class="custom-saperator"></div>
        <p>We at Yudiz believe in consistent results and profoundly value our shareholders scaling to provide modern and comprehensive services. Our company always aims to achieve outright transparency and adapting world class practices throughout the entire operation board.</p>
    </div>
    <div class="custom-temp-investor-content">
        <div class="accordion">
            <div class="accordion_tab ">
                Accordion Title
                <div class="accordion_arrow">
                <img src="https://i.imgur.com/PJRz0Fc.png" alt="arrow">
            </div>
            </div>
            <div class="accordion_content">
            <div class="accordion_item">
                <p class="item_title">Accordion SubTitle</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto quis sed praesentium dolorem hic ipsam maiores magnam voluptatem deleniti sunt.</p>
            </div>
            <div class="accordion_item">
                <p class="item_title">Accordion SubTitle</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto quis sed praesentium dolorem hic ipsam maiores magnam voluptatem deleniti sunt.</p>
            </div>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion_tab">
                Accordion Title
                <div class="accordion_arrow">
                <img src="https://i.imgur.com/PJRz0Fc.png" alt="arrow">
            </div>
            </div>
            <div class="accordion_content">
            <div class="accordion_item">
                <p class="item_title">Accordion SubTitle</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto quis sed praesentium dolorem hic ipsam maiores magnam voluptatem deleniti sunt.</p>
            </div>
            <div class="accordion_item">
                <p class="item_title">Accordion SubTitle</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto quis sed praesentium dolorem hic ipsam maiores magnam voluptatem deleniti sunt.</p>
            </div>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion_tab">
                Accordion Title
                <div class="accordion_arrow">
                <img src="https://i.imgur.com/PJRz0Fc.png" alt="arrow">
            </div>
            </div>
            <div class="accordion_content">
            <div class="accordion_item">
                <p class="item_title">Accordion SubTitle</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto quis sed praesentium dolorem hic ipsam maiores magnam voluptatem deleniti sunt.</p>
            </div>
            <div class="accordion_item">
                <p class="item_title">Accordion SubTitle</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto quis sed praesentium dolorem hic ipsam maiores magnam voluptatem deleniti sunt.</p>
            </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    jQuery(".accordion_tab").click(function(){
    // jQuery(".accordion_tab").each(function(){
    //   jQuery(this).parent().removeClass("active");
    //   jQuery(this).removeClass("active");
    // });
    jQuery(this).parent().toggleClass("active");
    jQuery(this).toggleClass("active");
});
</script>
<?php
get_footer();
?>