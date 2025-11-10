<?php
    /* Register Block Category */
    add_filter('block_categories_all', function($categories, $editor_context) {
        $category_slugs = wp_list_pluck($categories, 'slug'); // get current categories

        // If the slug already exists, we don't need to add it. Else, add it.
        if (in_array('custom-blocks', $category_slugs, true)) {
            return $categories;
        } else {
            return array_merge(
                $categories,
                [
                    [
                        'slug'  => 'custom-blocks',
                        'title' => 'Custom Blocks',
                        'icon'  => null,
                    ],
                ]
            );
        }
    }, 10, 2);
?>
