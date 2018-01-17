<?php
/**
 * WooCommerce Product Category
 *
 * outputs products based on category piped in
 *
 * @package hydroponic-research
 */

function hr_product_category_list($atts) {

    extract(shortcode_atts(
        [
            'category' => $category
        ], $atts
    ));

    if ($category) {
        $args = [
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order' => 'DSC',
            'tax_query' => [
                'relation' => 'AND',
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $category
                ],
            ]
        ];
    } else {
        $args = [
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order' => 'DSC'
        ];
    }

    $query = new WP_Query( $args );

    $string = populate_template_file('/shortcode/product_by_cat',
        [
            'posts' => $query->posts
        ]
    );

    return $string;
}

add_shortcode( 'product_list', 'hr_product_category_list' );