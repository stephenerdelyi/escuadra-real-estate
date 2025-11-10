<?php
    global $the_theme;

    $label = get_field('sold_homes_label');
    $order = get_field('sold_homes_order');
    $properties = [];

    if(empty($label)) {
        $label = 'Recently Sold Homes';
    }

    if($order == 'recent') {
        $properties = get_data('properties', 'get_property', [
            'tax_query' => [
                [
                    'taxonomy' => 'property-types',
                    'field' => 'slug',
                    'terms' => 'sold-homes'
                ]
            ]
        ]);
    } else if($order == 'manual') {
        $properties = get_data('properties', 'get_property', [
            'post_ids' => get_field('sold_homes_manual')
        ]);
    }
?>
<div class="block-sold-homes__container js-sold-homes">
    <div class="block-sold-homes__image-slider js-sold-homes-image-slider">
        <div class="block-sold-homes__image-slider__container swiper-container">
            <div class="block-sold-homes__image-slider__wrapper swiper-wrapper">
                <?php foreach($properties->results as $property) : ?>
                    <img class="block-sold-homes__image-slider__img swiper-slide" src="<?= $property->gallery[0]->url ?>" alt="<?= $property->gallery[0]->alt ?>"/>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="block-sold-homes__image-slider__pagination-container">
            <?php $the_theme->get_partial('pagination', [
                'class' => 'block-sold-homes__image-slider__pagination',
                'js-class' => 'js-sold-homes',
                'type' => 'left-right',
                'label' => 'left'
            ]); ?>
        </div>
        <div class="block-sold-homes__image-slider__label-container">
            <p class="block-sold-homes__image-slider__label"><?= $label ?></p>
        </div>
    </div>
    <div class="block-sold-homes__card-slider-container">
        <div class="block-sold-homes__card-slider js-sold-homes-card-slider">
            <div class="block-sold-homes__card-slider__container swiper-container">
                <div class="block-sold-homes__card-slider__wrapper swiper-wrapper">
                    <?php foreach($properties->results as $property) : ?>
                        <div class="block-sold-homes__card-slider__slide swiper-slide">
                            <?php $the_theme->get_partial('card', [
                                'title' => $property->name,
                                'excerpt' => $property->excerpt,
                                'class' => 'block-sold-homes__card-slider__card',
                            ]); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
