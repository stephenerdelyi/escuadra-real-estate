<?php
    add_action('init', function() {
        register_taxonomy('property-types', [], [
            'labels' => [
                'name' => 'Property Types',
                'singular_name' => 'Property Type',
                'search_items' => 'Search Property Types',
                'all_items' => 'All Property Types',
                'parent_item' => 'Parent Property Type',
                'parent_item_colon' => 'Parent Position:',
                'edit_item' => 'Edit Property Type',
                'update_item' => 'Update Property Type',
                'add_new_item' => 'Add New Property Type',
                'new_item_name' => 'New Property Type',
                'menu_name' => 'Property Types'
            ],
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_rest' => true,
            'public' => false,
        ]);
    }, 0);
