<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ToDo app</title>
</head>
<body>
<?php
include '../src/inc/header.php'
?>

<h1>ToDo App</h1>
<form>
    <label for="fname">To-Do</label><br>
    <input type="text" id="fname" name="fname"><br>
    <label for="lname">Date</label><br>
    <input type="date" id="lname" name="lname">
    <input type="submit" value="Submit">
</form>
<h2>ToDo List</h2>
</body>
</html>