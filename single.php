<?php

get_header();
?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <!-- Banner-section-start -->
        <section class="banner_wrapper blog-banner">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="banner_bx position-relative">
                        <img src="<?php echo $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="inner-b" class="img-fluid">
                        <div class="banner_content">
                            <h1 class="text-center"><?php echo the_title(); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner-section-end -->


        <!-- Blog-section-start-->
        <section class="blog-details-wrapper py-5 pb-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xl-4">
                    <div class="recent_blog">
                            <h4>Recent Blog</h4>
                            <?php
                            
                            $wpnew = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'order' => 'DSC',
                            );
                            $newquery = new WP_Query($wpnew);
                            while ($newquery->have_posts()) {
                                $newquery->the_post();
                            ?>
                                <div class="recent_blog_card">
                                    <div class="feature-img">
                                        <a href="<?php echo the_permalink(); ?>">
                                            <img src="<?php echo $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="blog">
                                        </a>
                                    </div>
                                    <div class="title">
                                        <a href="<?php echo the_permalink(); ?>"><?php $post_content = get_the_title();
                                                                                    $trimmed_content = wp_trim_words($post_content, 5);
                                                                                    echo $trimmed_content;
                                                                                    ?></a>
                                    </div>
                                </div>
                            <?php
                            }
                            // WP_Query ko reset karte hain
                            wp_reset_postdata();
                            ?>

                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="fetured_image">
                            <img src="<?php echo $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="blog"
                                loading="lazy">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="blog_content">
                    <div class="title_content">
                            <h3 class="text-start"><?php echo the_title(); ?></h3>
                            <p><?php echo the_content(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="cta_bnt_sec mb-4">
            <div class="container">
                <div class="row">
                    <div class="cta_btn text-center">
                        <a href="#">Enquiry now </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog-section-end-->

<?php endwhile;
else :
    echo 'No posts found';
endif;
?>

<?php
get_footer();
?>