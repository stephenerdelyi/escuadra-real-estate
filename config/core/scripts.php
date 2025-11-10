<?php
    global $the_theme;

    add_action('wp_enqueue_scripts', function() {
        global $the_theme;

        wp_register_script(
            'scripts',
            $the_theme->assets . '/scripts/main.js',
            [],
            $the_theme->version,
            true
        );

        wp_register_script(
            'greensock',
            'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js',
            [],
            $the_theme->version,
            true
        );

        wp_register_script(
            'scroll-trigger',
            'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js',
            [],
            $the_theme->version,
            true
        );

        wp_enqueue_script('scripts');
        wp_enqueue_script('greensock');
        wp_enqueue_script('scroll-trigger');
    });

    add_action('admin_enqueue_scripts', function() {
        global $the_theme;

        wp_register_script(
            'admin',
            $the_theme->assets . '/scripts/admin.js',
            ['jquery'],
            $the_theme->version,
            true
        );

        wp_enqueue_script('admin');
    });
