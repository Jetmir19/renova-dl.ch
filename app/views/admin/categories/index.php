<?php
// User auth
checkUserLoggedIn();

############# Categories Home START ###################
require_once VIEWS_PATH . "/admin/includes/header.php";

if (!isset($_GET['action'])) {
?>
    <!-- Flash Messages from the Session -->
    <?php getFlashMessage(); ?>

    <!-- Categories TABLE START -->
    <div class="row align-items-center pt-3">
        <div class="col text-left">
            <h3>Categories</h3>
        </div>
        <div class="col text-right">
            <a href="?action=add" class="btn btn-success">Create New +</a>
        </div>
    </div>

    <hr class="border-top mt-1">

    <div class="alert alert-info text-danger" role="alert">
        <i class="fas fa-exclamation-circle"></i> Deleting a category deletes all the subcategories within the parent category!
    </div>

    <div class="table-responsive-sm">
        <table class="table table-striped table-hover">
            <thead class="bg-info">
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
                            <td>" . $row['categoryDescription'] . "</td>
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
    <!-- Categories TABLE END -->

    <hr class="border mt-0">

    <!-- SubCategories TABLE START -->
    <div class="row align-items-center pt-3">
        <div class="col text-left">
            <h4>Sub Categories</h4>
        </div>
        <div class="col text-right">
            <a href="categories_sub?action=add" class="btn btn-success">Create New +</a>
        </div>
    </div>

    <hr class="border-top mt-1">

    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-sm">
            <thead class="bg-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">User</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tableCategories">
                <!-- MySQL START -->
                <?php
                $categories = getSubCategories();
                $counter = 0;
                if ($categories) {
                    foreach ($categories as $row) {
                        $counter += 1;
                        echo "<tr>
							<th scope='row'>$counter</th>
                            <td>$row[subCategoryName]</td>
                            <td>$row[userName]</td>
                            <td>" . $row['subCategoryDescription'] . "</td>
                            <td>" . $row['categoryName'] . "</td>
                            <td>
                            <a class='btn btn-link' href='categories_sub?action=edit&id=$row[subCategoryID]'>
                            <i class='far fa-edit'></i>
                            </a>
                            <a class='btn btn-link' href='categories_sub?action=delete&id=$row[subCategoryID]'>
                            <i class='far fa-trash-alt'></i>
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
    </div>
    <!-- SubCategories TABLE END -->
<?php
}
############# Categories Home END ######################

############# Gallery Form START #######################
require_once VIEWS_PATH . "/admin/categories/form.php";
############# Gallery Form END #########################

require_once VIEWS_PATH . "/admin/includes/footer.php";
?>