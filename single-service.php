<?php
get_header();
?>



<!-- about-page-banner-section start -->
<section class="banner_wrapper blog-banner">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="banner_bx position-relative">
                <img src="<?php echo the_field('inner_banner')?>" alt="inner-b" class="img-fluid">
                <div class="banner_content">
                    <h1 class="text-center"><?php echo the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-page-banner-section end -->

<!-- stone-care-section start -->

<div class="stone-care-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="stone-care-text">
                    <div class="stone-care-heading mb-3">
                        <h3>All Services</h3>
                    </div>
                    <?php

                    $wpnew = array(
                        'post_type' => 'service',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                    );
                    $newquery = new WP_Query($wpnew);
                    while ($newquery->have_posts()) {
                        $newquery->the_post();
                    ?>
                        <div class="severce-name">
                            <h6><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h6>
                        </div>
                    <?php
                    }
                    // WP_Query ko reset 
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <div class="col-lg-8 mt-4">
                <div class="stone-care-side-img">
                    <img src="<?php echo $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- stone-care-section end -->
<div class="stone-care-text-section mb-5">
    <div class="container">

        <div class="stone-care-text-main">
            <?php echo the_content(); ?>
        </div>
    </div>
</div>




<?php
get_footer();
?>