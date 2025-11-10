import Slider from '../helpers/Slider';

class Developments {
    constructor(root) {
        this.root = root;

        this.prev_btn = this.root.querySelector('.js-developments-prev');
        this.next_btn = this.root.querySelector('.js-developments-next');
        this.pagination_label = this.root.querySelector('.js-developments-pagination-label');

        setTimeout(() => {
            this.card_slider = new Slider(this.root.querySelector('.js-developments-card-slider'), {
                swiperOptions: {
                    slidesPerView: 1,
                    //autoplay: false,
                    loop: false
                },
                prev_btn: this.prev_btn,
                next_btn: this.next_btn,
                pagination_label: this.pagination_label
            });

            this.main_slider = new Slider(document.querySelector('.js-developments-main-slider'), {
                swiperOptions: {
                    effect: "fade",
                    slidesPerView: 1,
                    autoplay: false,
                    loop: false
                }
            });

            this.secondary_slider = new Slider(document.querySelector('.js-developments-secondary-slider'), {
                swiperOptions: {
                    effect: "fade",
                    slidesPerView: 1,
                    autoplay: false,
                    loop: false
                }
            });

            this.tertiary_slider = new Slider(document.querySelector('.js-developments-tertiary-slider'), {
                swiperOptions: {
                    effect: "fade",
                    slidesPerView: 1,
                    autoplay: false,
                    loop: false
                }
            });

            this.card_slider.swiper.on('slideChange', () => {
                this.main_slider.swiper.slideTo(this.card_slider.swiper.activeIndex);

                setTimeout(() => {
                    this.secondary_slider.swiper.slideTo(this.card_slider.swiper.activeIndex);
                }, 150);

                setTimeout(() => {
                    this.tertiary_slider.swiper.slideTo(this.card_slider.swiper.activeIndex);
                }, 300);
            });
        }, 500);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    var developments_blocks = document.querySelectorAll('.js-developments') ?? [];

    developments_blocks.forEach((developments_block) => {
        new Developments(developments_block);
    });
});
