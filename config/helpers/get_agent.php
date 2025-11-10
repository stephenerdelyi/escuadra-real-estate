<?php
    function get_agent($id = null) {
        $obj = new stdClass();

        if(empty($id)) {
            $id = get_the_ID();
        }

        $obj->id = $id;
        $obj->name = get_the_title($id);
        $obj->image = get_image(get_post_thumbnail_id($id), 'logo-3-4', $obj->name);
        $obj->phone = format_phone(get_field('agent_phone', $id));
        $obj->email = get_field('agent_email', $id);
        $obj->bio = get_the_content(null, false, $id);
        $obj->license = get_field('agent_license', $id);
        $obj->service_areas = get_simple_terms($id, 'service-areas');
        $obj->specialties = get_simple_terms($id, 'specialties');
        $obj->social_accounts = get_social_accounts($id);

        //Prioritize Reno & Sparks
        if(in_array('Sparks/Spanish Springs', $obj->service_areas)) {
            $obj->service_areas = array_diff($obj->service_areas, ['Sparks/Spanish Springs']);
            array_unshift($obj->service_areas, 'Sparks/Spanish Springs');
        }

        if(in_array('Reno', $obj->service_areas)) {
            $obj->service_areas = array_diff($obj->service_areas, ['Reno']);
            array_unshift($obj->service_areas, 'Reno');
        }

        $role = get_field('agent_role', $id);
        $obj->role = $role->name;

        return $obj;
    }

    function get_social_accounts($id) {
        $social_accounts = [];
        $accounts = get_field('agent_accounts', $id);

        foreach($accounts as $account) {
            $obj = new stdClass();

            $obj->type = $account['type'];
            $obj->url = $account['url'];

            $social_accounts[] = $obj;
        }

        return $social_accounts;
    }
