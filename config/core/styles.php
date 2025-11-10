<?php
    add_action('wp_enqueue_scripts', function() {
        global $the_theme;

        wp_register_style(
            'styles',
            $the_theme->assets . '/styles/main.css',
            [],
            $the_theme->version
        );

        wp_enqueue_style('styles');
    });

    add_action('admin_enqueue_scripts', function() {
        global $the_theme;

        wp_register_style(
            'admin',
            $the_theme->assets . '/styles/admin.css',
            [],
            $the_theme->version
        );

        wp_enqueue_style('admin');
    });
