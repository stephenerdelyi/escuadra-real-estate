<?php
    global $the_theme;

    $reviews = get_field('reviews');
    shuffle($reviews);
?>
<div class="block-reviews__container js-reviews">
    <div class="block-reviews__slider js-reviews-slider">
        <h2 class="block-reviews__title">Reviews</h2>
        <div class="block-reviews__slider__container swiper-container">
            <?php $the_theme->get_partial('pagination', [
                'class' => 'block-reviews__slider__pagination',
                'js-class' => 'js-reviews',
                'type' => 'left-right',
                'label' => 'left'
            ]); ?>
            <div class="block-reviews__slider__wrapper swiper-wrapper">
                <?php foreach($reviews as $review) : ?>
                    <div class="block-reviews__slider__slide swiper-slide">
                        <div class="block-reviews__slider__slide__card --light">
                            <p class="block-reviews__slider__quote"><?= $review['quote'] ?></p>
                            <?php if(!empty($review['quotee'])) : ?>
                                <p class="block-reviews__slider__quotee">— <?= $review['quotee'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
