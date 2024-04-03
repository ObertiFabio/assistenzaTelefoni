<html>
<body>
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
    $sql = "SELECT * FROM richiesta WHERE stato = 'presa in carico' and manutentore_id = '$manutentore_id'";
    $query = $connessione->prepare($sql);
    if($ruolo == 'manutentore'){
        $query->execute();
        $result = $query->get_result();
        if($result->num_rows == 0){
            echo "<p>Nessuna richiesta da visualizzare</p>";
        }else{
            while($richieste = $result->fetch_assoc()){
                echo "<div data-id='{$richieste['id_richiesta']}'>";
                echo "<p><strong>Id richiesta:</strong> {$richieste['id_richiesta']}</p>";
                /*
                echo "<p><strong>Matricola:</strong> {$richieste['dipendente_matricola']}</p>";
                echo "<p><strong>Descrizione:</strong> {$richieste['descrizione']}</p>";
                echo "<p><strong>Data:</strong> {$richieste['data']}</p>";
                echo "<p><strong>Stato:</strong> {$richieste['stato']}</p>";
                */
                echo "<a href='richiestaSingola.php?id_richiesta={$richieste['id_richiesta']}'<button>Apri</button></a>";
                /*
            
                echo "<hr>";
                */
                echo "</div>";
            
            }
        }
    }
   
    
?>
<a href='index.php'><button>Torna indietro</button></a>
</body>
</html>