export default class GetData {
    constructor(args) {
        this.args = args;

        this.showLoader();
        this.disableButton();

        if(!this.args.ajax_overrides) {
            this.args.ajax_overrides = {};
        }

        jQuery.ajax({
            url: window.theme.variables.rest_url + window.theme.variables.rest_namespace + '/' + this.args.endpoint,
            data: { query_args: this.args.query_args },
            success: (response) => {
                this.reset();

                if(response.status == 'success') {
                    this.args.callback(response.data);
                } else {
                    console.warn('Error from server while retrieving data.');
                    this.args.callback(null);
                }
            },
            error: (response) => {
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
        if(this.args.button) {
            this.args.button.style.opacity = 0.5;
            this.args.button.style.pointerEvents = 'none';
        }
    }

    enableButton() {
        if(this.args.button) {
            this.args.button.style.opacity = 1;
            this.args.button.style.pointerEvents = 'all';
        }
    }

    showLoader() {
        if(this.args.loading) {
            this.args.loading.classList.remove('--loading');
        }
    }

    hideLoader() {
        if(this.args.loading) {
            this.args.loading.classList.add('--loading');
        }
    }
}
