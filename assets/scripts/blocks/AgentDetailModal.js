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
parcelRegister("gcB2O", function(module, exports) {

$parcel$export(module.exports, "default", () => $bcba808b60b7aa5a$export$2e2bcd8739ae039);

var $7OkjH = parcelRequire("7OkjH");
class $bcba808b60b7aa5a$export$2e2bcd8739ae039 {
    constructor(root, before_open, after_close, options = null){
        this.root = root;
        this.before_open = before_open;
        this.after_close = after_close;
        this.modal_name = this.root.dataset.modalName;
        this.modal_container = document.querySelector('.js-modal-container');
        this.options = options;
        this.params = new (0, $7OkjH.default)();
        this.setupExistingModals();
        this.convertLinks();
        this.open_buttons = document.querySelectorAll('.js-modal-open[data-modal-name="' + this.modal_name + '"]');
        this.close_buttons = this.root.parentElement.querySelectorAll('.js-modal-close');
        this.main_close_button = this.root.parentElement.querySelector('.js-universal-modal-close');
        this.open_buttons.forEach((open_button)=>{
            open_button.addEventListener('click', (e)=>{
                e.preventDefault();
                this.open(e);
            });
        });
        this.close_buttons.forEach((close_button)=>{
            close_button.addEventListener('click', (e)=>{
                e.preventDefault();
                this.close(e);
            });
        });
        if (this.params.get('m') == this.modal_name) this.open();
    }
    open(e) {
        this.closeAllModals();
        if (this.options?.show_close && this.options.show_close == false) this.main_close_button.classList.add('--hidden');
        else this.main_close_button.classList.remove('--hidden');
        if (this.before_open) this.before_open(e?.target?.dataset);
        this.root.classList.add('--active');
        this.modal_container.classList.add('--active');
    }
    close(e) {
        this.root.classList.remove('--active');
        this.modal_container.classList.remove('--active');
        if (this.after_close) this.after_close(e?.target?.dataset);
        if (e) setTimeout(()=>{
            this.root.classList.add('--loading');
        }, 500);
    }
    convertLinks() {
        var open_links = document.querySelectorAll('a[href="#modal-' + this.modal_name + '"]');
        open_links.forEach((open_link)=>{
            open_link.classList.add('js-modal-open');
            open_link.dataset.modalName = this.modal_name;
        });
    }
    closeAllModals() {
        window.modals.forEach((modal)=>{
            modal.close();
        });
    }
    openAnotherModal(modal_name) {
        window.modals.forEach((modal)=>{
            if (modal.modal_name == modal_name) modal.open();
        });
    }
    getModal(modal_name) {
        var return_modal = null;
        window.modals.forEach((modal)=>{
            if (modal.modal_name == modal_name) return_modal = modal;
        });
        return return_modal;
    }
    setupExistingModals() {
        if (!window.modals) window.modals = [];
        window.modals.push(this);
    }
}

});
parcelRegister("7OkjH", function(module, exports) {

$parcel$export(module.exports, "default", () => $5afcf65fa74473df$export$2e2bcd8739ae039);
class $5afcf65fa74473df$export$2e2bcd8739ae039 {
    constructor(){
        this.url = new URLSearchParams(window.location.search);
    }
    add(name, value) {
        this.url.append(name, value);
        this.updateUrl();
    }
    // Set will add if it does not exist, or update if it does
    set(name, value) {
        this.url.set(name, value);
        this.updateUrl();
    }
    remove(name) {
        this.url.delete(name);
        this.updateUrl();
    }
    get(name) {
        return this.url.get(name);
    }
    clear() {
        this.url = new URLSearchParams();
        this.updateUrl();
    }
    updateUrl() {
        if (this.url.toString()) window.history.pushState(null, null, '?' + this.url.toString());
        else window.history.pushState(null, null, window.location.pathname);
    }
}

});


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


var $gcB2O = parcelRequire("gcB2O");

var $epH6w = parcelRequire("epH6w");
class $a27ce2e3cfe8f0d8$var$AgentDetailModal {
    constructor(root){
        this.root = root;
        this.scroll_container = root.querySelector('.js-agent-detail-modal-scroller');
        this.fields = {
            name: root.querySelector('.js-agent-detail-modal-name'),
            accounts: root.querySelector('.js-agent-detail-modal-accounts'),
            email: root.querySelector('.js-agent-detail-modal-email'),
            phone: root.querySelector('.js-agent-detail-modal-phone'),
            bio: root.querySelector('.js-agent-detail-modal-bio'),
            license: root.querySelector('.js-agent-detail-modal-license'),
            service_areas: root.querySelector('.js-agent-detail-modal-areas'),
            specialties: root.querySelector('.js-agent-detail-modal-specialties')
        };
        this.modal = new (0, $gcB2O.default)(this.root, (dataset)=>{
            this.data = new (0, $epH6w.default)({
                endpoint: 'get-agent/' + dataset.agentId,
                callback: (data)=>{
                    this.scroll_container.scrollTop = 0;
                    this.fields.name.innerHTML = data.name;
                    if (data.email) {
                        this.fields.email.parentElement.classList.remove('--hidden');
                        this.fields.email.innerHTML = data.email;
                        this.fields.email.setAttribute('href', 'mailto:' + data.email);
                    } else this.fields.email.parentElement.classList.add('--hidden');
                    if (data.phone) {
                        this.fields.phone.parentElement.classList.remove('--hidden');
                        this.fields.phone.innerHTML = data.phone.formatted;
                        this.fields.phone.setAttribute('href', data.phone.url);
                    } else this.fields.phone.parentElement.classList.add('--hidden');
                    if (data.license) {
                        this.fields.license.parentElement.classList.remove('--hidden');
                        this.fields.license.innerHTML = data.license;
                    } else this.fields.license.parentElement.classList.add('--hidden');
                    if (data.license) {
                        this.fields.license.parentElement.classList.remove('--hidden');
                        this.fields.license.innerHTML = data.license;
                    } else this.fields.license.parentElement.classList.add('--hidden');
                    if (data.service_areas && data.service_areas.length > 0) {
                        this.fields.service_areas.parentElement.classList.remove('--hidden');
                        this.fields.service_areas.innerHTML = data.service_areas.join(', ');
                    } else this.fields.service_areas.parentElement.classList.add('--hidden');
                    if (data.specialties && data.specialties.length > 0) {
                        this.fields.specialties.parentElement.classList.remove('--hidden');
                        this.fields.specialties.innerHTML = data.specialties.join(', ');
                    } else this.fields.specialties.parentElement.classList.add('--hidden');
                    if (data.bio) {
                        this.fields.bio.classList.remove('--hidden');
                        this.fields.bio.innerHTML = data.bio;
                    } else this.fields.bio.classList.add('--hidden');
                    this.fields.accounts.innerHTML = '';
                    data.social_accounts.forEach((account)=>{
                        this.fields.accounts.insertAdjacentHTML('beforeend', this.makeSocialAccount(account));
                    });
                    this.root.classList.remove('--loading');
                }
            });
        });
    }
    makeSocialAccount(account) {
        return `<a class="modal-agent-detail__accounts__link" href="${account.url}" target="_blank"><img class="modal-agent-detail__accounts__icon" src="${window.theme.variables.build_url}/svgs/${account.type}.svg"/></a>`;
    }
}
document.addEventListener('DOMContentLoaded', ()=>{
    var agent_detail_modals = document.querySelectorAll('.js-agent-detail-modal') ?? [];
    agent_detail_modals.forEach((agent_detail_modal)=>{
        new $a27ce2e3cfe8f0d8$var$AgentDetailModal(agent_detail_modal);
    });
});

})();
//# sourceMappingURL=AgentDetailModal.js.map
