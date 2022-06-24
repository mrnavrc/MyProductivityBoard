<?php
//echo "Welcome <strong>" . $_SESSION['username_log'] . "</strong><br/>";
require_once '../config/database.php';

if (isset($_POST['submit_todo'])) {
    try {
        //insert data
        $todo = $_POST['todo'];
        $todo_date = $_POST['todo_date'];
        // prepare sql and parameters
        $sql_todo = "INSERT INTO db_MyProductivityBoard.todo (todo, date) VALUES (?, ?)";
        $conn->prepare($sql_todo)->execute([$todo, $todo_date]);
        echo "<br> New records created successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ToDo app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>

</head>
<body>
<?php
include '../src/inc/header.php'
?>

<h1>ToDo App</h1>
<form action="" method="post">
    <input type="text" name="todo" placeholder="To-Do">
    <input type="date" name="todo_date" placeholder="To-Do Date">
    <input type="submit" class="btn btn-primary btn-sm" name=" submit_todo" value="Save">
</form>
<h2>ToDo List</h2>

<div class="7dCalendar">

</div>

<div class="quickToDo">


</div>


</body>
</html>