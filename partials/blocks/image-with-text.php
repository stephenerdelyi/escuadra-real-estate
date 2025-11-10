<?php
    global $the_theme;

    $image = get_field('image_text_image');
    $excerpt = get_field('image_text_excerpt');
?>
<div class="block-image-with-text__container">
    <div class="block-image-with-text__image">
        <img class="block-image-with-text__image__img" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>"/>
    </div>
    <p class="block-image-with-text__text"><?= $excerpt ?></p>
</div>
