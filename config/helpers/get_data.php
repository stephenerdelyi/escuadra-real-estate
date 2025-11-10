<?php
    function get_data($post_type, $callback, $args = []) {
        $obj = new stdClass();
        $obj->results = [];

        if(empty($args)) {
            $args = [];
        } else if(isset($args['post_ids']) && !empty($args['post_ids'])) {
            //allow ability to get results from a set of post ids
            $obj->num_pages = 1;
            $obj->num_results = sizeof($args['post_ids']);

            foreach($args['post_ids'] as $post_id) {
                if(get_post_status($post_id) == 'publish') {
                    $obj->results[] = $callback($post_id);
                } else {
                    $obj->num_results -= 1;
                }
            }

            return $obj;
        }

        if(isset($args['single'])) {
            $return_single = $args['single'];
            unset($args['single']);
        } else {
            $return_single = false;
        }

        $default_args = [
            'post_type' => $post_type,
            'fields' => 'ids'
        ];

        $query = new WP_Query(array_merge($default_args, $args));

        foreach($query->posts as $id) {
            $obj->results[] = $callback($id);
        }

        $obj->num_pages = $query->max_num_pages;
        $obj->num_results = $query->found_posts;

        if($return_single == true) {
            if(sizeof($obj->results) > 0) {
                return $obj->results[0];
            } else {
                return null;
            }
        } else {
            return $obj;
        }
    }
