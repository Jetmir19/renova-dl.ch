<?php

if (isset($_POST["dbEdit"])) {
    // // Posted data 
    // $postArray = [
    //     'categoryID' => (int) $_POST["dbEdit"],
    //     'categoryName' => htmlspecialchars(trim($_POST["categoryName"])),
    //     'categoryDescription' => htmlspecialchars(trim($_POST["categoryDescription"]))
    // ];
    // // Update in Database
    // $update = updateGallery($postArray);

    // This should be removed in production
    $update = "The edit functionality is still in development.";

    // Return results
    echo $update;
    exit;
}
