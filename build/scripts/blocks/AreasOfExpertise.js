import Slider from '../helpers/Slider';

class AreasOfExpertise {
    constructor(root) {
        this.root = root;

        this.areas_container = this.root.querySelector('.js-areas-of-expertise-areas');
        this.areas = this.root.querySelectorAll('.js-areas-of-expertise-area');
        this.surrounding_areas = this.root.querySelector('.js-areas-of-expertise-surrounding');
        this.surrounding_text = this.root.querySelector('.js-areas-of-expertise-surrounding-text');

        this.surrounding_areas.addEventListener('mouseover', (event) => {
            if(this.surrounding_text) {
                this.surrounding_text.classList.add('--active');
            }
        });

        this.surrounding_areas.addEventListener('mouseout', (event) => {
            if(this.surrounding_text) {
                this.surrounding_text.classList.remove('--active');
            }
        });

        this.areas_container.addEventListener('mouseout', (event) => {
            this.areas.forEach((inner_area) => {
                inner_area.classList.remove('--inactive');
            });

            if(this.primary_slider?.swiper) {
                this.primary_slider.swiper.slideTo(0);
            }

            if(this.secondary_slider?.swiper) {
                this.secondary_slider.swiper.slideTo(0);
            }
        });

        this.areas.forEach((area) => {
            area.addEventListener('mouseover', (event) => {
                this.areas.forEach((inner_area) => {
                    if(inner_area == event.target) {
                        inner_area.classList.remove('--inactive');
                    } else {
                        inner_area.classList.add('--inactive');
                    }
                });

                if(this.primary_slider?.swiper) {
                    this.primary_slider.swiper.slideTo(event.target.dataset.slideId);
                }

                if(this.secondary_slider?.swiper) {
                    this.secondary_slider.swiper.slideTo(event.target.dataset.slideId);
                }
            });
        });

        setTimeout(() => {
            this.primary_slider = new Slider(this.root.querySelector('.js-areas-of-expertise-primary-slider'), {
                swiperOptions: {
                    effect: "fade",
                    slidesPerView: 1,
                    autoplay: false,
                    loop: false
                }
            });

            this.secondary_slider = new Slider(this.root.querySelector('.js-areas-of-expertise-secondary-slider'), {
                swiperOptions: {
                    effect: "fade",
                    slidesPerView: 1,
                    autoplay: false,
                    loop: false
                }
            });
        }, 500);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    var areas_of_expertise_blocks = document.querySelectorAll('.js-areas-of-expertise') ?? [];

    areas_of_expertise_blocks.forEach((areas_of_expertise_block) => {
        new AreasOfExpertise(areas_of_expertise_block);
    });
});
