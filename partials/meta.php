<?php global $the_theme; ?>
<?php $the_theme->get_partial('tracking'); ?>
<?php if(!empty(get_the_title()) && !is_front_page()) : ?>
    <title><?= get_the_title() . " | " . get_bloginfo('name') ?></title>
<?php else : ?>
    <title><?= get_bloginfo('name') ?></title>
<?php endif; ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Rubik:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="<?= $the_theme->assets ?>/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?= $the_theme->assets ?>/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?= $the_theme->assets ?>/favicon/favicon-16x16.png">
<link rel="manifest" href="<?= $the_theme->assets ?>/favicon/site.webmanifest">
<link rel="mask-icon" href="<?= $the_theme->assets ?>/favicon/safari-pinned-tab.svg" color="#000000">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#000000">
<?php wp_head(); ?>
