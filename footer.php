<footer>
    <div class="wrapper">
        <div id="top" class="row">
            <div id="newsletter">
                <input id="submit" type="submit">
                <input id="text" type="text">
            </div>
        </div>
        <div class="row">
            <div class="left">
                <div class="left">
                    <h2>Lorem Ipsum</h2>
                    <?php wp_nav_menu( ['menu' => 'Footer Menu One', 'theme_location' => 'footer_menu_one'] )?>
                </div>
                <div class="right">
                    <h2>Ipsum Lorem</h2>
                    <?php wp_nav_menu( ['menu' => 'Footer Menu Two', 'theme_location' => 'footer_menu_two'] )?>
                </div>
            </div>
            <div class="logo_social">
                <div id="logo">
                    <a href="<?=get_home_url(); ?>" title="<?=get_home_url(); ?> Home"><?=image_creator('https://dummyimage.com/300x80/9c9c9c/fff.png&text=logo', 'logo', null)?></a>
                </div>
                <ul id="social">
                    <li><a href="facebook.com" title="<?=get_bloginfo( 'name' ); ?> Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                    <li><a href="instagram.com" title="<?=get_bloginfo( 'name' ); ?> Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="twitter.com" title="<?=get_bloginfo( 'name' ); ?> Twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                    <li><a href="youtube.com" title="<?=get_bloginfo( 'name' ); ?> YouTube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>

        <div id="bottom">
            <p>Hosted by <a href="" title="">Handsome Cat Hosting</a> - Made in the USA <img src="<?php echo get_template_directory_uri(); ?>/images/preload/usa_flag.jpg" alt="<?php echo get_bloginfo( 'name' ); ?> - USA" /></p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

<!--Google Analytics-->
    <!--remove me and replace with client GA code-->
</body>
</html>