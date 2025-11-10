<?php
    $title = get_field('cta_banner_title');
    $cta = get_field('cta_banner_cta');
?>
<div class="block-cta-banner__container">
    <p class="block-cta-banner__text animate-left"><?= $title ?></p>
    <a class="block-cta-banner__button animate-right" href="<?= $cta['url'] ?>" target="<?= $cta['target'] ?>"><?= $cta['title'] ?></a>
</div>
