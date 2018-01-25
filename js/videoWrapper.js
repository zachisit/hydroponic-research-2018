/**
 * File videoWrapper.js
 *
 * Wraps any iframe in the videoWrapper class
 * which allows iframe to be fully responsive
 *
 * @depenency jquery
 * @version 1.0.0
 * @package hydroponic-research
 */
jQuery(document).ready(function($){
    $("iframe").wrap("<div class='videoWrapper'/>");
});
