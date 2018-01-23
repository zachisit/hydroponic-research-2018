<?php
/**
 * Page Banner Image Template (Regular)
 */
?>
<div id="page_header" class="regular">
    <?php if (has_post_thumbnail()) {
        echo get_the_post_thumbnail(null, 'full');
    } ?>
    <h1><?=the_title()?></h1>
</div>