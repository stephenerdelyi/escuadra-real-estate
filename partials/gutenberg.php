<?php
    global $the_theme;
    $thumbnail = $args['thumbnail'] ?? null;
?>
<div class="open-content">
    <?php foreach($the_theme->block_recorder->parsed_blocks as $parsed_block) : ?>
        <?php $the_theme->block_recorder->pop($parsed_block); ?>
        <?= render_block($parsed_block) ?>
    <?php endforeach; ?>
    <?php if(get_post_type() == 'post') {
        echo $the_theme->get_partial('blocks/post-agent');
    } ?>
</div>
