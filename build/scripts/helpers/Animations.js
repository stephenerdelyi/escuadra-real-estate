function createAnimation(element, initial, final) {
    gsap.set(element, initial);
    const anim = gsap.to(element, final);

    ScrollTrigger.create({
      trigger: element,
      start: 'top 70%',
      onEnter: self => {
        self.progress === 1 ? anim.progress(1) : anim.play();
      }
    });
}

export function createGlobalAnimation(selector, initial, final) {
    document.querySelectorAll(selector).forEach((item) => {
        if(item.dataset.delay) {
            final.delay = item.dataset.delay;
        }

        createAnimation(item, initial, final);
    });
}
