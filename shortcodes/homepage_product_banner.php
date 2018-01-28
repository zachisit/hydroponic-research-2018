<?php
/**
 * Homepage Product Banner
 */

function hr_homepage_product_banner() {

    $string = populate_template_file('/shortcode/homepage_product_banner',
        [
            //nothing here
        ]
    );

    return $string;
}
add_shortcode( 'homepage_product_banner', 'hr_homepage_product_banner' );
