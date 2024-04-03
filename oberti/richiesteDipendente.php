<?php
    session_start();
    require 'connessione.php';

    if (!isset($_SESSION['matricola'])) {
        // Redirect to login page if not logged in
        header("Location: login.php");
        exit();
    }
    

    
    $dipendente_matricola = $_SESSION['matricola'];
    $sql = "SELECT * FROM richiesta WHERE dipendente_matricola = '$dipendente_matricola'";
    $query = $connessione->prepare($sql);
    $query->execute();
    $result = $query->get_result();
    if($result->num_rows == 0){
        echo "<p>Nessuna richiesta da visualizzare</p>";
    }else{
        while($richieste = $result->fetch_assoc()){
            echo "<div data-id='{$richieste['id_richiesta']}'>";
            echo "<p><strong>Id richiesta:</strong> {$richieste['id_richiesta']}</p>";
            echo "<p><strong>Matricola:</strong> {$richieste['dipendente_matricola']}</p>";
            echo "<p><strong>Descrizione:</strong> {$richieste['descrizione']}</p>";
            echo "<p><strong>Data:</strong> {$richieste['data']}</p>";
            echo "<p><strong>Stato:</strong> {$richieste['stato']}</p>";
            echo "<hr>";
            echo "</div>";
            
        }
}
    