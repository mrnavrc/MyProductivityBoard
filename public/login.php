<?php
session_start();
require_once '../config/database.php';
if (isset($_POST['login-btn'])) {
    if (empty($_POST['username_log']) and empty($_POST['password_log'])) {
        exit("Please fill login and password");
    } else {
        $username_log = $_POST['username_log'];
        $password_log = $_POST['password_log'];
        $log = $conn->prepare("SELECT username, password FROM db_MyProductivityBoard.users WHERE 
username=? AND password=?");
        $log->execute(array($username_log, $password_log));
        if ($log->rowCount() > 0) {
            $_SESSION['username_log'] = $username_log;
            if (isset($_SESSION['username_log'])) {
                echo "Welcome <strong>" . $_SESSION['username_log'] . "</strong><br/>";
            } else {
                echo "Something went wrong, try it again";
            }
        } else {
            exit("Username/Password is wrong");
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
<main>
    <form action="login.php" method="post">
        <h1>Sign Up</h1>
        <input type="text" name="username_log" placeholder="Enter Username">
        <input type="password" name="password_log" placeholder="Enter Password">
        <input type="submit" name="login-btn" value="login">
        <a href="register.php">Register</a>
        <a href="logout.php">Logout</a>
    </form>
</main>
</body>
</html>