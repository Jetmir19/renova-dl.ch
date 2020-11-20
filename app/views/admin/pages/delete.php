<?php

if (isset($_POST["dbDelete"])) {
    // Posted data 
    $pageID = (int) $_POST["dbDelete"];
    // Delete from Database
    $delete = deletePage($pageID);
    // Return results
    echo $delete;
    exit;
}
