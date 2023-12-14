<?php
    $_SESSION['matricola'] = null;
    $_SESSION['password'] = null;

    session_destroy();
    header("location: /login.php");
?>