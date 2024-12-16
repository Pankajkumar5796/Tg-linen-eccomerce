<?php

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

<section class="contact_wrappers inne-Single_page">
    <div class="container">
        <div class="row mb-0">
            <div class="text_overlap d-flex justify-content-center pb-4">
                <h2 class="text-center"><?php echo the_field('title');?></h2>
            </div>
        </div>
        <div class="row justify-content-center">

            <?php echo the_content()?>

        </div>
        
    </div>
</section>

<!-- Contact-section-end -->



<?php
get_footer();
?>