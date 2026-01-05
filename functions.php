<?php
    include 'app.php';
    global $the_theme;
    $the_theme = new Escuadra\Theme();

    foreach(glob(get_template_directory() . "/config/*/*.php") as $includes) {
        include $includes;
    }

    add_action( 'wp_enqueue_scripts', function () {
        wp_enqueue_script( 'jquery' );
    });