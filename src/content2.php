<?php
error_reporting(E_All);
ini_set('display_errors', 1);
session_start();

if (isset($_GET['logout']) || !isset($_SESSION['username'])) {
    $_SESSION = array();
    session_destroy();
    $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
    $filePath = implode('/', $filePath);
    $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
    header("Location: {$redirect}/login.php", true);
    /*  http_redirect("login.php"); */
    die();
}

echo '<!DOCTYPE html>
            <html>
            <head>
            <meta charset="UTF-8">
            <title>content2</title>
            </head>
            <body>
            <div>';

echo "Hello " . $_SESSION['username'] . ".<br><br>Click ";
echo '<a href="content2.php?logout=true">here</a> ';
echo "to logout.<br><br>";
echo 'Click <a href="content1.php">here</a> to go to the content1.php page.';

?>

</div>
</body>
</html>