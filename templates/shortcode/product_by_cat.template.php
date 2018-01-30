<?php
/**
 * Template for Product by Category shortcode
 **  @var [WP_Post] $posts
 *
 *
 */

if(isset($posts) && !empty($posts)): ?>
    <h2 id="main_page_headline">Sed Ut Perspiciatis Unde Omnis</h2>
    <ul class="product_category_landing_list_style">
        <?php foreach($posts as $post):
            $product = wc_get_product($post->ID);
            $productID = $product->get_id();
            $productTitle = $post->post_title; ?>
            <li data-id="<?=$productID?>">
                <div class="product_item">
                    <a href="<?=get_post_permalink($post) ?>" title="<?=$productTitle?>">
                        <div class="thumbnail"><?=get_the_post_thumbnail($post, 'medium');?></div>
                        <h2 class="product_title"><?=$productTitle?></h2>
                    </a>
                    <span class="product_cost"><?=$product->get_price_html()?></span>
                    <?=addVariationProductToCart($product)?>
                </div>
            </li>
        <?php endforeach;?>
    </ul>
    <div id="product_call_to_action">
        <a href="" title="">
            <?=image_creator('https://dummyimage.com/1400x400/9c9c9c/fff.png&text=&nbsp;', 'product_ad_banner', null )?>
        </a>
    </div>
<?php else:
echo '<p>No products found in this category</p>';
endif;?>
<dialog class="generalDialog" id="orderAdded"><!-- --></dialog>