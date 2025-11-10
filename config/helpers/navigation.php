<?php
    function get_navigation($navigation_name) {
        $navigation = wp_get_nav_menu_items($navigation_name);
        $nav_tree = [];

        if(empty($navigation_name) || empty($navigation)) {
            return false;
        }

        foreach($navigation as $navigation_item) {
            if($navigation_item->menu_item_parent == 0) {
                //meganav item
                $obj = new stdClass();
                $obj->title = $navigation_item->title;
                $obj->type = $navigation_item->description;
                $obj->id = str_replace(' ', '-', strtolower($obj->title));
                $obj->post_id = $navigation_item->object_id;
                $obj->url = $navigation_item->url;
                $obj->children = [];
                $obj->target = $navigation_item->target;
                $obj->featured = null;

                $nav_tree[$navigation_item->ID] = $obj;
            } else {
                //subnav item
                $obj = new stdClass();
                $obj->title = $navigation_item->title;
                $obj->type = $navigation_item->description;
                $obj->id = str_replace(' ', '-', strtolower($obj->title));
                $obj->post_id = $navigation_item->object_id;
                $obj->target = $navigation_item->target;
                $obj->url = $navigation_item->url;

                if(str_starts_with($obj->type, 'featured-') || str_starts_with($obj->type, 'upcoming-') || str_starts_with($obj->type, 'latest-')) {
                    $nav_tree[$navigation_item->menu_item_parent]->featured = $obj->type;
                } else {
                    $nav_tree[$navigation_item->menu_item_parent]->children[] = $obj;
                }
            }
        }

        return $nav_tree;
    }
