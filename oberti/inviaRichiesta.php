<?php
    session_start();
    require 'connessione.php';

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

    $cellulari=$connessione->query("SELECT * FROM cellulare");

    ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Facci sapere il problema al tuo cellulare!</title>
    </head>
<body>
    <h1>Invia Richiesta</h1>
    <form method="POST" action="inviaRichiestaController.php">

        <label for="descrizione">Inserisci la descrizione:</label>
        <input type="text" name="descrizione" id="descrizione" required><br>

        <label for="data">Inserisci la data:</label>
        <input type="datetime-local" name="data" id="data" required><br>

        <label for="cellulare_id">Inserisci l'ID del cellulare:</label>
        <select id="cellulare_id" name="cellulare_id" required>
            <?php
            while($cellulare = $cellulari->fetch_assoc()) {
                echo "<option value=\"".$cellulare["id_cellulare"]."\">".$cellulare["marca"]." id:[".$cellulare["id_cellulare"]."]</option>";
            }
            ?>
        </select><br>
        
        <input type="submit" value="INVIA"><br><br>
        <a href="index.php">Torna alla Home</a>
    </form>
    
</body>
</html>