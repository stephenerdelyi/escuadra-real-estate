<?php
    global $the_theme;

    $ctas = get_field('cta-cards-ctas');
?>
<div class="block-cta-cards__container">
    <?php foreach($ctas as $cta) : ?>
        <a class="block-cta-cards__card" style="background-image: url('<?= $cta['bg_image']['url'] ?>');" href="<?= $cta['cta']['url'] ?>">
            <p class="block-cta-cards__card__title"><?= $cta['cta']['title'] ?></p>
        </a>
    <?php endforeach; ?>
</div>
