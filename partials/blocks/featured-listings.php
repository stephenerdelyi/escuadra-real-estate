<?php
    global $the_theme;

    $the_theme->register_modal('featured-listings');

    $label = get_field('featured_listings_label');
    $property_type = get_field('featured_listings_property_type');
    $allow_learn_more = get_field('featured_listings_learn_more');
    $order = get_field('featured_listings_order');
    $show_prices = get_field('featured_listings_show_price');
    $show_details = get_field('featured_listings_show_details');
    $properties = [];
    $tax_query = [];

    if(!empty($property_type)) {
        $tax_query[] = [
            'taxonomy' => 'property-types',
            'field' => 'id',
            'terms' => $property_type
        ];
    }

    if($order == 'price') {
        $properties = get_data('properties', 'get_property', [
            'tax_query' => $tax_query,
            'order' => 'DESC',
            'orderby' => 'meta_value_num',
            'meta_key' => 'property_price'
        ]);
    } else if($order == 'recent') {
        $properties = get_data('properties', 'get_property', [
            'tax_query' => $tax_query
        ]);
    } else if($order == 'manual') {
        $properties = get_data('properties', 'get_property', [
            'post_ids' => get_field('featured_listings_manual')
        ]);
    }
?>
<div class="block-featured-listings__container js-featured-listings <?= ($show_details == true ? '--details' : null) ?>">
    <div class="block-featured-listings__left">
        <?php $the_theme->get_partial('pagination', [
            'class' => 'block-featured-listings__pagination',
            'js-class' => 'js-featured-listings',
            'type' => 'left-right',
            'label' => 'left'
        ]); ?>
        <div class="block-featured-listings__card-slider js-featured-listings-card-slider">
            <div class="block-featured-listings__card-slider__container swiper-container">
                <div class="block-featured-listings__card-slider__wrapper swiper-wrapper">
                    <?php foreach($properties->results as $property) : ?>
                        <div class="block-featured-listings__card-slider__slide swiper-slide">
                            <?php $the_theme->get_partial('card', [
                                'label' => ($show_prices == true && $property->price != '$' ? $property->price : null),
                                'title' => $property->name,
                                'excerpt' => $property->excerpt,
                                'cta' => ($allow_learn_more == true ? [
                                    'url' => '#',
                                    'title' => 'Learn More',
                                    'modal' => 'featured-listings',
                                    'data' => ['property-id' => $property->id]
                                ] : null),
                                'class' => 'block-featured-listings__card-slider__card',
                            ]); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="block-featured-listings__right">
        <div class="block-featured-listings__image-slider">
            <div class="block-featured-listings__image-slider__inner js-featured-listings-image-slider">
                <div class="block-featured-listings__image-slider__container swiper-container">
                    <div class="block-featured-listings__image-slider__wrapper swiper-wrapper">
                        <?php foreach($properties->results as $property) : ?>
                            <img class="block-featured-listings__image-slider__img swiper-slide" src="<?= $property->gallery[0]->url ?>" alt="<?= $property->gallery[0]->alt ?>"/>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php if(!empty($label)) : ?>
                    <div class="block-featured-listings__image-slider__label-container">
                        <p class="block-featured-listings__image-slider__label"><?= $label ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if($show_details == true) : ?>
            <div class="block-featured-listings__details-slider js-featured-listings-details-slider">
                <div class="block-featured-listings__details-slider__container swiper-container">
                    <div class="block-featured-listings__details-slider__wrapper swiper-wrapper">
                        <?php foreach($properties->results as $property) : ?>
                            <div class="block-featured-listings__details-slider__slide swiper-slide">
                                <?php if(!empty($property->location)) : ?>
                                    <p class="block-featured-listings__details-slider__slide__title"><?= $property->location ?></p>
                                <?php endif; ?>
                                <div class="block-featured-listings__details-slider__slide__stats">
                                    <?php if(!empty($property->bedrooms)) : ?>
                                        <div class="block-featured-listings__details-slider__slide__stat --bed">
                                            <p class="block-featured-listings__details-slider__slide__stat__title"><?= $property->bedrooms ?></p>
                                            <p class="block-featured-listings__details-slider__slide__stat__description">Bedrooms</p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($property->bathrooms)) : ?>
                                        <div class="block-featured-listings__details-slider__slide__stat --bath">
                                            <p class="block-featured-listings__details-slider__slide__stat__title"><?= $property->bathrooms ?></p>
                                            <p class="block-featured-listings__details-slider__slide__stat__description">Bathrooms</p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($property->sqft)) : ?>
                                        <div class="block-featured-listings__details-slider__slide__stat --sq-ft">
                                            <p class="block-featured-listings__details-slider__slide__stat__title"><?= $property->sqft ?></p>
                                            <p class="block-featured-listings__details-slider__slide__stat__description">Square Feet</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="block-featured-listings__secondary-image-slider">
                <div class="block-featured-listings__secondary-image-slider__secondary js-featured-listings-secondary-slider">
                    <div class="block-featured-listings__secondary-image-slider__secondary__container swiper-container">
                        <div class="block-featured-listings__secondary-image-slider__secondary__wrapper swiper-wrapper">
                            <?php foreach($properties->results as $property) : ?>
                                <?php if(isset($property->gallery[1])) : ?>
                                    <img class="block-featured-listings__secondary-image-slider__secondary__img swiper-slide" src="<?= $property->gallery[1]->url ?>" alt="<?= $property->gallery[0]->alt ?>"/>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="block-featured-listings__secondary-image-slider__tertiary js-featured-listings-tertiary-slider">
                    <div class="block-featured-listings__secondary-image-slider__tertiary__container swiper-container">
                        <div class="block-featured-listings__secondary-image-slider__tertiary__wrapper swiper-wrapper">
                            <?php foreach($properties->results as $property) : ?>
                                <?php if(isset($property->gallery[2])) : ?>
                                    <img class="block-featured-listings__secondary-image-slider__tertiary__img swiper-slide" src="<?= $property->gallery[2]->url ?>" alt="<?= $property->gallery[2]->alt ?>"/>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
