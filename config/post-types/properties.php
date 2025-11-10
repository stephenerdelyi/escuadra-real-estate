<?php
    add_action('init', function() {
        register_post_type('properties', [
            'public' => false,
            'labels' => [
                'name' => 'Properties',
                'singular_name' => 'Property',
                'add_new_item' => 'Add New Property',
                'all_items' => 'All Properties',
                'edit_item' => 'Edit Property',
            ],
            'menu_position' => 4,
            'show_ui' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-location',
            'supports' => [
                'title',
                'editor',
                'page-attributes',
                'thumbnail',
                'excerpt'
            ],
            'taxonomies' => ['property-types']
        ]);
    });
