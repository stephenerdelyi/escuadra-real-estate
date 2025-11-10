import Swiper from 'swiper/bundle';

export default class Slider {
    constructor(root, options = {}) {
        this.root = root;

        if(!this.root) {
            return;
        }

        this.container = this.root.querySelector('.swiper-container');
        this.wrapper = this.root.querySelector('.swiper-wrapper');
        this.slides = this.root.querySelectorAll('.swiper-slide');
        this.next_btn = options.next_btn ?? this.root.querySelector('.js-button-next');
        this.prev_btn = options.prev_btn ?? this.root.querySelector('.js-button-prev');
        this.pagination_label = options.pagination_label;
        this.swiperOptions = options.swiperOptions;

        if(!this.next_btn && !this.prev_btn) {
            this.next_btn = this.root.parentElement.querySelector('.js-button-next');
            this.prev_btn = this.root.parentElement.querySelector('.js-button-prev');
        }

        //do not enable slider functionality if there's only one slide
        if(this.slides.length <= 1) {
            if(this.next_btn) {
                this.next_btn.classList.add('--hidden');
            }

            if(this.prev_btn) {
                this.prev_btn.classList.add('--hidden');
            }

            return;
        }

        if(!options.swiperOptions) {
            options.swiperOptions = {};
        }

        this.swiper = new Swiper(this.container, {
            loop: true,
            autoplay: {
                delay: 5000,
                pauseOnMouseEnter: true,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: this.next_btn,
                prevEl: this.prev_btn,
            },
            ...options.swiperOptions
        });

        if(this.pagination_label || (this.next_btn && this.prev_btn)) {
            this.updatePagination();

            this.swiper.on('slideChange', () => {
                this.updatePagination();
            });
        }

        if(options.hideArrows && options.hideArrows == true) {
            this.root.addEventListener('mouseenter', (event) => {
                this.next_btn.classList.remove('--hidden');
                this.prev_btn.classList.remove('--hidden');
            });

            this.root.addEventListener('mouseleave', () => {
                this.next_btn.classList.add('--hidden');
                this.prev_btn.classList.add('--hidden');
            });
        }
    }

    updatePagination() {
        let slide_num = this.swiper.activeIndex + 1;
        let total_slides = this.swiper.slides.length;

        if(this.pagination_label) {
            this.pagination_label.innerHTML = slide_num + ' of ' + total_slides;
        }

        if(this.swiperOptions.loop == false) {
            if(slide_num == 1) {
                this.prev_btn.classList.add('--disabled');
            } else {
                this.prev_btn.classList.remove('--disabled');
            }

            if(slide_num == total_slides) {
                this.next_btn.classList.add('--disabled');
            } else {
                this.next_btn.classList.remove('--disabled');
            }
        }
    }
}
