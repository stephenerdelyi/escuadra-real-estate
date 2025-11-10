<?php
    global $the_theme;
?>

<?php if(is_admin()) : ?>
    <div class="admin-block-preview <?= ($block['editable'] != true ? '--disabled' : null) ?>">
        <div class="dashicon dashicons-before dashicons-<?= $block['icon'] ?>"></div>
        <div class="text">
            <p>Custom Block <?= ($block['editable'] == true ? '(Click to Edit)' : null) ?></p>
            <h3><?= $block['title'] ?></h3>
        </div>
    </div>
<?php elseif(isset($the_theme->block_recorder)) : ?>
    <?php $block_name = $the_theme->block_recorder->getBlockName($block['name']); ?>
    <section class="block-<?= $block_name?>" block-before="<?= $the_theme->block_recorder->previous_block ?>" block-after="<?= $the_theme->block_recorder->next_block ?>">
        <?php $the_theme->get_partial("blocks/$block_name"); ?>
    </section>
<?php endif; ?>
