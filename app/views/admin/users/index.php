<?php
// User auth
checkUserLoggedIn();

############# Users Home START ########################
require_once VIEWS_PATH . "/admin/includes/header.php";

if (!(isset($_GET['action']))) {
?>
    <div class="row align-items-center pt-3">
        <div class="col text-left">
            <h3>Users</h3>
        </div>
    </div>
    <hr class="border-top">
    <div class="alert alert-info" role="alert">
        There are always three static users in the administration. It does not include adding a new user or deleting user, but updating the password or email and changing the user role is possible.
    </div>
    <div class="table-responsive-sm">
        <table class="table table-striped">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tableUsers">
                <!-- MySQL START -->
                <?php
                $users = getUsers();
                $counter = 0;
                if ($users) {
                    foreach ($users as $row) {
                        $counter += 1;
                        echo "<tr>
                            <th scope='row'>$counter</th>
                            <td>$row[userID]</td>
                            <td>$row[userName]</td>
                            <td>$row[userEmail]</td>
                            <td>$row[userRole]</td>
                            <td>
                            <a class='btn btn-link' href='?action=edit&id=$row[userID]'>
                            <i class='far fa-edit'></i>
                            </a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr>
                        <td colspan='6'><h1 class='text-info text-center'>No Records</h1></td>
                    </tr>";
                }
                ?>
                <!-- MySQL END -->
            </tbody>
        </table>
    </div>
<?php
}
############# Users Home END ##################

############# Users Form START ###################
require_once VIEWS_PATH . "/admin/users/form.php";
############# Users Form END #####################

require_once VIEWS_PATH . "/admin/includes/footer.php";
?>