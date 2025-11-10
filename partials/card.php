<?php
    $class = $args['class'] ?? null;
    $title = $args['title'] ?? null;
    $excerpt = $args['excerpt'] ?? null;
    $label = $args['label'] ?? null;
    $cta = $args['cta'] ?? null;
    $theme = $args['theme'] ?? 'light';

    $cta_data = '';
    if(isset($cta['data'])) {
        foreach($cta['data'] as $data_key => $data_value) {
            $cta_data .= "data-$data_key=\"$data_value\"";
        }
    }
?>
<div class="<?= $class ?>__card --<?= $theme ?>">
    <?php if(!empty($label)) : ?>
        <p class="<?= $class ?>__card__label"><?= $label ?></p>
    <?php endif; ?>
    <p class="<?= $class ?>__card__title"><?= $title ?></p>
    <?php if(!empty($excerpt)) : ?>
        <p class="<?= $class ?>__card__excerpt"><?= $excerpt ?></p>
    <?php endif; ?>
    <?php if(!empty($cta)) : ?>
        <a class="<?= $class ?>__card__cta <?= (isset($cta['modal']) ? 'js-modal-open' : null) ?>" <?= (isset($cta['modal']) ? 'data-modal-name="' . $cta['modal'] . '"' : null) ?> <?= $cta_data ?> href="<?= $cta['url'] ?>" target="<?= $cta['target'] ?>"><?= $cta['title'] ?></a>
    <?php endif; ?>
</div>
