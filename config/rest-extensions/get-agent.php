<?php
    global $the_theme;

    $the_theme->register_rest_route([
        'route' => 'get-agent',
        'public' => true,
        'methods' => 'GET',
        'params' => ['id' => '\d'],
        'callback' => function($data) {
            $params = $data->get_url_params();

            return ajax_json_success('agent', get_agent($params['id']));
        }
    ]);
