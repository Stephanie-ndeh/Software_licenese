<?php
    session_start();

    unset($_SESSION['id']);

    session_destroy();
    echo 'You have been logged out. <a href="login.php">Go back</a>';

?>