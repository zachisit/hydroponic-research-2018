<?php
/**
 * Page Edit Meta Boxes
 * Custom Scripts Meta Box
 */

function add_page_scripts_metaboxes() {
    add_meta_box('page_scripts_meta_values', 'Custom Page Scripts', 'page_scripts_meta_values', 'page', 'normal', 'default');
}
add_action( 'add_meta_boxes', 'add_page_scripts_metaboxes' );

function page_scripts_meta_values($post) {
    wp_nonce_field( basename( __FILE__ ), 'page_scripts_nonce' );

    $string = populate_template_file( '/metabox/page_scripts_metabox',
        get_post_meta ($post->ID)
    );

    echo $string;
}

function page_scripts_save($post) {
    //verify this came from the our screen and with proper authorization
    if ( !wp_verify_nonce( $_POST['page_scripts_nonce'], plugin_basename(__FILE__) )) {
        return $post->ID;
    }

    //is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;

    $page_script_meta['_header_scripts'] = $_POST['_header_scripts'];
    $page_script_meta['_body_scripts'] = $_POST['_body_scripts'];

    //add values of $testimonial_block_meta as custom fields
    foreach ($page_script_meta as $key => $value) {
        if( $post->post_type == 'revision' ) return;
        $value = implode(',', (array)$value);
        if(get_post_meta($post->ID, $key, FALSE)) {
            update_post_meta($post->ID, $key, $value);
        } else {
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key);
    }
}
add_action( 'save_post', 'page_scripts_save', 1, 2 );