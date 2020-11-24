<?php

// Categories
if (isset($_POST["dbInsertCat"])) {
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

// Subcategories
if (isset($_POST["dbInsertSub"])) {
    // Posted data 
    $postArray = [
        'subCategoryName' => htmlspecialchars(trim($_POST["subCategoryName"])),
        'categoryID' => $_POST["categoryID"] ?? '',
        'userID' => $_SESSION["userID"],
        'subCategoryDescription' => htmlspecialchars(trim($_POST["subCategoryDescription"]))
    ];
    // Save in Database
    $insert = insertSubCategory($postArray);
    // Return results
    echo $insert;
    exit;
}
