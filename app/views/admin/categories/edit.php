<?php

// Categories
if (isset($_POST["dbEdit"])) {
    // Posted data 
    $postArray = [
        'categoryID' => (int) $_POST["dbEdit"],
        'userID' => $_SESSION["userID"],
        'categoryName' => htmlspecialchars(trim($_POST["categoryName"])),
        'categoryDescription' => htmlspecialchars(trim($_POST["categoryDescription"]))
    ];
    // Update in Database
    $update = updateCategory($postArray);
    // Return results
    echo $update;
    exit;
}
