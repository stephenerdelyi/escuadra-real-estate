import Slider from '../helpers/Slider';

class SoldHomes {
    constructor(root) {
        this.root = root;

        this.prev_btn = this.root.querySelector('.js-sold-homes-prev');
        this.next_btn = this.root.querySelector('.js-sold-homes-next');
        this.pagination_label = this.root.querySelector('.js-sold-homes-pagination-label');

        setTimeout(() => {
            this.card_slider = new Slider(this.root.querySelector('.js-sold-homes-card-slider'), {
                swiperOptions: {
                    slidesPerView: 1,
                    loop: false
                },
                prev_btn: this.prev_btn,
                next_btn: this.next_btn,
                pagination_label: this.pagination_label
            });

            this.image_slider = new Slider(this.root.querySelector('.js-sold-homes-image-slider'), {
                swiperOptions: {
                    effect: "fade",
                    slidesPerView: 1,
                    autoplay: false,
                    loop: false
                }
            });

            if(this.card_slider.swiper) {
                this.card_slider.swiper.on('slideChange', () => {
                    this.image_slider.swiper.slideTo(this.card_slider.swiper.activeIndex);
                });
            }
        }, 500);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    var sold_homes_blocks = document.querySelectorAll('.js-sold-homes') ?? [];

    sold_homes_blocks.forEach((sold_homes_block) => {
        new SoldHomes(sold_homes_block);
    });
});
