<?php 

/* ADMIN 
/ here we use $url2 as argument, because url starts with /admin/.... 
/ and $url3 as third argument ex. /admin/pages/... */
# -----------------------------------------------------------
function admin($url, $url2, $url3)
# -----------------------------------------------------------
{
    if (!empty($url2)) {
        if (!empty($url3)) {
            $FileFullPath = VIEWS_PATH . "/admin/" . $url2 . "/" . $url3 . ".php";
        } else {
            $FileFullPath = VIEWS_PATH . "/admin/" . $url2 . "/index.php";
        }
    } else {
        $FileFullPath = VIEWS_PATH . "/admin/index.php";
    }

    // Just for Login and Logout
    if ($url2 == "login") {
        $FileFullPath = VIEWS_PATH . "/admin/login.php";
    } elseif ($url2 == "logout") {
        $FileFullPath = VIEWS_PATH . "/admin/logout.php";
    }

    if (file_exists($FileFullPath)) {
        require_once $FileFullPath;
    } else {
        require_once VIEWS_PATH . "/admin/404.php";
    }
}
