<?php
    global $the_theme;

    $title = get_field('about_title');
    $excerpt = get_field('about_excerpt');
    $cta = get_field('about_cta');
    $subtitle = get_field('about_subtitle');
    $image = get_field('about_image');
?>
<div class="block-about-overview__container">
    <?php if(!empty($image)) : ?>
        <div class="block-about-overview__image">
            <img class="block-about-overview__image__img" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>"/>
        </div>
    <?php endif; ?>
    <div class="block-about-overview__content animate-up">
        <?php $the_theme->get_partial('card', [
            'title' => $title,
            'excerpt' => $excerpt,
            'cta' => $cta,
            'class' => 'block-about-overview__content',
            'theme' => 'dark'
        ]); ?>
        <?php if(!empty($subtitle)) : ?>
            <div class="block-about-overview__content__excerpt-container">
                <p class="block-about-overview__content__excerpt"><?= $subtitle ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>
