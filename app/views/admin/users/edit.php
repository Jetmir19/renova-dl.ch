<?php 

if (isset($_POST["dbEdit"])) {
    $ok = true;

    $userID = (int) $_POST["dbEdit"];
    $userEmail = $_POST["userEmail"];
    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];

    // Select User based on userID
    $sql = "SELECT * FROM user WHERE userID=:userID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":userID", $userID);
    $stmt->execute();
    $row = $stmt->fetch();

    // Email exist Validation START
    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL) === false) {
        $ok = false;
        $output .= "The email you entered was not valid";
    }
    // Select all emails expect the editin user email
    $sql = "SELECT userEmail FROM user WHERE userID != :userID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":userID", $userID);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // If email exists in the array
    foreach ($result as $key => $value) {
        if ($userEmail == $value['userEmail']) {
            $ok = false;
            $output .= "Email already exists!<br>";
        }
    }
    // Email exist Validation END

    // Password Validation - if the User try to edit password
    if ($_POST['newPassword'] !== "" || $_POST["oldPassword"] !== "") {
        if (empty($_POST["newPassword"])) {
            $ok = false;
            $output .= "Please enter new password<br>";
        }
        if (strlen($newPassword) < 8) {
            $ok = false;
            $output .= "The new password must have at least 8 characters!<br>";
        }
        if (!password_verify($oldPassword, $row["userPassword"])) {
            $ok = false;
            $output .= "The old Password is wrong!<br>";
        }
    }

    if (isset($_POST["userRole"])) {
        $userRole = 'admin';
    } else {
        $userRole = 'default';
    }

    if ($ok === true) {
        $sql = "UPDATE user SET
                userEmail=:userEmail,
                userRole=:userRole,
                userPassword=:userPassword
                WHERE userID=:userID
                ";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(":userID", $userID);
        $stmt->bindParam(":userEmail", $userEmail);
        $stmt->bindParam(":userRole", $userRole);

        // Password will be first hashed	
        $options = ['cost' => 10];
        // If the new password is set
        if ($_POST['newPassword'] !== "") {
            $newPassword = password_hash($newPassword, PASSWORD_BCRYPT, $options);
            $stmt->bindParam(":userPassword", $newPassword);
        } else {
            // else replace the existing
            $stmt->bindParam(":userPassword", $row["userPassword"]);
        }

        if ($stmt->execute()) {
            $output .= "success";
            // header("Location: " . APPURL . "/admin/users");
        } else {
            $output .= "Query Error!<br> Something went wrong. Please try again later.";
        }
    }
    // Return results
    echo $output;
    exit;
}
