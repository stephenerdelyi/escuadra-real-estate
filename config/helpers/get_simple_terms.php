<?php
    function get_simple_terms($id, $taxonomy) {
        $array = [];

        $terms = get_the_terms($id, $taxonomy);

        foreach($terms as $term) {
            $array[] = $term->name;
        }

        return $array;
    }
