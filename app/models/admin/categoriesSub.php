<?php

# ---------------------------------------------------
function getSubCategories()
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM sub_category sc
    INNER JOIN (SELECT categoryID, categoryName FROM category) as c ON c.categoryID=sc.categoryID
    LEFT JOIN (SELECT userID, userName FROM user) as u ON u.userID=sc.userID
    ORDER BY subCategoryDate DESC";

    $stmt = $db->query($sql);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        return $data;
    }

    return false;
}

# ---------------------------------------------------
function getSubCategoryById($id)
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM sub_category 
    INNER JOIN category 
    ON category.categoryID=sub_category.categoryID 
    RIGHT JOIN user 
    ON sub_category.userID=user.userID 
    WHERE sub_category.subCategoryID=:id";

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
function insertSubCategory($postArray)
# ---------------------------------------------------
{
    global $db;
    $ok = true;
    $output = '';

    // Validation
    if (empty($postArray['subCategoryName'])) {
        $ok = false;
        $output .= "Name can not be empty!<br>";
    }
    if (empty($postArray["categoryID"])) {
        $ok = false;
        $output .= 'Please choose Category or <a href="' . APPURL . '/admin/categories?action=add">create new </a><br>';
    }
    if (empty($postArray['subCategoryDescription'])) {
        $ok = false;
        $output .= "Please insert a description!<br>";
    }

    $sql = "INSERT INTO sub_category
		(
			subCategoryName,
            categoryID,
			userID,
			subCategoryDescription
		)
		VALUES
		(
			:subCategoryName,
            :categoryID,
			:userID,
			:subCategoryDescription
        )";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":subCategoryName", $postArray['subCategoryName']);
    $stmt->bindParam(":categoryID", $postArray['categoryID']);
    $stmt->bindParam(":userID", $postArray['userID']);
    $stmt->bindParam(":subCategoryDescription", $postArray['subCategoryDescription']);

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
function updateSubCategory($postArray)
# ---------------------------------------------------
{
    global $db;
    $ok = true;
    $output = '';

    // Validation
    if (empty($postArray['subCategoryName'])) {
        $ok = false;
        $output .= "Name can not be empty!<br>";
    }
    if (empty($postArray['subCategoryDescription'])) {
        $ok = false;
        $output .= "Please insert a description!<br>";
    }

    $sql = "UPDATE sub_category 
    SET categoryID=:categoryID,
    subCategoryName=:subCategoryName,
    subCategoryDescription=:subCategoryDescription
    WHERE subCategoryID=:subCategoryID";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":subCategoryID", $postArray['subCategoryID']);
    $stmt->bindParam(":categoryID", $postArray['categoryID']);
    $stmt->bindParam(":subCategoryName", $postArray['subCategoryName']);
    $stmt->bindParam(":subCategoryDescription", $postArray['subCategoryDescription']);

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
function deleteSubCategory($subCategoryID)
# ---------------------------------------------------
{
    global $db;
    $output = '';

    $sql = "DELETE FROM sub_category
    WHERE subCategoryID=:subCategoryID";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":subCategoryID", $subCategoryID);

    if ($stmt->execute()) {
        $output .= "success";
        // Save flash message in Session
        $_SESSION['success_message'] = "The operation completed successfully.";
    } else {
        $output .= "Something went wrong with the Database! <br> Please try again later.";
    }

    return $output;
}
