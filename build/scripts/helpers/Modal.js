import Params from './Params';

export default class Modal {
    constructor(root, before_open, after_close, options = null) {
        this.root = root;
        this.before_open = before_open;
        this.after_close = after_close;
        this.modal_name = this.root.dataset.modalName;
        this.modal_container = document.querySelector('.js-modal-container');
        this.options = options;
        this.params = new Params();

        this.setupExistingModals();
        this.convertLinks();

        this.open_buttons = document.querySelectorAll('.js-modal-open[data-modal-name="' + this.modal_name + '"]');
        this.close_buttons = this.root.parentElement.querySelectorAll('.js-modal-close');
        this.main_close_button = this.root.parentElement.querySelector('.js-universal-modal-close');

        this.open_buttons.forEach((open_button) => {
            open_button.addEventListener('click', (e) => {
                e.preventDefault();

                this.open(e);
            });
        });

        this.close_buttons.forEach((close_button) => {
            close_button.addEventListener('click', (e) => {
                e.preventDefault();

                this.close(e);
            });
        });

        if(this.params.get('m') == this.modal_name) {
            this.open();
        }
    }

    open(e) {
        this.closeAllModals();

        if(this.options?.show_close && this.options.show_close == false) {
            this.main_close_button.classList.add('--hidden');
        } else {
            this.main_close_button.classList.remove('--hidden');
        }

        if(this.before_open) {
            this.before_open(e?.target?.dataset);
        }

        this.root.classList.add('--active');
        this.modal_container.classList.add('--active');
    }

    close(e) {
        this.root.classList.remove('--active');
        this.modal_container.classList.remove('--active');

        if(this.after_close) {
            this.after_close(e?.target?.dataset);
        }

        if(e) {
            setTimeout(() => {
                this.root.classList.add('--loading')
            }, 500);
        }
    }

    convertLinks() {
        var open_links = document.querySelectorAll('a[href="#modal-' + this.modal_name + '"]');

        open_links.forEach((open_link) => {
            open_link.classList.add('js-modal-open');
            open_link.dataset.modalName = this.modal_name;
        });
    }

    closeAllModals() {
        window.modals.forEach((modal) => {
            modal.close();
        });
    }

    openAnotherModal(modal_name) {
        window.modals.forEach((modal) => {
            if(modal.modal_name == modal_name) {
                modal.open();
            }
        });
    }

    getModal(modal_name) {
        var return_modal = null;
        window.modals.forEach((modal) => {
            if(modal.modal_name == modal_name) {
                return_modal = modal;
            }
        });

        return return_modal;
    }

    setupExistingModals() {
        if(!window.modals) {
            window.modals = [];
        }

        window.modals.push(this);
    }
}
