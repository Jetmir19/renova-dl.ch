<?php

if (isset($_GET['action'])) {
?>
    <div class="container bg-white p-3" id="catSuccess">
        <form id="formCategory" class="form-category" action="<?php echo APPURL . "/admin/categories/" . $_GET['action']; ?>" method="post" enctype="multipart/form-data">

            <!-- Flash Message -->
            <div class="message"></div>

            <?php
            ########################## ADD START ###########################
            if ($_GET['action'] == 'add') {
                // Dinamic Title START
                if (isset($_GET['type']) && $_GET['type'] == 'sub') {
                    echo '<h5>Add new Subcategory</h5>
                    <div class="form-group text-left">
                        <label for="subCategoryName">Subcategory Name</label>
                        <input type="text" class="form-control" id="subCategoryName" name="subCategoryName" placeholder="Name">
                    </div>';
                } else {
                    echo '<h5>Add new Category</h5>
                    <div class="form-group text-left">
                        <label for="categoryName">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Name">
                    </div>';
                }
                // Dinamic Title END
                // Choose Category Secion START
                if (isset($_GET['type']) && $_GET['type'] == 'sub') {
                    echo '<div class="form-group text-left">';
                    echo '<label for="categoryID">Category</label>';
                    echo '<select id="categoryID" name="categoryID" class="form-control">';
                    echo '<option class="select_hide" disabled selected>Choose Category</option>';
                    $categories = getCategories();
                    foreach ($categories as $cat) {
                        echo "<option value='$cat[categoryID]'>$cat[categoryName]</option>";
                    }
                    echo '</select>';
                    echo '</div>';
                }
                // Choose Category Secion END
            ?>
                <div class="form-group text-left">
                    <label for="categoryName">User</label>
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="Name" value="<?php echo $_SESSION['userName']; ?>" readonly>
                </div>
                <?php
                // Dinamic Description START
                if (isset($_GET['type']) && $_GET['type'] == 'sub') {
                    echo '<div class="form-group text-left">
                        <label for="subCategoryDescription">Description</label>
                        <textarea class="form-control" rows="5" id="subCategoryDescription" name="subCategoryDescription" placeholder="Description"></textarea>
                    </div>';
                } else {
                    echo '<div class="form-group text-left">
                        <label for="categoryDescription">Description</label>
                        <textarea class="form-control" rows="5" id="categoryDescription" name="categoryDescription" placeholder="Description"></textarea>
                    </div>';
                }
                // Dinamic Description END
                ?>
                <div class="form-group">
                    <!-- Input hidden below will be posted with the form -->
                    <?php
                    // Dinamic hidden POST START
                    if (isset($_GET['type']) && $_GET['type'] == 'sub') {
                        echo '<input type="hidden" id="dbInsertSub" name="dbInsertSub" value="dbInsertSub">';
                    } else {
                        echo '<input type="hidden" id="dbInsertCat" name="dbInsertCat" value="dbInsertCat">';
                    }
                    // Dinamic hidden POST END
                    ?>
                    <input type="submit" id="btnAddCategory" name="btnAddCategory" class="btn btn-primary btn-lg btn-block" value="Save" />
                    <a href="<?php echo APPURL . "/admin/categories"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Cancel</a>
                </div>
            <?php
            }
            ########################## ADD END #############################

            ########################## EDIT START ##########################
            if ($_GET['action'] == 'edit') {
                echo "<h5>Category edit</h5><span>ID: $_GET[id]</span>";
                $row = getCategoryById($_GET['id']);
                $categoryName = $row["categoryName"];
                $categoryDescription = $row["categoryDescription"];
                $userName = $row["userName"];
            ?>
                <div class="form-group text-left">
                    <label for="categoryName">Category Name</label>
                    <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Name" value="<?php echo $categoryName; ?>">
                </div>
                <div class="form-group text-left">
                    <label for="categoryName">User</label>
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="Name" value="<?php echo $userName ?? $_SESSION['userName']; ?>" readonly>
                </div>
                <div class="form-group text-left">
                    <label for="categoryDescription">Description</label>
                    <textarea class="form-control" rows="5" id="categoryDescription" name="categoryDescription" placeholder="Description"><?php echo $categoryDescription; ?></textarea>
                </div>
                <div class="form-group">
                    <!-- categoryID send -->
                    <input type="hidden" id="dbEdit" name="dbEdit" value="<?php echo $_GET['id']; ?>">
                    <input type="submit" id="btnEditCategory" name="btnEditCategory" class="btn btn-primary btn-lg btn-block" value="Save" />
                    <a href="<?php echo APPURL . "/admin/categories"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Cancel</a>
                </div>
            <?php
            }
            ########################## EDIT END ############################

            ########################## DELETE START ########################
            if ($_GET['action'] == 'delete') {
            ?>
                <h5>Category delete</h5>
                <h5 class="mb-5 mt-2">Are you sure?</h5>
                <div class="form-group">
                    <!-- Delete Button and categoryID send -->
                    <input type="hidden" id="dbDelete" name="dbDelete" value="<?php echo $_GET['id']; ?>">
                    <input type="submit" id="btnDeleteCategory" name="btnDeleteCategory" class="btn btn-danger btn-lg" value="Delete" />
                    <a href="<?php echo APPURL . "/admin/categories"; ?>" type="button" class="btn btn-secondary btn-lg">Cancel</a>
                </div>
            <?php
            }
            ########################## DELETE END ##########################
            ?>

        </form>
    </div>

    <!-- Categories Ajax START -->
    <script>
        const frm = document.getElementById("formCategory");
        frm.addEventListener("submit", (e) => {
            e.preventDefault();
            const message = document.querySelector(".message");
            const frmData = new FormData(frm);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', frm.action, true);
            xhr.onload = () => {
                // Process our return data
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Success
                    if (xhr.responseText.trim() == 'success') {
                        window.location.replace("<?php echo APPURL . '/admin/categories'; ?>");
                    } else {
                        message.innerHTML =
                            `<div class="alert alert-danger" role="alert">${xhr.response}</div>`;
                    }
                } else {
                    // Failed
                    console.log('error: ', xhr);
                }
            };
            xhr.send(frmData);
        });
    </script>
    <!-- Categories Ajax END -->

<?php
}
?>