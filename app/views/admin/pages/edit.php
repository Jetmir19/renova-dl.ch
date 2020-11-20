<?php

if (isset($_POST["dbEdit"])) {
    // Posted data
    $postArray = [
        'pageID' => (int) $_POST["dbEdit"],
        'pageName' => htmlspecialchars(trim($_POST["pageName"])),
        'pageUserID' => $_SESSION["userID"],
        'pageCategoryID' => $_POST["pageCategoryID"] ?? '',
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
