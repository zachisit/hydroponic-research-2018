/**
 * File homepage_product_banner.js
 *
 * css/js animation for homepage product banner
 *
 * @dependency jquery
 * @version 1.0.0
 * @package hydroponic-research
 *
 */
jQuery(function($) {
    var $homepageProductBanner = $('#homepage_product_banner'),
        $productTitleMessage = $('#product_title_message'),
        $productOne = $('#p_one'),
        $productTwo = $('#p_two'),
        $productThree = $('#p_three'),
        $productFour = $('#p_four'),
        $productFive = $('#p_five'),
        $productSix = $('#p_six');

    var productMessageData = [
        'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
        'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.',
        'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?',
        'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?',
        'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.',
        'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur.'
    ];

    //on page load, make first one selected for better UX
    $productOne.addClass('selected');

    //if has class selected before anyone clicks on it
    //then pull and show the message
    $homepageProductBanner.find('li').each(function() {
        if ($(this).hasClass('selected')) {
            //@TODO:determine when slick-active added
            showProductMessage($(this).attr('data-id'));
        }
    });

    //if product clicked, add selected class to trigger UX layout change
    $homepageProductBanner.find('li').click(function() {

        //remove all other selected from a previous select
        $homepageProductBanner.find('li').each(function() {
           $(this).removeClass('selected');
        });

        //finally, add selected class
        $(this).addClass('selected');

        //show product message
        showProductMessage($(this).attr('data-id'));
    });

    //general hover effect
    $productOne.mouseover(function() {
        $productTitleMessage.find('p').html(productMessageData[0]);
    });
    $productTwo.mouseover(function() {
        $productTitleMessage.find('p').html(productMessageData[1]);
    });
    $productThree.mouseover(function() {
        $productTitleMessage.find('p').html(productMessageData[2]);
    });
    $productFour.mouseover(function() {
        $productTitleMessage.find('p').html(productMessageData[3]);
    });
    $productFive.mouseover(function() {
        $productTitleMessage.find('p').html(productMessageData[4]);
    });
    $productSix.mouseover(function() {
        $productTitleMessage.find('p').html(productMessageData[5]);
    });

    /**
     * Show Product Message
     *
     * based on selected product
     *
     * @param productNumber
     */
    function showProductMessage(productNumber) {
        var $productTitleMessage = $('#product_title_message');

        if (productNumber === 'product_one') {
            $productTitleMessage.find('p').html(productMessageData[0]);
        }

        if (productNumber === 'product_two') {
            $productTitleMessage.find('p').html(productMessageData[1]);
        }

        if (productNumber === 'product_three') {
            $productTitleMessage.find('p').html(productMessageData[2]);
        }

        if (productNumber === 'product_four') {
            $productTitleMessage.find('p').html(productMessageData[3]);
        }

        if (productNumber === 'product_five') {
            $productTitleMessage.find('p').html(productMessageData[4]);
        }

        if (productNumber === 'product_six') {
            $productTitleMessage.find('p').html(productMessageData[5]);
        }
    }
});