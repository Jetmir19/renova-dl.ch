<?php

if (isset($_POST["dbDelete"])) {
    // Posted data 
    $galleryID = (int) $_POST["dbDelete"];
    // This should be removed in production
    $delete = deleteImage($galleryID);
    // Return results
    echo $delete;
    exit;
}
