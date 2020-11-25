<?php

if (isset($_GET['action'])) {
?>
    <div class="container bg-white p-3" id="pageSuccess">
        <form id="formPages" class="form-pages" action="<?php echo APPURL . "/admin/pages/" . $_GET['action']; ?>" method="post" enctype="multipart/form-data">

            <!-- Flash Message -->
            <div class="flash_message"></div>

            <?php
            ########################## ADD START ###########################
            if ($_GET['action'] == 'add') {
            ?>
                <h5>Add new Page</h5>
                <div class="form-group text-left">
                    <label for="pageName">Page Name</label>
                    <input type="text" class="form-control" id="pageName" name="pageName" placeholder="Name">
                </div>
                <div class="form-group text-left">
                    <label for="pageName">Title</label>
                    <input type="text" class="form-control" rows="5" id="pageTitle" name="pageTitle" placeholder="Titel">
                </div>
                <div class="form-group text-left">
                    <label for='pageLanguage'>Language</label>
                    <select id='pageLanguage' name='pageLanguage' class='form-control'>
                        <option class='select_hide' disabled selected>Select Language</option>
                        <!-- <option value='EN'>EN</option> -->
                        <option value='FR'>FR</option>
                        <option value='DE'>DE</option>
                    </select>
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
                    <label for="pageName">Content (HTML & PHP)</label>
                    <textarea class="form-control" rows="15" id="pageContent" name="pageContent" placeholder="Content"></textarea>
                </div>
                <div class="form-group">
                    <!-- Input hidden below will be posted with the form -->
                    <input type="hidden" id="dbInsert" name="dbInsert" value="dbInsert">
                    <input type="submit" id="btnAddpages" name="btnAddpages" class="btn btn-primary btn-lg btn-block" value="Save" />
                    <a href="<?php echo APPURL . "/admin/pages"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Cancel</a>
                </div>
            <?php
            }
            ########################## ADD END #############################

            ########################## EDIT START ##########################
            if ($_GET['action'] == 'edit') {
                echo "<h5>Seite Bearbeiten</h5><span>ID: $_GET[id]</span>";
                $row = getPageById($_GET['id']);
                $pageName = $row["pageName"];
                $subCategoryID = $row["subCategoryID"];
                $subCategoryName = $row["subCategoryName"];
                $pageTitle = $row["pageTitle"];
                $pageLanguage = $row["pageLanguage"];
                $pageContent = $row["pageContent"];
                $pageStatus = $row["pageStatus"];
            ?>
                <div class="form-group text-left">
                    <label for="pageName">Page Name</label>
                    <input type="text" class="form-control" id="pageName" name="pageName" placeholder="Name" value="<?php echo $pageName; ?>">
                </div>
                <div class="form-group text-left">
                    <label for="pageName">Title</label>
                    <input type="text" class="form-control" rows="5" id="pageTitle" name="pageTitle" placeholder="Titel" value="<?php echo $pageTitle; ?>">
                </div>
                <div class="form-group text-left">
                    <?php
                    echo "<label for='pageLanguage'>Language</label>";
                    echo "<select id='pageLanguage' name='pageLanguage' class='form-control'>";
                    echo "<option class='select_hide' disabled selected>Select Language</option>";
                    $pageLangArray = ['EN', 'DE', 'FR'];
                    foreach ($pageLangArray as $lang) {
                        if ($lang == $pageLanguage) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                        echo "<option value='$lang' $selected>$lang</option>";
                    }
                    echo "</select>";
                    ?>
                </div>
                <div class="form-group text-left">
                    <?php
                    echo "<label for='subCategoryID'>Subcategory</label>";
                    echo "<select id='subCategoryID' name='subCategoryID' class='form-control'>";
                    echo "<option class='select_hide' disabled selected>Choose Category</option>";
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
                    <label for="pageName">Content (HTML & PHP)</label>
                    <textarea class="form-control" rows="15" id="pageContent" name="pageContent" placeholder="Content"><?php echo $pageContent; ?></textarea>
                </div>
                <!-- pages Status goes below... -->
                <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="pageStatus" name="pageStatus" <?php echo $pageStatus == 1 ? " checked" : "" ?>>
                    <label class="custom-control-label" for="pageStatus">Seitenstatus (markiert ist aktiv oder 1)</label>
                </div>
                <div class="form-group">
                    <!-- pageID senden -->
                    <input type="hidden" id="dbEdit" name="dbEdit" value="<?php echo $_GET['id']; ?>">
                    <input type="submit" id="btnEditpages" name="btnEditpages" class="btn btn-primary btn-lg btn-block" value="Save" />
                    <a href="<?php echo APPURL . "/admin/pages"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Cancel</a>
                </div>
            <?php
            }
            ########################## EDIT END ############################

            ########################## DELETE START ########################
            if ($_GET['action'] == 'delete') {
            ?>
                <h5>Page delete</h5>
                <h5 class="mb-5 mt-2">Are you sure?</h5>
                <div class="form-group">
                    <!-- Delete Button and pageID send -->
                    <input type="hidden" id="dbDelete" name="dbDelete" value="<?php echo $_GET['id']; ?>">
                    <input type="submit" id="btnDeletepages" name="btnDeletepages" class="btn btn-danger btn-lg" value="Delete" />
                    <a href="<?php echo APPURL . "/admin/pages"; ?>" type="button" class="btn btn-secondary btn-lg">Cancel</a>
                </div>
            <?php
            }
            ########################## DELETE END ##########################
            ?>

        </form>
    </div>

    <!-- Pages Ajax START -->
    <script>
        const frm = document.getElementById("formPages");
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
                        window.location.replace("<?php echo APPURL . '/admin/pages'; ?>");
                    } else {
                        message.innerHTML = "<div class='alert alert-danger' role='alert'>" + xhr.responseText + "</div>";
                    }
                } else {
                    // Failed
                    console.log('error: ', xhr);
                }
            };
            xhr.send(frmData);
        });
    </script>
    <!-- Pages Ajax END -->

<?php
}
?>