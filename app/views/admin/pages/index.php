<?php
// User auth
checkUserLoggedIn();

############# Pages Home START ########################
require_once VIEWS_PATH . "/admin/includes/header.php";

if (!(isset($_GET['action']))) {
?>
    <!-- Flash Messages from the Session -->
    <?php getFlashMessage(); ?>

    <div class="row align-items-center pt-3">
        <div class="col text-left">
            <h3>Pages</h3>
        </div>
        <div class="col text-right">
            <a href="?action=add" class="btn btn-success">Create New +</a>
        </div>
    </div>

    <hr class="border-top mt-1">

    <div class="alert alert-info text-danger" role="alert">
        <i class="fas fa-exclamation-circle"></i> Pages can include text, pictures, tables, plain HTML and PHP code.
    </div>

    <div class="table-responsive-md">
        <table class="table table-striped table-hover">
            <thead class="bg-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Subcategory</th>
                    <th scope="col">Language</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tablePages">
                <!-- MySQL START -->
                <?php
                $pages = getPages();
                // Group pages - var
                $pageNameGroup = "";
                $counter = 0;
                if ($pages) {
                    foreach ($pages as $row) {
                        // Group pages - compare mysql row with the defined var
                        if ($row["pageName"] !== $pageNameGroup) {
                            // Group pages - display subCatery Name
                            echo "<tr class='table-active'>
                            <td colspan='7' class='text-left font-weight-bold'>
                            $row[pageName] (" . getPageNameCountByPageName($row['pageName']) . ")
                            </td>
                            </tr>";
                        }
                        $pageStatus = ($row['pageStatus'] == 1) ? "<span style='color:#00E676;font-size:1.3em;'><i class='fas fa-circle'></i></span>" : "<span style='color:#dc3545;font-size:1.3em;'><i class='fas fa-circle'></i></span>";
                        $counter += 1;
                        echo "<tr>
                            <th scope='row'>$counter</th>
                            <td>$row[pageName]</td>
                            <td>$row[categoryName]</td>
                            <td>$row[subCategoryName]</td>
                            <td>$row[pageLanguage]</td>
                            <td>$pageStatus</td>
                            <td>
                            <a class='btn btn-link' href='?action=edit&id=$row[pageID]'>
                            <i class='far fa-edit'></i>
                            </a>
                            <a class='btn btn-link' href='?action=delete&id=$row[pageID]'>
                            <i class='far fa-trash-alt'></i>
                            </a>
                            </td>
                        </tr>";

                        // Group pages - asign the row to the variable
                        $pageNameGroup = $row["pageName"];
                    }
                } else {
                    echo "<tr>
                        <td colspan=7'><h1 class='text-info text-center'>No Records</h1></td>
                    </tr>";
                }
                ?>
                <!-- MySQL END -->
            </tbody>
        </table>
    </div>
<?php
}
############# Pages Home END #####################

############# Pages Form START ###################
require_once VIEWS_PATH . "/admin/pages/form.php";
############# pages Form END #####################

require_once VIEWS_PATH . "/admin/includes/footer.php";
?>