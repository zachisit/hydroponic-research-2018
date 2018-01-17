<?php
/**
 * User Profile
 * frontend view of profile with layout
 *
 * @package: hydroponic-research
 */

function user_profile_frontend($atts){
    $current_user = wp_get_current_user();

//    var_dump($current_user);
    $userdata = get_user_meta( 1 );
//    ?><!--<pre>--><?php //var_dump( $userdata ); ?><!--</pre>--><?php

    $user_profile_data = [
        'first_name' => $userdata['last_name'],
        'last_name' => $userdata['last_name'],
//        'full_name' => $userdata['first_name'] . $userdata['last_name'],
        'bio' => $userdata['description'],
        'last_updated' => $userdata['last_update']
    ];

//    var_dump($user_profile_data);

    $string = populate_template_file('/shortcode/user_profile_frontend',
        [
            'user_data' => $user_profile_data
        ]
    );

    return $string;
}
add_shortcode('user_profile_frontend_view', 'user_profile_frontend');