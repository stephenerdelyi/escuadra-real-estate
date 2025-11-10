<?php
    add_action('init', function() {
        register_taxonomy('specialties', [], [
            'labels' => [
                'name' => 'Specialties',
                'singular_name' => 'Specialty',
                'search_items' => 'Search Specialties',
                'all_items' => 'All Specialties',
                'parent_item' => 'Parent Specialty',
                'parent_item_colon' => 'Parent Specialty:',
                'edit_item' => 'Edit Specialty',
                'update_item' => 'Update Specialty',
                'add_new_item' => 'Add New Specialty',
                'new_item_name' => 'New Specialty',
                'menu_name' => 'Specialties'
            ],
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_rest' => true,
            'public' => false,
        ]);
    }, 0);
