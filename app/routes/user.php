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

/* PROJEKTE */
# -----------------------------------------------------------
function projekte($url, $url2, $url3 = '')
# -----------------------------------------------------------
{
    if (!empty($url2)) {
        $FileFullPath = VIEWS_PATH . "/user/projekte/" . $url2 . ".php";
    } else {
        $FileFullPath = VIEWS_PATH . "/user/projekte/index.php";
    }

    if (file_exists($FileFullPath)) {
        // Passing Title to the view
        $data = ['title' => 'Renova DL - Projekte'];
        // Get Gallery Photos from database and pass to the view
        $data['projekte'] = getGalleryPhotosFromDB(3);
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
