<?php

/* Geting the Page content from the Database */
# ------------------------------------------------------------
function getContent($pageName, $categoryName, $pageStatus = 1)
# ------------------------------------------------------------
{
    global $db;

    // Make sure if there is no session the default page loads
    $pageLanguage = isset($_SESSION["language"]) ? $_SESSION["language"] : DEFAULT_LANGUAGE;

    $sql = "SELECT * FROM pages 
            INNER JOIN category ON pageCategoryID=categoryID
            WHERE pageName  = '$pageName' 
            AND categoryName = '$categoryName' 
            AND pageLanguage = '$pageLanguage' 
            AND pageStatus = '$pageStatus'";

    $stmt = $db->query($sql);

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch()) {
            $content = htmlspecialchars_decode($row['pageContent']);
            eval(" ?>" . $content . "<?php ");
        }
    } else {
        echo "<div class='container py-5'><h2>Sorry, this content isn't available right now</h2>";
        echo "<hr class='mt-0' />";
        echo "The link you opened may expired, or the page isn't active yet.</div>";
    }
}
