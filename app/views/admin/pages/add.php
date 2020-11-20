<?php

if (isset($_POST["dbInsert"])) {
    // Posted data
    $postArray = [
        'pageName' => htmlspecialchars(trim($_POST["pageName"])),
        'pageUserID' => $_SESSION["userID"],
        'pageCategoryID' => $_POST["pageCategoryID"] ?? '',
        'pageTitle' => htmlspecialchars(trim($_POST["pageTitle"])),
        'pageLanguage' => $_POST["pageLanguage"] ?? '',
        'pageContent' => htmlspecialchars(trim($_POST["pageContent"]))
    ];
    // Save in Database
    $insert = insertPage($postArray);
    // Return results
    echo $insert;
    exit;
}
