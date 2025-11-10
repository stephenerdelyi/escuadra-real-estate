<?php
    add_filter('excerpt_more', function($ellipses) {
        return '...';
    }, 1);

    add_filter('excerpt_length', function($length) {
        return 30;
    });

    remove_filter('get_the_excerpt', 'wp_trim_excerpt');
