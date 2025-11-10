<?php
    global $the_theme;

    $title = get_field('areas_of_expertise_title');
    $excerpt = get_field('areas_of_expertise_excerpt');
    $areas = get_field('areas_of_expertise');
    $surrounding_areas = get_field('areas_of_expertise_surrounding') ?? '';
    $default_primary_image = get_field('areas_of_expertise_default_primary_image');
    $default_secondary_image = get_field('areas_of_expertise_default_secondary_image');
?>
<div class="block-areas-of-expertise__container js-areas-of-expertise">
    <div class="block-areas-of-expertise__areas js-areas-of-expertise-areas">
        <?php foreach($areas as $index => $area) : ?>
            <p class="block-areas-of-expertise__area js-areas-of-expertise-area <?= ($area['title'] != 'Surrounding Areas' ?: 'js-areas-of-expertise-surrounding') ?>" data-slide-id="<?= ++$index ?>"><?= $area['title'] ?></p>
            <?php if($area['title'] == 'Surrounding Areas') : ?>
                <p class="block-areas-of-expertise__area__extra js-areas-of-expertise-surrounding-text"><?= $surrounding_areas ?></p>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="block-areas-of-expertise__areas --shadow">
        <?php foreach($areas as $area) : ?>
            <p class="block-areas-of-expertise__area"><?= $area['title'] ?></p>
        <?php endforeach; ?>
    </div>
    <div class="block-areas-of-expertise__details-container">
        <div class="block-areas-of-expertise__details">
            <?php $the_theme->get_partial('card', [
                'title' => $title,
                'excerpt' => $excerpt,
                'class' => 'block-areas-of-expertise__card',
            ]); ?>
            <div class="block-areas-of-expertise__details__primary-slider js-areas-of-expertise-primary-slider">
                <div class="block-areas-of-expertise__details__primary-slider__container swiper-container">
                    <div class="block-areas-of-expertise__details__primary-slider__wrapper swiper-wrapper">
                        <img class="block-areas-of-expertise__details__primary-slider__img swiper-slide" src="<?= $default_primary_image['url'] ?>" alt="<?= $default_primary_image['alt'] ?>"/>
                        <?php foreach($areas as $area) : ?>
                            <img class="block-areas-of-expertise__details__primary-slider__img swiper-slide" src="<?= $area['primary_image']['url'] ?>" alt="<?= $area['primary_image']['alt'] ?>"/>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="block-areas-of-expertise__details__secondary-slider js-areas-of-expertise-secondary-slider">
                <div class="block-areas-of-expertise__details__secondary-slider__container swiper-container">
                    <div class="block-areas-of-expertise__details__secondary-slider__wrapper swiper-wrapper">
                        <img class="block-areas-of-expertise__details__secondary-slider__img swiper-slide" src="<?= $default_secondary_image['url'] ?>" alt="<?= $default_secondary_image['alt'] ?>"/>
                        <?php foreach($areas as $area) : ?>
                            <img class="block-areas-of-expertise__details__secondary-slider__img swiper-slide" src="<?= $area['secondary_image']['url'] ?>" alt="<?= $area['secondary_image']['alt'] ?>"/>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
