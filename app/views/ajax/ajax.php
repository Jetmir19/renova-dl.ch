<?php

/**
 * Here we handle the ajax JavaScript request
 * In library folder and file ajax.php we declare the functions to be called
 */

// Getting Page language
# ---------------------------------------------------
if (isset($_POST['lang']))
# ---------------------------------------------------
{
    $lang = htmlspecialchars($_POST['lang']);

    getLanguageFromSession($lang);
}

// Get Days left
function secondsToTime($seconds)
{
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
}

// // Get and Save in DB facebook Photos
// // ---------------------------------------------------
// if (isset($_POST['fb_save'])) {
//     // ---------------------------------------------------
//     $fb_save = htmlspecialchars($_POST['fb_save']);

//     if ($fb_save == 'save_fb_photos') {
//         saveUserPhotosInDB();
//     } else {
//         echo 'Check the data attribute!';
//         exit;
//     }
// }

// // Refresh facebook Access Token
// // ---------------------------------------------------
// if (isset($_POST['fb_refresh'])) {
//     // ---------------------------------------------------
//     $fb_refresh = htmlspecialchars($_POST['fb_refresh']);

//     if ($fb_refresh == 'refresh-token') {
//         $data = getLongLivedTokenFromAPI();

//         if ($data['access_token']) {
//             echo secondsToTime($data['expires_in']);
//             exit;
//         }
//     } else {
//         echo 'Check the data attribute!';
//         exit;
//     }
// }
