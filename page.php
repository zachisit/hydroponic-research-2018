<?php
/**
 * The template for displaying all pages
 *
 * @package hydroponic-research
 */
get_header();
$showSide = get_post_meta( get_the_ID(), '_show_sidebar', true );
?>
<?php if ( (is_singular()) && (!is_page(['grow-notes', 'cart', 'checkout', 'products', 'inbound-survey'])) ) :?>
<?=pageBannerImage()?>
<?php endif ?>
    <main>
        <div class="wrapper">
            <div id="content_container">
                <?php if ($showSide) { get_sidebar(); } ?>
                <div id="<?=($showSide) ? 'content_left' : 'full_width' ?>" class="content_text">
                    <?php while ( have_posts() ) : the_post();
                        echo the_content();
                    endwhile ?>
                </div>
            </div>
        </div>
    </main>
<?php get_footer() ?>