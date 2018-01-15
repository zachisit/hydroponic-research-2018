<?php
/**
 * Template for Page Scripts Metabox
 * @var string $__header_scripts
 * @var string $__body_scripts
 */ ?>
<label for="_header_scripts">Header Scripts</label>
<textarea id="_header_scripts" name="_header_scripts" class="widefat" rows="8"><?=$_header_scripts[0]?></textarea>
<p>Output after the closing <code>head</code> tag, after sitewide header scripts.</p>

<label for="_body_scripts">Body Scripts</label>
<textarea id="_body_scripts" name="_body_scripts" class="widefat" rows="8"><?=$_body_scripts[0]?></textarea>
<p>Output after the closing <code>footer</code> tag, after sitewide footer and Google Analytics scripts.</p>
