<?php
    //disable author pages
    add_action('template_redirect', function() {
        global $wp_query;

        if(is_author()) {
            wp_redirect('/404');
        }
    });
