<?php
    function register_backend_meta_query($meta_key, $post_type) {
        add_filter('parse_query', function($query) use($meta_key, $post_type) {
            if(is_admin() && $query->query['post_type'] == $post_type) {
                $query_vars = [];

                if(!empty($_GET[$meta_key])) {
                    $query_vars['meta_query'][] = [
                        'field' => $meta_key,
                        'value' => $_GET[$meta_key],
                        'compare' => '=',
                    ];

                    $query->query_vars = array_merge($query->query_vars, $query_vars);
                }
            }

            return $query;
        });
    }

    function register_backend_filter($meta_key, $post_type, $all_text) {
        add_action('restrict_manage_posts', function() use($meta_key, $post_type, $all_text) {
            global $post_type;
            $screen = get_current_screen();

            if($screen->id == 'edit-' . $post_type) {
                $options = get_field_object($meta_key)['choices'];

                echo "<select name='" . $meta_key . "' id='" . $meta_key . "' class='postform'>";
                echo "<option value=''>" . $all_text . "</option>";
                foreach($options as $key => $value) {
                    echo '<option value='. $key, $_GET[$meta_key] == $key ? ' selected="selected"' : '','>' . $value .'</option>';
                }
                echo "</select>";
            }
        });
    }
