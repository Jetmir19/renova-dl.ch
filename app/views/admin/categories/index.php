<?php
// User auth
checkUserLoggedIn();

// Database connection
require_once DB_PATH . "/db.php";
// global variable
global $db;

$output = "";
$categoryName = "";
$categoryDescription = "";


############# Insert to DB START #####################
require_once VIEWS_PATH . "/admin/categories/add.php";
############# Insert to DB END #######################

############# Edit in DB START ########################
require_once VIEWS_PATH . "/admin/categories/edit.php";
############# Edit in DB END ##########################

############# Delete in DB START ########################
require_once VIEWS_PATH . "/admin/categories/delete.php";
############# Delete in DB END ##########################


############# Categories Home START ###################
require_once VIEWS_PATH . "/admin/includes/header.php";

if (!isset($_GET['action'])) {
?>
    <div class="row align-items-center pt-3">
        <div class="col text-left">
            <h3>Categories</h3>
        </div>
        <div class="col text-right">
            <a href="?action=add" class="btn btn-success">Create New +</a>
        </div>
    </div>
    <hr class="border-top">

    <div class="table-responsive-sm">
        <table class="table table-striped">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">User</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tableCategories">
                <!-- MySQL START -->
                <?php
                $categories = getCategories();
                $counter = 0;
                if ($categories) {
                    foreach ($categories as $row) {
                        $counter += 1;
                        echo "<tr>
							<th scope='row'>$counter</th>
                            <td>$row[categoryName]</td>
                            <td>$row[userName]</td>
                            <td>" . substr($row['categoryDescription'], 0, 30) . "...</td>
                            <td>
                            <a class='btn btn-link' href='?action=edit&id=$row[categoryID]'>
                            <i class='far fa-edit'></i>
                            </a>
                            <a class='btn btn-link' href='?action=delete&id=$row[categoryID]'>
                            <i class='far fa-trash-alt'></i>
                            </a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr>
                        <td colspan='5'><h1 class='text-info text-center'>No Records</h1></td>
                    </tr>";
                }

                ?>
                <!-- MySQL END -->
            </tbody>
        </table>
    </div>

<?php
}
############# Categories Home END ######################


############# Categories Form START ####################
require_once VIEWS_PATH . "/admin/categories/form.php";
############# Categories Form END ######################


require_once VIEWS_PATH . "/admin/includes/footer.php";
?>