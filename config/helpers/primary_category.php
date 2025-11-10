<?php
    function get_primary_category($taxonomy, $id) {
        if(function_exists('yoast_get_primary_term_id')) {
            $primary_term_id = yoast_get_primary_term_id($taxonomy, $id);

            if($primary_term_id) {
                return get_term($primary_term_id);
            }
        }

        $terms = get_the_terms($id, $taxonomy);

        if(!empty($terms) && sizeof($terms) > 0) {
            return $terms[0];
        }

        return null;
    }
