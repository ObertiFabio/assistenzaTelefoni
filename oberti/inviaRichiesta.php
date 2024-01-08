<?php
    session_start();
    require 'connessione.php';

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Facci sapere il problema al tuo cellulare!</title>
    </head>
<body>
    <h1>Invia Richiesta</h1>
    <form method="POST" action="inviaRichiestaController.php">

        <label for="descrizione">Inserisci la descrizione:</label>
        <input type="text" name="descrizione" id="descrizione" required><br>

        <label for="data">Inserisci la data:</label>
        <input type="datetime-local" name="data" id="data" required><br>


        
        <input type="submit" value="INVIA">
    </form>
   
</body>
</html>