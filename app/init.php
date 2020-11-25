<?php
// Global config
require_once __DIR__ . "/config/config.php";

// MySQL Connection
require_once DB_PATH . "/connect.php";

// Main includes
require_once LIBRARY_PATH . "/helpers.php";

// Routes
require_once ROUTES_PATH . "/user.php";
require_once ROUTES_PATH . "/admin.php";
require_once ROUTES_PATH . "/ajax.php";

// User Models
require_once MODELS_PATH . "/user/content.php";
require_once MODELS_PATH . "/user/gallery.php";
// Admin Models
require_once MODELS_PATH . "/admin/categories.php";
require_once MODELS_PATH . "/admin/categoriesSub.php";
require_once MODELS_PATH . "/admin/gallery.php";
require_once MODELS_PATH . "/admin/pages.php";
require_once MODELS_PATH . "/admin/users.php";

// test per zhivinen :)

########### Routing START #############
$func = 'index';
$url1 = '';
$url2 = '';

if (isset($_GET['url'])) {
    $url = rtrim($_GET['url'], '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);

    // Example: example.com/about where about is the $url[0]
    if (isset($url[0])) {
        // Example: example.com/about/test where "test" is the $url[1]
        if (isset($url[1])) {
            $url1 = $url[1];
        }

        // Example: example.com/about/test/22 where "22" is the $url[2]
        if (isset($url[2])) {
            $url2 = $url[2];
        }

        // Example: example.com/about will call "function about()" where url[0] is the name of the function"
        $func = $url[0];

        // Check if the url or the function exists
        if (function_exists($url[0])) {
            // Call the function
            $func($url[0], $url1, $url2);
            unset($url[0]);
        } else {
            // If does not exists when we call the index function (function index())
            index($url[0], $url1, $url2);
            unset($url[0]);
        }
    }
} else {
    // If none of the above conditions are true, call the view home.php
    $func("index");
}
########### Routing END #############
