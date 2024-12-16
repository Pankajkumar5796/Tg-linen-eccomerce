<?php
//Template Name: Custom 404 Page
get_header();
?>


<!-- Banner-section-start -->
<section class="banner_wrapper">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="banner_bx position-relative">
                <img src="<?php echo the_field('inner_banner',102); ?>" alt="inner-b" class="img-fluid">
                <div class="banner_content">
                    <h1 class="text-center">Page Not Found</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner-section-end -->






<?php
get_footer();
?>