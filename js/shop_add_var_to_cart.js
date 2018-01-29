/**
 * File shop_add_var_to_cart.js
 *
 * allow variations to be added to cart outside
 * WooCommerce single product view
 *
 * @depenency jquery, ajax, javascript
 * @version 1.0.0
 * @package hydroponic-research
 *
 */
jQuery(document).ready(function($) {
    var $addToCartButton = $('.shop_add_var_to_cart');

    $addToCartButton.click(function( ) {
        var $productVariationNumber = $(this).closest('div').find('.weight_dropdown').find('#weight').val(),
            $productName = $(this).closest('div').find('.product_title').html(),
            $productID = $(this).closest('li').attr('data-id');

        if ($productVariationNumber) {
            console.log('product name: '+$productName+' and prouct id: '+$productID+' and product variation number: '+$productVariationNumber);
            productPost(1, $productID, $productVariationNumber, $productName);
        } else { //no weight variation
            productPost(0, $productID, $productVariationNumber, $productName);
        }
    });
    
    /**
     * Add Product to Cart
     *
     * Utilizes WooCommerce add_to_cart via url method to
     * post via AJAX into cart
     *
     * @param hasVariation
     * @param productID
     * @param productVariationID
     * @param productName
     */
    function productPost(hasVariation, productID, productVariationID, productName) {
        var $dialog = document.getElementById('orderAdded');//@TODO;move this into dynamic created object

        if (hasVariation === 1) {//if has a variation
            $.ajax( {
                url: '?add-to-cart='+productID+'&variation_id='+productVariationID+'&quantity=1',
                data:'message',//@TODO:correct usage?
                type:'POST',
                success: function(resp) {
                    $dialog.innerHTML = '<h2>Success!</h2><p>Yay. The Product <strong>'+productName+'</strong> is added to your cart</p>';
                    $dialog.showModal();
                    setTimeout(function() {
                        $dialog.close();
                    }, 2900);
                },
                error: function(e) {
                    $dialog.innerHTML = '<h2>Error</h2><p>Error 1111: '+e+'</p>';
                    $dialog.showModal();
                    setTimeout(function() {
                        $dialog.close();
                    }, 2900);
                }
            })
        } else {
            $.ajax( {
                url: '?add-to-cart='+productID+'&quantity=1',
                data:'message',//@TODO:correct usage?
                type:'POST',
                success: function(resp) {
                    $dialog.innerHTML = '<h2>Success!</h2><p>Yay. The Product <strong>'+productName+'</strong> is added to your cart</p>';
                    $dialog.showModal();
                    setTimeout(function() {
                        $dialog.close();
                    }, 2900);
                },
                error: function(e) {
                    $dialog.innerHTML = '<h2>Error</h2><p>Error 1111: '+e+'</p>';
                    $dialog.showModal();
                    setTimeout(function() {
                        $dialog.close();
                    }, 2900);
                }
            })
        }
    }
});