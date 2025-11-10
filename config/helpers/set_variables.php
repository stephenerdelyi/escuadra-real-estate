<?php
    function set_variables($string, $vars) {
        foreach($vars as $index => $var) {
            $string = str_replace('{' . $index . '}', $var, $string);
        }

        return $string;
    }
