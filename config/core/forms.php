<?php
    add_filter('gform_submit_button', function($button_input, $form) {
        $dom = new DOMDocument();
        $dom->loadHTML($button_input);
        $element = $dom->getElementsByTagName('input')[0];

        return "<button class='button gform_button' id='gform_submit_button_{$form['id']}'><span>{$element->getAttribute('value')}</span></button>";
    }, 10, 2);

    add_filter('gform_ajax_spinner_url', function($image_src, $form) {
        global $the_theme;
        return $the_theme->build . "/images/spinner.gif";
    }, 10, 2);
