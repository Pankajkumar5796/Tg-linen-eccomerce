<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<!-- Banner-section-start -->
<section class="banner_wrapper shop_page">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="banner_bx position-relative">
                <img src="<?php echo esc_url(get_field('inner_banner', 102)); ?>" alt="inner-b" class="img-fluid">
                <div class="banner_content">
                    <h1 class="text-center">Free delivery in gold cost</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner-section-end -->

<section class="pt-5 product-section">
    <div class="container text-center">
        <?php
        /**
         * Hook: woocommerce_before_main_content.
         *
         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
         * @hooked woocommerce_breadcrumb - 20
         * @hooked WC_Structured_Data::generate_website_data() - 30
         */
        do_action('woocommerce_before_main_content');

        /**
         * Hook: woocommerce_shop_loop_header.
         *
         * @hooked woocommerce_product_taxonomy_archive_header - 10
         */
        do_action('woocommerce_shop_loop_header');

        if (woocommerce_product_loop()) {

            /**
             * Hook: woocommerce_before_shop_loop.
             *
             * @hooked woocommerce_output_all_notices - 10
             * @hooked woocommerce_result_count - 20
             * @hooked woocommerce_catalog_ordering - 30
             */
            do_action('woocommerce_before_shop_loop');

            woocommerce_product_loop_start();

            if (wc_get_loop_prop('total')) {
                $count = 0; // Counter to track how many products have been added to the row
                echo '<div class="row">'; // Start the first row

                while (have_posts()) {
                    the_post();
                    $product_id = get_the_ID(); // Get the product ID
                    $product = wc_get_product($product_id); // Get the product object
                    $image_url = wp_get_attachment_image_url(get_post_thumbnail_id($product_id), 'large');
                    $price = $product->get_price();
                    $regular_price = $product->get_regular_price();
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <a href="<?php echo esc_url(get_permalink($product_id)); ?>">
                            <div class="custom-product-card h-100">
                                <div class="custom-product-img">
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title($product_id)); ?>" />
                                </div>
                                <div class="product-info">
                                    <a href="<?php echo esc_url(get_permalink($product_id)); ?>">
                                        <h5 class="product-title"><?php echo esc_html(get_the_title($product_id)); ?></h5>
                                    </a>
                                    <div class="price_info">
                                        <!-- <?php if ($regular_price) : ?>
                                            <del class="product-price regular"><?php echo wc_price($regular_price); ?></del>
                                        <?php endif; ?> -->
                                        <div class="product-price"><?php echo wc_price($price); ?></div>
                                    </div>
                                    <div class="add-to-cart-btn">
                                        <?php if ($product->is_type('variable')) : ?>
                                            <a href="<?php echo esc_url(get_permalink($product_id)); ?>" class="">
                                                <i class="fas fa-list"></i> Select Options
                                            </a>
                                        <?php else : ?>
                                            <?php
                                            echo apply_filters(
                                                'woocommerce_loop_add_to_cart_link',
                                                sprintf(
                                                    '<a href="%s" data-quantity="1" class="add_to_cart_button ajax_add_to_cart" data-product_id="%s" data-product_sku="%s" aria-label="%s" rel="nofollow"><i class="fas fa-cart-plus"></i> %s</a>',
                                                    esc_url($product->add_to_cart_url()),
                                                    esc_attr($product_id),
                                                    esc_attr($product->get_sku()),
                                                    esc_attr($product->add_to_cart_description()),
                                                    esc_html__('Buy Now', 'woocommerce')
                                                ),
                                                $product
                                            );
                                            ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    $count++; // Increment the counter
                    // Check if we've added three columns and need to close the row
                    if ($count % 4 == 0) { // Change to 3 for three-column layout
                        echo '</div><div class="row pb-4">'; // Close the current row and open a new one
                    }
                }

                echo '</div>'; // Close the last row
            }

            woocommerce_product_loop_end();

            /**
             * Hook: woocommerce_after_shop_loop.
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action('woocommerce_after_shop_loop');
        } else {
            /**
             * Hook: woocommerce_no_products_found.
             *
             * @hooked wc_no_products_found - 10
             */
            do_action('woocommerce_no_products_found');
        }

        /**
         * Hook: woocommerce_after_main_content.
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action('woocommerce_after_main_content');

        /**
         * Hook: woocommerce_sidebar.
         *
         * @hooked woocommerce_get_sidebar - 10
         */
        do_action('woocommerce_sidebar');
        ?>
    </div> <!-- Closing container div -->
</section> <!-- Closing section -->

<?php get_footer('shop'); ?>
