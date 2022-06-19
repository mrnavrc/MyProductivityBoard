<?php
require_once '../config/database.php';

if (isset($_POST['submit-btn'])) {
    try {
        //insert data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare sql and parameters
        $stmt = $conn->prepare("INSERT INTO db_MyProductivityBoard.users (username, email, password, password2)
          VALUES (:username, :email, :password, :password2)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':password2', $password2);
        $stmt->execute();

        echo "<br> New records created successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
</head>
<body>
<main>
    <form action="register.php" method="post">
        <h1>Sign Up</h1>
        <input type="text" name="username" placeholder="Enter Username">
        <input type="email" name="email" placeholder="Enter email">
        <input type="password" name="password" placeholder="Enter Password">
        <input type="password" name="password2" placeholder="Enter Password2">
        <input type="submit" name="submit-btn" value="submit">
    </form>
</main>
</body>
</html>