<?php
/* INDEX */
# -----------------------------------------------------------
function index($url, $url2 = '', $url3 = '')
# -----------------------------------------------------------
{
    if (!empty($url2)) {
        $FileFullPath = VIEWS_PATH . "/user/" . $url2 . ".php";
    } else {
        $FileFullPath = VIEWS_PATH . "/user/" . $url . ".php";
    }

    if (file_exists($FileFullPath)) {
        // Passing Title to the view
        $data = ['title' => 'Renova DL'];
        // extract the array so we can use 'title' as variable $title in the view
        extract($data);
        require_once $FileFullPath;
    } else {
        require_once VIEWS_PATH . "/user/404.php";
    }
}

/* GALLERY */
# -----------------------------------------------------------
function gallery($url, $url2, $url3 = '')
# -----------------------------------------------------------
{
    if (!empty($url2)) {
        $FileFullPath = VIEWS_PATH . "/user/gallery/" . $url2 . ".php";
    } else {
        $FileFullPath = VIEWS_PATH . "/user/gallery/index.php";
    }

    if (file_exists($FileFullPath)) {
        // Passing Title to the view
        $data = ['title' => 'Renova DL - Gallery'];
        // Get Gallery Photos from database and pass to the view
        $data['gallery'] = getGalleryPhotosFromDB(55);
        // extract the array so we can use 'title' as variable $title in the view
        extract($data);
        require_once $FileFullPath;
    } else {
        require_once VIEWS_PATH . "/user/404.php";
    }
}

/* ABOUT */
# -----------------------------------------------------------
function about($url, $url2, $url3 = '')
# -----------------------------------------------------------
{
    if (!empty($url2)) {
        $FileFullPath = VIEWS_PATH . "/user/about/" . $url2 . ".php";
    } else {
        $FileFullPath = VIEWS_PATH . "/user/about/index.php";
    }

    if (file_exists($FileFullPath)) {
        // Passing Title to the view
        $data = ['title' => 'Renova DL - About'];
        // extract the array so we can use 'title' as variable $title in the view
        extract($data);
        require_once $FileFullPath;
    } else {
        require_once VIEWS_PATH . "/user/404.php";
    }
}

/* CONTACT */
# -----------------------------------------------------------
function contact($url, $url2, $url3 = '')
# -----------------------------------------------------------
{
    if (!empty($url2)) {
        $FileFullPath = VIEWS_PATH . "/user/contact/" . $url2 . ".php";
    } else {
        $FileFullPath = VIEWS_PATH . "/user/contact/index.php";
    }

    if (file_exists($FileFullPath)) {
        // Passing Title to the view
        $data = ['title' => 'Renova DL - Contact'];
        // extract the array so we can use 'title' as variable $title in the view
        extract($data);
        require_once $FileFullPath;
    } else {
        require_once VIEWS_PATH . "/user/404.php";
    }
}

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
