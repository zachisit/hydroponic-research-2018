/**
 * File slick_config.js
 *
 * Initialize slider related to a css div
 *
 * @dependencies: slick slider
 * http://kenwheeler.github.io/slick/
 *
 * version:
 * 1.0.1
 *
 */

/**
 * Standard Slider Usage
 */
jQuery(document).ready(function($){
    $('#slick_slider').slick({
        slidesToShow:5,
        slidesToScroll:2,
        autoplay:true,
        dots:false,
        arrows:false,
        autoplaySpeed:3500
    });
});
