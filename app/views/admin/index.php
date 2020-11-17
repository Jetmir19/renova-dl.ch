<?php
checkUserLoggedIn();

require DB_PATH . "/db.php";

require_once VIEWS_PATH . "/admin/includes/header.php";

$sql = "SELECT table_name, table_rows FROM information_schema.tables WHERE table_schema = '$dbName' ORDER BY table_name";
$stmt = $db->query($sql);
$tableName = "";
echo "<div class='row pt-4'>";
while ($row = $stmt->fetch()) {
    if ($row['table_name'] == 'category') {
        $tableName = 'Categories';
    }
    if ($row['table_name'] == 'pages') {
        $tableName = 'Pages';
    }
    if ($row['table_name'] == 'gallery') {
        $tableName = 'Gallery';
    }
    if ($row['table_name'] == 'user') {
        $tableName = 'Users';
    }
?>
    <div class="col-md-6 col-lg-4 col-sm-6 mb-4">
        <div class="card border-0 shadow bg-info pb-3">
            <div class="card-body text-white">
                <h1 class="display-3">
                    <?php
                    if ($row['table_rows']) {
                        echo $row['table_rows'];
                    } else {
                        echo 'empty';
                    }
                    ?>
                </h1>
                <h4 class="card-text"><?php echo strtoupper($tableName); ?></h4>
                <!-- <a href="#" class="btn btn-block btn-light mt-3 stretched-link">See details</a> -->
            </div>
        </div>
    </div>
<?php
}
echo "</div>";

require_once VIEWS_PATH . "/admin/includes/footer.php";
?>