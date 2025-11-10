<?php
    function get_property($id = null) {
        $obj = new stdClass();

        if(empty($id)) {
            $id = get_the_ID();
        }

        $obj->id = $id;
        $obj->name = get_the_title($id);
        $obj->excerpt = get_the_excerpt($id);
        $obj->gallery = get_property_gallery($id, $obj->name);
        $obj->bedrooms = get_field('property_bedrooms', $id);
        $obj->bathrooms = get_field('property_bathrooms', $id);
        $obj->sqft = format_number(get_field('property_sqft', $id));
        $obj->price = '$' . format_number(str_replace('$', '', get_field('property_price', $id)));
        $obj->location = null;
        $obj->content = get_the_content(null, false, $id);

        $city = get_field('property_city', $id);
        $state = get_field('property_state', $id);

        if(!empty($city) && !empty($state)) {
            $obj->location = "$city, $state";
        } else if(!empty($city)) {
            $obj->location = $city;
        }

        return $obj;
    }

    function get_property_gallery($id, $backup_alt = '') {
        $gallery = [];

        $gallery_items = get_field('property_gallery', $id);

        foreach($gallery_items as $gallery_item) {
            $gallery[] = get_image($gallery_item['ID'], 'logo-4-3', $backup_alt);
        }

        return $gallery;
    }
