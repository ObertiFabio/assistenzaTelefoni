<?php
    session_start();
    require 'connessione.php';

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>
<html>
    <body>
        <h1>Benvenuto!!</h1>
        <a href="logout.php">Logout</a>
    </body>
</html>