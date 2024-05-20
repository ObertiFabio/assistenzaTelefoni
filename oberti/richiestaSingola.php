<html>
  <head>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
<body>
<?php
    session_start();
    require 'connessione.php';

    if (!isset($_SESSION['matricola'])) {
        // Redirect to login page if not logged in
        header("Location: login.php");
        exit();
    }
    
    $id_richiesta=$_GET["id_richiesta"];

    $query = "SELECT * FROM contiene where id_richiesta = ?";
    $stmt = $connessione->prepare($query);
    $stmt->bind_param("s", $id_richiesta);
    $stmt->execute();
    $result = $stmt->get_result();
    $controllo = $result->fetch_assoc();

    if($controllo && $controllo['id_problema'] > 0){
      $sql = "SELECT * FROM richiesta WHERE id_richiesta = ? and stato = 'presa in carico'";
      $query = $connessione->prepare($sql);
      $query->bind_param("s", $id_richiesta);
      $query->execute();
      $result = $query->get_result();
      $problemi = $result->fetch_assoc();

      echo "<div data-id='{$problemi['id_richiesta']}'>";
      echo "<p><strong>Id richiesta:</strong> {$problemi['id_richiesta']}</p>";
      echo "<p><strong>Matricola:</strong> {$problemi['dipendente_matricola']}</p>";
      echo "<p><strong>Descrizione:</strong> {$problemi['descrizione']}</p>";
      echo "<p><strong>Data:</strong> {$problemi['data']}</p>";
      echo "<p><strong>Stato:</strong> {$problemi['stato']}</p>";
      echo "</div>";
      echo "<a href='telefonoRiparato.php?id_richiesta=" . $problemi["id_richiesta"] . "'><button>Telefono Riparato</button></a>";
      echo "<a href='visualizzaRichiesteManutentore.php'><button>Torna indietro</button></a>";
    }
    else{
      $sql = "SELECT * FROM richiesta WHERE id_richiesta = ? and stato = 'presa in carico'";
      $query = $connessione->prepare($sql);
      $query->bind_param("s", $id_richiesta);
      $query->execute();
      $result = $query->get_result();
      $richieste = $result->fetch_assoc();
      echo "<div data-id='{$richieste['id_richiesta']}'>";
      echo "<p><strong>Id richiesta:</strong> {$richieste['id_richiesta']}</p>";
      echo "<p><strong>Matricola:</strong> {$richieste['dipendente_matricola']}</p>";
      echo "<p><strong>Descrizione:</strong> {$richieste['descrizione']}</p>";
      echo "<p><strong>Data:</strong> {$richieste['data']}</p>";
      echo "<p><strong>Stato:</strong> {$richieste['stato']}</p>";
      echo "</div>";
      echo "<button onclick='gestisciProblema()'>Gestisci</button>";
      echo "<a href='visualizzaRichiesteManutentore.php'><button>Torna indietro</button></a>";
      echo "<div id='divDaRiempire'></div>";
      ?> 
      
      <?php
    }

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  function gestisciProblema(){
  
    $.ajax({url: "gestioneProblema.php?id_richiesta=<?php echo $richieste['id_richiesta']?>", success: function(result){
      $("#divDaRiempire").html(result);
    }});
};
  
</script>

</body>
</html>
