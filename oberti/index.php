<?php
    session_start();
    require 'connessione.php';

    
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

    if($_SESSION['ruolo'] == 'dipendente'){
        $matricola = $_SESSION['matricola'];
        echo "<html>";
        echo "<body>";
        echo "<h1>Benvenuto!  $matricola</h1>";
        echo "<a href='logout.php'>Logout</a><br><br>";
        echo "<a href='profilo.php'>Visualizza il tuo profilo</a><br><br>";
        echo "<a href='inviaRichiesta.php'>Invia richiesta</a><br><br>";
        echo "<p> Ruolo: {$_SESSION['ruolo']}</p>";
        echo "</body>";
        echo "</html>";
        exit;
    }

    if($_SESSION['ruolo'] == 'amministratore'){
        //$id_mauntentore = $_SESSION['id_manutentore'];
        echo "<html>";
        echo "<body>";
        echo "<h1>Benvenuto amministratore!</h1>";
        echo "<a href='logout.php'>Logout</a><br><br>";
        echo "<a href='profilo.php'>Visualizza il tuo profilo</a><br><br>";
        echo "<a href='registraManutentore.php'>Registra un nuovo manutentore</a><br><br>";
        echo "<a href='visualizzaRichieste.php'>Visualizza tutte le  richieste </a><br><br>";
        echo "<p> Ruolo: {$_SESSION['ruolo']}</p>";
        echo "</body>";
        echo "</html>";
        exit;
    }

    if($_SESSION['ruolo'] == 'manutentore'){
        $matricola = $_SESSION['matricola'];
        echo "<html>";
        echo "<body>";
        echo "<h1>Benvenuto $matricola nella pagina manutentori!</h1>";
        echo "<a href='logout.php'>Logout</a><br><br>";
        echo "<a href='profilo.php'>Visualizza il tuo profilo</a><br><br>";
        echo "<a href='visualizzaRichieste.php'>Visualizza tutte le  richieste </a><br><br>";
        echo "<p> Ruolo: {$_SESSION['ruolo']}</p>";
        echo "</body>";
        echo "</html>";
        exit;
    }

?>

