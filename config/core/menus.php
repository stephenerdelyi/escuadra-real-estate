<?php
    add_action('init', function() {
        register_nav_menu('main-navigation', 'Main Navigation');
        register_nav_menu('footer-navigation', 'Footer Navigation');
        register_nav_menu('social-navigation', 'Social Navigation');
    });
?>
