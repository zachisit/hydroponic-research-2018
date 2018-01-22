<?php
/**
 * Sales Associate Table View
 *
 * what sales assoc sees when logging in
 */

function hr_sales_assoc_table($atts) {

    $current_user = wp_get_current_user();
    $userdata = get_user_meta( 1 );
    $user_profile_data = [
        'first_name' => $userdata['last_name'],
        'last_name' => $userdata['last_name'],
//        'full_name' => $userdata['first_name'] . $userdata['last_name'],
        'bio' => $userdata['description'],
        'last_updated' => $userdata['last_update']
    ];

    $string = populate_template_file('/shortcode/sales_assoc_table',
        [
            'user_data' => $user_profile_data
        ]
    );

    return $string;
}
add_shortcode( 'sales_assoc_table', 'hr_sales_assoc_table' );