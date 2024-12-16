<?php
//Template Name: About Page
get_header();
?>



<!-- Banner-section-start -->
<section class="banner_wrapper">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="banner_bx position-relative">
                <img src="<?php echo the_field('inner_banner'); ?>" alt="inner-b" class="img-fluid">
                <div class="banner_content">
                    <h1 class="text-center">About</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner-section-end -->

<!-- About-section-start -->
<section class="about_wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-6">
                <div class="about_us_image position-relative" data-aos="fade-left" data-aos-duration="2000">
                    <img src="<?php echo the_field('about_section_image'); ?>" alt="about"
                        class="img-fluid img_1 position-relative">
                    <img src="<?php echo the_field('about_overlap_image'); ?>" alt="about" class="img-fluid img_2">
                </div>
            </div>
            <div class="col-lg-6 col-xl-6">
                <div class="about-us-content" data-aos="fade-right" data-aos-duration="2000">
                    <?php echo the_content(); ?>
                    <ul class="feature_list">
                        <?php
                        if (have_rows('pointer_repeater')) {
                            while (have_rows('pointer_repeater')) {
                                the_row();
                        ?>
                                <li><i class="fas fa-circle"></i><?php echo the_sub_field('content'); ?></li>
                        <?php }
                        }
                        ?>
                    </ul>

                    <div class="enquiry_btn">
                        <a href="<?php echo get_page_link(138);?>">Enquiry Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About-section-end -->

<section class="faq_wrapper py-5">
    <div class="container">
        <div class="row pb-4">
            <div class="m-title">

                <h3 class="text-center">Frequently Asked <span>Questions</span></h3>
            </div>
        </div>
        <div class="row">
        <div class="accordion" id="accordionExample">
                <?php
                $i = 1;
                if (have_rows('faq')) :
                    while (have_rows('faq')) :
                        the_row();
                ?>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                                <button class="accordion-button <?php echo ($i == 1) ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="<?php echo ($i == 1) ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $i; ?>">
                                    <?php echo the_sub_field('title'); ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php echo ($i == 1) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <h6><?php echo the_sub_field('content'); ?></h6>
                                </div>
                            </div>
                        </div>
                <?php
                        $i++;
                    endwhile;
                endif;
                ?>

            </div>
        </div>
    </div>
</section>






<?php
get_footer();
?>