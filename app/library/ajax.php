<?php

// require_once DB_PATH . "/db.php";

/**
 * There functions are just called when the request is made to the url view "ajax/ajax"
 * Then, ajax.php in te views/ajax/ajax.php folder calls these functions
 */


// Changing Front Page Language
# ---------------------------------------------------
function getLanguageFromSession($lang)
# ---------------------------------------------------
{
    switch ($lang) {
        case 'AL':
            $_SESSION['language'] = 'AL';
            session_regenerate_id(true);
            break;
        case 'EN':
            $_SESSION['language'] = 'EN';
            session_regenerate_id(true);
            break;
        default:
            $_SESSION['language'] = 'AL';
            session_regenerate_id(true);
            break;
    }

    echo $_SESSION['language'];
    exit;
}
