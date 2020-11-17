<?php

if (isset($_GET['action'])) {
?>
    <div class="container bg-white p-3" id="catSuccess">
        <?php
        if ($_GET['action'] == 'edit') {
            echo "<h5>Edit data</h5><span>ID: " . $_GET['id'] . "</span>";
            $sql = "SELECT * FROM gallery WHERE id = $_GET[id]";
            $stmt = $db->query($sql);
            while ($row = $stmt->fetch()) {
                $id = $row['id'];
                $userID = $row['userID'];
                $link = $row['link'];
                $created_time = $row['created_time'];
                $source = $row['source'];
            }
        }
        ?>
        <form id="formGallery" class="form-token" action="<?php echo APPURL . "/admin/gallery"; ?>" method="post">
            <!-- Output Results -->
            <div id="token_result"></div>

            <div class="form-group text-left">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="id" value="<?php echo $id; ?>">
            </div>

            <div class="form-group text-left">
                <label for="userID">UserID</label>
                <input type="text" class="form-control" id="userID" name="userID" placeholder="userID" value="<?php echo $userID; ?>">
            </div>

            <div class="form-group text-left">
                <label for="link">Link</label>
                <input type="text" class="form-control" id="link" name="link" placeholder="link" value="<?php echo $link; ?>">
            </div>

            <div class="form-group text-left">
                <label for="token">Created At</label>
                <textarea class="form-control" rows="5" id="created_time" name="created_time" placeholder="created_time"><?php echo $created_time; ?></textarea>
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

<script>
    /**
     * Refresh Facebook Access Token
     */
    (function refreshAccessToken() {
        refreshBtn = document.querySelector('[data-refresh]');
        refreshAlert = document.getElementById('refresh-alert');

        dataAttr = null;

        if (refreshBtn) {
            refreshBtn.addEventListener('click', (e) => {
                e.preventDefault();

                dataAttr = e.target.getAttribute("data-refresh");
                // console.log(dataAttr);

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("POST", "<?php echo APPURL . '/ajax/ajax'; ?>", true);
                xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log("Token Response: " + this.responseText);
                        refreshAlert.innerHTML = `<div class="alert alert-danger" role="alert"">
                        Access Token Expires in: <strong>${this.responseText}</strong>
                        </div>
                        `;

                        setTimeout(() => {
                            refreshAlert.innerHTML = '';
                        }, 5000);
                        // window.location.reload();
                    }
                };
                xmlhttp.send("fb_refresh=" + dataAttr);
            });
        }
    })();

    //     /**
    //      * Save Facebook Photos in DB
    //      */
    //     (function saveFacebookPhotosInDB() {
    //         saveFbBtn = document.querySelector('[data-save]');
    //         refreshAlert = document.getElementById('refresh-alert');

    //         dataAttr = null;

    //         if (saveFbBtn) {
    //             saveFbBtn.addEventListener('click', (e) => {
    //                 e.preventDefault();

    //                 dataAttr = e.target.getAttribute("data-save");
    //                 // console.log(dataAttr);

    //                 var xmlhttp = new XMLHttpRequest();
    //                 xmlhttp.open("POST", "<?php echo APPURL . '/ajax/ajax'; ?>", true);
    //                 xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    //                 xmlhttp.onreadystatechange = function() {
    //                     if (this.readyState == 4 && this.status == 200) {
    //                         // console.log(this.responseText);

    //                         refreshAlert.innerHTML = `<div class="alert alert-success" role="alert"">
    //                         Response: <strong>${this.responseText}</strong>
    //                         </div>
    //                         `;

    //                         setTimeout(() => {
    //                             window.location.reload();
    //                         }, 5000);
    //                     }
    //                 };
    //                 xmlhttp.send("fb_save=" + dataAttr);
    //             });
    //         }
    //     })();
    // 
</script>