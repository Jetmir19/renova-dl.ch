<?php

# ---------------------------------------------------
function getPages()
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM pages 
    INNER JOIN category ON pageCategoryID=categoryID
    INNER JOIN user ON pageUserID=userID
    ORDER BY pageName DESC";

    $stmt = $db->query($sql);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        return $data;
    }

    return false;
}

# ---------------------------------------------------
function getPageById($id)
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM pages 
    INNER JOIN category ON pageCategoryID=categoryID
    WHERE pageID=:id";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        return $data;
    }

    return false;
}

# ---------------------------------------------------
function insertPage($postArray)
# ---------------------------------------------------
{
    global $db;
    $ok = true;
    $output = '';

    // Validation
    if (empty($postArray["pageName"])) {
        $ok = false;
        $output .= "Name can not be empty!<br>";
    }
    if (empty($postArray["pageTitle"])) {
        $ok = false;
        $output .= "Please input a Title!<br>";
    }
    if (empty($postArray["pageLanguage"])) {
        $ok = false;
        $output .= "Please choose a Language!<br>";
    }
    if (empty($postArray["pageCategoryID"])) {
        $ok = false;
        $output .= "Please choose Category!<br>";
    }
    if (empty($postArray["pageContent"])) {
        $ok = false;
        $output .= "Please input a pageContent!<br>";
    }

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

    $stmt->bindParam(":pageName", $postArray['pageName']);
    $stmt->bindParam(":pageUserID", $postArray['pageUserID']);
    $stmt->bindParam(":pageCategoryID", $postArray['pageCategoryID']);
    $stmt->bindParam(":pageTitle", $postArray['pageTitle']);
    $stmt->bindParam(":pageLanguage", $postArray['pageLanguage']);
    $stmt->bindParam(":pageContent", $postArray['pageContent']);

    if ($ok === true) {
        if ($stmt->execute()) {
            $output .= "success";
        } else {
            $output .= "Something went wrong with the Database! <br> Please try again later.";
        }
    }

    return $output;
}

# ---------------------------------------------------
function updatePage($postArray)
# ---------------------------------------------------
{
    global $db;
    $ok = true;
    $output = '';

    // Validation
    if (empty($postArray['pageName'])) {
        $ok = false;
        $output .= "Name can not be empty!<br>";
    }
    if (empty($postArray['pageTitle'])) {
        $ok = false;
        $output .= "Please input a Title!<br>";
    }
    if (empty($postArray['pageContent'])) {
        $ok = false;
        $output .= "Content can not be empty!<br>";
    }

    $sql = "UPDATE pages SET
                pageName=:pageName, 
                pageCategoryID=:pageCategoryID, 
                pageTitle=:pageTitle, 
                pageLanguage=:pageLanguage, 
                pageContent=:pageContent,
                pageStatus=:pageStatus
                WHERE pageID=:pageID";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":pageID", $postArray['pageID']);
    $stmt->bindParam(":pageName", $postArray['pageName']);
    $stmt->bindParam(":pageCategoryID", $postArray['pageCategoryID']);
    $stmt->bindParam(":pageTitle", $postArray['pageTitle']);
    $stmt->bindParam(":pageLanguage", $postArray['pageLanguage']);
    $stmt->bindParam(":pageContent", $postArray['pageContent']);
    $stmt->bindParam(":pageStatus", $postArray['pageStatus']);

    if ($ok === true) {
        if ($stmt->execute()) {
            $output .= "success";
        } else {
            $output .= "Something went wrong with the Database! <br> Please try again later.";
        }
    }

    return $output;
}

# ---------------------------------------------------
function deletePage($pageID)
# ---------------------------------------------------
{
    global $db;
    $output = '';

    $sql = "DELETE FROM pages
    WHERE pageID=:pageID";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":pageID", $pageID);

    if ($stmt->execute()) {
        $output .= "success";
    } else {
        $output .= "Something went wrong with the Database! <br> Please try again later.";
    }

    return $output;
}
