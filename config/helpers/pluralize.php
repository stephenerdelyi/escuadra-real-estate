<?php
    function pluralize($number, $plural, $singular) {
        if($number == 1) {
            return $number . " " . $singular;
        }

        return $number . " " . $plural;
    }
