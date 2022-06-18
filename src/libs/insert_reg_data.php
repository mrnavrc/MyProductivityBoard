<?php
include_once '../../config/database.php';

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
        }

    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
