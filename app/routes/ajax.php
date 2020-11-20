<?php

/* AJAX Calls */
# -----------------------------------------------------------
function ajax($url, $url2)
# -----------------------------------------------------------
{
    if (!empty($url2)) {
        $FileFullPath = VIEWS_PATH . "/ajax/" . $url2 . ".php";
    } else {
        require_once VIEWS_PATH . "/user/404.php";
    }

    if (file_exists($FileFullPath)) {
        require_once $FileFullPath;
    } else {
        require_once VIEWS_PATH . "/user/404.php";
    }
}
