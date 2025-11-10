<?php
    add_action('init', function() {
        register_taxonomy('roles', [], [
            'labels' => [
                'name' => 'Roles',
                'singular_name' => 'Role',
                'search_items' => 'Search Roles',
                'all_items' => 'All Roles',
                'parent_item' => 'Parent Role',
                'parent_item_colon' => 'Parent Role:',
                'edit_item' => 'Edit Role',
                'update_item' => 'Update Role',
                'add_new_item' => 'Add New Role',
                'new_item_name' => 'New Role',
                'menu_name' => 'Roles'
            ],
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_rest' => false,
            'public' => false,
        ]);
    }, 0);
