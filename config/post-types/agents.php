<?php
    add_action('init', function() {
        register_post_type('agents', [
            'public' => false,
            'labels' => [
                'name' => 'Agents',
                'singular_name' => 'Agent',
                'add_new_item' => 'Add New Agent',
                'all_items' => 'All Agents',
                'edit_item' => 'Edit Agent',
            ],
            'menu_position' => 4,
            'show_ui' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-businessman',
            'supports' => [
                'title',
                'editor',
                'thumbnail'
            ],
            'taxonomies' => ['service-areas', 'specialties']
        ]);
    });
