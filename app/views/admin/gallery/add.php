<?php

if (isset($_POST["dbInsert"])) {
    // // Posted data 
    // $postArray = [
    //     'categoryName' => htmlspecialchars(trim($_POST["categoryName"])),
    //     'categoryUserID' => $_SESSION["userID"],
    //     'categoryDescription' => htmlspecialchars(trim($_POST["categoryDescription"]))
    // ];
    // // Save in Database
    // $insert = insertGallery($postArray);

    // This should be removed in production
    $insert = "The edit functionality is still in development.";

    // Return results
    echo $insert;
    exit;
}
