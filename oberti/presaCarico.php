<?php
    session_start();
    require 'connessione.php';

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

    $query= "UPDATE richiesta SET manutentore_id = {$_SESSION['matricola']} WHERE id_richiesta = {$_POST['id_richiesta']}";
    $query->execute();
    

    ?>