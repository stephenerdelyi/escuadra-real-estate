<?php
    global $the_theme;

    $tabs = get_field('tabbed_content_tabs');
?>
<div class="block-tabbed-content__container js-tabbed-content">
    <div class="block-tabbed-content__buttons">
        <?php $the_theme->get_partial('pagination', [
            'class' => 'block-tabbed-content__buttons__pagination',
            'js-class' => 'js-tabbed-content',
            'type' => 'up-down',
            'label' => 'none'
        ]); ?>
        <div class="block-tabbed-content__buttons__links">
            <?php foreach($tabs as $index => $tab) : ?>
                <a class="block-tabbed-content__buttons__link js-tabbed-content-button <?= ($index == 0 ? '--active' : null) ?>" href="#"><?= $tab['title'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="block-tabbed-content__slides">
        <div class="block-tabbed-content__slides__image-slider js-tabbed-content-image-slider">
            <div class="block-tabbed-content__slides__image-slider__container swiper-container">
                <div class="block-tabbed-content__slides__image-slider__wrapper swiper-wrapper">
                    <?php foreach($tabs as $tab) : ?>
                        <img class="block-tabbed-content__slides__image-slider__img swiper-slide" src="<?= $tab['image']['url'] ?>" alt="<?= $tab['image']['alt'] ?>"/>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="block-tabbed-content__slides__text-slider js-tabbed-content-text-slider">
            <div class="block-tabbed-content__slides__text-slider__container swiper-container">
                <div class="block-tabbed-content__slides__text-slider__wrapper swiper-wrapper">
                    <?php foreach($tabs as $tab) : ?>
                        <div class="block-tabbed-content__slides__text-slider__slide swiper-slide">
                            <p class="block-tabbed-content__slides__text-slider__text"><?= $tab['content'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
