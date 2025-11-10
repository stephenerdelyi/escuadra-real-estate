export default class Navigation {
    constructor(root) {
        this.root = root;
        this.last_scrolltop = window.scrollY;
        this.mobile_toggle = this.root.querySelector('.js-navigation-mobile');

        document.addEventListener('scroll', () => { this.scrolling(window.scrollY) });

        this.mobile_toggle.addEventListener('click', (event) => {
            event.preventDefault();

            if(this.root.classList.contains('--active')) {
                this.root.classList.remove('--active');
            } else {
                this.root.classList.add('--active');
            }
        });

        //show correct nav on page load
        this.scrolling(window.scrollY, true);
    }

    scrolling(position, initial_load = false) {
        this.root.classList.remove('--active');

        if(position > 100) {
            document.body.classList.add('--nav-scrolled');
        } else {
            document.body.classList.remove('--nav-scrolled');
        }

        if(this.last_scrolltop > position) {
            //scrolling up
            document.body.classList.remove('--nav-hidden');
        } else if(position > 250 && !initial_load) {
            //scrolling down
            document.body.classList.add('--nav-hidden');
        }

        this.last_scrolltop = window.scrollY;
    }
}
