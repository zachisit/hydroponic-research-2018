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
            $productID = $(this).closest('li').attr('data-id'),
            $productQty = $(this).closest('div').find('#quantity').val(),
            $dialog = document.getElementById('orderAdded');

        if ($productVariationNumber) {
            // console.log('product name: '+$productName+' and product id: '+$productID+' and product variation number: '+$productVariationNumber+' and the qty is: '+$productQty);

            if($productVariationNumber === 'Select Your Weight') {//is weight selected?
                buildDialogBox($dialog, 'Uh, oh!', 'You need to specify a weight before adding to your Cart.', 0, 1);
            } else if ( !$productQty ) {//is qty specified?
                buildDialogBox($dialog, 'Uh, oh!', 'You need to specify a quantity before adding to your Cart.', 0, 1);
            } else {//all good - post product to cart
                productPost(1, $productID, $productVariationNumber, $productName, $productQty);
            }
        } else {//no weight variation, all good - post product to cart
            productPost(0, $productID, $productVariationNumber, $productName, $productQty);
        }
    });

    /**
     * Build Dialog Box
     *
     * @param $dialog
     * @param headline
     * @param message
     * @param showViewCart
     * @param showCloseDialog
     */
    function buildDialogBox($dialog, headline, message, showViewCart, showCloseDialog) {
        $('body').append('<div id="overlay"></div>');

        $dialog.innerHTML = '<h2>'+headline+'</h2>';
        $dialog.innerHTML += '<p>'+message+'</p>';
        $dialog.innerHTML += '<div id="user_action_buttons" class="row"><div class="right"><ul id="action_items"></ul></div></div>';

        if (showViewCart === 1) {
            $('#action_items').append('<li><button class="action_button background-black" id="view_cart">view cart</button></li>');
        }
        if (showCloseDialog === 1) {
            $('#action_items').append('<li><button class="action_button background-none" id="close_dialog">ok, thanks</button></li>');
        }

        $dialog.showModal();

        var $dialogViewCart = $('#view_cart'),
            $dialogClose = $('#close_dialog');

        $dialogViewCart.click(function() {
            window.location.href = 'cart';
        });
        $dialogClose.click(function() {
            $dialog.close();
        });
    }

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
     * @param productQty
     */
    function productPost(hasVariation, productID, productVariationID, productName, productQty) {
        var $dialog = document.getElementById('orderAdded');//@TODO;move this into dynamic created object

        if (hasVariation === 1) {//if has a variation
            $.ajax( {
                url: '?add-to-cart='+productID+'&variation_id='+productVariationID+'&quantity='+productQty,
                data:'message',//@TODO:correct usage?
                type:'POST',
                success: function(resp) {
                    successAddProductDialog($dialog, productName, productQty);
                },
                error: function(e) {
                    errorAddProductDialog($dialog);
                }
            })
        } else {
            $.ajax( {
                url: '?add-to-cart='+productID+'&quantity='+productQty,
                data:'message',//@TODO:correct usage?
                type:'POST',
                success: function(resp) {
                    successAddProductDialog($dialog, productName, productQty);
                },
                error: function(e) {
                    errorAddProductDialog($dialog);
                }
            })
        }
    }

    /**
     * Dialog - Successful Product Add to Cart
     *
     * @param $dialog
     * @param productName
     * @param productQty
     */
    function successAddProductDialog($dialog,productName, productQty) {
        buildDialogBox($dialog, 'Success!', 'You\'ve added <strong>'+productName+'</strong> with quantity of '+productQty+' to your Cart.', 1, 1);

        var $cartBanner = $('#cart_banner');

        $cartBanner.show();
    }

    /**
     * Dialog - Error Product Add to Cart
     *
     * @param $dialog
     */
    function errorAddProductDialog($dialog) {
        buildDialogBox($dialog, 'Error', 'Error 1111: '+e+'', 0, 0);
    }
});