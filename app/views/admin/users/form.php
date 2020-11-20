<?php

if (isset($_GET['action'])) {
?>
    <div class="container bg-white p-3" id="userSuccess">
        <form id="formUser" class="form-user" action="<?php echo APPURL . "/admin/users/" . $_GET['action']; ?>" method="post" enctype="multipart/form-data">

            <!-- Flash Message -->
            <div class="message"></div>

            <?php
            ########################## ADD START ###########################
            if ($_GET['action'] == 'add') {
            ?>
                <h5>Add new User</h5>
                <!-- code... -->
            <?php
            }
            ########################## ADD END #############################

            ########################## EDIT START ##########################
            if ($_GET['action'] == 'edit') {
                echo "<h5>User edit</h5><span>ID: $_GET[id] </span>";
                $row = getUserById($_GET['id']);
                $userName = $row["userName"];
                $userEmail = $row["userEmail"];
                $userRole = $row["userRole"];
                // $oldPassword = $row["oldPassword"];
                // $newPassword = $row["newPassword"];
            ?>
                <div class="form-group text-left">
                    <label for="userName">User Name</label>
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="Username" value="<?php echo $userName; ?>" readonly>
                </div>

                <div class="form-group text-left">
                    <label for="userEmail">Email</label>
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
                <div class="form-group text-right">
                    <!-- userID senden -->
                    <input type="hidden" id="dbEdit" name="dbEdit" value="<?php echo $_GET['id']; ?>">
                    <input type="submit" id="btnEditUser" name="btnEditUser" class="btn btn-success btn-lg" value="Save" />
                    <a href="<?php echo APPURL . "/admin/users"; ?>" type="button" class="btn btn-info btn-lg">Cancel</a>
                </div>
            <?php
            }
            ########################## EDIT END ############################

            ########################## DELETE START ########################
            if ($_GET['action'] == 'delete') {
            ?>
                <h5>User delete</h5>
                <!-- code... -->
            <?php
            }
            ########################## DELETE END ##########################
            ?>

        </form>
    </div>

    <!-- Users Ajax START -->
    <script>
        const frm = document.getElementById("formUser");
        frm.addEventListener("submit", (e) => {
            e.preventDefault();
            const message = document.querySelector(".message");
            const formData = new FormData(frm);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', frm.action, true);
            xhr.onload = () => {
                // Process our return data
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Success
                    if (xhr.responseText.trim() == 'success') {
                        window.location.replace("<?php echo APPURL . '/admin/users'; ?>");
                    } else {
                        message.innerHTML = "<div class='alert alert-danger' role='alert'>" + xhr.responseText + "</div>";
                    }
                } else {
                    // Failed
                    console.log('error: ', xhr);
                }
            };
            xhr.send(formData);
        });
    </script>
    <!-- Users Ajax END -->

<?php
}
?>