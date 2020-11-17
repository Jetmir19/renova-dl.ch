<?php 

if (isset($_POST["dbEdit"])) {
    $ok = true;

    $categoryID = (int) $_POST["dbEdit"];
    $categoryName = htmlspecialchars(trim($_POST["categoryName"]));
    $categoryDescription = htmlspecialchars(trim($_POST["categoryDescription"]));

    // Fields required
    if (empty($categoryName)) {
        $ok = false;
        $output .= "Name can not be empty!<br>";
    }
    if (empty($categoryDescription)) {
        $ok = false;
        $output .= "Please write a description!<br>";
    }

    if ($ok === true) {
        $sql = "UPDATE category SET
		categoryName=:categoryName, 
		categoryDescription=:categoryDescription
		WHERE categoryID=:categoryID
		";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(":categoryID", $categoryID);
        $stmt->bindParam(":categoryName", $categoryName);
        $stmt->bindParam(":categoryDescription", $categoryDescription);

        if ($stmt->execute()) {
            $output .= "success";
            // header("Location: " . APPURL . "/admin/categories");
        } else {
            $output .= "Query Error!<br> Something went wrong. Please try again later.";
        }
    }
    // Return results
    echo $output;
    exit;
}
