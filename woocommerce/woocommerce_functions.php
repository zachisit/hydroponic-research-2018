<?php
/**
 * WooCommerce specific
 *
 * @package hydroponic-research
 */

/*
* Declare WooCommerce Support
 */
function hr_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'hr_woocommerce_support' );

/*
* Hide Breadcrumbs
*/
function hr_woocommerce_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
add_action( 'init', 'hr_woocommerce_remove_wc_breadcrumbs' );

/*
 * Remove sidebar from single product pages
 */
function hr_woocommerce_remove_sidebar_product_pages() {
    if ( is_product() ) {
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    }
}

add_action( 'wp', 'hr_woocommerce_remove_sidebar_product_pages' );

/**
 * Remove auto-related products showing on product page
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


function hr_woocommerce_product_gallery() {
    //add_theme_support( 'wc-product-gallery-zoom' );
    //add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'hr_woocommerce_product_gallery' );



/**
 * Remove tabs
 *
 * @param $tabs
 * @return mixed
 */
function hr_woocommerce_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}

add_filter( 'woocommerce_product_tabs', 'hr_woocommerce_remove_product_tabs', 98 );

/**
 * Remove auto-related products showing on product page
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/**
 * Show Cart Banner
 *
 * only show if cart is active
 */
function checkCartStatusCartBanner() {
    if (sizeof(WC()->cart->get_cart()) != 0) :?>
        <script type="text/javascript">
            onload = function() {
                document.getElementById('cart_banner').style.display = "block";
            }
        </script>
       <?php endif;
}
add_action('wp_head', 'checkCartStatusCartBanner');

/**
 * Product Add To Cart
 *
 * @param $product
 */
//@@TODO:move this into template
function addVariationProductToCart($product) { ?>
<div class="product_cart_options">
    <?php
    //product's total variation data
    $productChildren = $product->get_children();

    if ($productChildren) :
        //product's variation IDs
        $productVariations = $product->get_variation_attributes();

        $productChildrenArray = [];
        //variation id number
        foreach ($productChildren as $value) {
            array_push($productChildrenArray, $value);
        }

        //variation name
        $productVariationsArray = [];
        foreach ($productVariations as $i => $values) {
            foreach ($values as $key => $value) {
                array_push($productVariationsArray, $value);
            }
        }

        //merge both arrays into one with key=>value we can use for option select
        $list = array_combine($productChildrenArray, $productVariationsArray); ?>
        <div class="weight_dropdown">
                            <label for="weight">Weight:</label>
                            <select id="weight" name="weight">
                                <option value="Select Your Weight">Weight</option>
                                <?php foreach ($list as $key=>$value) : ?>
                                    <option value="<?=$key?>" data-name="<?=$productTitle?>" data-id="<?=$key?>"><?=$value?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
    <?php endif ?>
<div class="qty_input">
    <label for="quantity">Qty:</label>
    <input type="number" id="quantity">
</div>
<button class="shop_add_var_to_cart">add to cart</button>
</div>
<?php }