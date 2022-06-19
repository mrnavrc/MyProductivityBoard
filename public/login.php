<?php

require_once '../config/database.php';
if (isset($_POST['login-btn'])) {
    if ($_POST['username_log'] and $_POST['password_log']) {
        echo "Login successful";
    } else {
        echo "Please fill login and password";
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
    </form>
</main>
</body>
</html>