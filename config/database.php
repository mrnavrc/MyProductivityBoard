<?php
$servername = 'mysql';
$username = 'root';
$password = '1910932882';
$dbname = 'db_MyProductivityBoard';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $conn->setAttribute ... conn is instance, setAttribute method/function of PDO
    // new PDO class "->" access to properties, functions, variables of class/object
    // :: to call a static method (public static function name())
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}