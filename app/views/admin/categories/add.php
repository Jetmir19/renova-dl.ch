<?php

// Categories
if (isset($_POST["dbInsert"])) {
    // Posted data 
    $postArray = [
        'categoryName' => htmlspecialchars(trim($_POST["categoryName"])),
        'userID' => $_SESSION["userID"],
        'categoryDescription' => htmlspecialchars(trim($_POST["categoryDescription"]))
    ];
    // Save in Database
    $insert = insertCategory($postArray);
    // Return results
    echo $insert;
    exit;
}
