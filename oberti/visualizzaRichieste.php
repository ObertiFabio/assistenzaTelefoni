<?php
    session_start();
    require 'connessione.php';

    if (!isset($_SESSION['matricola'])) {
        // Redirect to login page if not logged in
        header("Location: login.php");
        exit();
    }

    $ruolo = $_SESSION['ruolo'];
    $manutentore_id = $_SESSION['matricola'];
    $sql = "SELECT * FROM richiesta WHERE stato = 'inviata'";
    $query = $connessione->prepare($sql);
    if($ruolo == 'manutentore'){
        $query->execute();
        $result = $query->get_result();
        while($richieste = $result->fetch_assoc()){
            echo "<div><strong>Id richiesta:</strong> {$richieste['id_richiesta']}</div>";
            echo "<div><strong>Matricola:</strong> {$richieste['dipendente_matricola']}</div>";
            echo "<div><strong>Descrizione:</strong> {$richieste['descrizione']}</div>";
            echo "<div><strong>Data:</strong> {$richieste['data']}</div>";
            echo "<div><strong>Stato:</strong> {$richieste['stato']}</div>";
            echo "<button>Presa a carico</button>";
            echo "<hr>";
        }
    }
    else if($ruolo == 'amministratore'){
        $query->execute();
        $result = $query->get_result();
        while($richieste = $result->fetch_assoc()){
            echo "<div><strong>Id richiesta:</strong> {$richieste['id_richiesta']}</div>";
            echo "<div><strong>Matricola:</strong> {$richieste['dipendente_matricola']}</div>";
            echo "<div><strong>Descrizione:</strong> {$richieste['descrizione']}</div>";
            echo "<div><strong>Data:</strong> {$richieste['data']}</div>";
            echo "<div><strong>Stato:</strong> {$richieste['stato']}</div>";
            echo "<hr>";
        }
    }
    
?>


<a href="index.php">Torna alla Home</a>

