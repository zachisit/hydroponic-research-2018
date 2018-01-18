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