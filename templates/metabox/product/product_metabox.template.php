<?php
/**
 * Product Metabox
 *
 * @package hydroponic-research
 */
?>
<input type="hidden" name="product_type" value="simple" />

<section>
    <h2>Product Quick Description</h2>
    <?php native_wysiwig_editor('Product Quick Description here...', '_product_quick_description', false, true, $post->ID); ?>
</section>
<section>
    <h2>Product Overview</h2>
    <div class="row">
        <label>Product Overview Lifestyle Image</label>
        <?php
        $product_lifestyle_image_url = get_post_meta($post->ID, '_product_lifestyle_image_url', true); ?>
        <fieldset class="max">
            <input class="input_image" name="_product_lifestyle_image_url" type="hidden" value="<?=$product_lifestyle_image_url;?>" style="width:400px;" />
            <input class="input_button button" type="button" value="Upload Image" /><br/>
            <img src="<?=$product_lifestyle_image_url;?>" style="width:200px;" class="img_src" />
        </fieldset>
    </div>
    <div class="row">
        <label>Overview Text</label>
        <?php native_wysiwig_editor('Overview Text here...', '_product_overview_text', false, true, $post->ID); ?>
    </div>
</section>

<section>
    <h2>Product Selection</h2>
    <label>Product Selection Image</label>
    <?php
    $product_selection_image_url = get_post_meta($post->ID, '_product_selection_image_url', true); ?>
    <fieldset class="max">
        <input class="input_image" name="_product_selection_image_url" type="hidden" value="<?=$product_selection_image_url;?>" style="width:400px;" />
        <input class="input_button button" type="button" value="Upload Image" /><br/>
        <img src="<?=$product_selection_image_url;?>" style="width:200px;" class="img_src" />
    </fieldset>
</section>