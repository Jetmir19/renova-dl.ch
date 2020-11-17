<?php
require_once dirname(dirname(__DIR__)) . "/config/config.php";

unset($_SESSION["userID"]);
unset($_SESSION["userName"]);
unset($_SESSION["userRole"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin - Logout</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/bootstrap.min.css" />
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/adm.css" />
</head>

<body>

    <!-- MAIN Content START -->
    <div class="text-center">
        <h1 class="display-5 text-success">Logout successful</h1>
        <p class="text-muted">You have successfully logged out.</p>
    </div>
    <!-- MAIN Content END -->

    <script>
        setTimeout(function() {
            window.location.replace('<?php echo APPURL . '/admin'; ?>');
        }, 2000);
    </script>

</body>

</html>