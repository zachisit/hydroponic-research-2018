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
                    <?php
                    //product's total variation data
                    $productChildren = $product->get_children();

                    if ($productChildren) :
                        //product's variation IDs
                        $productVariations = $product->get_variation_attributes();

                        $productChildrenArray = [];
                        //variation id number
                        foreach ($productChildren as $value) {
                            array_push($productChildrenArray, $value);
                        }

                        //variation name
                        $productVariationsArray = [];
                        foreach ($productVariations as $i => $values) {
                            foreach ($values as $key => $value) {
                                array_push($productVariationsArray, $value);

                            }
                        }

                        //merge both arrays into one with key=>value we can use for option select
                        $list = array_combine($productChildrenArray, $productVariationsArray); ?>
                        <div class="weight_dropdown">
                        <label for="weight">Weight</label>
                        <select id="weight" name="weight">
                            <option value="Select Your Weight">Select Your Weight</option>
                            <?php foreach ($list as $key=>$value) : ?>
                            <option value="<?=$key?>" data-name="<?=$productTitle?>" data-id="<?=$key?>"><?=$value?></option>
                            <?php endforeach ?>
                        </select>
                        </div>
                    <?php endif ?>
                    <button class="shop_add_var_to_cart">add to cart</button>
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