<?php

if (isset($_GET['action'])) {
?>
    <div class="container bg-white p-3" id="catSuccess">
        <form id="formCategory" class="form-category" action="<?php echo APPURL . "/admin/categories"; ?>" method="post" enctype="multipart/form-data">

            <!-- Output Results -->
            <div id="categories_result"></div>

            <?php
            ########################## ADD START ###########################
            if ($_GET['action'] == 'add') {
            ?>
                <h5>Add new Category</h5>
                <div class="form-group text-left">
                    <label for="categoryName">Category Name</label>
                    <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Name">
                </div>
                <div class="form-group text-left">
                    <label for="categoryName">User</label>
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="Name" value="<?php echo $_SESSION['userName']; ?>" readonly>
                </div>
                <div class="form-group text-left">
                    <label for="categoryDescription">Description</label>
                    <textarea class="form-control" rows="5" id="categoryDescription" name="categoryDescription" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <!-- Input hidden below will be posted with the form -->
                    <input type="hidden" id="dbInsert" name="dbInsert" value="dbInsert">
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
                    <!-- categoryID senden -->
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
        document.getElementById("formCategory").addEventListener("submit", (e) => {
            e.preventDefault();
            const categories_result = document.getElementById("categories_result");
            const formCategory = new FormData(document.getElementById("formCategory"));
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo APPURL . '/admin/categories'; ?>', true);
            xhr.onload = () => {
                // Process our return data
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Success
                    if (xhr.responseText.trim() == 'success') {
                        window.location.replace("<?php echo APPURL . '/admin/categories'; ?>");
                    } else {
                        categories_result.innerHTML =
                            `<div class="alert alert-danger" role="alert">${xhr.response}</div>`;
                    }
                } else {
                    // Failed
                    console.log('error: ', xhr);
                }
            };
            xhr.send(formCategory);
        });
    </script>
    <!-- Categories Ajax END -->

<?php
}
?>