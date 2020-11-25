<?php

# ---------------------------------------------------
function getCategories()
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM category as c
    INNER JOIN (SELECT userID, userName FROM user) as u ON u.userID=c.userID
    ORDER BY categoryDate DESC";

    $stmt = $db->query($sql);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        return $data;
    }

    return false;
}

# ---------------------------------------------------
function getCategoryById($id)
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM category 
    INNER JOIN user 
    ON category.userID=user.userID 
    WHERE category.categoryID=:id";

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
function insertCategory($postArray)
# ---------------------------------------------------
{
    global $db;
    $ok = true;
    $output = '';

    // Validation
    if (empty($postArray['categoryName'])) {
        $ok = false;
        $output .= "Name can not be empty!<br>";
    }
    if (empty($postArray['categoryDescription'])) {
        $ok = false;
        $output .= "Please insert a description!<br>";
    }

    $sql = "INSERT INTO category
		(
			categoryName,
			userID,
			categoryDescription
		)
		VALUES
		(
			:categoryName,
			:userID,
			:categoryDescription
        )";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":categoryName", $postArray['categoryName']);
    $stmt->bindParam(":userID", $postArray['userID']);
    $stmt->bindParam(":categoryDescription", $postArray['categoryDescription']);

    if ($ok === true) {
        if ($stmt->execute()) {
            $output .= "success";
            // Save flash message in Session
            $_SESSION['success_message'] = "The operation completed successfully.";
        } else {
            $output .= "Something went wrong with the Database! <br> Please try again later.";
        }
    }

    return $output;
}

# ---------------------------------------------------
function updateCategory($postArray)
# ---------------------------------------------------
{
    global $db;
    $ok = true;
    $output = '';

    // Validation
    if (empty($postArray['categoryName'])) {
        $ok = false;
        $output .= "Name can not be empty!<br>";
    }
    if (empty($postArray['categoryDescription'])) {
        $ok = false;
        $output .= "Please insert a description!<br>";
    }

    $sql = "UPDATE category 
    SET categoryName=:categoryName, 
    userID=:userID,
    categoryDescription=:categoryDescription
    WHERE categoryID=:categoryID";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":categoryID", $postArray['categoryID']);
    $stmt->bindParam(":userID", $postArray['userID']);
    $stmt->bindParam(":categoryName", $postArray['categoryName']);
    $stmt->bindParam(":categoryDescription", $postArray['categoryDescription']);

    if ($ok === true) {
        if ($stmt->execute()) {
            $output .= "success";
            // Save flash message in Session
            $_SESSION['success_message'] = "The operation completed successfully.";
        } else {
            $output .= "Something went wrong with the Database! <br> Please try again later.";
        }
    }

    return $output;
}

# ---------------------------------------------------
function deleteCategory($categoryID)
# ---------------------------------------------------
{
    global $db;
    $output = '';

    $sql = "DELETE FROM category
    WHERE categoryID=:categoryID";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":categoryID", $categoryID);

    if ($stmt->execute()) {
        $output .= "success";
        // Save flash message in Session
        $_SESSION['success_message'] = "The operation completed successfully.";
    } else {
        $output .= "Something went wrong with the Database! <br> Please try again later.";
    }

    return $output;
}
