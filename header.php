<!DOCTYPE html>
<html <?php language_attributes()?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <title><?php if ( !is_front_page() ) { wp_title( '|', true, 'right' ); } bloginfo( 'name' )?></title>

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="images/preload/apple-touch-icon.png"><!--//TODO:provide-->

    <!-- Microsoft Tiles -->
    <meta name="msapplication-config" content="browserconfig.xml" /><!--//TODO:provide-->

    <!--Facebook Open Graph--><!--//TODO:provide-->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://example.com/page.html">
    <meta property="og:title" content="Content Title">
    <meta property="og:image" content="https://example.com/image.jpg">
    <meta property="og:description" content="Description Here">
    <meta property="og:site_name" content="Site Name">
    <meta property="og:locale" content="en_US">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!--Twitter Card--><!--//TODO:provide-->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@site_account">
    <meta name="twitter:creator" content="@individual_account">
    <meta name="twitter:url" content="https://example.com/page.html">
    <meta name="twitter:title" content="Content Title">
    <meta name="twitter:description" content="Content description less than 200 characters">
    <meta name="twitter:image" content="https://example.com/image.jpg">
    <?php wp_head() ?>
    <?=get_post_meta( get_the_ID(), 'header_scripts', true ); //refer to /page_edit/page_scripts.php?>
</head>
<body>
<div id="cart_banner">
    <div class="wrapper">
        <p><a class="button" title="View Your Cart" href="<?=home_url('/cart')?>">View Your Cart</a></p>
    </div>
</div>

<header<?=(!is_home()) ? ' id="internal"' : ''?>>
    <div class="wrapper">
        <div class="left">
            <div id="logo">
                <a href="<?=get_home_url()?>" title="<?=get_home_url()?> Home"><?=image_creator('https://dummyimage.com/300x80/9c9c9c/fff.png&text=logo', 'logo', null)?></a>
            </div>
        </div>
        <?php if (!is_page('sales-associate-login')) : ?>
        <div class="right">
            <button id="menu_btn"></button>
            <div id="menu">
                <button id="menu_close"></button>
                <div id="search_mobile">
                    <?php get_search_form() ?>
                </div>
                <nav>
                    <ul>
                        <li>
                            <a href="<?=home_url('/product')?>" title="Go To Shop"><?=image_creator('https://dummyimage.com/80x80/9c9c9c/fff.png&text=shop', 'shop icon', null)?></a>
                        </li>
                        <li>
                            <a href="<?=home_url((!is_user_logged_in()) ? '/login' : '/grow-notes');?>" title="Go To Grow Notes"><?=image_creator('https://dummyimage.com/80x80/9c9c9c/fff.png&text=notes', 'grow notes icon', null)?></a>
                        </li>
                        <li>
                            <?php if (is_user_logged_in()) : ?>

                            <?php else : ?>
                            <a href="<?=home_url('/login')?>" title="Go To Member Login"><?=image_creator('https://dummyimage.com/80x80/9c9c9c/fff.png&text=login', 'member login icon', null)?></a>
                            <?php endif ?>
                            </li>
                        <li>
                            <a href="<?=home_url('/contact')?>" title="Go To Contact Us"><?=image_creator('https://dummyimage.com/80x80/9c9c9c/fff.png&text=contact', 'contact icon', null)?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <?php endif ?>
    </div>
</header>