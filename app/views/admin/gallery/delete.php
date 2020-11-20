<?php

if (isset($_POST["dbDelete"])) {
    // // Posted data 
    // $categoryID = (int) $_POST["dbDelete"];
    // // Delete from Database
    // $delete = deleteGallery($categoryID);

    // This should be removed in production
    $delete = "The edit functionality is still in development.";

    // Return results
    echo $delete;
    exit;
}
