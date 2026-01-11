(() => {
class $faea8eb514344b77$export$2e2bcd8739ae039 {
    constructor(root){
        this.root = root;
        this.last_scrolltop = window.scrollY;
        this.mobile_toggle = this.root.querySelector('.js-navigation-mobile');
        document.addEventListener('scroll', ()=>{
            this.scrolling(window.scrollY);
        });
        this.mobile_toggle.addEventListener('click', (event)=>{
            event.preventDefault();
            if (this.root.classList.contains('--active')) this.root.classList.remove('--active');
            else this.root.classList.add('--active');
        });
        //show correct nav on page load
        this.scrolling(window.scrollY, true);
    }
    scrolling(position, initial_load = false) {
        this.root.classList.remove('--active');
        if (position > 100) document.body.classList.add('--nav-scrolled');
        else document.body.classList.remove('--nav-scrolled');
        if (this.last_scrolltop > position) //scrolling up
        document.body.classList.remove('--nav-hidden');
        else if (position > 250 && !initial_load) //scrolling down
        document.body.classList.add('--nav-hidden');
        this.last_scrolltop = window.scrollY;
    }
}


function $2a036b24b1e5df42$var$createAnimation(element, initial, final) {
    gsap.set(element, initial);
    const anim = gsap.to(element, final);
    ScrollTrigger.create({
        trigger: element,
        start: 'top 70%',
        onEnter: (self)=>{
            self.progress === 1 ? anim.progress(1) : anim.play();
        }
    });
}
function $2a036b24b1e5df42$export$b659307eba74ef8a(selector, initial, final) {
    document.querySelectorAll(selector).forEach((item)=>{
        if (item.dataset.delay) final.delay = item.dataset.delay;
        $2a036b24b1e5df42$var$createAnimation(item, initial, final);
    });
}


document.addEventListener('DOMContentLoaded', ()=>{
    var navigation = document.querySelector('.js-navigation');
    if (navigation) new (0, $faea8eb514344b77$export$2e2bcd8739ae039)(navigation);
    var scroll_button = document.querySelector('.js-scroll-button');
    if (scroll_button) scroll_button.addEventListener('click', (event)=>{
        event.preventDefault();
        window.scrollTo(0, window.innerHeight);
    });
    (0, $2a036b24b1e5df42$export$b659307eba74ef8a)('.animate-left', {
        autoAlpha: 0,
        x: -75
    }, {
        duration: 0.5,
        autoAlpha: 1,
        x: 0,
        paused: true
    });
    (0, $2a036b24b1e5df42$export$b659307eba74ef8a)('.animate-right', {
        autoAlpha: 0,
        x: 75
    }, {
        duration: 0.5,
        autoAlpha: 1,
        x: 0,
        paused: true
    });
    (0, $2a036b24b1e5df42$export$b659307eba74ef8a)('.animate-up', {
        autoAlpha: 0,
        y: 75
    }, {
        duration: 0.5,
        autoAlpha: 1,
        y: 0,
        paused: true
    });
    (0, $2a036b24b1e5df42$export$b659307eba74ef8a)('.animate-down', {
        autoAlpha: 0,
        y: -75
    }, {
        duration: 0.5,
        autoAlpha: 1,
        y: 0,
        paused: true
    });
    (0, $2a036b24b1e5df42$export$b659307eba74ef8a)('.animate-grow', {
        autoAlpha: 0,
        scale: 0
    }, {
        duration: 0.5,
        autoAlpha: 1,
        scale: 1,
        paused: true
    });
    (0, $2a036b24b1e5df42$export$b659307eba74ef8a)('.animate-shrink', {
        autoAlpha: 0,
        scale: 1
    }, {
        duration: 0.5,
        autoAlpha: 1,
        scale: 0,
        paused: true
    });
    (0, $2a036b24b1e5df42$export$b659307eba74ef8a)('.animate-fade-in', {
        autoAlpha: 0
    }, {
        duration: 0.5,
        autoAlpha: 1,
        paused: true
    });
    (0, $2a036b24b1e5df42$export$b659307eba74ef8a)('.animate-fade-out', {
        autoAlpha: 1
    }, {
        duration: 0.5,
        autoAlpha: 0,
        paused: true
    });
});

})();
//# sourceMappingURL=main.js.map
