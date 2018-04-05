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
function addVariationProductToCart($product) {
    //@TODO:possible refactor to just get data from wc_get_product() using $var->price $var->id ????
    ?>
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
        //get product data using variation id to obtain price
        $list = array_combine($productChildrenArray, $productVariationsArray); ?>
        <div class="weight_dropdown">
            <label for="weight">Weight:</label>
            <select id="weight" name="weight" class="product_weight_dropdown">
                <option value="Select Your Weight">Weight</option>
                <?php foreach ($list as $key=>$value) : ?>
                    <?php $e = wc_get_product($key) ?>
                    <option value="<?=$key?>" data-name="<?=$productTitle?>" data-id="<?=$key?>" data-price="<?=$e->price?>"><?=$value?></option>
                <?php endforeach ?>
            </select>
        </div>
    <?php endif ?>
        <div class="qty_input">
            <label for="quantity">Qty:</label>
            <input type="number" id="quantity" class="product_qty">
        </div>

        <div class="product_total_visible_price"><!-- --></div>

        <button class="shop_add_var_to_cart">add to cart</button>
</div>
<?php }

function custom_product_basic_load() {
    add_meta_box( 'custom_product_basic_metabox' , __( 'Product Layout' ) , 'custom_product_basic_metabox' , 'product' , 'normal' , 'high' );
    add_action( 'save_post' , 'custom_product_basic_save_post' , 10 , 3 );

}
add_action( 'load-post.php' , 'custom_product_basic_load' );
add_action( 'load-post-new.php' , 'custom_product_basic_load' );

function custom_product_basic_metabox( $post ) {
//    $string = populate_template_file('/metabox/product/product_metabox',
//        [
//                'post' => $post
//        ]
//    );
//
//    return $string;
    ?>
    <input type="hidden" name="product_type" value="simple" />

    <section>
        <h2>Product Quick Description</h2>
        <?php native_wysiwig_editor('Product Quick Description here...', '_product_quick_description', false, true, $post->ID); ?>
    </section>
    <section>
        <h2>Product Overview</h2>
        <div class="row">
            <label>Product Overview Lifestyle Image</label>
            <?php
            $product_lifestyle_image_url = get_post_meta($post->ID, '_product_lifestyle_image_url', true); ?>
            <fieldset class="max">
                <input class="input_image" name="_product_lifestyle_image_url" type="hidden" value="<?=$product_lifestyle_image_url;?>" style="width:400px;" />
                <input class="input_button button" type="button" value="Upload Image" /><br/>
                <img src="<?=$product_lifestyle_image_url;?>" style="width:200px;" class="img_src" />
            </fieldset>
        </div>
        <div class="row">
            <label>Overview Text</label>
            <?php native_wysiwig_editor('Overview Text here...', '_product_overview_text', false, true, $post->ID); ?>
        </div>
    </section>

    <section>
        <h2>Product Selection</h2>
        <label>Product Selection Image</label>
        <?php
        $product_selection_image_url = get_post_meta($post->ID, '_product_selection_image_url', true); ?>
        <fieldset class="max">
            <input class="input_image" name="_product_selection_image_url" type="hidden" value="<?=$product_selection_image_url;?>" style="width:400px;" />
            <input class="input_button button" type="button" value="Upload Image" /><br/>
            <img src="<?=$product_selection_image_url;?>" style="width:200px;" class="img_src" />
        </fieldset>
    </section>
<?php
}

/**
 * Save WC Meta Post
 *
 * @param $post_id
 * @param $post_after
 * @return bool|void
 */
function custom_product_basic_save_post($post_id ,$post_after ) {

    if ( empty( $post_id ) or empty( $post_after ) ) {
        return;
    }

    if( empty( $post_after->post_type ) or $post_after->post_type != 'product' ) {
        return false;
    }

    if ( defined( 'DOING_AUTOSAVE' ) or is_int( wp_is_post_revision( $post_after ) ) or is_int( wp_is_post_autosave( $post_after ) ) ) {
        return;
    }

    if (
            isset($_POST['_product_lifestyle_image_url']) ||
            isset($_POST['_product_quick_description'] ) ||
            isset($_POST['_product_selection_image_url']) ||
            isset($_POST['_product_overview_text'])
    ) {
        update_post_meta($post_id, '_product_lifestyle_image_url', $_POST['_product_lifestyle_image_url']);
        update_post_meta($post_id, '_product_quick_description', $_POST['_product_quick_description']);
        update_post_meta($post_id, '_product_selection_image_url', $_POST['_product_selection_image_url']);
        update_post_meta($post_id, '_product_overview_text', $_POST['_product_overview_text']);
    }
}