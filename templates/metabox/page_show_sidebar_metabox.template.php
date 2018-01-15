<?php
/* Template for Page Show Sidebar
 * @var string $__show_sidebar
 */
$meta = get_post_meta( get_the_ID() );
$sidebar_checkbox_value = ( isset( $meta['_show_sidebar'][0] ) &&  '1' === $meta['_show_sidebar'][0] ) ? 1 : 1;
?>

<label for="_show_sidebar">Show Sidebar?</label>
    <input type="checkbox" name="_show_sidebar" value="1" <?php checked( $sidebar_checkbox_value, 1 ); ?> />

<p><?=($sidebar_checkbox_value == 1) ? ' Sidebar showing' : ' Sidebar <strong>is not</strong> showing';?></p>