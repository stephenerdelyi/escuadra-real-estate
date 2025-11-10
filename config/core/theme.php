<?php
    add_action('after_setup_theme', function() {
        add_theme_support('post-thumbnails');

        add_theme_support('editor-color-palette', [
            [
        		'name'  => 'Black',
        		'slug'  => 'black',
        		'color'	=> '#111111',
        	],
            [
        		'name'  => 'Dark Grey',
        		'slug'  => 'dark-grey',
        		'color'	=> '#2d2d2d',
        	],
            [
        		'name'  => 'Light Grey',
        		'slug'  => 'light-grey',
        		'color'	=> '#e8e8e8',
        	],
            [
        		'name'  => 'White',
        		'slug'  => 'white',
        		'color'	=> '#ffffff',
        	]
        ]);
    });
?>
