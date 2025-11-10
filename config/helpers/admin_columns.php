<?php
    function register_admin_column($id, $name, $post_type, $sortable = false) {
        add_filter('manage_' . $post_type . '_posts_columns', function($columns) use($id, $name) {
            $columns[$id] = $name;

            return $columns;
        });

        add_action('manage_' . $post_type . '_posts_custom_column', function($column) use($id) {
            global $post;

            if($column == $id) {
                echo(ucwords(get_field($id, $post->ID)));
            }
        });

        //fix this - sorting doesn't work as expected
        if($sortable == true) {
            add_filter('manage_edit-' . $post_type . '_sortable_columns', function($columns) use($id) {
                $columns[$id] = $id;

                return $columns;
            });
        }
    }
