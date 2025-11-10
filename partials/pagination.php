<?php
    $class = $args['class'] ?? null;
    $js_class = $args['js-class'] ?? null;
    $type = $args['type'] ?? 'left-right';
    $label = $args['label'] ?? 'right';
?>
<div class="<?= $class ?> --<?= $type ?> --label-<?= $label ?>">
    <div class="<?= $class ?>__buttons">
        <a class="<?= $class ?>__button --prev --disabled <?= $js_class ?>-prev" title="Previous"></a>
        <a class="<?= $class ?>__button --next --disabled <?= $js_class ?>-next" title="Next"></a>
    </div>
    <?php if($label != 'none') : ?>
        <p class="<?= $class ?>__label <?= $js_class ?>-pagination-label"></p>
    <?php endif; ?>
</div>
