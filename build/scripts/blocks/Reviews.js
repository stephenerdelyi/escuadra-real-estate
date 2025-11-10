import Slider from '../helpers/Slider';

class Reviews {
    constructor(root) {
        this.root = root;

        this.prev_btn = this.root.querySelector('.js-reviews-prev');
        this.next_btn = this.root.querySelector('.js-reviews-next');
        this.pagination_label = this.root.querySelector('.js-reviews-pagination-label');

        setTimeout(() => {
            this.slider = new Slider(this.root.querySelector('.js-reviews-slider'), {
                swiperOptions: {
                    slidesPerView: 1,
                    autoplay: false,
                    loop: false,
                    spaceBetween: 20
                },
                prev_btn: this.prev_btn,
                next_btn: this.next_btn,
                pagination_label: this.pagination_label
            });
        }, 500);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    var reviews_blocks = document.querySelectorAll('.js-reviews') ?? [];

    reviews_blocks.forEach((reviews_block) => {
        new Reviews(reviews_block);
    });
});
