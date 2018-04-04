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

function custom_product_basic_metabox( $post ) {?>

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
            $template_zzz_image_one_url = get_post_meta($postID, '_single_blog_post_template_zzz_image_one', true);
            ?>
            <fieldset class="max">
            <input class="input_image" name="_single_blog_post_template_zzz_image_one" type="hidden" value="<?=$template_zzz_image_one_url;?>" style="width:400px;" />
            <input class="input_button button" type="button" value="Upload Image" /><br/>
            <img src="<?=$template_zzz_image_one_url;?>" style="width:200px;" class="img_src" />
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
        <fieldset class="max">
            <input class="input_image" name="_single_blog_post_template_zzz_image_one" type="hidden" value="<?=$template_zzz_image_one_url;?>" style="width:400px;" />
            <input class="input_button button" type="button" value="Upload Image" /><br/>
            <img src="<?=$template_zzz_image_one_url;?>" style="width:200px;" class="img_src" />
        </fieldset>
    </section>
<?php }

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

    //@TODO:change out overview items to include _overview_XXX
    //@TODO swap this massive isset with foreach loop through meta values
    //TODO:make sure all of these are actually active since i have rmeoved a lot of fields
    if ( isset( $_POST['_product_video']) || isset($_POST['_lifestyle_photo_one'] ) || isset($_POST['_feature_one_headline']) || isset($_POST['_feature_one_subtitle']) || isset($_POST['_lifestyle_photo_two']) || isset($_POST['_lifestyle_photo_two_text_headline']) || (isset($_POST['_lifestyle_photo_two_text_subtitle'])) || isset($_POST['_lifestyle_photo_three']) || isset($_POST['_lifestyle_photo_three_text_headline']) || isset($_POST['_lifestyle_photo_three_text_subtitle']) || isset($_POST['_feature_four_headline']) || isset($_POST['_feature_four_subtitle']) || isset($_POST['_lifestyle_photo_four']) || isset($_POST['_lifestyle_photo_five']) || isset($_POST['_lifestyle_photo_five_text']) || isset($_POST['_intro_product_name']) || isset($_POST['_intro_product_description']) || isset($_POST['_intro_product_photo']) || isset($_POST['_specs_product_video']) || isset($_POST['_specs_in_box_video']) || isset($_POST['_support_manual']) || isset($_POST['_support_troubleshooting']) || isset($_POST['_support_setup'])|| isset($_POST['_product_faq_category']) || isset($_POST['_product_specs_audio_specs']) || isset($_POST['_c_a_b_product_one']) || isset($_POST['_c_a_b_product_two']) || isset($_POST['_c_a_b_product_three']) ||
        (isset( $_POST['submit_image_selector'] ) && isset( $_POST['image_attachment_id'] ))
    ) {
        update_post_meta( $post_id, '_product_video', $_POST['_product_video'] );
        update_post_meta( $post_id, '_lifestyle_photo_one', $_POST['_lifestyle_photo_one'] );
        update_post_meta( $post_id, '_feature_one_headline', $_POST['_feature_one_headline'] );
        update_post_meta( $post_id, '_feature_one_subtitle', $_POST['_feature_one_subtitle'] );
        update_post_meta( $post_id, '_lifestyle_photo_two', $_POST['_lifestyle_photo_two'] );
        update_post_meta( $post_id, '_lifestyle_photo_two_text_headline', $_POST['_lifestyle_photo_two_text_headline']);
        update_post_meta( $post_id, '_lifestyle_photo_two_text_subtitle', $_POST['_lifestyle_photo_two_text_subtitle']);
        update_post_meta( $post_id, '_lifestyle_photo_three', $_POST['_lifestyle_photo_three']);
        update_post_meta( $post_id, '_lifestyle_photo_three_text_headline', $_POST['_lifestyle_photo_three_text_headline']);
        update_post_meta( $post_id, '_lifestyle_photo_three_text_subtitle', $_POST['_lifestyle_photo_three_text_subtitle']);
        update_post_meta( $post_id, '_feature_four_headline', $_POST['_feature_four_headline']);
        update_post_meta( $post_id, '_feature_four_subtitle', $_POST['_feature_four_subtitle']);
        update_post_meta( $post_id, '_lifestyle_photo_four', $_POST['_lifestyle_photo_four']);
        update_post_meta( $post_id, '_lifestyle_photo_five', $_POST['_lifestyle_photo_five']);
        update_post_meta( $post_id, '_lifestyle_photo_five_text', $_POST['_lifestyle_photo_five_text']);
        update_post_meta( $post_id, '_intro_product_name', $_POST['_intro_product_name']);
        update_post_meta( $post_id, '_intro_product_description', $_POST['_intro_product_description']);
        update_post_meta( $post_id, '_intro_product_photo', $_POST['_intro_product_photo']);
        update_post_meta( $post_id, '_specs_product_video', $_POST['_specs_product_video']);
        update_post_meta( $post_id, '_specs_in_box_video', $_POST['_specs_in_box_video']);
        update_post_meta( $post_id, '_support_manual', $_POST['_support_manual']);
        update_post_meta( $post_id, '_support_setup', $_POST['_support_setup']);
        update_post_meta( $post_id, '_support_troubleshooting', $_POST['_support_troubleshooting']);
        update_post_meta( $post_id, '_product_faq_category', $_POST['_product_faq_category']);
        update_post_meta( $post_id, '_product_specs_audio_specs', $_POST['_product_specs_audio_specs']);
        update_post_meta( $post_id, '_c_a_b_product_one', $_POST['_c_a_b_product_one']);
        update_post_meta( $post_id, '_c_a_b_product_two', $_POST['_c_a_b_product_two']);
        update_post_meta( $post_id, '_c_a_b_product_three', $_POST['_c_a_b_product_three']);

        //test dropdown media
        update_post_meta( $post_id, '_intro_product_photo_two', $_POST['_intro_product_photo_two']);
    }
}