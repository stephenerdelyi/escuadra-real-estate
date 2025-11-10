import Slider from '../helpers/Slider';

class TabbedContent {
    constructor(root) {
        this.root = root;

        this.prev_btn = this.root.querySelector('.js-tabbed-content-prev');
        this.next_btn = this.root.querySelector('.js-tabbed-content-next');
        this.buttons = this.root.querySelectorAll('.js-tabbed-content-button');

        this.buttons.forEach((button, index) => {
            button.addEventListener('click', (event) => {
                event.preventDefault();

                this.setActiveButton(index);

                if(this.image_slider) {
                    this.image_slider.swiper.slideTo(index);
                }
            });
        });

        setTimeout(() => {
            this.image_slider = new Slider(this.root.querySelector('.js-tabbed-content-image-slider'), {
                swiperOptions: {
                    slidesPerView: 1,
                    loop: false
                },
                prev_btn: this.prev_btn,
                next_btn: this.next_btn
            });

            this.text_slider = new Slider(this.root.querySelector('.js-tabbed-content-text-slider'), {
                swiperOptions: {
                    effect: "fade",
                    slidesPerView: 1,
                    autoplay: false,
                    loop: false
                }
            });

            this.image_slider.swiper.on('slideChange', () => {
                this.setActiveButton(this.image_slider.swiper.activeIndex);
                this.text_slider.swiper.slideTo(this.image_slider.swiper.activeIndex);
            });
        }, 500);
    }

    setActiveButton(index) {
        this.buttons.forEach((button, btn_index) => {
            button.classList.remove('--active');

            if(btn_index == index) {
                button.classList.add('--active');
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    var tabbed_content_blocks = document.querySelectorAll('.js-tabbed-content') ?? [];

    tabbed_content_blocks.forEach((tabbed_content_block) => {
        new TabbedContent(tabbed_content_block);
    });
});
