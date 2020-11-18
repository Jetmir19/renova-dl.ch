<?php

if (isset($_POST["dbDelete"])) {
    $ok = true;

    // $categoryID = (int) $_POST["dbDelete"];

    // if ($ok === true) {

    //     $sql = "DELETE FROM category
    //             WHERE categoryID=:categoryID";

    //     $stmt = $db->prepare($sql);
    //     $stmt->bindParam(":categoryID", $categoryID);

    //     if ($stmt->execute()) {
    //         $output .= "success";
    //         // header("Location: " . APPURL . "/admin/categories");
    //     } else {
    //         $output .= "Query Error!<br> Something went wrong. Please try again later.";
    //     }
    // }

    // This should be removed in production
    $output .= "The delete functionality is still in development.";

    // Return results
    echo $output;
    exit;
}
