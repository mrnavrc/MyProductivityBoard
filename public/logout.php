<?php
session_start();
session_destroy();
if (empty($_SESSION['username_log'])) {
    echo "You've been logged out";
} else {
    echo "Something went wrong.";
}

?>

<button onclick="window.location.href='login.php';">
    login
</button>
