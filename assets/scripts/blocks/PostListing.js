(() => {

function $parcel$export(e, n, v, s) {
  Object.defineProperty(e, n, {get: v, set: s, enumerable: true, configurable: true});
}

      var $parcel$global = globalThis;
    
var $parcel$modules = {};
var $parcel$inits = {};

var parcelRequire = $parcel$global["parcelRequire4037"];

if (parcelRequire == null) {
  parcelRequire = function(id) {
    if (id in $parcel$modules) {
      return $parcel$modules[id].exports;
    }
    if (id in $parcel$inits) {
      var init = $parcel$inits[id];
      delete $parcel$inits[id];
      var module = {id: id, exports: {}};
      $parcel$modules[id] = module;
      init.call(module.exports, module, module.exports);
      return module.exports;
    }
    var err = new Error("Cannot find module '" + id + "'");
    err.code = 'MODULE_NOT_FOUND';
    throw err;
  };

  parcelRequire.register = function register(id, init) {
    $parcel$inits[id] = init;
  };

  $parcel$global["parcelRequire4037"] = parcelRequire;
}

var parcelRegister = parcelRequire.register;
parcelRegister("epH6w", function(module, exports) {

$parcel$export(module.exports, "default", () => $a7e4d613c8fccdd8$export$2e2bcd8739ae039);
class $a7e4d613c8fccdd8$export$2e2bcd8739ae039 {
    constructor(args){
        this.args = args;
        this.showLoader();
        this.disableButton();
        if (!this.args.ajax_overrides) this.args.ajax_overrides = {};
        jQuery.ajax({
            url: window.theme.variables.rest_url + window.theme.variables.rest_namespace + '/' + this.args.endpoint,
            data: {
                query_args: this.args.query_args
            },
            success: (response)=>{
                this.reset();
                if (response.status == 'success') this.args.callback(response.data);
                else {
                    console.warn('Error from server while retrieving data.');
                    this.args.callback(null);
                }
            },
            error: (response)=>{
                this.reset();
                console.warn('There was a general error trying to retrieve the results');
                this.args.callback(null);
            },
            ...this.args.ajax_overrides
        });
    }
    reset() {
        this.hideLoader();
        this.enableButton();
    }
    disableButton() {
        if (this.args.button) {
            this.args.button.style.opacity = 0.5;
            this.args.button.style.pointerEvents = 'none';
        }
    }
    enableButton() {
        if (this.args.button) {
            this.args.button.style.opacity = 1;
            this.args.button.style.pointerEvents = 'all';
        }
    }
    showLoader() {
        if (this.args.loading) this.args.loading.classList.remove('--loading');
    }
    hideLoader() {
        if (this.args.loading) this.args.loading.classList.add('--loading');
    }
}

});


var $epH6w = parcelRequire("epH6w");
class $76bcd97c4974b2e1$var$PostListing {
    constructor(root){
        this.root = root;
        this.item_container = root.querySelector('.js-post-listing-results');
        this.load_button = root.querySelector('.js-post-listing-more');
        this.offset = this.item_container.children.length;
        this.load_button.addEventListener('click', (e)=>{
            e.preventDefault();
            this.getMoreItems();
        });
        console.log(this.offset);
    }
    getMoreItems() {
        this.data = new (0, $epH6w.default)({
            endpoint: 'get-posts/' + this.offset,
            callback: (data)=>{
                data.results?.forEach((post)=>{
                    this.item_container.insertAdjacentHTML('beforeend', this.makePostItem(post));
                });
                if (data.num_results == this.item_container.children.length) this.load_button.parentElement.remove();
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
        if (post.excerpt) result = `<p class="block-post-listing__text">${post.excerpt}</p>`;
        return result;
    }
    makePostItemMeta(post) {
        let result = '';
        if (post.linked_agent) result = `<p class="block-post-listing__text --meta">Posted ${post.post_date} by ${post.linked_agent.name}</p>`;
        else result = `<p class="block-post-listing__text --meta">Posted ${post.post_date}</p>`;
        return result;
    }
}
document.addEventListener('DOMContentLoaded', ()=>{
    var post_listing = document.querySelector('.js-post-listing');
    if (post_listing) new $76bcd97c4974b2e1$var$PostListing(post_listing);
});

})();
//# sourceMappingURL=PostListing.js.map
