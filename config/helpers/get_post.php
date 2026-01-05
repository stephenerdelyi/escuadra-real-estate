<?php
    function e_get_post($id = null) {
        $obj = new stdClass();

        if(empty($id)) {
            $id = get_the_ID();
        }

        $obj->id = $id;
        $obj->title = get_the_title($id);
        $obj->excerpt = get_the_excerpt($id);
        $obj->image = get_image(get_post_thumbnail_id($id), 'logo-3-4', $obj->name);
        $obj->post_date = get_the_date('n/j/Y', $id);
        $obj->linked_agent = get_field('post_agent', $id);
        $obj->url = get_permalink($id);
        
        if(!empty($obj->linked_agent)) {
            $obj->linked_agent = get_agent($obj->linked_agent);
        }

        return $obj;
    }
