<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products">

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<h2><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>
		
		<div class="row"> <!-- Begin custom product loop -->

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				$product = wc_get_product( $related_product->get_id() );
				$image_url = wp_get_attachment_image_url( $product->get_image_id(), 'medium' );
				$price = $product->get_price();
				$regular_price = $product->get_regular_price();
				$product_id = $product->get_id();
				?>

				<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
					<a href="<?php echo esc_url( get_permalink( $product_id ) ); ?>">
						<div class="custom-product-card">
							<div class="custom-product-img">
								<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title( $product_id ) ); ?>" />
							</div>

							<div class="product-info">
								<a href="<?php echo esc_url( get_permalink( $product_id ) ); ?>">
									<h5 class="product-title"><?php echo esc_html( get_the_title( $product_id ) ); ?></h5>
								</a>

								<div class="price_info">
									<!-- <?php if ( $regular_price ) : ?>
										<del class="product-price regular"><?php echo wc_price( $regular_price ); ?></del>
									<?php endif; ?> -->
									<div class="product-price"><?php echo wc_price( $price ); ?></div>
								</div>

								<div class="add-to-cart-btn">
									<?php if ( $product->is_type( 'variable' ) ) : ?>
										<a href="<?php echo esc_url( get_permalink( $product_id ) ); ?>" class="">
											<i class="fas fa-list"></i> Select Options
										</a>
									<?php else : ?>
										<?php
										echo apply_filters(
											'woocommerce_loop_add_to_cart_link',
											sprintf(
												'<a href="%s" data-quantity="1" class="add_to_cart_button ajax_add_to_cart" data-product_id="%s" data-product_sku="%s" aria-label="%s" rel="nofollow"><i class="fas fa-cart-plus"></i> %s</a>',
												esc_url( $product->add_to_cart_url() ),
												esc_attr( $product_id ),
												esc_attr( $product->get_sku() ),
												esc_attr( $product->add_to_cart_description() ),
												esc_html__( 'Buy Now', 'woocommerce' )
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

			<?php endforeach; ?>

		</div> <!-- End custom product loop -->

	</section>

	<?php
endif;

wp_reset_postdata();
