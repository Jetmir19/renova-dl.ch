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
    <div class="table-responsive">
        <table class="table table-striped text-left">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col"> Total Photos saved in Database</th>
                </tr>
            </thead>
            <tbody id="tableFacebookApi">
                <!-- MySQL START -->
                <?php
                $sql = "SELECT COUNT(*) as totalRows FROM gallery";
                $stmt = $db->query($sql);
                while ($row = $stmt->fetch()) {
                    echo "<tr>
                            <th scope='row'>Total Photos: " . $row['totalRows'] . "</th>
                            </tr>";
                }
                if ($stmt->rowCount() == 0) {
                    echo "<tr>
                            <th scope='row'></th>
                            <td></td>
                            <td><h1 class='text-info text-center'>No Records</h1></td>
                            <td></td>
                            <td></td>
                            </tr>";
                }
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
                    <th scope="col">Link</th>
                    <th scope="col">Created Time</th>
                    <th scope="col">Source</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tableFacebookApi">
                <!-- MySQL START -->
                <?php
                $sql = "SELECT * FROM gallery";
                $stmt = $db->query($sql);
                $counter = 0;
                while ($row = $stmt->fetch()) {
                    $counter += 1;
                    echo "<tr>
                            <th scope='row'>$counter</th>
                            <td>$row[link]</td>
                            <td>$row[created_time]</td>
                            <td>$row[source]</td>
                            <td>
                            <a class='btn btn-link' href='?action=edit&id=$row[id]'>
                            <i class='far fa-edit'></i>
                            </a>
                            </td>
                        </tr>";
                }
                if ($stmt->rowCount() == 0) {
                    echo "<tr>
                            <th scope='row'></th>
                            <td></td>
                            <td><h1 class='text-info text-center'>No Records</h1></td>
                            <td></td>
                            <td></td>
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