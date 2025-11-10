<?php
    global $the_theme;

    $properties = [];
    $order = get_field('developments_order');

    if($order == 'recent') {
        $properties = get_data('properties', 'get_property', [
            'tax_query' => [
                [
                    'taxonomy' => 'property-types',
                    'field' => 'slug',
                    'terms' => 'developments'
                ]
            ]
        ]);
    } else if($order == 'manual') {
        $properties = get_data('properties', 'get_property', [
            'post_ids' => get_field('developments_manual')
        ]);
    }
?>
<div class="block-developments__container js-developments">
    <div class="block-developments__content">
        <?php $the_theme->get_partial('pagination', [
            'class' => 'block-developments__pagination',
            'js-class' => 'js-developments',
            'type' => 'left-right',
            'label' => 'right'
        ]); ?>
        <div class="block-developments__cards js-developments-card-slider">
            <div class="block-developments__cards__container swiper-container">
                <div class="block-developments__cards__wrapper swiper-wrapper">
                    <?php foreach($properties->results as $property) : ?>
                        <div class="block-developments__cards__slide swiper-slide">
                            <?php $the_theme->get_partial('card', [
                                'title' => $property->name,
                                'excerpt' => $property->excerpt,
                                'class' => 'block-developments__card',
                            ]); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="block-developments__image-sliders">
        <div class="block-developments__image-slider__main js-developments-main-slider">
            <div class="block-developments__image-slider__main__container swiper-container">
                <div class="block-developments__image-slider__main__wrapper swiper-wrapper">
                    <?php foreach($properties->results as $property) : ?>
                        <img class="block-developments__image-slider__main__img swiper-slide" src="<?= $property->gallery[0]->url ?>" alt="<?= $property->gallery[0]->alt ?>"/>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="block-developments__image-slider__secondary-container">
            <div class="block-developments__image-slider__secondary js-developments-secondary-slider">
                <div class="block-developments__image-slider__secondary__container swiper-container">
                    <div class="block-developments__image-slider__secondary__wrapper swiper-wrapper">
                        <?php foreach($properties->results as $property) : ?>
                            <img class="block-developments__image-slider__secondary__img swiper-slide" src="<?= $property->gallery[1]->url ?>" alt="<?= $property->gallery[0]->alt ?>"/>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="block-developments__image-slider__tertiary js-developments-tertiary-slider">
                <div class="block-developments__image-slider__tertiary__container swiper-container">
                    <div class="block-developments__image-slider__tertiary__wrapper swiper-wrapper">
                        <?php foreach($properties->results as $property) : ?>
                            <img class="block-developments__image-slider__tertiary__img swiper-slide" src="<?= $property->gallery[2]->url ?>" alt="<?= $property->gallery[2]->alt ?>"/>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
