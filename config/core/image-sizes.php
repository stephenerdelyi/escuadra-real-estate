<?php
    // add_image_size('default-image', 700, 490, ['center', 'center']);
    // add_image_size('small-square', 150, 150, ['center', 'center']);
    // add_image_size('medium-square', 300, 300, ['center', 'center']);
    // add_image_size('large-square', 550, 550, ['center', 'center']);
    //
    // //upscale image sizes
    // add_filter('image_resize_dimensions', function($default, $orig_w, $orig_h, $new_w, $new_h, $crop) {
    //     if(!$crop) return null; // let the wordpress default function handle this
    //
    //     $aspect_ratio = $orig_w / $orig_h;
    //     $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
    //
    //     $crop_w = round($new_w / $size_ratio);
    //     $crop_h = round($new_h / $size_ratio);
    //
    //     $s_x = floor(($orig_w - $crop_w) / 2);
    //     $s_y = floor(($orig_h - $crop_h) / 2);
    //
    //     return [0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h];
    // }, 10, 6);
