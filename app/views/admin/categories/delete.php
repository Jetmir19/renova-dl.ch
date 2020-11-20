<?php

if (isset($_POST["dbDelete"])) {
    // Posted data 
    $categoryID = (int) $_POST["dbDelete"];
    // Delete from Database
    $delete = deleteCategory($categoryID);
    // Return results
    echo $delete;
    exit;
}
