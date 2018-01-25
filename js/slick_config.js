/**
 * File slick_config.js
 *
 * Initialize slider related to a css div
 *
 * @depenency slick slider
 * jquery
 * @version 1.0.0
 * @package hydroponic-research
 *
 */

/**
 * Standard Slider Usage
 */
jQuery(document).ready(function($){
    /**
     * Homepage Slider
     */
    $(window).resize(function() {
        if($(window).width() <= 500) {
            //@TODO:replace name to be home specific
            $('#slick_slider').slick({
                slidesToShow:1,
                slidesToScroll:1,
                autoplay:true,
                dots:false,
                arrows:false,
                autoplaySpeed:3500
            });
        } else {
            //@TODO:replace name to be home specific
            $('#slick_slider').slick({
                slidesToShow:5,
                slidesToScroll:2,
                autoplay:true,
                dots:false,
                arrows:false,
                autoplaySpeed:3500
            });
        }
    }).resize();
});
