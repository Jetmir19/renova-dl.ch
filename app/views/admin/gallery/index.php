<?php
// User auth
checkUserLoggedIn();

// Database connection
require_once DB_PATH . "/db.php";
// global variable
global $db;

$output = "";


############# Edit in DB START #####################
require_once VIEWS_PATH . "/admin/gallery/edit.php";
############# Edit in DB END #######################


############# Gallery Home START ######################
require_once VIEWS_PATH . "/admin/includes/header.php";

if (!isset($_GET['action'])) {
?>
    <!-- Facebook API Data  -->
    <div class="row align-items-center pt-3">
        <div class="col text-left">
            <h3>Gallery</h3>
        </div>
    </div>

    <hr class="border-top">

    <!-- TOTAL PHOTOS -->
    <div class="table-responsive-sm">
        <table class="table table-striped text-left">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col"> Total Photos saved in Database</th>
                </tr>
            </thead>
            <tbody>
                <!-- MySQL START -->
                <?php
                $photosCount = getPhotosCount();
                echo "<tr>
                    <th scope='row'>Total Photos: " . $photosCount['totalRows'] . "</th>
                </tr>";

                ?>
                <!-- MySQL END -->
            </tbody>
        </table>
    </div>

    <hr class="border mt-0">

    <!-- ALL PHOTOS -->
    <div class="table-responsive-sm">
        <table class="table table-striped">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Link</th>
                    <th scope="col">Created Time</th>
                    <th scope="col">Source</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- MySQL START -->
                <?php
                $photos = getPhotos();
                $counter = 0;
                if ($photos) {
                    foreach ($photos as $row) {
                        $counter += 1;
                        echo "<tr>
                            <th scope='row'>$counter</th>
                            <td>$row[userName]</td>
                            <td>$row[link]</td>
                            <td>$row[galleryDate]</td>
                            <td>$row[source]</td>
                            <td>
                            <a class='btn btn-link' href='?action=edit&id=$row[galleryID]'>
                            <i class='far fa-edit'></i>
                            </a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr>
                        <td colspan='6'><h1 class='text-info text-center'>No Records</h1></td>
                    </tr>";
                }
                ?>
                <!-- MySQL END -->
            </tbody>
        </table>
        <!-- Refresh button -> Ajax response Alert -->
        <div id="refresh-alert"></div>
    </div>

<?php
}
############# Gallery Home END #####################


############# Gallery Form START ###################
require_once VIEWS_PATH . "/admin/gallery/form.php";
############# Gallery Form END #####################


require_once VIEWS_PATH . "/admin/includes/footer.php";
?>