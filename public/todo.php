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
</head>
<body>
<?php
include '../src/inc/header.php'
?>
<style>
    #mainSection {
        padding-top: 60px;
        justify-content: center;
    }
</style>
<section id="mainSection">
    <div class="container">
        <h1 class="display-5">To-Do App</h1>
        <form action="" method="post">
            <input type="text" name="todo" placeholder="To-Do">
            <input type="date" name="todo_date" placeholder="To-Do Date">
            <br>
            <input type="submit" class="btn btn-primary mt-2" name=" submit_todo" value="Save">
        </form>
        <h1 class="display-6">Weekly To-Do</h1>
        <div class="container border border-dark">
            <div class="row">
                <div class="col-2">lorem</div>
                <div class="col-2">lorem</div>
                <div class="col-2">lorem</div>
                <div class="col-2">lorem</div>
                <div class="col-2">lorem</div>
                <div class="col-2">lorem</div>
            </div>
        </div>
        <h1 class="display-6">Quick To-Do</h1>
        <div class="container">
            <div class="row gx-2 justify-content-center">

                <div class="col-lg-4 col-md-12">
                    lorem
                </div>

                <div class="col-lg-4 col-md-6">
                    lorem
                </div>

                <div class="col-lg-4 col-md-6">
                    lorem
                </div>

            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
<?php
require '../src/inc/Footer.php'
?>
</body>

</html>