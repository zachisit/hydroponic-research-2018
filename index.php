<?php
/**
 * The main template file
 *
 * Serves as landing page for theme
 *
 * @package hydroponic-research
 */
get_header(); ?>

<main>
    <div id="product_banner">
        <?=image_creator('https://dummyimage.com/1400x400/9c9c9c/fff.png&text=product+ad+banner', 'product_ad_banner', null )?>
        <div id="cta_headline">
            <h2>Lorem ipsum dolor sit amet et delectus</h2>
        </div>
    </div>
    <div class="wrapper">
        <div class="row">
            <div class="left">
                <?=image_creator('https://dummyimage.com/500x400/9c9c9c/fff.png&text=technical+issues', 'product_ad_banner', null )?>
                <div class="button_block"><a href="" title="lorem ipsum" class="home_button">lorem ipsum</a></div>
            </div>
            <div class="right">
                <?=image_creator('https://dummyimage.com/500x400/9c9c9c/fff.png&text=plant+diganostics', 'product_ad_banner', null )?>
                <div class="button_block"><a href="" title="lorem ipsum" class="home_button">lorem ipsum</a></div>
            </div>
        </div>
        <div class="row">
            <?=image_creator('https://dummyimage.com/1400x400/9c9c9c/fff.png&text=what+we+do', 'product_ad_banner', null )?>
            <div class="button_block"><a href="" title="lorem ipsum" class="home_button">lorem ipsum</a></div>
        </div>
    </div>
    <div id="home_slider">
        <ul>
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
</main>

<?php get_footer(); ?>