<?php

// Subcategories
if (isset($_POST["dbInsert"])) {
    // Posted data 
    $postArray = [
        'categoryID' => $_POST["categoryID"] ?? '',
        'userID' => $_SESSION["userID"],
        'subCategoryName' => htmlspecialchars(trim($_POST["subCategoryName"])),
        'subCategoryDescription' => htmlspecialchars(trim($_POST["subCategoryDescription"]))
    ];
    // Save in Database
    $insert = insertSubCategory($postArray);
    // Return results
    echo $insert;
    exit;
}
