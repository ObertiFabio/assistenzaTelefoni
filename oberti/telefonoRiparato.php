<?php
    session_start();
    require 'connessione.php';

    if (!isset($_SESSION['matricola'])) {
        // Redirect to login page if not logged in
        header("Location: login.php");
        exit();
    }
    //UPDATE DELLO STTAO DELLA RICHIESTA
    echo "TELEFONO RIPARATO!<br>";
    echo "<a href='visualizzaRichiesteManutentore.php'><button>Torna indietro</button></a>";
?>