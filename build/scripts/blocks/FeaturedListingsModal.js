import Modal from '../helpers/Modal';
import GetData from '../helpers/GetData';
import Slider from '../helpers/Slider';

class FeaturedListingsModal {
    constructor(root) {
        this.root = root;

        this.scroll_container = root.querySelector('.js-featured-listings-modal-scroller');
        this.prev_btn = root.querySelector('.js-featured-listings-modal-prev');
        this.next_btn = root.querySelector('.js-featured-listings-modal-next');
        this.pagination_label = root.querySelector('.js-featured-listings-modal-pagination-label');

        this.fields = {
            image_slider: root.querySelector('.js-featured-listings-modal-image-slider'),
            image_container: root.querySelector('.js-featured-listings-modal-image-container'),
            price: root.querySelector('.js-featured-listings-modal-price'),
            name: root.querySelector('.js-featured-listings-modal-name'),
            bedrooms: root.querySelector('.js-featured-listings-modal-bedrooms'),
            bathrooms: root.querySelector('.js-featured-listings-modal-bathrooms'),
            sqft: root.querySelector('.js-featured-listings-modal-sqft'),
            wysiwyg: root.querySelector('.js-featured-listings-modal-wysiwyg')
        }

        this.modal = new Modal(this.root, (dataset) => {
            this.data = new GetData({
                endpoint: 'get-property/' + dataset.propertyId,
                callback: (data) => {
                    this.scroll_container.scrollTop = 0;
                    this.fields.name.innerHTML = data.name;

                    document.querySelector('.js-universal-modal-close').classList.add('--light');

                    if(data.gallery && data.gallery.length > 0) {
                        this.fields.image_slider.classList.remove('--hidden');
                        this.fields.image_container.innerHTML = '';
                        data.gallery.forEach((gallery_item) => {
                            this.fields.image_container.insertAdjacentHTML('beforeend', '<img class="modal-featured-listings__image-slider__slide swiper-slide" src="' + gallery_item.sizes.large + '" alt="' + gallery_item.alt + '"/>');
                        });

                        this.image_slider = new Slider(this.fields.image_slider, {
                            swiperOptions: {
                                slidesPerView: 1,
                                loop: false
                            },
                            prev_btn: this.prev_btn,
                            next_btn: this.next_btn,
                            pagination_label: this.pagination_label
                        });
                    } else {
                        this.fields.image_slider.classList.add('--hidden');
                    }

                    if(data.price && data.price != '$') {
                        this.fields.price.classList.remove('--hidden');
                        this.fields.price.innerHTML = data.price;
                    } else {
                        this.fields.price.classList.add('--hidden');
                    }

                    if(data.bedrooms) {
                        this.fields.bedrooms.parentElement.classList.remove('--hidden');
                        this.fields.bedrooms.innerHTML = data.bedrooms;
                    } else {
                        this.fields.bedrooms.parentElement.classList.add('--hidden');
                    }

                    if(data.bathrooms) {
                        this.fields.bathrooms.parentElement.classList.remove('--hidden');
                        this.fields.bathrooms.innerHTML = data.bathrooms;
                    } else {
                        this.fields.bathrooms.parentElement.classList.add('--hidden');
                    }

                    if(data.sqft) {
                        this.fields.sqft.parentElement.classList.remove('--hidden');
                        this.fields.sqft.innerHTML = data.sqft;
                    } else {
                        this.fields.sqft.parentElement.classList.add('--hidden');
                    }

                    if(!data.bedrooms && !data.bathrooms && !data.sqft) {
                        this.fields.bedrooms.parentElement.parentElement.classList.add('--hidden');
                    } else {
                        this.fields.bedrooms.parentElement.parentElement.classList.remove('--hidden');
                    }

                    if(data.content) {
                        this.fields.wysiwyg.classList.remove('--hidden');
                        this.fields.wysiwyg.innerHTML = data.content;
                    } else {
                        this.fields.wysiwyg.classList.add('--hidden');
                    }

                    this.root.classList.remove('--loading');
                }
            });
        }, (dataset) => {
            document.querySelector('.js-universal-modal-close').classList.remove('--light');
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    var featured_listings_modals = document.querySelectorAll('.js-featured-listings-modal') ?? [];

    featured_listings_modals.forEach((featured_listings_modal) => {
        new FeaturedListingsModal(featured_listings_modal);
    });
});
