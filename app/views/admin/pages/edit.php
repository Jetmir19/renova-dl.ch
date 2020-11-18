<?php

if (isset($_POST["dbEdit"])) {
    $ok = true;

    $pageID = (int) $_POST["dbEdit"];
    $pageName = htmlspecialchars(trim($_POST["pageName"]));
    $pageCategoryID = htmlspecialchars(trim($_POST["pageCategoryID"]));
    $pageTitle = htmlspecialchars(trim($_POST["pageTitle"]));
    $pageLanguage = htmlspecialchars(trim($_POST["pageLanguage"]));
    $pageContent = htmlspecialchars(trim($_POST["pageContent"]));
    if (isset($_POST["pageStatus"])) {
        $pageStatus = 1;
    } else {
        $pageStatus = 0;
    }

    //Fields required
    if (empty($pageName)) {
        $ok = false;
        $output .= "Name can not be empty!<br>";
    }
    if (empty($pageContent)) {
        $ok = false;
        $output .= "Content can not be empty!<br>";
    }
    if (empty($pageTitle)) {
        $ok = false;
        $output .= "Please input a Title!<br>";
    }

    if ($ok === true) {
        //  First Upload then Update in DB
        $sql = "UPDATE pages SET
                pageName=:pageName, 
                pageCategoryID=:pageCategoryID, 
                pageTitle=:pageTitle, 
                pageLanguage=:pageLanguage, 
                pageContent=:pageContent,
                pageStatus=:pageStatus
                WHERE pageID=:pageID";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(":pageID", $pageID);
        $stmt->bindParam(":pageName", $pageName);
        $stmt->bindParam(":pageCategoryID", $pageCategoryID);
        $stmt->bindParam(":pageTitle", $pageTitle);
        $stmt->bindParam(":pageLanguage", $pageLanguage);
        $stmt->bindParam(":pageContent", $pageContent);
        $stmt->bindParam(":pageStatus", $pageStatus);

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
