<?php

// Subcategories
if (isset($_POST["dbEdit"])) {
    // Posted data 
    $postArray = [
        'subCategoryID' => (int) $_POST["dbEdit"],
        'categoryID' => $_POST["categoryID"] ?? '',
        'userID' => $_SESSION["userID"],
        'subCategoryName' => htmlspecialchars(trim($_POST["subCategoryName"])),
        'subCategoryDescription' => htmlspecialchars(trim($_POST["subCategoryDescription"]))
    ];
    // Save in Database
    $update = updateSubCategory($postArray);
    // Return results
    echo $update;
    exit;
}
