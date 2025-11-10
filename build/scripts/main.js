import Navigation from './modules/Navigation'
import { createGlobalAnimation } from './helpers/Animations'

document.addEventListener('DOMContentLoaded', () => {
    var navigation = document.querySelector('.js-navigation');
    if(navigation) {
        new Navigation(navigation);
    }

    var scroll_button = document.querySelector('.js-scroll-button');
    if(scroll_button) {
        scroll_button.addEventListener('click', (event) => {
            event.preventDefault();
            window.scrollTo(0, window.innerHeight);
        });
    }

    createGlobalAnimation('.animate-left', { autoAlpha: 0, x: -75 }, { duration: 0.5, autoAlpha: 1, x: 0, paused: true });
    createGlobalAnimation('.animate-right', { autoAlpha: 0, x: 75 }, { duration: 0.5, autoAlpha: 1, x: 0, paused: true });
    createGlobalAnimation('.animate-up', { autoAlpha: 0, y: 75 }, { duration: 0.5, autoAlpha: 1, y: 0, paused: true });
    createGlobalAnimation('.animate-down', { autoAlpha: 0, y: -75 }, { duration: 0.5, autoAlpha: 1, y: 0, paused: true });
    createGlobalAnimation('.animate-grow', { autoAlpha: 0, scale: 0 }, { duration: 0.5, autoAlpha: 1, scale: 1, paused: true });
    createGlobalAnimation('.animate-shrink', { autoAlpha: 0, scale: 1 }, { duration: 0.5, autoAlpha: 1, scale: 0, paused: true });
    createGlobalAnimation('.animate-fade-in', { autoAlpha: 0 }, { duration: 0.5, autoAlpha: 1, paused: true });
    createGlobalAnimation('.animate-fade-out', { autoAlpha: 1 }, { duration: 0.5, autoAlpha: 0, paused: true });
});
