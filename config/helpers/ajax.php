<?php
    function ajax_json_error($name, $description) {
        return ajax_json_object('error', $name, [$description]);
    }

    function ajax_json_success($name, $args) {
        return ajax_json_object('success', $name, $args);
    }

    function ajax_json_object($status, $name, $args) {
        $return_obj = new \stdClass();
        $return_obj->status = $status;

        if($status == 'error') {
            $return_obj->error_name = $name;
            $return_obj->error_description = $args[0];
        } else {
            $return_obj->data_type = $name;
            $return_obj->data = $args;
        }

        return $return_obj;
    }
