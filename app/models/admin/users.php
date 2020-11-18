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
