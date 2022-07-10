<?php require_once '../config/database.php';

if (isset($_POST['submitNote'])) {
    if (empty($_POST['noteTitle']) or empty($_POST['noteText'])) {
        echo "Title and text is needed";
    } else {
        try {
            //insert data
            $noteTitle = $_POST['noteTitle'];
            $noteText = $_POST['noteText'];
            // prepare sql and parameters
            $sql_todo = "INSERT INTO db_MyProductivityBoard.Notepad (Title, Note) VALUES (?, ?)";
            $conn->prepare($sql_todo)->execute([$noteTitle, $noteText]);
            $newNoteAlert = "<br> New note created successfully";

        } catch (PDOException $e) {
            $newNoteAlert = "Error: " . $e->getMessage();
        }
    }
}
if (isset($_POST['delete'])) {
    $deleteByID = $_POST['deleteByID'];
    $sqlDelete = "DELETE FROM db_MyProductivityBoard.Notepad WHERE note_ID=" . $deleteByID;
    $deleteNotes = $conn->prepare($sqlDelete);
    $deleteNotes->execute();
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

<div class="p-5 justify-content-center container-fluid">
    <h1 class="display-5">Notepad App</h1>
    <form id="submitNote" method="post" action="">
        <input class="mb-3 mt-3" type="text" name="noteTitle" placeholder="Note Title">
        <div id="editor-container" style="height: 350px"></div>
        <input type="hidden" id="quill_html" name="noteText">
        <input type="submit" class="btn btn-primary mt-3" name="submitNote" value="Save">
    </form>

    <?php
    $showNotes = $conn->prepare("SELECT Title, Note, note_ID FROM db_MyProductivityBoard.Notepad ORDER BY note_ID DESC");
    $showNotes->execute();
    $count = "a";
    foreach ($showNotes as $row) {
        $count++;
        ?>
        <div class="mt-3">
            <div class="row card">
                <div class="card-header">
                    <a data-bs-toggle="collapse" href="#<?= $count ?>">
                        <?= $row['Title'] ?>
                    </a>
                    <form method="post" action="" class="float-end">
                        <input type="hidden" name="deleteByID" value="<?php echo $row['note_ID'] ?>"/>
                        <input type="submit" name="delete" class="btn btn-danger btn-sm" value="Delete">
                    </form>
                </div>
                <div class="collapse" id="<?= $count ?>">
                    <br><?= $row['Note'] ?><br>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        Hello, world! This is a toast message.
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
            aria-label="Close"></button>
</div>
</div>
<script>
    const toastTrigger = document.getElementById('submitNote')
    const toastLiveExample = document.getElementById('liveToast')
    if (toastTrigger) {
        toastTrigger.addEventListener('submit', function () {
            const toast = new bootstrap.Toast(toastLiveExample)

            toast.show()
        })
    }
</script>


<script src="../src/components/RichTextEditor.js"></script>
<?php
require '../src/inc/Footer.php'
?>
</body>
</html>