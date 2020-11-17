<?php 

/* Check if the User is Logged In */
# -----------------------------------------------------------
function checkUserLoggedIn()
# -----------------------------------------------------------
{
    // Check if User is Logged in
    if (empty($_SESSION["userID"])) {
        header("location:" . APPURL . "/admin/login");
    }
}

/* Force redirect to avoid php error 'headers already sent...' */
# -----------------------------------------------------------
function forceRedirect($url)
# -----------------------------------------------------------
{
    if (headers_sent()) {
        echo ("<script>location.href='$url'</script>");
    } else {
        header("Location: $url");
    }
}
