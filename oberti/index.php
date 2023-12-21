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
        <h1>Benvenuto! <?php echo $connessione->query("SELECT matricola FROM dipendenti WHERE matricola = '" . $_SESSION['matricola'] . "'")->fetch_assoc()['matricola']; ?></h1>
        <a href="logout.php">Logout</a><br><br>
        <a href="profilo.php">Visualizza il tuo profilo</a><br><br>
        <a href="inviaRichiesta.php">Invia richiesta</a><br><br>
    </body>
</html>