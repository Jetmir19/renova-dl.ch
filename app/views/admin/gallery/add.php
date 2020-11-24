<?php

if (isset($_POST["dbInsert"])) {
    // Posted data 
    $postArray = [
        'galleryTitle' => htmlspecialchars(trim($_POST["galleryTitle"])),
        'subCategoryID' => $_POST["subCategoryID"] ?? '',
        'userID' => $_SESSION["userID"],
        'galleryDescription' => htmlspecialchars(trim($_POST["galleryDescription"]))
    ];
    // Save in Database (+Upload)
    $insert = insertImage($postArray, $_FILES);
    // Return results
    echo $insert;
    exit;
}
