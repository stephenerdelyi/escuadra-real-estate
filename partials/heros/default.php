<?php
    global $the_theme;

    $excerpt = get_the_excerpt();
    $bg_image = get_field('default_page_image');
    $hero_size = get_field('default_page_hero_size');
?>
<section class="default-hero --<?= $hero_size ?>" block-first="<?= $the_theme->block_recorder->first_block ?>" style="<?= isset($bg_image['url']) ? "background-image: url('" . $bg_image['url'] . "')" : null ?>">
    <div class="default-hero__content">
        <h1 class="default-hero__title animate-up"><?= get_the_title() ?></h1>
        <?php if(!empty($excerpt)) : ?>
            <p class="default-hero__excerpt animate-fade-in" data-delay="0.5"><?= $excerpt ?></p>
        <?php endif; ?>
        <?php if($hero_size == 'full') : ?>
            <a class="default-hero__scroll-button js-scroll-button" href="#"><img class="default-hero__scroll-button__image" src="<?= $the_theme->build ?>/svgs/arrow-large.svg"/></a>
        <?php endif; ?>
    </div>
</section>
