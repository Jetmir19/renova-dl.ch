<?php

if (isset($_POST["dbEdit"])) {
    // Posted data 
    $postArray = [
        'galleryTitle' => htmlspecialchars(trim($_POST["galleryTitle"])),
        'galleryUserID' => $_SESSION["userID"]
    ];
    // Update in Database
    $update = updateImage($postArray);
    // Return results
    echo $update;
    exit;
}
