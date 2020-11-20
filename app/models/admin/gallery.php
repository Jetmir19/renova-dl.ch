<?php

# ---------------------------------------------------
function getImages()
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM gallery
    INNER JOIN user 
    ON galleryUserID=userID 
    ORDER BY galleryDate DESC";

    $stmt = $db->query($sql);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        return $data;
    }

    return false;
}

# ---------------------------------------------------
function getImageById($id)
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM gallery 
    WHERE galleryID=:id";

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
function getImagesCount()
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT COUNT(*) as totalRows FROM gallery";

    $stmt = $db->query($sql);

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        return $data;
    }

    return false;
}

# ---------------------------------------------------
function uploadImage()
# ---------------------------------------------------
{
    # code...
}

# ---------------------------------------------------
function insertImage($postArray)
# ---------------------------------------------------
{
    // global $db;
    // $ok = true;
    // $output = '';

    // // Validation
    // if (empty($postArray['categoryName'])) {
    //     $ok = false;
    //     $output .= "Name can not be empty!<br>";
    // }
    // if (empty($postArray['categoryDescription'])) {
    //     $ok = false;
    //     $output .= "Please insert a description!<br>";
    // }

    // $sql = "INSERT INTO category
    // 	(
    // 		categoryName,
    // 		categoryUserID,
    // 		categoryDescription
    // 	)
    // 	VALUES
    // 	(
    // 		:categoryName,
    // 		:categoryUserID,
    // 		:categoryDescription
    //     )";

    // $stmt = $db->prepare($sql);

    // $stmt->bindParam(":categoryName", $postArray['categoryName']);
    // $stmt->bindParam(":categoryUserID", $postArray['categoryUserID']);
    // $stmt->bindParam(":categoryDescription", $postArray['categoryDescription']);

    // if ($ok === true) {
    //     if ($stmt->execute()) {
    //         $output .= "success";
    //     } else {
    //         $output .= "Something went wrong with the Database! <br> Please try again later.";
    //     }
    // }

    // return $output;
}

# ---------------------------------------------------
function updateImage($postArray)
# ---------------------------------------------------
{
    // global $db;
    // $ok = true;
    // $output = '';

    // // Validation
    // if (empty($postArray['categoryName'])) {
    //     $ok = false;
    //     $output .= "Name can not be empty!<br>";
    // }
    // if (empty($postArray['categoryDescription'])) {
    //     $ok = false;
    //     $output .= "Please insert a description!<br>";
    // }

    // $sql = "UPDATE category 
    // SET categoryName=:categoryName, categoryDescription=:categoryDescription
    // WHERE categoryID=:categoryID";

    // $stmt = $db->prepare($sql);

    // $stmt->bindParam(":categoryID", $postArray['categoryID']);
    // $stmt->bindParam(":categoryName", $postArray['categoryName']);
    // $stmt->bindParam(":categoryDescription", $postArray['categoryDescription']);

    // if ($ok === true) {
    //     if ($stmt->execute()) {
    //         $output .= "success";
    //     } else {
    //         $output .= "Something went wrong with the Database! <br> Please try again later.";
    //     }
    // }

    // return $output;
}

# ---------------------------------------------------
function deleteImage($galleryID)
# ---------------------------------------------------
{
    // global $db;
    // $output = '';

    // $sql = "DELETE FROM category
    // WHERE categoryID=:categoryID";

    // $stmt = $db->prepare($sql);

    // $stmt->bindParam(":categoryID", $categoryID);

    // if ($stmt->execute()) {
    //     $output .= "success";
    // } else {
    //     $output .= "Something went wrong with the Database! <br> Please try again later.";
    // }

    // return $output;
}
