<?php
    global $the_theme;
?>
<div class="modal-featured-listings js-featured-listings-modal --loading" data-modal-name="featured-listings">
    <div class="modal-featured-listings__container js-featured-listings-modal-scroller">
        <div class="modal-featured-listings__image-slider js-featured-listings-modal-image-slider">
            <div class="modal-featured-listings__image-slider__container swiper-container">
                <div class="modal-featured-listings__image-slider__wrapper swiper-wrapper js-featured-listings-modal-image-container"></div>
            </div>
            <?php $the_theme->get_partial('pagination', [
                'class' => 'modal-featured-listings__pagination',
                'js-class' => 'js-featured-listings-modal',
                'type' => 'left-right',
                'label' => 'left'
            ]); ?>
        </div>
        <div class="modal-featured-listings__main">
            <div class="modal-featured-listings__intro-container">
                <p class="modal-featured-listings__tag js-featured-listings-modal-price"></p>
                <p class="modal-featured-listings__name js-featured-listings-modal-name"></p>
                <div class="modal-featured-listings__stats">
                    <div class="modal-featured-listings__stat --bed">
                        <p class="modal-featured-listings__stat__title js-featured-listings-modal-bedrooms"></p>
                        <p class="modal-featured-listings__stat__description">Bedrooms</p>
                    </div>
                    <div class="modal-featured-listings__stat --bath">
                        <p class="modal-featured-listings__stat__title js-featured-listings-modal-bathrooms"></p>
                        <p class="modal-featured-listings__stat__description">Bathrooms</p>
                    </div>
                    <div class="modal-featured-listings__stat --sq-ft">
                        <p class="modal-featured-listings__stat__title js-featured-listings-modal-sqft"></p>
                        <p class="modal-featured-listings__stat__description">Square Feet</p>
                    </div>
                </div>
            </div>
            <div class="modal-featured-listings__wysiwyg js-featured-listings-modal-wysiwyg"></div>
        </div>
    </div>
</div>
