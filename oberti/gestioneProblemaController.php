<?php
    session_start();
    require 'connessione.php';
    
    // Check if the user is logged in
    if (!isset($_SESSION['matricola'])) {
        // Redirect to login page if not logged in
        header("Location: login.php");
        exit();
    }

    echo "completato";

    $connessione->close();
?>