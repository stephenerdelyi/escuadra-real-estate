<?php
    function get_page_template_name() {
        $template_name = str_replace('template-', '', get_page_template_slug());
        $template_name = str_replace('.php', '', $template_name);

        return $template_name;
    }

    function on_page_template($name) {
        if(get_page_template_name() == $name) {
            return true;
        }

        return false;
    }
