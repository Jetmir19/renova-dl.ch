<?php

if (isset($_POST["dbInsert"])) {
    $ok = true;

    $pageName = htmlspecialchars(trim($_POST["pageName"]));
    $pageUserID = $_SESSION["userID"];
    $pageTitle = htmlspecialchars(trim($_POST["pageTitle"]));
    $pageContent = htmlspecialchars(trim($_POST["pageContent"]));

    //Fields required
    if (empty($pageName)) {
        $ok = false;
        $output .= "Name can not be empty!<br>";
    }
    if (isset($_POST["pageCategoryID"])) {
        $pageCategoryID = $_POST["pageCategoryID"];
    } else {
        $ok = false;
        $output .= "Please choose Category!<br>";
    }
    if (isset($_POST["pageLanguage"])) {
        $pageLanguage = $_POST["pageLanguage"];
    } else {
        $ok = false;
        $output .= "Please choose a Language!<br>";
    }
    if (empty($pageTitle)) {
        $ok = false;
        $output .= "Please input a Title!<br>";
    }
    if (empty($pageContent)) {
        $ok = false;
        $output .= "Please input a pageContent!<br>";
    }

    if ($ok === true) {
        $sql = "INSERT INTO pages
            (
                pageName,
                pageUserID, 
                pageCategoryID, 
                pageTitle,
                pageLanguage, 
                pageContent
            )
            VALUES
            (
                :pageName,
                :pageUserID, 
                :pageCategoryID, 
                :pageTitle,
                :pageLanguage, 
                :pageContent
            )";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":pageName", $pageName);
        $stmt->bindParam(":pageUserID", $pageUserID);
        $stmt->bindParam(":pageCategoryID", $pageCategoryID);
        $stmt->bindParam(":pageTitle", $pageTitle);
        $stmt->bindParam(":pageLanguage", $pageLanguage);
        $stmt->bindParam(":pageContent", $pageContent);
        if ($stmt->execute()) {
            $output .= "success";
            // header("Location: " . APPURL . "/admin/pages");
        } else {
            $output .= "Query Error!<br> Something went wrong. Please try again later.";
            //$output .= print_r($stmt->errorInfo());
        }
    }
    // Return results
    echo $output;
    exit;
}
