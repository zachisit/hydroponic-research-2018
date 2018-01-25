<?php
/**
 * The main template file
 *
 * Serves as landing page for theme
 *
 * @package hydroponic-research
 */
get_header() ?>

<main>
    <div id="product_banner">
        <?=image_creator('https://dummyimage.com/1400x400/9c9c9c/fff.png&text=&nbsp;', 'product_ad_banner', null )?>
        <div id="cta_headline">
            <h2>Lorem ipsum dolor sit amet et delectus</h2>
        </div>
    </div>
    <div id="under_header_two_boxes" class="row">
        <div class="wrapper">
            <div class="left">
                <?=image_creator('https://dummyimage.com/500x400/9c9c9c/fff.png&text=&nbsp;', 'product_ad_banner', null )?>
                <div class="button_block"><a href="" title="lorem ipsum" class="home_button">lorem ipsum</a></div>
            </div>
            <div class="right">
                <?=image_creator('https://dummyimage.com/500x400/9c9c9c/fff.png&text=&nbsp;', 'product_ad_banner', null )?>
                <div class="button_block"><a href="" title="lorem ipsum" class="home_button">lorem ipsum</a></div>
            </div>
        </div>
    </div>
    <div id="what_we_do" class="row">
        <div class="wrapper">
            <?=image_creator('https://dummyimage.com/1400x400/9c9c9c/fff.png&text=&nbsp;', 'product_ad_banner', null )?>
            <div class="button_block"><a href="" title="lorem ipsum" class="home_button">lorem ipsum</a></div>
        </div>
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
</main>

<?php get_footer() ?>