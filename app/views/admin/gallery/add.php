<?php

if (isset($_POST["dbInsert"])) {
    $ok = true;

    // $categoryUserID = $_SESSION["userID"];
    // $categoryName = htmlspecialchars(trim($_POST["categoryName"]));
    // $categoryDescription = htmlspecialchars(trim($_POST["categoryDescription"]));

    // // Fields required
    // if (empty($categoryName)) {
    //     $ok = false;
    //     $output .= "Name can not be empty!<br>";
    // }
    // if (empty($categoryDescription)) {
    //     $ok = false;
    //     $output .= "Please insert a description!<br>";
    // }

    // if ($ok === true) {
    //     $sql = "INSERT INTO category
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

    //     $stmt = $db->prepare($sql);
    //     $stmt->bindParam(":categoryName", $categoryName);
    //     $stmt->bindParam(":categoryUserID", $categoryUserID);
    //     $stmt->bindParam(":categoryDescription", $categoryDescription);

    //     if ($stmt->execute()) {
    //         $output .= "success";
    //         // header("Location: " . APPURL . "/admin/categories");
    //     } else {
    //         $output .= "Query Error!<br> Something went wrong. Please try again later.";
    //     }
    // }

    // This should be removed in production
    $output .= "The add functionality is still in development.";

    // Return results
    echo $output;
    exit;
}
