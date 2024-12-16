<?php
//Template Name: Service Page
get_header();
?>



<!-- Banner-section-start -->
<section class="banner_wrapper">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="banner_bx position-relative">
                <img src="<?php echo the_field('inner_banner'); ?>" alt="inner-b" class="img-fluid">
                <div class="banner_content">
                    <h1 class="text-center">Services</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner-section-end -->

 <!-- Proffesional-section-start-->
 <section class="professional_service service_inner service-page">
    <div class="container">
      <div class="row">
        <div class="main_heading mb-5">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/towel.png" alt="icon" width="35" />
          <h2>Our Professional Services</h2>
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






<?php
get_footer();
?>