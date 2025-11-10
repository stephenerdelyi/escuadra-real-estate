import Slider from '../helpers/Slider';

class FeaturedListings {
    constructor(root) {
        this.root = root;

        this.prev_btn = this.root.querySelector('.js-featured-listings-prev');
        this.next_btn = this.root.querySelector('.js-featured-listings-next');
        this.pagination_label = this.root.querySelector('.js-featured-listings-pagination-label');

        setTimeout(() => {
            this.card_slider = new Slider(this.root.querySelector('.js-featured-listings-card-slider'), {
                swiperOptions: {
                    slidesPerView: 1,
                    loop: false
                },
                prev_btn: this.prev_btn,
                next_btn: this.next_btn,
                pagination_label: this.pagination_label
            });

            this.image_slider = new Slider(this.root.querySelector('.js-featured-listings-image-slider'), {
                swiperOptions: {
                    effect: "fade",
                    slidesPerView: 1,
                    autoplay: false,
                    loop: false
                }
            });

            this.secondary_slider = new Slider(this.root.querySelector('.js-featured-listings-secondary-slider'), {
                swiperOptions: {
                    effect: "fade",
                    slidesPerView: 1,
                    autoplay: false,
                    loop: false
                }
            });

            this.tertiary_slider = new Slider(this.root.querySelector('.js-featured-listings-tertiary-slider'), {
                swiperOptions: {
                    effect: "fade",
                    slidesPerView: 1,
                    autoplay: false,
                    loop: false
                }
            });

            this.details_slider = new Slider(this.root.querySelector('.js-featured-listings-details-slider'), {
                swiperOptions: {
                    effect: "fade",
                    slidesPerView: 1,
                    autoplay: false,
                    loop: false
                }
            });

            this.card_slider.swiper.on('slideChange', () => {
                this.image_slider.swiper.slideTo(this.card_slider.swiper.activeIndex);

                if(this.details_slider.swiper) {
                    this.details_slider.swiper.slideTo(this.card_slider.swiper.activeIndex);
                }

                if(this.secondary_slider.swiper) {
                    setTimeout(() => {
                        this.secondary_slider.swiper.slideTo(this.card_slider.swiper.activeIndex);
                    }, 150);
                }

                if(this.tertiary_slider.swiper) {
                    setTimeout(() => {
                        this.tertiary_slider.swiper.slideTo(this.card_slider.swiper.activeIndex);
                    }, 300);
                }
            });
        }, 500);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    var featured_listing_blocks = document.querySelectorAll('.js-featured-listings') ?? [];

    featured_listing_blocks.forEach((featured_listing_block) => {
        new FeaturedListings(featured_listing_block);
    });
});
