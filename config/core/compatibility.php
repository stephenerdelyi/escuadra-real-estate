<?php
    //configure rules for browser compatibility
    $valid_agent = true;
    $agent = new WhichBrowser\Parser($_SERVER['HTTP_USER_AGENT']);

    if($agent->isBrowser('Safari', '<=', '13')) {
        $valid_agent = false;
    }

    if($valid_agent == false) {
        wp_redirect('/unsupported.php?b=' . $agent->browser->name);
    }
