<?php
//Template Name: Home Page
get_header();
?>

<!-- Banner-wrapper-start -->

<section class="banner_wrapper lazy-section">
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade position-relative" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active banner_img">
                <img src="<?php echo get_option('xx_image1'); ?>" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item banner_img">
                <img src="<?php echo get_option('xx_image2'); ?>" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item banner_img">
                <img src="<?php echo get_option('xx_image3'); ?>" class="d-block w-100" alt="..." />
            </div>
        </div>
        <div class="banner_contents">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="box_content">
                            <span class="italics"><?php echo get_option('xx_paragraph1'); ?></span>
                            <h1>
                                <?php echo get_option('xx_heading1'); ?>
                            </h1>
                            <p>Let's Make Linen Hiring Easy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Banner-wrapper-end -->

<!-- our-products-section-start -->
<section class="product_warpper position-relative py-5">
    <div class="container">
        <div class="row">
            <div class="main_heading mb-5">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/towel.png" alt="icon" />
                <h2>Our Products</h2>
            </div>
        </div>
        <div class="row">
            <?php
            $titlecat = single_cat_title('', false);

            $wpnew = array(
                'post_type'  => 'produc',
                'post_status'  => 'publish',
                'category_name'  => $titlecat,
                'posts_per_page'  => -1,
                'order'   => 'ASC',
            ); // Add the missing semicolon here

            $newquery = new WP_Query($wpnew);

            if ($newquery->have_posts()) {
                while ($newquery->have_posts()) {
                    $newquery->the_post();
                    $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
            ?>
                    <div class="col-lg-3 col-xl-3 col-md-6">
                        <div class="product_card position-relative">
                            <div class="product_img">
                                <img src="<?php echo $imagepath[0] ?>" alt="service" class="parent_img" />
                                <div class="position_elem">
                                    <img src="<?php echo the_field('icon'); ?>" alt="icon" />
                                </div>
                            </div>
                            <div class="title py-2">
                                <h3 class="text-center"><?php echo the_title(); ?></h3>
                            </div>
                            <div class="content">
                                <?php echo the_content(); ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p>No posts found</p>';
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
    <div class="pattern_1">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pattern/pattern1.png" alt="" />
    </div>
    <div class="pattern_2">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pattern/pattern1.png" alt="" />
    </div>
</section>
<!-- our-products-section-end -->

<!-- About-section-start-->

<section class="about_wrapper">
    <div class="about_banner position-relative">
        <img src="<?php echo the_field('about_sec_banner_image'); ?>" alt="about" class="about_img" />
        <div class="about_inner">
            <div class="container">
                <div class="row">
                    <div class="main_heading mb-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/towel.png" alt="icon" width="35" />
                        <h2>About Us</h2>
                    </div>
                    <div class="about_content">
                        <p>
                            <?php echo the_field('about_field_content'); ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <div class="content_wrapper">
                            <div class="content_title">
                                <h3>Our Mission</h3>
                                <p>
                                    <?php echo the_field('our_mission_section'); ?>
                                </p>
                            </div>
                            <div class="feature_point">
                                <?php
                                if (have_rows('our_mission_feature_list')) {
                                    while (have_rows('our_mission_feature_list')) {
                                        the_row();

                                ?>
                                        <div class="list mb-3">
                                            <div class="icon">
                                                <?php echo the_sub_field('icon'); ?>
                                            </div>
                                            <div class="feature_cont">
                                                <p>
                                                    <?php echo the_sub_field('content'); ?>
                                                </p>
                                            </div>
                                        </div>
                                <?php }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="img_container">
                            <div class="img_bx position-relative">
                                <img src="<?php echo the_field('about_sec_left_image'); ?>" alt="" />
                                <div class="bottom_img" data-aos="fade-left">
                                    <img src="<?php echo the_field('moving_car_image'); ?>" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About-section-end-->

<!-- Proffesional-section-start-->
<section class="professional_service">
    <div class="container">
        <div class="row">
            <div class="main_heading mb-5">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/towel.png" alt="icon" width="35" />
                <h2>Professional Services</h2>
            </div>
        </div>
        <div class="row gy-4">
            <?php
            $titlecat = single_cat_title('', false);

            $wpnew = array(
                'post_type'  => 'service',
                'post_status'  => 'publish',
                'category_name'  => $titlecat,
                'posts_per_page'  => -1,
                'order'   => 'ASC',
            ); // Add the missing semicolon here

            $newquery = new WP_Query($wpnew);

            if ($newquery->have_posts()) {
                while ($newquery->have_posts()) {
                    $newquery->the_post();
                    $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
            ?>
                    <div class="col-lg-4 col-xl-4">
                        <div class="custom-card h-100">
                            <div class="custom-card-img position-relative">
                                <img src="<?php echo $imagepath[0] ?>" alt="Building Maintenance" class="card-img" />
                                <div class="card-icon">
                                    <img src="<?php echo the_field('icon'); ?>" alt="Icon" width="20" />
                                </div>
                            </div>
                            <div class="custom-card-content">
                                <h3 class="custom-card-title text-center">
                                    <?php echo the_title(); ?>
                                </h3>
                                <p class="custom-card-description text-center">
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
            <?php
                }
            } else {
                echo '<p>No posts found</p>';
            }
            wp_reset_postdata(); // Important: Reset post data after custom WP_Query
            ?>
        </div>
    </div>
</section>
<!-- Proffesional-section-end-->

<!-- Experience-section-start -->

<section class="experience_wrapper">
    <div class="exp_bg position-relative">
        <img src="<?php echo the_field('exp_sec_banner'); ?>" alt="" class="servic_bann" />
        <div class="exp_content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-xl-5">
                        <div class="left-sec">
                            <h2><?php echo the_field('experience_sec_tittle'); ?></h2>
                            <div class="exp_cont">
                                <p>
                                    <?php echo the_field('experience_sec_content'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-7">
                        <div class="right_img position-relative">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/elipse.png" alt="" />
                            <div class="bottom_elem" data-aos="fade-left"
                                data-aos-duration="1500">
                                <img src=" <?php echo the_field('moving_car_image'); ?>" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Experience-section-start -->

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

<!-- Testimonial-section-start -->
<section class="testimonial_wrapper pb-4">
    <div class="container">
        <div class="row">
            <div class="main_heading mb-5">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/towel.png" alt="icon" width="35" />
                <h2>Testimonial</h2>
            </div>
        </div>
        <div class="row gy-4">
            <div class="testimonial-slider owl-carousel owl-theme">
            <?php
            $titlecat = single_cat_title('', false);

            $wpnew = array(
              'post_type' => 'testimonial',
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
                <div class="item">
                    <div class="google_review">
                        <div class="title_bx">
                            <div class="lhs">
                                <h5><?php echo the_title();?></h5>
                                <div class="date_t">
                                    <p>
                                       <?php echo the_field('date');?>
                                        <span> <?php echo the_field('rating');?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="rhs">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/google.png" alt="icon" />
                            </div>
                        </div>
                        <div class="testimonial_content">
                        <?php echo the_content();?>
                        </div>
                        <div class="read_more_btn">
                            <a href="#">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        <div class="testimoni_profile">
                            <span><?php echo the_field('name_letter');?></span>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial-section-end -->

<!-- Trusted-section-start -->
<section class="trusted_sec py-5">
    <div class="container">
        <div class="row">
            <div class="main_heading mb-3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/towel.png" alt="icon" width="35" />
                <h2>Trusted by Our Clients</h2>
            </div>
            <h5 class="text-center">
                Providing exceptional service to leading hotels and resorts
            </h5>
        </div>
        <div class="row pt-4">
            <div class="trusted-slider owl-carousel owl-theme">
                <?php
                if (have_rows('our_branding_section',12)) {
                    while (have_rows('our_branding_section',12)) {
                       the_row();
                   
                ?>
                <div class="item">
                    <div class="image_bx">
                        <a href="<?php echo the_sub_field('link');?>">
                        <img src="<?php echo the_sub_field('brand');?>" alt="" />
                        </a>
                       
                    </div>
                </div>
              <?php }
                }

              ?>
            </div>
        </div>
    </div>
</section>
<!-- Trusted-section-End -->

<?php
get_footer();
?>