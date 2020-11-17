<?php

if (isset($_GET['action'])) {
?>
    <div class="container bg-white p-3" id="pageSuccess">
        <!-- Dinamic Title -->
        <?php if ($_GET['action'] == 'add') : ?>
            <h5>Add new Page</h5>
        <?php endif; ?>

        <?php if ($_GET['action'] == 'delete') : ?>
            <h5>Page delete</h5>
            <h5 class="mb-5 mt-2">Are you sure?</h5>
        <?php endif; ?>

        <?php
        if ($_GET['action'] == 'edit') {
            echo "<h5>Seite Bearbeiten</h5><span>ID: " . $_GET['id'] . "</span>";
            $sql = "SELECT * FROM pages 
                        INNER JOIN category ON pageCategoryID=categoryID
                        WHERE pageID = $_GET[id]";
            $stmt = $db->query($sql);
            while ($row = $stmt->fetch()) {
                $pageName = $row["pageName"];
                $pageCategoryID = $row["categoryID"];
                $categoryName = $row["categoryName"];
                $pageTitle = $row["pageTitle"];
                $pageLanguage = $row["pageLanguage"];
                $pageContent = $row["pageContent"];
                $pageStatus = $row["pageStatus"];
            }
        }
        ?>
        <form id="formPages" class="form-pages" action="#" method="post" enctype="multipart/form-data">
            <!-- Output Results -->
            <div id="pages_result"></div>

            <!-- If delete is called START -->
            <?php if ($_GET['action'] != 'delete') : ?>
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
                    $pageLangArray = ['AL', 'MK', 'EN'];
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
                    echo "<label for='pageCategoryID'>Category</label>";
                    echo "<select id='pageCategoryID' name='pageCategoryID' class='form-control'>";
                    echo "<option class='select_hide' disabled selected>Choose Category</option>";
                    $sql = "SELECT * FROM category";
                    $stmt = $db->query($sql);
                    while ($row = $stmt->fetch()) {
                        if ($row['categoryName'] == $categoryName) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                        echo "<option value='$row[categoryID]' $selected>$row[categoryName]</option>";
                    }
                    echo "</select>";
                    ?>
                </div>
                <div class="form-group text-left">
                    <label for="pageName">Inhalt</label>
                    <textarea class="form-control" rows="15" id="pageContent" name="pageContent" placeholder="Inhalt"><?php echo $pageContent; ?></textarea>
                </div>
                <!-- pages Status goes below... -->
                <?php if ($_GET['action'] == 'edit') : ?>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="pageStatus" name="pageStatus" <?php echo $pageStatus == 1 ? " checked" : "" ?>>
                        <label class="custom-control-label" for="pageStatus">Seitenstatus (markiert ist aktiv oder 1)</label>
                    </div>
                <?php endif; ?>

                <div class="form-group">

                    <!-- Insert Button -->
                    <?php if ($_GET['action'] == 'add') : ?>
                        <!-- Input hidden below will be posted with the form -->
                        <input type="hidden" id="dbInsert" name="dbInsert" value="dbInsert">
                        <input type="submit" id="btnAddpages" name="btnAddpages" class="btn btn-primary btn-lg btn-block" value="Save" />
                        <a href="<?php echo APPURL . "/admin/pages"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Cancel</a>
                    <?php endif; ?>

                    <!-- Edit Button -->
                    <?php if ($_GET['action'] == 'edit') : ?>
                        <!-- pageID senden -->
                        <input type="hidden" id="dbEdit" name="dbEdit" value="<?php echo $_GET['id']; ?>">
                        <input type="submit" id="btnEditpages" name="btnEditpages" class="btn btn-primary btn-lg btn-block" value="Save" />
                        <a href="<?php echo APPURL . "/admin/pages"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Cancel</a>
                    <?php endif; ?>

                </div>
            <?php endif; ?>
            <!-- If delete is called END -->

            <?php if ($_GET['action'] == 'delete') : ?>
                <div class="form-group">
                    <!-- Delete Button and pageID send -->
                    <input type="hidden" id="dbDelete" name="dbDelete" value="<?php echo $_GET['id']; ?>">
                    <input type="submit" id="btnDeletepages" name="btnDeletepages" class="btn btn-danger btn-lg" value="Delete" />
                    <a href="<?php echo APPURL . "/admin/pages"; ?>" type="button" class="btn btn-secondary btn-lg">Cancel</a>
                </div>
            <?php endif; ?>

        </form>
    </div>

    <!-- Pages Ajax START -->
    <script>
        document.getElementById("formPages").addEventListener("submit", (e) => {
            e.preventDefault();
            const pages_result = document.getElementById("pages_result");
            const formPages = new FormData(document.getElementById("formPages"));
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo APPURL . '/admin/pages'; ?>', true);
            xhr.onload = () => {
                // Process our return data
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Success
                    if (xhr.responseText.trim() == 'success') {
                        window.location.replace("<?php echo APPURL . '/admin/pages'; ?>");
                    } else {
                        pages_result.innerHTML = "<div class='alert alert-danger' role='alert'>" + xhr.responseText + "</div>";
                    }
                } else {
                    // Failed
                    console.log('error: ', xhr);
                }
            };
            xhr.send(formPages);
        });
    </script>
    <!-- Pages Ajax END -->

<?php
}
?>