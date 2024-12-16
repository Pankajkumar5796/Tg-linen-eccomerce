<?php
//Template Name: Blog Page
get_header();
?>



<!-- Banner-section-start -->
<section class="banner_wrapper">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="banner_bx position-relative">
                <img src="<?php echo the_field('inner_banner'); ?>" alt="inner-b" class="img-fluid">
                <div class="banner_content">
                    <h1 class="text-center"><?php echo the_title();?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner-section-end -->

<!-- Blog-section-start-->
<section class="professional_service blog_sec">
    <div class="container">
        <div class="row">
            <div class="main_heading mb-5">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/towel.png" alt="icon" width="35" />
                <h2>Blog Post</h2>
            </div>
        </div>
        <div class="row gy-4">
            <?php
            $titlecat = single_cat_title('', false);

            $wpnew = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => $titlecat,
                'posts_per_page' => -1,
                'order' => 'ASC',
            );

            $newquery = new WP_Query($wpnew);

            while ($newquery->have_posts()) {
                $newquery->the_post();
                $imagepath =
                    wp_get_attachment_image_src(
                        get_post_thumbnail_id(),
                        'large'
                    );
            ?>
                <div class="col-lg-4 col-xl-4">
                    <div class="custom-card h-100">
                        <div class="custom-card-img position-relative">
                            <img src="<?php echo $imagepath[0]; ?>" alt="Building Maintenance" class="card-img" />
                            <div class="card-icon">
                                <?php
                                $categories = get_the_category();
                                if (! empty($categories)) {
                                    echo '<p>' . esc_html($categories[0]->name) . '</p>';
                                }
                                ?>

                            </div>
                        </div>
                        <div class="custom-card-content">
                            <h3 class="custom-card-title">
                                <?php echo the_title(); ?>
                            </h3>
                            <p class="custom-card-description">
                                <?php $post_content = get_the_content();
                                $trimmed_content = wp_trim_words($post_content, 25);
                                echo $trimmed_content;
                                ?>
                            </p>
                            <div class="custom-card-btn text-center">
                                <a href="<?php echo the_permalink();?>" class="custom-card-link">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</section>
<!-- Blog-section-end-->







<?php
get_footer();
?>