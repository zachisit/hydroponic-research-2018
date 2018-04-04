/**
 * file: admin_media_upload.js
 *
 * Global admin media uploader trigger
 * used primarily on custom meta boxes
 *
 * @dependenies: jquery
 * @package hydroponic-research
 */

jQuery(document).ready( function($) {
    $('.input_button').click(function() {
        var imageBox = $(this).closest('.max'),
            input = imageBox.find('.input_image');

        window.send_to_editor = function(html) {
            imgurl = $(html).attr('src');
            input.val(imgurl);
            imageBox.find('.img_src').attr("src", imgurl);
            tb_remove();
        };

        formfield = input.attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
    });
});