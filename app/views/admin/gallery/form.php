<?php

if (isset($_GET['action'])) {
?>
    <div class="container bg-white p-3" id="catSuccess">
        <form id="formGallery" class="form-gallery" action="<?php echo APPURL . "/admin/gallery"; ?>" method="post">

            <!-- Output Results -->
            <div id="gallery_result"></div>

            <?php
            ############# ADD START ###########################
            if ($_GET['action'] == 'add') {
            ?>
                <h5>Add new Photo</h5>
                <div class="form-group text-left">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="link">
                </div>
                <div class="form-group text-left">
                    <label for="source">Source</label>
                    <textarea class="form-control" rows="5" id="source" name="source" placeholder="source"></textarea>
                </div>
                <div class="form-group">
                    <!-- Input hidden below will be posted with the form -->
                    <input type="hidden" id="dbInsert" name="dbInsert" value="dbInsert">
                    <input type="submit" id="btnAddGallery" name="btnAddGallery" class="btn btn-primary btn-lg btn-block" value="Save" />
                    <a href="<?php echo APPURL . "/admin/gallery"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Cancel</a>
                </div>

            <?php
            }
            ############# ADD END #############################

            ############# EDIT START ##########################
            if ($_GET['action'] == 'edit') {
                echo "<h5>Edit data</h5><span>ID: $_GET[id]</span>";
                $row = getPhotoById($_GET['id']);
                $link = $row['link'];
                $source = $row['source'];
            ?>
                <div class="form-group text-left">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="link" value="<?php echo $link; ?>">
                </div>
                <div class="form-group text-left">
                    <label for="source">Source</label>
                    <textarea class="form-control" rows="5" id="source" name="source" placeholder="source"><?php echo $source; ?></textarea>
                </div>
                <div class="form-group">
                    <!-- galleryID senden -->
                    <input type="hidden" id="dbEdit" name="dbEdit" value="<?php echo $_GET['id']; ?>">
                    <input type="submit" id="btnEditGallery" name="btnEditGallery" class="btn btn-primary btn-lg btn-block" value="Save" />
                    <a href="<?php echo APPURL . "/admin/gallery"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Cancel</a>
                </div>
            <?php
            }
            ############# EDIT END ############################

            ############# DELETE START ########################
            if ($_GET['action'] == 'delete') {
            ?>
                <h5>Photo delete</h5>
                <h5 class="mb-5 mt-2">Are you sure?</h5>
                <div class="form-group">
                    <!-- Delete Button and galleryID send -->
                    <input type="hidden" id="dbDelete" name="dbDelete" value="<?php echo $_GET['id']; ?>">
                    <input type="submit" id="btnDeleteGallery" name="btnDeleteGallery" class="btn btn-danger btn-lg" value="Delete" />
                    <a href="<?php echo APPURL . "/admin/gallery"; ?>" type="button" class="btn btn-secondary btn-lg">Cancel</a>
                </div>
            <?php
            }
            ############# DELETE END ##########################
            ?>

        </form>
    </div>

    <!-- Gallery Ajax START -->
    <script>
        document.getElementById("formGallery").addEventListener("submit", (e) => {
            e.preventDefault();
            const gallery_result = document.getElementById("gallery_result");
            const formGallery = new FormData(document.getElementById("formGallery"));
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo APPURL . '/admin/gallery '; ?>', true);
            xhr.onload = () => {
                // Process our return data
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Success
                    if (xhr.responseText.trim() == 'success') {
                        window.location.replace("<?php echo APPURL . '/admin/gallery'; ?>");
                    } else {
                        gallery_result.innerHTML = "<div class='alert alert-danger' role='alert'>" + xhr
                            .responseText + "</div>";
                    }
                } else {
                    // Failed
                    console.log('error: ', xhr);
                }
            };
            xhr.send(formGallery);
        });
    </script>
    <!-- Gallery Ajax END -->

<?php
}
?>