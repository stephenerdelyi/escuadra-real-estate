<?php
    // Add a new reusable block finder column for the reusable blocks page
    add_filter('manage_wp_block_posts_columns', function($columns) {
        $columns = [
    		'cb' => '<input type="checkbox" />',
            'title' => 'Title',
            'reusable-block-finder' => 'Reusable Block Finder',
            'date' => 'Date'
    	];
    	return $columns;
    });

    // Display the reusable block finder button content in each column
    add_action('manage_wp_block_posts_custom_column' , function($column, $ID) {
        if($column == 'reusable-block-finder') {
            echo '<a class="button" target="_blank" href="/wp-admin/edit.php?post_type=wp_block&page=reusable-block-finder&block_id=' . $ID . '">Find This Block</a>';
        }
    }, 10, 2);

    add_action('admin_menu', function() {
        // Register our main menu item
        add_menu_page(
            'Reusable Blocks',
            'Reusable Blocks',
            'manage_options',
            'edit.php?post_type=wp_block',
            '',
            'dashicons-block-default',
            20
        );

        // Register our sub-menu item
        add_submenu_page(
            'edit.php?post_type=wp_block',
            'Find Reusable Blocks',
            'Find Reusable Blocks',
            'manage_options',
            'reusable-block-finder',
            function() {
                global $wpdb;

                $reusable_id = $_GET['block_id'];
                $block_title = get_the_title($reusable_id);
                $search_tag = '%<!-- wp:block {"ref":' . $reusable_id . '}%';
                $posts = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}posts WHERE post_content LIKE '$search_tag' and post_status IN ('publish', 'draft', 'future', 'pending')" );
                $num_posts = count($posts);

                echo '<p>Reusable Blocks Finder (' . $num_posts . ' ' . ($num_posts == 1 ? 'Result' : 'Results') . ')</p>';
                echo '<h1>Block: ' . $block_title . '</h1>';

                if($num_posts == 0) {
                    echo '
                        <div class="reusable-block-finder card">
                            <p>No "' . $block_title . '" reusable blocks were found.</p>
                        </div>
                    ';
                } else {
                    foreach($posts as $post) {
                        $block_post_type = get_post_type($post->ID);

                        if($block_post_type == 'wp_block') {
                            $block_post_type = 'Reusable Block';
                        } else if($block_post_type == 'tribe_events') {
                            $block_post_type = 'Event';
                        }

                        echo '
                            <div class="reusable-block-finder card">
                                <div class="col">
                                    <h5>Post Type: ' . $block_post_type . '</h5>
                                    <h2 class="title">' . $post->post_title . '</h2>
                                </div>
                                <div class="col --options">
                                    <p>
                                        <a class="button button-secondary" href="' . get_edit_post_link($post->ID) . '">Edit</a>
                                        <a class="button button-primary" href="' . get_the_permalink($post->ID) . '">View</a>
                                    </p>
                                </div>
                            </div>
                        ';
                    }
                }
            },
            20
        );
    });

    // Do not show the submenu items in the reusable block sidebar menu
    add_filter('submenu_file', function() {
        remove_submenu_page('edit.php?post_type=wp_block', 'reusable-block-finder');
        remove_submenu_page('edit.php?post_type=wp_block', 'edit.php?post_type=wp_block');
    });
?>
