<?php
// Database connection
require_once DB_PATH . "/db.php";

# ---------------------------------------------------
function getCategories()
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM category 
    INNER JOIN user 
    ON categoryUserID=userID 
    ORDER BY categoryDate DESC";

    $stmt = $db->query($sql);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        return $data;
    }

    return false;
}

# ---------------------------------------------------
function getCategoryById($id)
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM category 
    INNER JOIN user 
    ON categoryUserID=userID 
    WHERE categoryID=:id";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        return $data;
    }

    return false;
}
