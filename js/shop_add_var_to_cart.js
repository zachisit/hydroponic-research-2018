/**
 * File shop_add_var_to_cart.js
 *
 * allow variations to be added to cart outside
 * woocommerce single product view
 *
 * @depenency jquery
 * @version 1.0.0
 * @package hydroponic-research
 *
 */
jQuery(document).ready(function($) {
    //the button link that shows dynamically under the text
    var $addToCartButton = $('#shop_add_var_to_cart');

    $addToCartButton.click(function( ) {
        $.ajax( {
            url: '?add-to-cart=70&variation_id=114',
            data:'message',
            type:'POST',
            success: function(resp) {
                window.alert('success')
            },
            error: function(e) {
                window.alert(e);
            }
        })
    })
});