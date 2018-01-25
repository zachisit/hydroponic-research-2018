<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
get_header();
$showSide = get_post_meta( get_the_ID(), '_show_sidebar', true );
?>
    <main>
        <div class="wrapper">
            <div id="<?=($showSide) ? 'content_right' : 'full_width' ?>" class="content_text">
                <?php while ( have_posts() ) : the_post();?>
                    <?=the_content()?>
                <?php endwhile ?>
            </div>
            <?php if ($showSide) { get_sidebar(); } ?>
        </div>
    </main>
<?php get_footer() ?>