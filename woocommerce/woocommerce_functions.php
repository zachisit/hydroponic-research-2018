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