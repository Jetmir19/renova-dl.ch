<?php
// User auth
checkUserLoggedIn();

############# Gallery Home START ######################
require_once VIEWS_PATH . "/admin/includes/header.php";

if (!isset($_GET['action'])) {
?>
    <!-- Flash Messages from the Session -->
    <?php getFlashMessage(); ?>

    <div class="row align-items-center pt-3">
        <div class="col text-left">
            <h3>Gallery</h3>
        </div>
        <div class="col text-right">
            <a href="?action=add" class="btn btn-success">Create New +</a>
        </div>
    </div>

    <hr class="border-top mt-1">

    <div class="alert alert-info text-danger" role="alert">
        <i class="fas fa-exclamation-circle"></i> Gallery does not include edtiting Image, but creating new, show details and deleting Images is possible.
    </div>

    <!-- TOTAL IMAGES -->
    <div class="table-responsive-sm">
        <table class="table table-striped text-left">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col"> Total Images saved in Database</th>
                </tr>
            </thead>
            <tbody>
                <!-- MySQL START -->
                <?php
                $imagesCount = getImagesCount();
                echo "<tr>
                    <th scope='row'>Total Images: " . $imagesCount['totalRows'] . "</th>
                </tr>";

                ?>
                <!-- MySQL END -->
            </tbody>
        </table>
    </div>
    <hr class="border mt-0">
    <!-- ALL IMAGES -->
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Subcategory</th>
                    <th scope="col">User</th>
                    <th scope="col">Created Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- MySQL START -->
                <?php
                $images = getImages();
                // subCategory group - var
                $subcategoryGroup = "";
                $counter = 0;
                if ($images) {
                    foreach ($images as $row) {
                        // subCategory group - compare mysql row with the defined var
                        if ($row["subCategoryName"] !== $subcategoryGroup) {
                            // subCategory group - display subCatery Name
                            echo "<tr class='table-active'>
                            <td colspan='7' class='text-left font-weight-bold'>
                            $row[subCategoryName] (" . getGallerySubCategoriesCountById($row['subCategoryID']) . ")
                            </td>
                            </tr>";
                        }
                        $counter += 1;
                        echo "<tr>
							<th scope='row'>$counter</th>
                            <td>
                            <img src='" . APPURL . "/public/uploads/gallery/" . $row['galleryImage'] . "' width='70px' height='80px'>
                            </td>
                            <td>$row[galleryTitle]</td>
                            <td>$row[subCategoryName]</td>
                            <td>$row[userName]</td>
                            <td>$row[galleryDate]</td>
                            <td>
                            <a class='btn btn-link' href='?action=edit&id=$row[galleryID]'>
                            <i class='far fa-eye'></i>
                            </a>
                            <a class='btn btn-link' href='?action=delete&id=$row[galleryID]'>
                            <i class='far fa-trash-alt'></i>
                            </a>
                            </td>
                        </tr>";
                        // subCategory group - asign the row to the variable
                        $subcategoryGroup = $row["subCategoryName"];
                    }
                } else {
                    echo "<tr>
                        <td colspan='7'><h1 class='text-info text-center'>No Records</h1></td>
                    </tr>";
                }
                ?>
                <!-- MySQL END -->
            </tbody>
        </table>
    </div>
<?php
}
############# Gallery Home END #####################

############# Gallery Form START ###################
require_once VIEWS_PATH . "/admin/gallery/form.php";
############# Gallery Form END #####################

require_once VIEWS_PATH . "/admin/includes/footer.php";
?>