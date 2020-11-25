<?php

if (isset($_GET['action'])) {
?>
    <div class="container bg-white p-3" id="catSuccess">
        <form id="formCategory" class="form-category" action="<?php echo APPURL . "/admin/categories_sub/" . $_GET['action']; ?>" method="post" enctype="multipart/form-data">

            <!-- Flash Message -->
            <div class="flash_message"></div>

            <?php
            ########################## ADD START ###########################
            if ($_GET['action'] == 'add') {
            ?>
                <h5>Add new Subcategory</h5>
                <div class="form-group text-left">
                    <label for="subCategoryName">Subategory Name</label>
                    <input type="text" class="form-control" id="subCategoryName" name="subCategoryName" placeholder="Name">
                </div>
                <div class="form-group text-left">
                    <label for="categoryID">Category</label>
                    <select id="categoryID" name="categoryID" class="form-control">
                        <option class="select_hide" disabled selected>Choose Category</option>
                        <?php
                        $categories = getCategories();
                        foreach ($categories as $cat) {
                            echo "<option value='$cat[categoryID]'>$cat[categoryName]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group text-left">
                    <label for="subCategoryName">User</label>
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="Name" value="<?php echo $_SESSION['userName']; ?>" readonly>
                </div>
                <div class="form-group text-left">
                    <label for="subCategoryDescription">Description</label>
                    <textarea class="form-control" rows="5" id="subCategoryDescription" name="subCategoryDescription" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <!-- Input hidden below will be posted with the form -->
                    <input type="hidden" id="dbInsert" name="dbInsert" value="dbInsert">
                    <input type="submit" id="btnAddSubCategory" name="btnAddSubCategory" class="btn btn-primary btn-lg btn-block" value="Save" />
                    <a href="<?php echo APPURL . "/admin/categories"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Cancel</a>
                </div>
            <?php
            }
            ########################## ADD END #############################

            ########################## EDIT START ##########################
            if ($_GET['action'] == 'edit') {
                echo "<h5>Subcategory edit</h5><span>ID: $_GET[id]</span>";
                $row = getSubCategoryById($_GET['id']);
                $subCategoryName = $row["subCategoryName"];
                $categoryName = $row["categoryName"];
                $subCategoryDescription = $row["subCategoryDescription"];
                $userName = $row["userName"];
            ?>
                <div class="form-group text-left">
                    <label for="subCategoryName">Subategory Name</label>
                    <input type="text" class="form-control" id="subCategoryName" name="subCategoryName" placeholder="Name" value="<?php echo $subCategoryName; ?>">
                </div>
                <div class="form-group text-left">
                    <label for="categoryID">Category</label>
                    <select id="categoryID" name="categoryID" class="form-control">
                        <option class="select_hide" disabled selected>Choose Category</option>
                        <?php
                        $categories = getCategories();
                        foreach ($categories as $cat) {
                            if ($cat['categoryName'] == $categoryName) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option value='$cat[categoryID]' $selected>$cat[categoryName]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group text-left">
                    <label for="subCategoryName">User</label>
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="Name" value="<?php echo $userName ?? $_SESSION['userName']; ?>" readonly>
                </div>
                <div class="form-group text-left">
                    <label for="subCategoryDescription">Description</label>
                    <textarea class="form-control" rows="5" id="subCategoryDescription" name="subCategoryDescription" placeholder="Description"><?php echo $subCategoryDescription; ?></textarea>
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
                <h5>Subcategory delete</h5>
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
            const message = document.querySelector(".flash_message");
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