<?php
    if(function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Theme Options',
            'menu_title' => 'Theme Options',
            'capability' => 'manage_options',
            'menu_slug' => 'acf-options',
        ]);
    }

    //Filter contact us block forms
    add_filter('acf/load_field/name=contact_form', function($field) {
        if(class_exists('GFAPI')) {
            $forms = GFAPI::get_forms();

            foreach($forms as $form) {
                $field['choices'][$form['id']] = $form['title'];
            }
        }

        return $field;
    });
