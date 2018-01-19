<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $product; ?>
</div><!--//entry-summary-->
<!--
@TODO:
move the above ending div into the entry-summary template file,
wrap it in an right class, update sass
<!--</div><!--//wrapper starting above image gallery-->

<div id="product_meta">
    <div class="wrapper">
        <section id="overview">
            <div class="s_title"><h2>Overview</h2><div class="section_accordian_trigger"><i class="fa fa-chevron-down" aria-hidden="true"></i></div></div>
            <div class="section_container">
                <div class="left">
                    <?=image_creator('https://dummyimage.com/600x400/9c9c9c/fff.png&text=product+overview+image;', 'product overview image', null )?>
                </div>
                <div class="right">
                    <p>Lorem ipsum dolor sit amet et delectus accommodare his consul copiosae legendos at vix ad putent delectus delicata usu. Vidit dissentiet eos cu eum an brute copiosae hendrerit. Eos erant dolorum an. Per facer affert ut. Mei iisque mentitum moderatius cu. Sit munere facilis accusam eu dicat falli consulatu at vis. Te...</p>
                </div>
                <div class="top_action"><a href="" title="go to top" class="top_link">top</a></div>
            </div>
        </section>

        <section id="product_selection">
            <div class="s_title"><h2>Product Selection</h2><div class="section_accordian_trigger"><i class="fa fa-chevron-down" aria-hidden="true"></i></div></div>
            <div class="section_container">
                <div class="row">
                    <?=image_creator('https://dummyimage.com/1400x400/9c9c9c/fff.png&text=product+selection+image;', 'product overview image', null )?>
                </div>
                <div class="top_action"><a href="" title="go to top" class="top_link">top</a></div>
            </div>
        </section>

        <section id="technical_support">
            <div class="s_title"><h2>Technical Support</h2><div class="section_accordian_trigger"><i class="fa fa-chevron-down" aria-hidden="true"></i></div></div>
            <div class="section_container">
                <div class="row">
                    <?=image_creator('https://dummyimage.com/1400x400/9c9c9c/fff.png&text=technical+support+image;', 'product overview image', null )?>
                </div>
                <div class="top_action"><a href="" title="go to top" class="top_link">top</a></div>
            </div>
        </section>

        <section id="related_products">
            <div class="s_title"><h2>Related Products</h2><div class="section_accordian_trigger"><i class="fa fa-chevron-down" aria-hidden="true"></i></div></div>
            <div class="section_container">
                <div class="row">
                    <ul>
                        <li>
                            <a href="" title="">
                                <?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=&nbsp;', 'test', null )?>
                                <span class="product_title">Product Title</span>
                            </a>
                        </li>
                        <li>
                            <a href="" title="">
                                <?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=&nbsp;', 'test', null )?>
                                <span class="product_title">Product Title</span>
                            </a>
                        </li>
                        <li>
                            <a href="" title="">
                                <?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=&nbsp;', 'test', null )?>
                                <span class="product_title">Product Title</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="top_action"><a href="" title="go to top" class="top_link">top</a></div>
            </div>
        </section>
    </div>

    <div id="home_slider">
        <ul id="slick_slider">
            <li><a href="" title="something here"><?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=something', 'something', null)?></a></li>
            <li><a href="" title="something here"><?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=something', 'something', null)?></a></li>
            <li><a href="" title="something here"><?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=something', 'something', null)?></a></li>
            <li><a href="" title="something here"><?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=something', 'something', null)?></a></li>
            <li><a href="" title="something here"><?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=something', 'something', null)?></a></li>
            <li><a href="" title="something here"><?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=something', 'something', null)?></a></li>
            <li><a href="" title="something here"><?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=something', 'something', null)?></a></li>
            <li><a href="" title="something here"><?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=something', 'something', null)?></a></li>
            <li><a href="" title="something here"><?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=something', 'something', null)?></a></li>
            <li><a href="" title="something here"><?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=something', 'something', null)?></a></li>
            <li><a href="" title="something here"><?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=something', 'something', null)?></a></li>
            <li><a href="" title="something here"><?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=something', 'something', null)?></a></li>
            <li><a href="" title="something here"><?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=something', 'something', null)?></a></li>
            <li><a href="" title="something here"><?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=something', 'something', null)?></a></li>
            <li><a href="" title="something here"><?=image_creator('https://dummyimage.com/400x400/9c9c9c/fff.png&text=something', 'something', null)?></a></li>
        </ul>
    </div>
</div>