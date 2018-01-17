<?php
/**
 * Template for Product by Category shortcode
 **  @var [WP_Post] $posts
 *
 *
 */
//var_dump($user_data)
?>
<div id="profile">
    <div class="left">
        <div id="profile_image">
            <?=image_creator('https://dummyimage.com/500x400/9c9c9c/fff.png&text=&nbsp;', 'user_profile_img', null )?>
        </div>
        <div id="profile_name"><?=$user_data['first_name'][0]?> <?=$user_data['last_name'][0]?></div>
        <div id="profile_location">Mountain Dew, CA</div>
        <ul id="profile_category">
            <li>category name</li>
            <li>category name</li>
            <li>category name</li>
            <li>category name</li>
        </ul>
        <?php if (is_user_logged_in()) :?>
            <div id="edit_profile">
                <a href="" title="">edit profile</a>
            </div>
        <?php endif?>
    </div>
    <div class="right">
        <section id="gallery">
            <div class="section_title">
                <div class="title">Grow Gallery</div>
            </div>
            <div class="content">
                <ul id="gallery_items">
                    <li><?=image_creator('https://dummyimage.com/500x400/9c9c9c/fff.png&text=&nbsp;', 'user_profile_img', null )?></li>
                    <li><?=image_creator('https://dummyimage.com/500x400/9c9c9c/fff.png&text=&nbsp;', 'user_profile_img', null )?></li>
                    <li><?=image_creator('https://dummyimage.com/500x400/9c9c9c/fff.png&text=&nbsp;', 'user_profile_img', null )?></li>
                    <li><?=image_creator('https://dummyimage.com/500x400/9c9c9c/fff.png&text=&nbsp;', 'user_profile_img', null )?></li>
                    <li><?=image_creator('https://dummyimage.com/500x400/9c9c9c/fff.png&text=&nbsp;', 'user_profile_img', null )?></li>
                    <li><?=image_creator('https://dummyimage.com/500x400/9c9c9c/fff.png&text=&nbsp;', 'user_profile_img', null )?></li>
                    <li><?=image_creator('https://dummyimage.com/500x400/9c9c9c/fff.png&text=&nbsp;', 'user_profile_img', null )?></li>
                </ul>
            </div>
        </section>
        <section id="name_change_later">
            <div class="section_title">
                <div class="title">Section Name</div>
            </div>
            <div class="content">
                <?=$user_data['bio'][0]?>
            </div>
        </section>
        <section id="another_section_chnge_later">
            <div class="section_title">
                <div class="title">Section Name</div>
            </div>
            <div class="content">
                <ul id="change_this_ul_name_later">
                    <li>Lorem ipsum dolor sit amet et delectus</li>
                    <li>Accommodare his consul copiosae legendos at vix ad putent delectus delicata usu.</li>
                    <li>Vidit dissentiet eos cu eum an brute copiosae hendrerit.</li>
                    <li>Eos erant dolorum an.</li>
                    <li>Per facer affert ut.</li>
                    <li>Mei iisque mentitum moderatius cu.</li>
                    <li>Sit munere facilis accusam eu dicat falli consulatu at vis. </li>
                </ul>
            </div>
        </section>
    </div>
</div>
