<?php

if (isset($_POST["dbDelete"])) {
    // Posted data 
    $subCategoryID = (int) $_POST["dbDelete"];
    // Delete from Database
    $delete = deleteSubCategory($subCategoryID);
    // Return results
    echo $delete;
    exit;
}
