<?php
// Database connection
require_once DB_PATH . "/db.php";

# ---------------------------------------------------
function getPages()
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM pages 
    INNER JOIN category ON pageCategoryID=categoryID
    INNER JOIN user ON pageUserID=userID
    ORDER BY pageName DESC";

    $stmt = $db->query($sql);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        return $data;
    }

    return false;
}

# ---------------------------------------------------
function getPageById($id)
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM pages 
    INNER JOIN category ON pageCategoryID=categoryID
    WHERE pageID=:id";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        return $data;
    }

    return false;
}
