<?php
    add_action('init', function() {
        register_taxonomy('service-areas', [], [
            'labels' => [
                'name' => 'Service Areas',
                'singular_name' => 'Service Area',
                'search_items' => 'Search Service Areas',
                'all_items' => 'All Service Areas',
                'parent_item' => 'Parent Service Area',
                'parent_item_colon' => 'Parent Service Area:',
                'edit_item' => 'Edit Service Area',
                'update_item' => 'Update Service Area',
                'add_new_item' => 'Add New Service Area',
                'new_item_name' => 'New Service Area',
                'menu_name' => 'Service Areas'
            ],
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_rest' => true,
            'public' => false,
        ]);
    }, 0);
