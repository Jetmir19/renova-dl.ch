<?php
// Database connection
require_once DB_PATH . "/db.php";

# ---------------------------------------------------
function getPhotos()
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM gallery
    INNER JOIN user 
    ON galleryUserID=userID 
    ORDER BY galleryDate DESC";

    $stmt = $db->query($sql);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        return $data;
    }

    return false;
}

# ---------------------------------------------------
function getPhotoById($id)
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM gallery 
    WHERE galleryID=:id";

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
function getPhotosCount()
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT COUNT(*) as totalRows FROM gallery";

    $stmt = $db->query($sql);

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        return $data;
    }

    return false;
}
