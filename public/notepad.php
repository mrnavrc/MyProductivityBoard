<?php require_once '../config/database.php';


if (!empty($_POST['noteTitle']) or !empty($_POST['noteText'])) {
    echo "Title and text is needed";
} else {
    if (isset($_POST['submitNote'])) {
        try {
            //insert data
            $noteTitle = $_POST['noteTitle'];
            $noteText = $_POST['noteText'];
            // prepare sql and parameters
            $sql_todo = "INSERT INTO db_MyProductivityBoard.Notepad (Title, Note) VALUES (?, ?)";
            $conn->prepare($sql_todo)->execute([$noteTitle, $noteText]);
            echo "<br> New note created successfully";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notepad</title>
    <?php
    require '../src/inc/header.php'
    ?>

</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.js"
        integrity="sha512-aZY0xUDV+pHpyF5BIQ3kYnSI+2l/9HfjZa8e9W95JPwIECEafVw2mF8zX9wZR1Bgj3wWrJfMNipLjoHLY4oubw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css"
      integrity="sha512-PVNMdkw+2UbxMaF03ZTxkRCySBl5QvZgSQPO0vuIpYIzb5h+Q18y8A/W/N4Vpo8EerHoi2DTZta/UxrdKPG0dA=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>


<body>

<div class="p-5 justify-content-center">
    <form method="post" action="">
        <input class="mb-3" type="text" name="noteTitle" placeholder="Note Title">
        <div id="editor-container"></div>
        <input type="hidden" id="quill_html" name="noteText">
        <input type="submit" class="btn btn-primary mt-3" name="submitNote" value="Save">
    </form>
</div>
<div id="notes">
    <?php
    $showNotes = $conn->prepare("SELECT Title, Note FROM db_MyProductivityBoard.Notepad");
    $showNotes->execute();
    foreach ($showNotes as $row) {
        ?>
        <span><?php echo $row["Title"] ?></span><br>

        <?php
    }
    ?>

</div>


<script src="../src/components/RichTextEditor.js"></script>
</body>
</html>