<?php

// GET Gallery Photos from DB
# ---------------------------------------------------
function getGalleryPhotosFromDB($limit = 12)
# ---------------------------------------------------
{
    global $db;

    $sql = "SELECT * FROM gallery 
    ORDER BY galleryDate DESC
    LIMIT $limit";

    $stmt = $db->query($sql);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        return $data;
    }

    return false;
}
