<?php
    global $the_theme;

    $the_theme->register_rest_route([
        'route' => 'get-posts',
        'public' => true,
        'methods' => 'GET',
        'params' => ['offset' => '\d'],
        'callback' => function($data) use($the_theme) {
            $params = $data->get_url_params();

            return ajax_json_success('posts', get_data('post', 'e_get_post', [
                'offset' => $params['offset'],
                'posts_per_page' => $the_theme->php_listing_per_page,
            ]));
        }
    ]);
