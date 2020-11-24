<?php

if (isset($_POST["dbEdit"])) {
    // Posted data
    $postArray = [
        'pageID' => (int) $_POST["dbEdit"],
        'subCategoryID' => $_POST["subCategoryID"] ?? '',
        'userID' => $_SESSION["userID"],
        'pageName' => htmlspecialchars(trim($_POST["pageName"])),
        'pageTitle' => htmlspecialchars(trim($_POST["pageTitle"])),
        'pageLanguage' => $_POST["pageLanguage"] ?? '',
        'pageContent' => htmlspecialchars(trim($_POST["pageContent"])),
        'pageStatus' => isset($_POST["pageStatus"]) ? 1 : 0,
    ];
    // Update in Database
    $update = updatePage($postArray);
    // Return results
    echo $update;
    exit;
}
