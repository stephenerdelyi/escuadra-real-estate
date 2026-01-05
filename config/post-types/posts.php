<?php
add_action( 'init', function () {
  global $wp_post_types;

  if ( ! isset( $wp_post_types['post'] ) ) {
    return;
  }

  $labels = &$wp_post_types['post']->labels;

  $labels->name               = 'Articles';
  $labels->singular_name      = 'Article';
  $labels->add_new            = 'Add Article';
  $labels->add_new_item       = 'Add New Article';
  $labels->edit_item          = 'Edit Article';
  $labels->new_item           = 'Article';
  $labels->view_item          = 'View Article';
  $labels->view_items         = 'View Articles';
  $labels->search_items       = 'Search Articles';
  $labels->not_found          = 'No Articles found';
  $labels->not_found_in_trash = 'No Articles found in Trash';
  $labels->all_items          = 'All Articles';
  $labels->menu_name          = 'Articles';
  $labels->name_admin_bar     = 'Article';
});