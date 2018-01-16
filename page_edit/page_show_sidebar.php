<?php
/**
 * Page Edit Meta Boxes
 * Show or Hide Sidebar Meta Box
 */

function add_page_show_sidebar_metaboxes() {
    add_meta_box('page_show_sidebar_meta_values', 'Page Sidebar', 'page_show_sidebar_meta_values', 'page', 'side', 'default');
}
add_action( 'add_meta_boxes', 'add_page_show_sidebar_metaboxes' );

function page_show_sidebar_meta_values($post) {
    global $post;

    wp_nonce_field( basename( __FILE__ ), 'page_show_sidebar_nonce' );

    $string = populate_template_file( '/metabox/page_show_sidebar_metabox',
        get_post_meta ($post->ID)
    );

    echo $string;
}

function page_show_sidebar_save($post_id, $post) {
    //verify this came from the our screen and with proper authorization
    /*if ( !wp_verify_nonce( $_POST['page_show_sidebar_nonce'], plugin_basename(__FILE__) )) {
        return $post_id;
    }

    //is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post_id ))
        return $post_id;
    //@TODO:figur eout why thi is causing save to fail
    */

    $sidebar_checkbox_value = ( isset( $_POST['_show_sidebar'] ) && '1' === $_POST['_show_sidebar'] ) ? 1 : 0; //input var okay.
    update_post_meta( $post_id, '_show_sidebar', esc_attr( $sidebar_checkbox_value ) );
}

add_action( 'save_post', 'page_show_sidebar_save', 1, 2 );