<?php
require_once dirname(dirname(__DIR__)) . "/config/config.php";

// Check if User is Logged in
if (isset($_SESSION["userID"])) {
    header("location:" . APPURL . "/admin");
}

require DB_PATH . "/connect.php";

$email = "";
$password = "";
$output = "";

############# Check in DB START #############
if (isset($_POST["email"])) {
    //Wenn Filter sagt dass sie NICHT false ist, dann ist es ok
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) !== false) {
        $sql = "SELECT * FROM user WHERE userEmail=:email";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->execute();
        $row = $stmt->fetch();

        //Wenn user mit dieser Email existiert
        if ($row !== false) {
            //Das gepostete PW wird mit dem PW des users abgeglichen
            if (password_verify($_POST["password"], $row["userPassword"])) {
                //User erkannt und mit Session ausgestattet
                $_SESSION["userID"] = $row["userID"];
                $_SESSION["userName"] = $row["userName"];
                $_SESSION["userRole"] = $row["userRole"];

                // Remember me checkBox
                if (!empty($_POST['loginRemember'])) {
                    setcookie('email', $_POST['email'], time() + 30 * 24 * 60 * 60);
                    setcookie('password', $_POST['password'], time() + 30 * 24 * 60 * 60);
                } else {
                    if (isset($_COOKIE["email"])) {
                        setcookie("email", "", time() - 3600);
                    }
                    if (isset($_COOKIE["password"])) {
                        setcookie("password", "", time() - 3600);
                    }
                }
                //header("location: ../a_panel/main");
                $output .= "success";
            } else {
                // Display an error message if password is not valid
                $output .= "Passwort nicht gültig.";
            } //password_verify ENDE
        } else {
            $output .= "Mit dieser E-Mail-Adresse wurde kein Konto gefunden.";
        } // $row ENDE
    } else {
        $output .= "E-Mail Adresse nicht gültig.";
    } //filter ENDE

    // Return login_results
    echo $output;
    exit;
}
############# Check in DB END #############
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin - Login</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/bootstrap.min.css" />
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/adm.css" />
</head>

<body>

    <!-- MAIN Content START -->
    <div class="container">
        <?php //echo $_SESSION['login_return_url']; 
        ?>
        <form action="/" id="formLogin" class="form-signin">
            <div class="text-center mb-3">
                <!--<img class="mb-1" src="<?php echo APPURL; ?>/public/img/favicon.png" alt="" height="72">-->
                <h1> <?php echo SITE_NAME; ?> </h1>
                <hr>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo isset($_COOKIE["email"]) ? $_COOKIE["email"] : $email ?>" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo isset($_COOKIE["password"]) ? $_COOKIE["password"] : $password ?>" required>
            </div>
            <div class="form-group mt-4">
                <input type="submit" id="btnLogin" name="btnLogin" class="btn btn-primary btn-lg btn-block" value="Login">
            </div>
            <!-- Output login_results -->
            <div id="login_result"></div>
        </form>
        <p class="text-center"><a href="<?php echo APPURL; ?>">← Go back to <?php echo SITE_NAME; ?></a></p>
    </div>
    <!-- MAIN Content END -->

    <!-- Login Ajax START -->
    <script>
        document.getElementById("formLogin").addEventListener("submit", (e) => {
            e.preventDefault();
            const login_result = document.getElementById("login_result");
            const formLogin = new FormData(document.getElementById("formLogin"));
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo APPURL . '/admin/login'; ?>', true);
            xhr.onload = () => {
                // Process our return data
                if (xhr.status >= 200 && xhr.status < 400) {
                    // console.log(xhr.responseText);
                    // Success
                    if (xhr.responseText.trim() == 'success') {
                        window.location.replace("<?php echo APPURL . '/admin'; ?>");
                    } else {
                        login_result.innerHTML = "<div class='text-danger bg-light rounded border p-3 mb-4'>" + xhr.responseText + "</div>";
                    }
                } else {
                    // Failed
                    console.log('error: ', xhr);
                }
            };
            xhr.send(formLogin);
        });
    </script>
    <!-- Login Ajax END -->

</body>

</html>