<?php 

if (isset($_POST["dbDelete"])) {
    $ok = true;

    $pageID = (int) $_POST["dbDelete"];

    if ($ok === true) {
        $sql = "DELETE FROM pages
                WHERE pageID=:pageID";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(":pageID", $pageID);

        if ($stmt->execute()) {
            $output .= "success";
            // header("Location: " . APPURL . "/admin/pages");
        } else {
            $output .= "Query Error!<br> Something went wrong. Please try again later.";
        }
    }
    // Return results
    echo $output;
    exit;
}
