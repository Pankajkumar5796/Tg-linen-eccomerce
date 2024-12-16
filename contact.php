<?php
//Template Name: Contact Page
get_header();
?>

<!-- Banner-section-start -->
<section class="banner_wrapper">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="banner_bx position-relative">
                <img src="<?php echo the_field('inner_banner') ?>" alt="inner-b" class="img-fluid">
                <div class="banner_content">
                    <h1 class="text-center"><?php echo the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner-section-end -->

<!-- Contact-section-start -->

<section class="contact_wrappers">
    <div class="container">
        <div class="row mb-0">
            <div class="text_overlap d-flex justify-content-center">
                <h2 class="text-center">Contact For Any Query</h2>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="bg-white rounded info_bx row py-5 gy-4 pt-0">
                <div class="col-lg-4 col-xl-4">
                    <div class="text-center mb-4 info_card h-100">
                        <div class="info_wrapper">
                            <i class="fas fa-map-marker-alt"></i>
                            <h4 class="">Address</h4>
                            <p class="mb-0 px-2">
                                <?php echo get_option('xx_ad1'); ?>
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="text-center mb-4 info_card h-100">
                        <div class="info_wrapper">
                            <i class="fas fa-phone-alt"></i>
                            <h4 class="">Mobile</h4>
                            <p class="mb-0"><a href="tel:<?php echo get_option('xx_ph1');?>"><?php echo get_option('xx_ph1');?></a></p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="text-center info_card h-100">
                        <div class="info_wrapper">
                            <i class="fas fa-envelope"></i>
                            <h4 class="">Email</h4>
                            <p class="mb-0"><a href="mailto:<?php echo get_option('xx_eml');?>"><?php echo get_option('xx_eml');?></a></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="rounded">
                    <iframe class="rounded w-100" style="height: 450px;"
                        src="<?php echo the_field('map_link');?>"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-lg-6">
                <h3 class="mb-2">Send us a message</h3>
                <div class="form_input_bx">
                <?php
                       $contact_form_shortcode = '[contact-form-7 id="6e663a3" title="Contact form 1"]';
                       echo do_shortcode($contact_form_shortcode);
                        ?>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Contact-section-end -->



<?php
get_footer();
?>