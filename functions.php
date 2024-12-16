<?php

// Register Menus

function register_my_menus() {

register_nav_menus(

array(

'Header Menu' => __( 'Header' ),
	
	'Secondery Menu' => __( 'Secondary Menu' ),

'Footer Menu' => __( 'Footer' )

)

);

}

if (function_exists('register_nav_menus'))

add_action( 'init', 'register_my_menus' );
class My_Custom_Nav_Walker extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "\n<ul class=\"dropdown arrow-top\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $item_html = '';
        parent::start_el($item_html, $item, $depth, $args);

        // Adding custom classes to <a> elements
        $a_classes = 'nav-link btn-5 position-relative';
        $item_html = str_replace('<a', '<a class="' . $a_classes . '"', $item_html);

        if ($item->is_dropdown && $depth === 0) {
            $item_html = str_replace('<a', '<a class="dropdown-toggle nav-link" data-toggle="dropdown1"', $item_html);
        }

        $output .= $item_html;
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        if ($element->current) {
            $element->classes[] = 'active';
        }

        $element->is_dropdown = !empty($children_elements[$element->ID]);

        if ($element->is_dropdown) {
            if ($depth === 0) {
                $element->classes[] = 'dropdown';
            } elseif ($depth === 1) {
                $element->classes[] = 'dropdown-submenu';
            }
        }

        // Adding custom classes to <li> elements
        $li_classes = 'nav-item';
        $element->classes[] = $li_classes;

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}




add_theme_support( 'post-formats', array(

'aside',

'image',

'video',

'quote',

'link',

'gallery',

'status',

'audio',

'chat',

) );



//Support Title Tag

add_theme_support( 'title-tag' );

add_theme_support('custom-header');

//Enqueue Elite Scripts Tag

function elite_enqueue_scripts(){

    

wp_enqueue_style( 'Custom', get_template_directory_uri().'/css/style.css', array(), '1.0' );

//Theme Stylesheet

wp_enqueue_style('plugins-css', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0');
wp_enqueue_style('search-css', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0.0');


wp_enqueue_style( 'style', get_stylesheet_uri() );


//WP Latest Jquery

wp_enqueue_script( 'Owlcarousel', get_template_directory_uri() . '/assets/js/index.js', array(), '1.0.0', true );



}

add_action('wp_enqueue_scripts', 'elite_enqueue_scripts');


// Webp-image
function allow_webp_uploads($mimes) {
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter('upload_mimes', 'allow_webp_uploads');



// Featured Image

add_theme_support( 'post-thumbnails' ); 



//Custom Logo 

add_action( 'customize_register', 'themename_customize_register' );

function themename_customize_register($wp_customize) {



$wp_customize->add_section( 'ignite_custom_logo', array(

'title'          => 'Header Logo',

'description'    => 'Display a custom logo?',

'priority'       => 25,

) );



$wp_customize->add_setting( 'custom_logo', array(

'default'        => '',

) );



$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_logo', array(

'label'   => 'Custom logo',

'section' => 'ignite_custom_logo',

'settings'   => 'custom_logo',

) ) );

}





// Custom Field

$functions_path = TEMPLATEPATH . '/functions/';

require_once ($functions_path . 'theme-options.php');

require_once ($functions_path . 'custom_functions.php');

//require_once ($functions_path . 'image_resizer.php');







// Testimonial

function fn_review() {

$args = array(

'label' => 'Testimonial',

'public' => true,

'supports' => array(

'title',

'editor',

'thumbnail',)

);

register_post_type( 'testimonial', $args );

}

add_action( 'init', 'fn_review' );



// Our Product

function fn_produc() {

    $args = array(
    
    'label' => 'Product',
    
    'public' => true,
    
    'supports' => array(
    
    'title',
    
    'editor',
    
    'thumbnail',)
    
    );
    
    register_post_type( 'produc', $args );
    
    }
    
    add_action( 'init', 'fn_produc' );


// Service

function fn_service() {

$args = array(

'label' => 'Service',

'public' => true,

'show_in_rest' => true, 

'supports' => array(

'title',

'editor',

'thumbnail',)

);

register_post_type( 'service', $args );

}

add_action( 'init', 'fn_service' );





// Custom callback function for the category meta box
function custom_category_image_meta_box($post, $box) {
    $taxonomy = $box['args']['taxonomy']; // Get the taxonomy
    $terms = get_terms($taxonomy); // Get all terms for the taxonomy

    $current_image = get_term_meta($post->ID, '_category_image', true); // Get the current term image URL

    // Display the image input field
    echo '<label for="category_image">Category Image URL:</label>';
    echo '<input type="text" id="category_image" name="category_image" value="' . esc_attr($current_image) . '" style="width: 100%;" />';

    // Display the current category image if available
    if ($current_image) {
        echo '<div style="margin-top: 10px;"><img src="' . esc_url($current_image) . '" alt="Category Image" style="max-width: 100%; height: auto;" /></div>';
    }

    // Loop through terms to display them
    foreach ($terms as $term) {
        $checked = has_term($term->term_id, $taxonomy, $post->ID) ? 'checked' : '';
        echo '<label style="display: block; margin-top: 5px;"><input type="checkbox" name="tax_input[' . $taxonomy . '][]" value="' . esc_attr($term->slug) . '" ' . $checked . '> ' . esc_html($term->name) . '</label>';
    }
}

// Save category image when the post is saved or updated
function save_category_image($post_id) {
    if (isset($_POST['category_image'])) {
        update_term_meta($post_id, '_category_image', sanitize_text_field($_POST['category_image']));
    }
}

add_action('save_post', 'save_category_image');



// Modify query to handle custom post types
function custom_parse_request_tricksy($query)
{
    if (! $query->is_main_query()) {
        return;
    }
    if (2 != count($query->query) || ! isset($query->query['page'])) {
        return;
    }
    if (! empty($query->query['name'])) {
        $query->set('post_type', array('service', 'post', 'area', 'hardwood',  'allentown', 'page'));
    }
}
add_action('pre_get_posts', 'custom_parse_request_tricksy');



// Remove custom post type slugs from URLs
function custom_remove_cpt_slug($post_link, $post, $leavename)
{
    if ('publish' != $post->post_status) {
        return $post_link;
    }

    // List of custom post types
    $custom_post_types = array('service'); // Add other custom post types here

    // Remove post type slug for each custom post type
    if (in_array($post->post_type, $custom_post_types)) {
        $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);
    }

    return $post_link;
}
add_filter('post_type_link', 'custom_remove_cpt_slug', 10, 3);

// Flush rewrite rules on theme activation
function custom_flush_rewrite_rules()
{
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}
add_action('init', 'custom_flush_rewrite_rules');


// Woocommerce-theme-support
add_action( 'after_setup_theme', 'setup_woocommerce_support' );

 function setup_woocommerce_support()
{
  add_theme_support('woocommerce');
}

// Remove-breadcumb
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20); 

// Remove-title
remove_action('woocommerce_shop_loop_header','woocommerce_product_taxonomy_archive_header', 10);  


// Remove-sidebar
remove_action('woocommerce_sidebar','woocommerce_get_sidebar', 10);  


// Ajx enable

function custom_enqueue_woocommerce_scripts() {
    if (function_exists('is_product') && is_product()) {
        wp_enqueue_script('wc-add-to-cart');
    }
}
add_action('wp_enqueue_scripts', 'custom_enqueue_woocommerce_scripts');


add_filter('woocommerce_add_to_cart_fragments', 'custom_update_cart_fragments');
function custom_update_cart_fragments($fragments) {
    ob_start();
    ?>
    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    <?php
    $fragments['.cart-count'] = ob_get_clean();
    return $fragments;
}


// Change the number of related products displayed
function custom_related_products_args( $args ) {
    $args['posts_per_page'] = 3; // Number of related products
    $args['columns'] = 3; // Number of columns (optional)
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'custom_related_products_args' );

// Show Pagination after 12 product
function custom_woocommerce_products_per_page( $cols ) {
    return 12; // Set the number of products per page to 12
}
add_filter( 'loop_shop_per_page', 'custom_woocommerce_products_per_page', 20 );



// Disable payment method buttons on the cart and checkout pages


