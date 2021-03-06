<?php

# ---------------------------------------------------
function getImages()
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM gallery
    INNER JOIN sub_category ON gallery.subCategoryID=sub_category.subCategoryID
    LEFT JOIN user 
    ON gallery.userID=user.userID 
    ORDER BY subCategoryName DESC";

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
    INNER JOIN sub_category ON gallery.subCategoryID=sub_category.subCategoryID
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
function getGallerySubCategoriesCountById($id)
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT COUNT(*) as num FROM gallery 
    WHERE subCategoryID=:id";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        return $data['num'];
    }

    return false;
}

# ---------------------------------------------------
function uploadImage($file_tmp, $file_name)
# ---------------------------------------------------
{
    if (move_uploaded_file($file_tmp, UPLOAD_PATH . '/' . $file_name)) {
        return true;
    } else {
        return false;
    }
}

# ---------------------------------------------------
function insertImage($postArray, $files)
# ---------------------------------------------------
{
    global $db;
    $ok = true;
    $output = '';

    $file_name = $files['galleryImage']['name'];
    $file_size = $files['galleryImage']['size'];
    $file_tmp = $files['galleryImage']['tmp_name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

    // Validation
    if (empty($postArray['galleryTitle'])) {
        $ok = false;
        $output .= "Title can not be empty!<br>";
    }
    if (empty($postArray["subCategoryID"])) {
        $ok = false;
        $output .= 'Please choose Subcategory or <a href="' . APPURL . '/admin/categories?action=add&type=sub">create new </a><br>';
    }
    if (empty($files['galleryImage']['name'])) {
        $ok = false;
        $output .= "Please choose Image!<br>";
    }
    if (empty($postArray['galleryDescription'])) {
        $ok = false;
        $output .= "Please insert a description!<br>";
    }

    // Handling files
    if ($files["galleryImage"]["name"] !== "" && $files["galleryImage"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        if (array_key_exists($file_ext, $allowed) === false) {
            $ok = false;
            $output .= "File not allowed, please choose a JPEG, GIF or PNG file.<br>";
        }
        if ($file_size > 2097152) {
            $ok = false;
            $output .= 'Error: File size is larger than the allowed limit(2MB maximum).<br>';
        }
        if (file_exists(UPLOAD_PATH . '/' . $file_name)) {
            $ok = false;
            $output .= $file_name . " already exists.";
        }
        // Rename file
        $file_name = uniqid() . "." . $file_ext;
    }

    $sql = "INSERT INTO gallery
    	(
    		galleryTitle,
            subCategoryID,
    		userID,
    		galleryImage,
            galleryDescription
    	)
    	VALUES
    	(
    		:galleryTitle,
    		:subCategoryID,
    		:userID,
    		:galleryImage,
    		:galleryDescription
        )";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(":galleryTitle", $postArray['galleryTitle']);
    $stmt->bindParam(":subCategoryID", $postArray['subCategoryID']);
    $stmt->bindParam(":userID", $postArray['userID']);
    $stmt->bindParam(":galleryImage", $file_name);
    $stmt->bindParam(":galleryDescription", $postArray['galleryDescription']);

    if ($ok === true) {
        if (uploadImage($file_tmp, $file_name) && $stmt->execute()) {
            $output .= "success";
            // Save flash message in Session
            $_SESSION['success_message'] = "The operation completed successfully.";
        } else {
            $output .= "Something went wrong! <br>Please try again later.";
        }
    }

    return $output;
}

# ---------------------------------------------------
function deleteImage($galleryID)
# ---------------------------------------------------
{
    global $db;
    $output = '';

    $sql = "DELETE FROM gallery
    WHERE galleryID=:galleryID";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":galleryID", $galleryID);

    // Remove the existing Images
    $img = getImageById($galleryID);
    $path = UPLOAD_PATH . '/' . $img['galleryImage'];
    if (file_exists($path)) {
        unlink($path);
    }

    if ($stmt->execute()) {
        $output .= "success";
        // Save flash message in Session
        $_SESSION['success_message'] = "The operation completed successfully.";
    } else {
        $output .= "Something went wrong with the Database! <br> Please try again later.";
    }

    return $output;
}

# ---------------------------------------------------
function updateImage($postArray)
# ---------------------------------------------------
{
    // global $db;
    // $ok = true;
    // $output = '';

    // // Validation
    // if (empty($postArray['galleryTitle'])) {
    //     $ok = false;
    //     $output .= "Title can not be empty!<br>";
    // }
    // if (empty($files['galleryImage']['name'])) {
    //     $ok = false;
    //     $output .= "Please choose Image!<br>";
    // }

    // // Handling files START
    // $file_name = $files['galleryImage']['name'];
    // $file_size = $files['galleryImage']['size'];
    // $file_tmp = $files['galleryImage']['tmp_name'];
    // $file_type = $files['galleryImage']['type'];
    // $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

    // if ($files["galleryImage"]["name"] !== "" && $files["galleryImage"]["error"] == 0) {
    //     $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    //     if (array_key_exists($file_ext, $allowed) === false) {
    //         $ok = false;
    //         $output .= "File not allowed, please choose a JPEG, GIF or PNG file.<br>";
    //     }
    //     if ($file_size > 2097152) {
    //         $ok = false;
    //         $output .= 'File size must be excately 2 MB<br>';
    //     }
    //     if (file_exists(UPLOAD_PATH . '/' . $file_name)) {
    //         $ok = false;
    //         $output .= $file_name . " already exists.";
    //     }
    //     // Rename file
    //     $file_name = uniqid() . "." . $file_ext;
    // }
    // // Handling files END

    // $sql = "INSERT INTO gallery
    // 	(
    // 		galleryTitle,
    // 		userID,
    // 		galleryImage
    // 	)
    // 	VALUES
    // 	(
    // 		:galleryTitle,
    // 		:userID,
    // 		:galleryImage
    //     )";

    // $stmt = $db->prepare($sql);

    // $stmt = $db->prepare($sql);
    // $stmt->bindParam(":galleryTitle", $postArray['galleryTitle']);
    // $stmt->bindParam(":userID", $postArray['userID']);
    // $stmt->bindParam(":galleryImage", $file_name);

    // if ($ok === true) {
    //     // Remove the existing Image
    //     $img = getImageById($galleryID);
    //     $path = UPLOAD_PATH . '/' . $img['galleryImage'];
    //     if (file_exists($path)) {
    //         unlink($path);
    //     }

    // if (uploadImage($file_tmp, $file_name) && $stmt->execute()) {
    //     $output .= "success";
    // 	// Save flash message in Session
    // $_SESSION['success_message'] = "The operation completed successfully.";
    // } else {
    //     $output .= "Something went wrong! <br> Please try again later.";
    // }
    // }

    // This should be removed in production
    $output = "The edit functionality is still in development.";

    return $output;
}
