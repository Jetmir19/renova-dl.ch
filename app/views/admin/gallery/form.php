<?php

if (isset($_GET['action'])) {
?>
    <div class="container bg-white p-3" id="catSuccess">
        <?php
        if ($_GET['action'] == 'edit') {
            echo "<h5>Edit data</h5><span>ID: " . $_GET['id'] . "</span>";
            $row = getPhotoById($_GET['id']);
            $link = $row['link'];
            $source = $row['source'];
        }
        ?>

        <form id="formGallery" class="form-token" action="<?php echo APPURL . "/admin/gallery"; ?>" method="post">
            <!-- Output Results -->
            <div id="token_result"></div>

            <div class="form-group text-left">
                <label for="link">Link</label>
                <input type="text" class="form-control" id="link" name="link" placeholder="link" value="<?php echo $link; ?>">
            </div>

            <div class="form-group text-left">
                <label for="token">Source</label>
                <textarea class="form-control" rows="5" id="source" name="source" placeholder="source"><?php echo $source; ?></textarea>
            </div>

            <div class="form-group">
                <!-- Edit Button -->
                <?php if ($_GET['action'] == 'edit') : ?>
                    <!-- categoryID senden -->
                    <input type="hidden" id="dbEdit" name="dbEdit" value="<?php echo $_GET['id']; ?>">
                    <input type="submit" id="btnEditToken" name="btnEditToken" class="btn btn-primary btn-lg btn-block" value="Save" />
                    <a href="<?php echo APPURL . "/admin/gallery"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Cancel</a>
                <?php endif; ?>
            </div>

        </form>
    </div>

    <!-- Gallery Ajax START -->
    <script>
        document.getElementById("formGallery").addEventListener("submit", (e) => {
            e.preventDefault();
            const token_result = document.getElementById("token_result");
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
                        token_result.innerHTML = "<div class='alert alert-danger' role='alert'>" + xhr
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