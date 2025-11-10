<?php
    //insert 'formats' toolbar into TinyMCE
    add_filter('mce_buttons_2', function($buttons) {
        array_unshift( $buttons, 'styleselect' );
        return $buttons;
    });

    // Add new style options in TinyMCE formats toolbar
    add_filter('tiny_mce_before_init', function($settings) {
        $style_formats = [
            [
                'title' => 'Body Copy Large',
                'block' => 'p',
                'classes' => 'body-copy-large',
                'wrapper' => false
            ],
            [
                'title' => 'Body Copy Small',
                'block' => 'p',
                'classes' => 'body-copy-small',
                'wrapper' => false
            ],
            [
                'title' => 'Body Copy Smaller',
                'block' => 'p',
                'classes' => 'body-copy-smaller',
                'wrapper' => false
            ],
            [
                'title' => 'Body Copy Smallest',
                'block' => 'p',
                'classes' => 'body-copy-smallest',
                'wrapper' => false
            ]
        ];

        $settings['style_formats'] = wp_json_encode($style_formats);

        return $settings;
    });
