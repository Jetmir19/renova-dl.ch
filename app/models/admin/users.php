<?php

# ---------------------------------------------------
function getUsers()
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM user
    ORDER BY userCreatedAt DESC";

    $stmt = $db->query($sql);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        return $data;
    }

    return false;
}

# ---------------------------------------------------
function getUserById($id)
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM user 
    WHERE userID=:id";

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
function insertUser($postArray)
# ---------------------------------------------------
{
    # code...
}

# ---------------------------------------------------
function updateUser($postArray)
# ---------------------------------------------------
{
    global $db;
    $ok = true;
    $output = '';

    // Get User based on userID
    $row = getUserById($postArray['userID']);

    // Email exist Validation START
    if (filter_var($postArray['userEmail'], FILTER_VALIDATE_EMAIL) === false) {
        $ok = false;
        $output .= "The email you entered was not valid";
    }
    // Select all emails ecxept the existing user email
    $sql = "SELECT userEmail FROM user 
    WHERE userID != :userID";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(":userID", $postArray['$userID']);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // If email exists in the array
    foreach ($result as $r) {
        if ($postArray['userEmail'] == $r['userEmail']) {
            $ok = false;
            $output .= "Email already exists!<br>";
        }
    }
    // Email exist Validation END

    // Password Validation - if the User try to edit password
    if ($postArray['newPassword'] !== "" || $postArray["oldPassword"] !== "") {
        if (empty($postArray["newPassword"])) {
            $ok = false;
            $output .= "Please enter new password<br>";
        }
        if (strlen($postArray['newPassword']) < 8) {
            $ok = false;
            $output .= "The new password must have at least 8 characters!<br>";
        }
        if (!password_verify($postArray['oldPassword'], $row["userPassword"])) {
            $ok = false;
            $output .= "The old Password is wrong!<br>";
        }
    }

    $sql = "UPDATE user 
    SET userEmail=:userEmail,
    userRole=:userRole,
    userPassword=:userPassword
    WHERE userID=:userID";

    $stmt = $db->prepare($sql);

    $stmt = $db->prepare($sql);
    $stmt->bindParam(":userID", $postArray['userID']);
    $stmt->bindParam(":userEmail", $postArray['userEmail']);
    $stmt->bindParam(":userRole", $postArray['userRole']);

    // Password will be first hashed	
    $options = ['cost' => 10];
    // If the new password is set
    if ($postArray['newPassword'] !== "") {
        $newPassword = password_hash($postArray['newPassword'], PASSWORD_BCRYPT, $options);
        $stmt->bindParam(":userPassword", $newPassword);
    } else {
        // else replace the existing
        $stmt->bindParam(":userPassword", $row["userPassword"]);
    }

    if ($ok === true) {
        if ($stmt->execute()) {
            $output .= "success";
        } else {
            $output .= "Something went wrong with the Database! <br> Please try again later.";
        }
    }

    return $output;
}

# ---------------------------------------------------
function deleteUser($categoryID)
# ---------------------------------------------------
{
    # code...
}
