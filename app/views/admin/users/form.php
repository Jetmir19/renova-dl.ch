<?php

if (isset($_GET['action'])) {
?>
    <div class="container bg-white p-3" id="userSuccess">
        <?php
        if ($_GET['action'] == 'edit') {
            echo "<h5>User edit</h5><span>ID: " . $_GET['id'] . "</span>";
            $row = getUserById($_GET['id']);
            $userName = $row["userName"];
            $userEmail = $row["userEmail"];
            $userRole = $row["userRole"];
            // $oldPassword = $row["oldPassword"];
            // $newPassword = $row["newPassword"];
        }
        ?>

        <form id="formUser" class="form-user" action="#" method="post" enctype="multipart/form-data">
            <!-- Output Results -->
            <div id="user_result"></div>

            <div class="form-group">
                <input type="text" class="form-control" id="userName" name="userName" placeholder="Username" value="<?php echo $userName; ?>" readonly>
            </div>

            <div class="form-group">
                <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Email" value="<?php echo $userEmail; ?>">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Old Password" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New Password" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
            </div>

            <!-- UserRole goes below... -->
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="userRole" name="userRole" <?php echo $userRole == 'admin' ? "checked" : "" ?>>
                <label class="custom-control-label" for="userRole">UserRole (Admin is checked and not checked is default)</label>
            </div>

            <!-- Edit Button -->
            <div class="form-group">
                <!-- userID senden -->
                <input type="hidden" id="dbEdit" name="dbEdit" value="<?php echo $_GET['id']; ?>">
                <input type="submit" id="btnEditUser" name="btnEditUser" class="btn btn-danger btn-lg" value="Save" />
                <a href="<?php echo APPURL . "/admin/users"; ?>" type="button" class="btn btn-secondary btn-lg">Cancel</a>
            </div>

        </form>
    </div>

    <!-- Users Ajax START -->
    <script>
        document.getElementById("formUser").addEventListener("submit", (e) => {
            e.preventDefault();
            const user_result = document.getElementById("user_result");
            const formUser = new FormData(document.getElementById("formUser"));
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo APPURL . '/admin/users'; ?>', true);
            xhr.onload = () => {
                // Process our return data
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Success
                    if (xhr.responseText.trim() == 'success') {
                        window.location.replace("<?php echo APPURL . '/admin/users'; ?>");
                    } else {
                        user_result.innerHTML = "<div class='alert alert-danger' role='alert'>" + xhr.responseText + "</div>";
                    }
                } else {
                    // Failed
                    console.log('error: ', xhr);
                }
            };
            xhr.send(formUser);
        });
    </script>
    <!-- Users Ajax END -->

<?php
}
?>