import GetData from '../helpers/GetData';

class PostListing {
    constructor(root) {
        this.root = root;

        this.item_container = root.querySelector('.js-post-listing-results');
        this.load_button = root.querySelector('.js-post-listing-more');
        this.offset = this.item_container.children.length;

        this.load_button.addEventListener('click', (e) => {
            e.preventDefault();
            this.getMoreItems();
        });

        console.log(this.offset);
    }

    getMoreItems() {
        this.data = new GetData({
            endpoint: 'get-posts/' + this.offset,
            callback: (data) => {
                data.results?.forEach((post) => {
                    this.item_container.insertAdjacentHTML('beforeend', this.makePostItem(post));
                });

                if(data.num_results == this.item_container.children.length) {
                    this.load_button.parentElement.remove();
                }

                this.offset = this.item_container.children.length;
                console.log(this.offset);
            }
        });
    }

    makePostItem(post) {
        return `
            <a class="block-post-listing__post-item" href="${post.url}">
                <div class="block-post-listing__image">
                    <img class="block-post-listing__image__img" src="${post.image.url}" alt="${post.title}"/>
                </div>
                <div class="block-post-listing__info">
                    <h2 class="block-post-listing__title">${post.title}</h2>
                    ${this.makePostItemExcerpt(post)}
                    ${this.makePostItemMeta(post)}
                </div>
            </a>
        `;
    }

    makePostItemExcerpt(post) {
        let result = '';

        if(post.excerpt) {
            result = `<p class="block-post-listing__text">${post.excerpt}</p>`;
        }

        return result;
    }

    makePostItemMeta(post) {
        let result = '';

        if(post.linked_agent) {
            result = `<p class="block-post-listing__text --meta">Posted ${post.post_date} by ${post.linked_agent.name}</p>`;
        } else {
            result = `<p class="block-post-listing__text --meta">Posted ${post.post_date}</p>`;
        }

        return result;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    var post_listing = document.querySelector('.js-post-listing');

    if(post_listing) {
        new PostListing(post_listing);
    }
});
