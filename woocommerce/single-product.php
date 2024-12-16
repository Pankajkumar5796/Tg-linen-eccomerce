<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header('shop'); ?>
<!-- Banner-section-start -->
<section class="banner_wrapper">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="banner_bx position-relative">
				<img src="<?php echo the_field('inner_banner', 157) ?>" alt="inner-b" class="img-fluid">
				<div class="banner_content">
					<h1 class="text-center"><?php echo the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Banner-section-end -->
<section class="pt-5 productdetails-section">
	<div class="container">
		<div class="row">

			<?php
			/**
			 * woocommerce_before_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action('woocommerce_before_main_content');
			?>

			<?php while (have_posts()) : ?>
				<?php the_post(); ?>
				<div class="row pb-3">
					<div class="col-lg-6 mb-4">
						<div class="productdetails-carousel owl-carousel owl-theme">
							<!-- WooCommerce Gallery Images Loop -->
							<?php
							global $product;
							$main_image_id = $product->get_image_id(); // Get the main product image ID
							$attachment_ids = $product->get_gallery_image_ids(); // Get gallery image IDs

							if ($attachment_ids && $main_image_id) {
								// Display the main product image
							?>
								<div class="item">
									<div class="productdetails-img" style="position: relative;">
										<a href="<?php echo esc_url(wp_get_attachment_url($main_image_id)); ?>" data-fancybox="gallery" data-caption="">
											<img src="<?php echo esc_url(wp_get_attachment_image_url($main_image_id, 'large')); ?>" alt="<?php echo esc_attr(get_the_title($main_image_id)); ?>">
											<!-- Icon for opening the image -->
											<i class="fas fa-expand-alt open-icon"></i>
										</a>
									</div>
								</div>
								<?php

								// Loop through gallery images, excluding the main product image
								foreach ($attachment_ids as $attachment_id) {
									if ($attachment_id != $main_image_id) { // Exclude main image from gallery
								?>
										<div class="item">
											<div class="productdetails-img" style="position: relative;">
												<a href="<?php echo esc_url(wp_get_attachment_url($attachment_id)); ?>" data-fancybox="gallery" data-caption="">
													<img src="<?php echo esc_url(wp_get_attachment_image_url($attachment_id, 'large')); ?>" alt="<?php echo esc_attr(get_the_title($attachment_id)); ?>">
													<!-- Icon for opening the image -->
													<i class="fas fa-expand-alt open-icon"></i>
												</a>
											</div>
										</div>
								<?php
									}
								}
							} else {
								// Fallback if no images are available
								?>
								<div class="item">
									<div class="productdetails-img" style="position: relative;">
										<a href="<?php echo wc_placeholder_img_src(); ?>" data-fancybox="gallery" data-caption="Placeholder">
											<img src="<?php echo wc_placeholder_img_src('large'); ?>" alt="Placeholder">
											<!-- Icon for opening the image -->
											<i class="fas fa-expand-alt open-icon"></i>
										</a>
									</div>
								</div>
							<?php
							}
							?>
						</div>

					</div>


					<div class="col-lg-6">
						<!-- Product Summary -->
						<h1><?php the_title(); ?></h1>
						<div class="price">
							<?php woocommerce_template_single_price(); ?>
						</div>
						<div class="short-description">
							<?php woocommerce_template_single_excerpt(); ?>
						</div>
						<div class="add-to-cart">
							<?php if ($product->is_type('variable')) : ?>
								<!-- Show variable product options directly -->
								<form class="variations_form cart" action="<?php echo esc_url($product->get_permalink()); ?>" method="post" enctype="multipart/form-data" data-product_id="<?php echo absint($product->get_id()); ?>" data-product_variations="<?php echo htmlspecialchars(wp_json_encode($product->get_available_variations())); ?>">
									<?php woocommerce_variable_add_to_cart(); ?>
								</form>
							<?php else : ?>
								<!-- For simple products, show quantity input and AJAX add-to-cart button -->
								<form class="cart" action="<?php echo esc_url($product->add_to_cart_url()); ?>" method="post" enctype="multipart/form-data">
									<?php
									// Display quantity input for simple products
									woocommerce_quantity_input(array(
										'min_value'   => apply_filters('woocommerce_quantity_input_min', 1, $product),
										'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
										'input_value' => isset($_POST['quantity']) ? wc_stock_amount($_POST['quantity']) : 1,
									));
									?>
									<button type="submit" class="add_to_cart_button ajax_add_to_cart button alt"
										data-product_id="<?php echo esc_attr($product->get_id()); ?>"
										data-product_sku="<?php echo esc_attr($product->get_sku()); ?>"
										aria-label="<?php echo esc_attr($product->add_to_cart_description()); ?>"
										rel="nofollow">
										<i class="fas fa-cart-plus"></i> <?php echo esc_html($product->single_add_to_cart_text()); ?>
									</button>
								</form>
							<?php endif; ?>
						</div>
					</div>

				</div>

				<!-- Related Products -->
				<div class="related-products">
					<?php woocommerce_output_related_products(); ?>
				</div>
			<?php endwhile; // end of the loop. 
			?>

			<?php
			/**
			 * woocommerce_after_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action('woocommerce_after_main_content');
			?>

			<?php
			/**
			 * woocommerce_sidebar hook.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action('woocommerce_sidebar');
			?>
		</div>
	</div>
</section>
<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
