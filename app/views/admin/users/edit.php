<?php

if (isset($_POST["dbEdit"])) {
    // Posted data
    $postArray = [
        'userID' => (int) $_POST["dbEdit"],
        'userEmail' => $_POST["userEmail"],
        'oldPassword' => $_POST["oldPassword"],
        'newPassword' => $_POST["newPassword"],
        'userRole' => isset($_POST["userRole"]) ? 'admin' : 'default',
    ];
    // Update in Database
    $update = updateUser($postArray);
    // Return results
    echo $update;
    exit;
}
