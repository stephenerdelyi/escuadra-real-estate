<?php
    function get_address_data($data) {
        global $the_theme;

        $obj = new stdClass();
        $address = "";
        $city_state = "";
        $embed_api_key = $the_theme->keys['gmap_embed_api'];

        if(!empty($data['line_1'])) {
            $address .= $data['line_1'];
        }

        if(!empty($data['line_2'])) {
            $address .= " " . $data['line_2'];
        }

        $obj->title = $address;
        $obj->slug = str_replace('+', '-', urlencode(preg_replace('/[^A-Za-z0-9 ]/', '', $address)));

        if(!empty($address)) {
            $address .= ", ";
        }

        if(!empty($data['city']) && is_object($data['city'])) {
            $address .= $data['city']->name . ", ";
            $city_state .= $data['city']->name . ", ";
        } else if(!empty($data['city'])) {
            $address .= $data['city'] . ", ";
            $city_state .= $data['city'] . ", ";
        }

        if(!empty($data['state']) && is_object($data['state'])) {
            $address .= $data['state']->name . " ";
            $city_state .= $data['state']->name;
        } else if(!empty($data['state'])) {
            $address .= $data['state'] . " ";
            $city_state .= $data['state'];
        } else {
            $city_state = substr($city_state, 0, -2);
        }

        $obj->city_state = $city_state;

        if(!empty($data['zip'])) {
            $address .= $data['zip'];
        }

        $obj->formatted = $address;

        $address_url = "";
        if(!empty($address)) {
            $address_url = "https://google.com/maps/place/" . urlencode($address);
        }

        $obj->url = $address_url;

        $encoded_address = urlencode($address);
        $embed_url_address = "https://www.google.com/maps/embed/v1/place?key=$embed_api_key&q={$encoded_address}";

        if(empty($embed_api_key)) {
            $embed_url_address = "";
        }

        $obj->embed_url = $embed_url_address;

        return $obj;
    }
