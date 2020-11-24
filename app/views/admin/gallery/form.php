<?php

if (isset($_GET['action'])) {
?>
    <div class="container bg-white p-3" id="catSuccess">
        <form id="formGallery" class="form-gallery" action="<?php echo APPURL . "/admin/gallery/" . $_GET['action']; ?>" method="post" enctype="multipart/form-data">

            <!-- Flash Message -->
            <div class="message"></div>

            <?php
            ########################## ADD START ###########################
            if ($_GET['action'] == 'add') {
            ?>
                <h5>Add new Image</h5>
                <div class="form-group text-left">
                    <label for="galleryTitle">Title</label>
                    <input type="text" class="form-control" id="galleryTitle" name="galleryTitle" placeholder="Title">
                </div>
                <div class="form-group text-left">
                    <?php
                    echo "<label for='subCategoryID'>Subcategory</label>";
                    echo "<select id='subCategoryID' name='subCategoryID' class='form-control'>";
                    echo "<option class='select_hide' disabled selected>Choose Subcategory</option>";
                    $subCategories = getSubCategories();
                    foreach ($subCategories as $cat) {
                        echo "<option value='$cat[subCategoryID]'>$cat[subCategoryName]</option>";
                    }
                    echo "</select>";
                    ?>
                </div>
                <div class="form-group text-left">
                    <label for="galleryImage">Image *</label><br>
                    <input class="form-control pb-5 pt-3" type="file" name="galleryImage" id="galleryImage">
                </div>
                <div class="form-group text-left">
                    <label for="galleryDescription">Description</label>
                    <textarea class="form-control" rows="5" id="galleryDescription" name="galleryDescription" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <!-- Input hidden below will be posted with the form -->
                    <input type="hidden" id="dbInsert" name="dbInsert" value="dbInsert">
                    <input type="submit" id="btnAddGallery" name="btnAddGallery" class="btn btn-primary btn-lg btn-block" value="Save" />
                    <a href="<?php echo APPURL . "/admin/gallery"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Cancel</a>
                </div>

            <?php
            }
            ########################## ADD END #############################

            ########################## EDIT START ##########################
            if ($_GET['action'] == 'edit') {
                echo "<h5>Image edit</h5><span>ID: $_GET[id]</span>";
                $row = getImageById($_GET['id']);
                $galleryTitle = $row['galleryTitle'];
                $subCategoryName = $row["subCategoryName"];
                $galleryImage = $row['galleryImage'];
                $galleryDescription = $row['galleryDescription'];
            ?>
                <div class="form-group text-left">
                    <label for="galleryTitle">Title</label>
                    <input type="text" class="form-control" id="galleryTitle" name="galleryTitle" placeholder="Title" value="<?php echo $galleryTitle; ?>">
                </div>
                <div class="form-group text-left">
                    <?php
                    echo "<label for='subCategoryID'>Subcategory</label>";
                    echo "<select id='subCategoryID' name='subCategoryID' class='form-control'>";
                    echo "<option class='select_hide' disabled selected>Choose Subcategory</option>";
                    $subCategories = getSubCategories();
                    foreach ($subCategories as $cat) {
                        if ($cat['subCategoryName'] == $subCategoryName) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                        echo "<option value='$cat[subCategoryID]' $selected>$cat[subCategoryName]</option>";
                    }
                    echo "</select>";
                    ?>
                </div>
                <div class="form-group text-left">
                    <label for="galleryImage">Image *</label><br>
                    <input class="form-control" id="galleryImage" name="galleryImage" placeholder="Image" value="<?php echo $galleryImage; ?>" readonly>
                </div>
                <div class="form-group text-left">
                    <label for="galleryDescription">Description</label>
                    <textarea class="form-control" rows="5" id="galleryDescription" name="galleryDescription" placeholder="Description"><?php echo $galleryDescription; ?></textarea>
                </div>
                <div class="form-group">
                    <!-- galleryID senden -->
                    <input type="hidden" id="dbEdit" name="dbEdit" value="<?php echo $_GET['id']; ?>">
                    <input type="submit" id="btnEditGallery" name="btnEditGallery" class="btn btn-primary btn-lg btn-block" value="Save" />
                    <a href="<?php echo APPURL . "/admin/gallery"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Cancel</a>
                </div>
            <?php
            }
            ########################## EDIT END ############################

            ########################## DELETE START ########################
            if ($_GET['action'] == 'delete') {
            ?>
                <h5>Image delete</h5>
                <h5 class="mb-5 mt-2">Are you sure?</h5>
                <div class="form-group">
                    <!-- Delete Button and galleryID send -->
                    <input type="hidden" id="dbDelete" name="dbDelete" value="<?php echo $_GET['id']; ?>">
                    <input type="submit" id="btnDeleteGallery" name="btnDeleteGallery" class="btn btn-danger btn-lg" value="Delete" />
                    <a href="<?php echo APPURL . "/admin/gallery"; ?>" type="button" class="btn btn-secondary btn-lg">Cancel</a>
                </div>
            <?php
            }
            ########################## DELETE END ##########################
            ?>

        </form>
    </div>

    <!-- Gallery Ajax START -->
    <script>
        const frm = document.getElementById("formGallery");
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
                        window.location.replace("<?php echo APPURL . '/admin/gallery'; ?>");
                    } else {
                        message.innerHTML = "<div class='alert alert-danger' role='alert'>" + xhr
                            .responseText + "</div>";
                    }
                } else {
                    // Failed
                    console.log('error: ', xhr);
                }
            };
            xhr.send(frmData);
        });
    </script>
    <!-- Gallery Ajax END -->

<?php
}
?>