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
            $product = wc_get_product($post->ID);?>
            <li>
                <div class="product_item">
                    <a href="<?=get_post_permalink($post) ?>" title="<?=$post->post_title?>">
                        <div class="thumbnail"><?=get_the_post_thumbnail($post, 'medium');?></div>
                        <h2 class="product_title"><?=$post->post_title?></h2>
                    </a>
                    <span class="product_cost"><?=$product->get_price_html()?></span>
                    <div class="weight_dropdown">
                        <label for="weight">Weight</label>
                        <select id="weight" name="weight">
                            <option>0.9 oz</option>
                            <option>1.5 oz</option>
                            <option>2.8 oz</option>
                            <option>3.5 oz</option>
                            <option>5 oz</option>
                        </select>
                    </div>
                    <div class="woocommerce-variation-add-to-cart variations_button">
                        <?php
                        /**
                         * @since 3.0.0.
                         */
                        do_action( 'woocommerce_before_add_to_cart_quantity' );

                        woocommerce_quantity_input( array(
                            'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                            'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                            'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
                        ) );

                        /**
                         * @since 3.0.0.
                         */
                        do_action( 'woocommerce_after_add_to_cart_quantity' );
                        ?>
                        <button type="submit" class="single_add_to_cart_button button alt"><?=esc_html( $product->single_add_to_cart_text() ) ?></button>
                        <input type="hidden" name="add-to-cart" value="<?=absint( $product->get_id() )?>" />
                        <input type="hidden" name="product_id" value="<?=absint( $product->get_id() )?>" />
                        <input type="hidden" name="variation_id" class="variation_id" value="0" />
                    </div>
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