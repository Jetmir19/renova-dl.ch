<?php

if (isset($_POST["dbInsert"])) {

    // Posted data 
    $postArray = [
        'galleryTitle' => htmlspecialchars(trim($_POST["galleryTitle"])),
        'galleryUserID' => $_SESSION["userID"]
    ];
    // Save in Database (+Upload)
    $insert = insertImage($postArray, $_FILES);
    // Return results
    echo $insert;
    exit;
}
