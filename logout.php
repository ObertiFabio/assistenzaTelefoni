<?php
    session_start();
    session_destroy();
    header("location: /www/login.php");
?>