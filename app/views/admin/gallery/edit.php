<?php

if (isset($_POST["dbEdit"])) {
    $ok = true;

    // $tokenID = (int) $_POST["dbEdit"];
    // $app_id = htmlspecialchars(trim($_POST["app_id"]));
    // $app_secret = htmlspecialchars(trim($_POST["app_secret"]));
    // $userID = htmlspecialchars(trim($_POST["userID"]));
    // $token = htmlspecialchars(trim($_POST["token"]));

    // // Fields required
    // if (empty($app_id) || !is_numeric($app_id)) {
    //     $ok = false;
    //     $output .= "app_id can not be empty and must be numeric!<br>";
    // }
    // if (empty($app_secret)) {
    //     $ok = false;
    //     $output .= "app_secret can not be empty!<br>";
    // }
    // if (empty($userID) || (!is_numeric($userID))) {
    //     $ok = false;
    //     $output .= "userID can not be empty and must be numeric!<br>";
    // }
    // if (empty($token)) {
    //     $ok = false;
    //     $output .= "token can not be empty!<br>";
    // }


    // if ($ok === true) {
    //     $sql = "UPDATE fb_access_token SET
    // 	app_id=:app_id, 
    // 	app_secret=:app_secret,
    // 	userID=:userID,
    // 	token=:token        
    // 	WHERE id=:tokenID";

    //     $stmt = $db->prepare($sql);
    //     $stmt->bindParam(":tokenID", $tokenID);
    //     $stmt->bindParam(":app_id", $app_id);
    //     $stmt->bindParam(":app_secret", $app_secret);
    //     $stmt->bindParam(":userID", $userID);
    //     $stmt->bindParam(":token", $token);

    //     if ($stmt->execute()) {
    //         $output .= "success";
    //         // header("Location: " . APPURL . "/admin/gallery");
    //     } else {
    //         $output .= "Query Error!<br> Something went wrong. Please try again later.";
    //     }
    // }

    // This should be removed in production
    $output .= "The edit functionality is still in development.";

    // Return results
    echo $output;
    exit;
}
