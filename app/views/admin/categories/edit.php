<?php

if (isset($_POST["dbEdit"])) {
    // Posted data 
    $postArray = [
        'categoryID' => (int) $_POST["dbEdit"],
        'categoryName' => htmlspecialchars(trim($_POST["categoryName"])),
        'categoryDescription' => htmlspecialchars(trim($_POST["categoryDescription"]))
    ];
    // Update in Database
    $update = updateCategory($postArray);
    // Return results
    echo $update;
    exit;
}
