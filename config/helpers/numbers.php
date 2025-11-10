<?php
    function format_price($price) {
        if(empty($price)) {
            $price = 0.00;
        }

        $formatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);
        $price = $formatter->formatCurrency(round($price, 0), 'USD');
        return str_replace('.00', '', $price);
    }

    function format_number($number, $show_ordinal = false) {
        if($show_ordinal) {
            $last = substr($number, -1);

            if($last > 3 || $last == 0 || ($number >= 11 && $number <= 19)) {
                $ordinal = 'th';
            } else if($last==3) {
                $ordinal = 'rd';
            } else if($last==2) {
                $ordinal = 'nd';
            } else {
                $ordinal = 'st';
            }

            return number_format($number) . $ordinal;
        }

        return number_format($number);
    }

    function format_phone($phone) {
        $obj = new stdClass();

        if(empty($phone)) {
            return null;
        }

        $obj->formatted = preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1.$2.$3', $phone);
        $obj->url = 'tel:' . preg_replace('/[^0-9]/', '', $phone);
        $obj->sms = 'sms:' . preg_replace('/[^0-9]/', '', $phone);

        return $obj;
    }
