<?php
    function get_image($primary_image, $default_image, $alt = '') {
        global $the_theme;

        $default_image = "{$the_theme->assets}/placeholders/{$default_image}.jpg";

        $obj = new stdClass();
        $obj->sizes = new stdClass();

        $obj->alt = $alt;

        $get_image = function($image, $size) use($default_image) {
            $image_result = wp_get_attachment_image_src($image, $size, false);

            if(isset($image_result[0])) {
                return $image_result[0];
            }

            return $default_image;
        };

        if(!empty($primary_image)) {
            $obj->using_default = false;

            if(isset($primary_image['url'])) {
                //already an image object
                $obj->url = $primary_image['url'];

                if(isset($primary_image['sizes'])) {
                    $obj->sizes->small = $primary_image['sizes']['thumbnail'];
                    $obj->sizes->medium = $primary_image['sizes']['medium'];
                    $obj->sizes->large = $primary_image['sizes']['large'];
                } else {
                    $obj->sizes->small = $default_image;
                    $obj->sizes->medium = $default_image;
                    $obj->sizes->large = $default_image;
                }
            } else {
                //we should have an id, get the object
                $obj->url = $get_image($primary_image, 'full');
                $obj->sizes->small = $get_image($primary_image, 'thumbnail');
                $obj->sizes->medium = $get_image($primary_image, 'medium');
                $obj->sizes->large = $get_image($primary_image, 'large');
            }

            if(isset($primary_image['alt']) && !empty($primary_image['alt'])) {
                $obj->alt = $primary_image['alt'];
            }
        } else {
            $obj->using_default = true;
            $obj->url = $default_image;
            $obj->sizes->small = $default_image;
            $obj->sizes->medium = $default_image;
            $obj->sizes->large = $default_image;
        }

        return $obj;
    }
